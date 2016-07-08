<?php
    $mydate = new DateTime('now');
    $start = $mydate->getTimestamp();

    include_once('./config.php');

    spl_autoload_register(function ($class) {
        include './lib/' . $class . '.class.php';
    });

    $weixin = new Weixin(APP_ID, APP_SECRET, ENV == 'sae' ? SAE_DATA_PATH : DATA_PATH);

    if (isset($_GET['jsonp_callback'])) {
        $jsonp = $_GET['jsonp_callback'];
    }

    header(isset($jsonp) ? 'Content-Type: application/json' : 'Content-Type: application/javascript');
    header('Cache-Control: no-cache, must-revalidate');

    $result = array();

    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        switch ($type) {
            case 'ticket':
                $data = $weixin->getTicket();
                if ($data) {
                    $result['data'] = $data;
                } else {
                    $result['data'] = null;
                }
                break;
            case 'signature':
                $data = $weixin->createSignature($_GET['url']);
                if ($data) {
                    $result['data'] = $data;
                } else {
                    $result['data'] = null;
                }
                break;
            default:
                $data = $weixin->getAccessToken();
                if ($data) {
                    $result['data'] = $data;
                } else {
                    $result['data'] = null;
                }
        }
    }

    if ($result['data']) {
        $result['code'] = 0;
        $result['msg'] = 'ok';
    } else {
        $result['code'] = -1;
        $result['msg'] = 'fail';
    }
    
    $end_time = new DateTime('now');
    $end = $end_time->getTimestamp();
    $result['exec_time'] = $end - $start;
    $result = json_encode($result, true);
    echo isset($jsonp) ? $jsonp . '(' . $result . ')' : $result;
