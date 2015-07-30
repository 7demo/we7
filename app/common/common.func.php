<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');


function url($segment, $params = array(), $noredirect = false) {
	return murl($segment, $params, $noredirect);
}


function message($msg, $redirect = '', $type = '') {
	global $_W;
	if($redirect == 'refresh') {
		$redirect = $_W['script_name'] . '?' . $_SERVER['QUERY_STRING'];
	} elseif (!empty($redirect) && !strexists($redirect, 'http://')) {
		$urls = parse_url($redirect);
		$redirect = $_W['siteroot'] . 'app/index.php?' . $urls['query'];
	}
	if($redirect == '') {
		$type = in_array($type, array('success', 'error', 'info', 'warning', 'ajax', 'sql')) ? $type : 'info';
	} else {
		$type = in_array($type, array('success', 'error', 'info', 'warning', 'ajax', 'sql')) ? $type : 'success';
	}
	if($_W['isajax'] || $type == 'ajax') {
		$vars = array();
		$vars['message'] = $msg;
		$vars['redirect'] = $redirect;
		$vars['type'] = $type;
		exit(json_encode($vars));
	}
	if (empty($msg) && !empty($redirect)) {
		header('location: '.$redirect);
	}
	$label = $type;
	if($type == 'error') {
		$label = 'danger';
	}
	if($type == 'ajax' || $type == 'sql') {
		$label = 'warning';
	}
	include template('common/message', TEMPLATE_INCLUDEPATH);
	exit();
}


function checkauth() {
	global $_W, $engine;
	load()->model('mc');
	if(!empty($_W['member']) && (!empty($_W['member']['mobile']) || !empty($_W['member']['email']))) {
		return true;
	}
	if(!empty($_W['openid'])) {
		$fan = mc_fansinfo($_W['openid'], $_W['acid'], $_W['uniacid']);
		if(_mc_login(array('uid' => intval($fan['uid'])))) {
			return true;
		}
		if (defined('IN_API')) {
			$GLOBALS['engine']->died("抱歉，您需要先登录才能使用此功能，点击此处 <a href='".__buildSiteUrl(url('auth/login')) ."'>【登录】</a>");
		}
	}
	
	$forward = base64_encode($_SERVER['QUERY_STRING']);
	if($_W['isajax']) {
		$result = array();
		$result['url'] = url('auth/login', array('forward' => $forward), true);
		$result['act'] = 'redirect';
		exit(json_encode($result));
	} else {
		header("location: " . url('auth/login', array('forward' => $forward)), true);
	}
	exit;
}

function __buildSiteUrl($url) {
	global $_W, $engine;

	$mapping = array(
		'[from]' => $engine->message['from'],
		'[to]' => $engine->message['to'],
		'[uniacid]' => $_W['uniacid'],
	);
	$url = str_replace(array_keys($mapping), array_values($mapping), $url);

	$pass = array();
	$pass['openid'] = $engine->message['from'];
	$pass['acid'] = $_W['acid'];

	$sql = 'SELECT `fanid`,`salt`,`uid` FROM ' . tablename('mc_mapping_fans') . ' WHERE `acid`=:acid AND `openid`=:openid';
	$params = array();
	$params[':acid'] = $_W['acid'];
	$params[':openid'] = $pass['openid'];
	$fan = pdo_fetch($sql, $params);
	if(empty($fan) || !is_array($fan) || empty($fan['salt'])) {
		$fan = array('salt' => '');
	}
	$pass['time'] = TIMESTAMP;
	$pass['hash'] = md5("{$pass['openid']}{$pass['time']}{$fan['salt']}{$_W['config']['setting']['authkey']}");
	$auth = base64_encode(json_encode($pass));

	$vars = array();
	$vars['uniacid'] = $_W['uniacid'];
	$vars['__auth'] = $auth;
	$vars['forward'] = base64_encode($url);

	return $_W['siteroot'] . 'app/' . url('auth/forward', $vars);
}


function init_quickmenus($multiid = 0) {
	global $_W, $controller, $action;
	$quickmenu = pdo_fetchcolumn('SELECT quickmenu FROM ' . tablename('site_multi') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $multiid));
	$quickmenu = iunserializer($quickmenu);
	if(!empty($quickmenu)) {
		$acl = array();
		$acl['home'] = array(
			'home'
		);
		if((is_array($acl[$controller]) && in_array($action, $acl[$controller])) || in_array(IN_MODULE, $quickmenu['enablemodule'])) {
			$tpl = !empty($quickmenu['template']) ? $quickmenu['template'] : 'default';
			$_W['quickmenu']['menus'] = app_navs('shortcut', $multiid);
			$_W['quickmenu']['template'] = '../quick/' . $tpl;
		}
	}
}

function register_jssdk($debug = false){
	
	global $_W;
	
	if (defined('HEADER')) {
		echo '';
		return;
	}
	
	$sysinfo = array(
		'uniacid' 	=> $_W['uniacid'],
		'acid' 		=> $_W['acid'],
		'siteroot' 	=> $_W['siteroot'],
		'siteurl' 	=> $_W['siteurl'],
		'attachurl' => $_W['attachurl'],
		'cookie' 	=> array('pre'=>$_W['config']['cookie']['pre'])
	);
	if (!empty($_W['acid'])) {
		$sysinfo['acid'] = $_W['acid'];
	}
	if (!empty($_W['openid'])) {
		$sysinfo['openid'] = $_W['openid'];
	}
	if (defined('MODULE_URL')) {
		$sysinfo['MODULE_URL'] = MODULE_URL;
	}
	$sysinfo = json_encode($sysinfo);
	$jssdkconfig = json_encode($_W['account']['jssdkconfig']);
	$debug = $debug ? 'true' : 'false';
	
	$script = <<<EOF

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
	window.sysinfo = window.sysinfo || $sysinfo || {};
	
	// jssdk config 对象
	jssdkconfig = $jssdkconfig || {};
	
	// 是否启用调试
	jssdkconfig.debug = $debug;
	
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'hideMenuItems',
		'showMenuItems',
		'hideAllNonBaseMenuItem',
		'showAllNonBaseMenuItem',
		'translateVoice',
		'startRecord',
		'stopRecord',
		'onRecordEnd',
		'playVoice',
		'pauseVoice',
		'stopVoice',
		'uploadVoice',
		'downloadVoice',
		'chooseImage',
		'previewImage',
		'uploadImage',
		'downloadImage',
		'getNetworkType',
		'openLocation',
		'getLocation',
		'hideOptionMenu',
		'showOptionMenu',
		'closeWindow',
		'scanQRCode',
		'chooseWXPay',
		'openProductSpecificView',
		'addCard',
		'chooseCard',
		'openCard'
	];
	
	wx.config(jssdkconfig);
	
</script>
EOF;
	echo $script;
}
