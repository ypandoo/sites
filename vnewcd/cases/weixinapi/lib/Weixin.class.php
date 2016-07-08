<?php

/**
 * Class Weixin
 * @description 微信公众平台获取accessToken以及jssdk签名的简易接口类
 * @author willizm.cn@gmail.com
 * @url http://www.willizm.cn
 * @usage 见api.php
 */

    final class Weixin {
        const TOKEN_API = 'https://api.weixin.qq.com/cgi-bin/token';
        const TICKET_API = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket';

        protected $appID;
        protected $appsecret;
        protected $dataPath;

        function __construct($appID, $appsecret, $dataPath) {
                $this->appID = $appID;
                $this->appsecret = $appsecret;
                $this->dataPath = $dataPath;
        }

        public function initConfig($appID, $appsecret, $dataPath) {
            $this->appID = $appID;
            $this->appsecret = $appsecret;
            $this->dataPath = $dataPath;
        }

        public function getTimestamp() {
            $date = new DateTime('now');
            return  $date->getTimestamp();
        }

        private function getAccessTokenFromServer() {
            $now = $this->getTimestamp();
            $paramsArray = array(
                'appID' => $this->appID,
                'secret' => $this->appsecret,
                'grant_type' => 'client_credential'
            );

            $ch = curl_init(self::TOKEN_API . '?' . http_build_query($paramsArray));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($result, true);
            if (isset($result['errcode'])) {
                return 0;
            } else {
                return array_merge($result, array('update_at' => $now));
            }
        }

        private function getTicketFromServer() {
            $now = $this->getTimestamp();
            $token = $this->getAccessToken();
            $paramsArray = array(
                'type' => 'jsapi',
                'access_token' => $token['access_token']
            );

            $ch = curl_init(self::TICKET_API . '?' . http_build_query($paramsArray));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($result, true);
            if ($result['errcode'] == 0) {
                return array_merge($result, array('update_at' => $now));
            } else {
                return 0;
            }
        }

        public function getAccessToken() {
            $now = $this->getTimestamp();
            $cache_path = $this->dataPath . 'ACCESS_TOKEN.json';
            if (file_exists($cache_path)) {
                $cache = file_get_contents($cache_path);
                $cache = json_decode($cache, true);
                if ($cache['update_at'] + $cache['expires_in'] > $now) {
                    return $cache;
                }
            }

            $latest = $this->getAccessTokenFromServer();
            if ($latest) {
                $fp = fopen($cache_path, 'w');
                fwrite($fp, json_encode($latest));
                fclose($fp);
            }
            return $latest;
        }

        public function getTicket() {
            $now = $this->getTimestamp();
            $cache_path = $this->dataPath . 'JSAPI_TICKET.json';
            if (file_exists($cache_path)) {
                $cache = file_get_contents($cache_path);
                $cache = json_decode($cache, true);
                if ($cache['update_at'] + $cache['expires_in'] > $now) {
                    return $cache;
                }
            }

            $latest = $this->getTicketFromServer();
            if ($latest) {
                $fp = fopen($cache_path, 'w');
                fwrite($fp, json_encode($latest));
                fclose($fp);
            }
            return $latest;
        }

        public function createSignature($url) {
            $timestamp = $this->getTimestamp();
            $jsapi_ticket = $this->getTicket();
            $jsapi_ticket = $jsapi_ticket['ticket'];
            $nonceStr = '';

            for ($i = 0, $e = rand(4, 31); $i < $e; $i++) {
                $nonceStr .= chr(rand(65, 126));
            }

            $data = array(
                'jsapi_ticket' => $jsapi_ticket,
                'nonceStr' => $nonceStr,
                'timestamp' => $timestamp,
                'url' => $url
            );

            $signStr =
                'jsapi_ticket=' . $data['jsapi_ticket']
                . '&noncestr=' . $data['nonceStr']
                . '&timestamp=' . $data['timestamp']
                . '&url=' . $data['url'];

            $signature = sha1($signStr);
            $data['signature'] = $signature;
            $data['appId'] = $this->appID;
            unset($data['jsapi_ticket']);
            unset($data['url']);
            return $data;
        }
    }