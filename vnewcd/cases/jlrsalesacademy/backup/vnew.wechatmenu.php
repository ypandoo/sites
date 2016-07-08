<?php
/**
 * 微信/易信公共平台菜单操作类
 * 
 * 用于创建微信(或易信)公共平台的自定义菜单
 * 
 * @author JoStudio
 * 
 * http://www.jostudio.org 
 * version 0.9  (2013.10.1)
 *
 */
class WeChatMenu{	
	private $AppId = "wx2394bd8a2d5a3ab2";  //公共平台提供的AppId
	private $AppSecret = "a8c14e6dd76883e54d62edf777aaa0c0"; //公共平台提供的AppSecret
	public  $AccessToken = ""; //公共平台提供的AccessToken
	
	private $platform = "weixin";  //平台类型。如果是易信，则为 "weixin"; 如果是易信，则为 "yixin"
	public  $host = "api.weixin.qq.com";  ///平台服务器. 微信为api.weixin.qq.com, 易信为api.yixin.im
	
	public $errcode = 0;  //错误代码
	public $errmsg = "";  //错误信息文本
	
	/**
	 * 构造函数
	 * @param unknown_type $platform //平台类型。如果是易信，则为 "weixin"; 如果是易信，则为 "yixin"
	 */
	function WeChatMenu($platform, $appId="", $appSecret="") {
		if ($platform=="易信") $platform="yixin";
		
		if ($platform=="yixin") {
			$this->platform = "yixin";
			$this->host = "api.yixin.im";			
		} else {
			$this->platform = "weixin";
			$this->host = "api.weixin.qq.com";
		} 
		
		$this->setAppId($appId, $appSecret);
	}
	
	/**
	 * 设置AppId 和 AppSecret
	 */
	public function setAppId($AppId, $AppSecret) {
		$this->AppId = $AppId;
		$this->AppSecret = $AppSecret;
	}

	/**
	 * 获得AccessToken
	 */
	public function getAccessToken() {
		if (empty($this->AppId)) return;
		if (empty($this->AppSecret)) return;
		
		$TOKEN_URL="https://".$this->host."/cgi-bin/token?grant_type=client_credential&appid=".$this->AppId."&secret=".$this->AppSecret;
		$json=file_get_contents($TOKEN_URL);
		$result=json_decode($json,true);	
		$this->AccessToken =$result['access_token'];
		return $this->AccessToken;
	}
	
	/**
	 * 创建菜单
	 * @return boolean
	 */
	public function createMenu($menuStr) {
		//if (empty($this->AccessToken)) 
		$this->getAccessToken();
		if (empty($this->AccessToken)) return false;
		if (empty($menuStr)) return false;
		
		$CREATE_MENU_URL = "/cgi-bin/menu/create?access_token=".$this->AccessToken;
		$json=sendPost($this->host, $CREATE_MENU_URL, $menuStr, true);
		$result=json_decode($json,true);
		if ($result['errcode']==0)
			return true;
		else {
			$this->errcode = $result['errcode'];
			$this->errmsg = $result['errmsg'];
			return false;
		}
	}	
	
	/**
	 * 删除菜单
	 * @return boolean
	 */
	public function deleteMenu() {
		if (empty($this->AccessToken)) $this->getAccessToken();
		if (empty($this->AccessToken)) return false;
	
		$DELETE_MENU_URL="/cgi-bin/menu/delete?access_token=".$this->AccessToken;
		$json=file_get_contents("https://". $this->host. $DELETE_MENU_URL);
		$result=json_decode($json,true);
		if ($result['errcode']==0)
			return true;
		else {
			$this->errcode = $result['errcode'];
			$this->errmsg = $result['errmsg'];
			return false;
		}
	}
	
	/**
	 * 从平台读取菜单，返回菜单JSON文本
	 * @return 
	 */
	public function getMenu() {
		if (empty($this->AccessToken)) $this->getAccessToken();
		if (empty($this->AccessToken)) return "";
	
		$GET_MENU_URL="/cgi-bin/menu/get?access_token=".$this->AccessToken;
		$json=file_get_contents("https://". $this->host. $GET_MENU_URL);
		return $json;
	}
}


/**
 * 菜单定义类: 用于定义菜单，生成菜单的JSON文本
 * @author JoStudio
 *
 */
class MenuDefine {
	private $current_menu_name = "";  //当前菜单名称
	private $menus = array();         //菜单数组
	private $menuItems = array();     //菜单项数组
	
	public $str = "";     //菜单的JSON文本
	
	/**
	 * 开始定义菜单
	 */
	public function menuStart() {
		$this->menus = array();
		$this->menuItems = array();
		$this->current_menu_name = "";
		$this->str = "";
	}
	
	/**
	 * 增加一个下拉菜单
	 * @param unknown_type $name
	 */
	public function addMenu($name) {	
		$this->finishMenu();
		$this->current_menu_name = $name;
	}

	/**
	 * 结束当前下拉菜单定义
	 */
	private function finishMenu() {
		if (!empty($this->current_menu_name)) {
			$menu = array('name' => $this->current_menu_name, "sub_button" => $this->menuItems);
			$this->menus[] = $menu;
			$this->menuItems = array();
			$this->current_menu_name = "";
		}
	}
	
	/**
	 * 增加一个菜单项
	 * @param unknown_type $name
	 * @param unknown_type $key
	 */
	public function addMenuItemClick($name, $key) {
		$menuItem = array( 'type' => 'click',
				'name' => $name,
				'key' => $key);
		$this->menuItems[] = $menuItem;
	}
	
	public function addMenuItemView($name, $key) {
		$menuItem = array( 'type' => 'view',
				'name' => $name,
				'url' => $key);
		$this->menuItems[] = $menuItem;
	}

	/**
	 * 结束菜单定义
	 */
	public function menuEnd() {
		$this->finishMenu();
		$data = array('button' => $this->menus);
		$this->str = my_json_encode($data);
	}	
}




/**
 *  以POST方式向提定的URL提交数据，返回结果
 */
function sendPost($host, $url, $data, $isSSL = false) {
	$port = 80;
	$prefix = "";
	if ($isSSL) {
		$prefix = "ssl://";
		$port = 443;
	}

	$header = "POST ".$url." HTTP/1.0\r\n";
	$header .= "Host:$host:$port\r\n";
	$header .= "User-Agent: Mozilla 4.0\r\n";
	//$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Type: raw/xml\r\n";
	$header .= "Content-Length: " . strlen($data) . "\r\n";
	$header .= "Connection: Close\r\n\r\n";
	$header .= $data;

	$result = "";
	$content_started = false;
	if ($isSSL)
		$fp = fsockopen($prefix.$host, $port, $errno, $errstr);
	else
		$fp = fsockopen($host, $port);

	if ($fp) {
		fputs($fp, $header);
		while (!feof($fp)) {
			$line = fgets($fp);
			if ($content_started==false) {
				if ($line=="\r\n") $content_started=true;
			} else {
				$result .= $line;
			}
		}
		fclose($fp);
	}
	return $result;
}


/**
 * 自定义的json_encode函数, 返回json格式的文本
 */
function my_json_encode($var) {
	switch (gettype($var)) {
		case 'boolean':
			return $var ? 'true' : 'false'; // Lowercase necessary!
		case 'integer':
		case 'double':
			return $var;
		case 'resource':
		case 'string':
			return '"'. str_replace(array("\r", "\n", "<", ">", "&"),
			array('\r', '\n', '\x3c', '\x3e', '\x26'),
			addslashes($var)) .'"';
		case 'array':
			// Arrays in JSON can't be associative. If the array is empty or if it
			// has sequential whole number keys starting with 0, it's not associative
			// so we can go ahead and convert it as an array.
			if (empty ($var) || array_keys($var) === range(0, sizeof($var) - 1)) {
				$output = array();
				foreach ($var as $v) {
					$output[] = my_json_encode($v);
				}
				return '[ '. implode(', ', $output) .' ]';
			}
			// Otherwise, fall through to convert the array as an object.
		case 'object':
			$output = array();
			foreach ($var as $k => $v) {
				$output[] = my_json_encode(strval($k)) .': '. my_json_encode($v);
			}
			return '{ '. implode(', ', $output) .' }';
		default:
			return 'null';
	}
}

?>