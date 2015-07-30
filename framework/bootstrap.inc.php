<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
define('IN_IA', true);
define('STARTTIME', microtime());
define('IA_ROOT', str_replace("\\", '/', dirname(dirname(__FILE__))));
define('MAGIC_QUOTES_GPC', (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) || @ini_get('magic_quotes_sybase'));
define('TIMESTAMP', time());

$_W = $_GPC = array();
$configfile = IA_ROOT . "/data/config.php";

if(!file_exists($configfile)) {
	if(file_exists(IA_ROOT . '/install.php')) {
		header('Content-Type: text/html; charset=utf-8');
		require IA_ROOT . '/framework/version.inc.php';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo "·如果你还没安装本程序，请运行<a href='".(strpos($_SERVER['SCRIPT_NAME'], 'web') === false ? './install.php' : '../install.php')."'> install.php 进入安装&gt;&gt; </a><br/><br/>";
		echo "&nbsp;&nbsp;<a href='http://www.we7.cc' style='font-size:12px' target='_blank'>Power by WE7 " . IMS_VERSION . " &nbsp;微擎公众平台自助开源引擎</a>";
		exit();
	} else {
		header('Content-Type: text/html; charset=utf-8');
		exit('配置文件不存在或是不可读，请检查“data/config”文件或是重新安装！');
	}
}

require $configfile;
require IA_ROOT . '/framework/version.inc.php';
require IA_ROOT . '/framework/const.inc.php';
require IA_ROOT . '/framework/class/loader.class.php';
load()->func('global');
load()->func('compat');
load()->func('pdo');
load()->classs('db');
load()->classs('account');
load()->classs('agent');
load()->model('cache');
load()->model('account');
load()->model('setting');

define('CLIENT_IP', getip());

$_W['config'] = $config;
$_W['timestamp'] = TIMESTAMP;
$_W['charset'] = $_W['config']['setting']['charset'];
$_W['token'] = token();
$_W['clientip'] = CLIENT_IP;

unset($configfile, $config);

define('ATTACHMENT_ROOT', IA_ROOT .'/'. $_W['config']['upload']['attachdir']);

define('DEVELOPMENT', $_W['config']['setting']['development'] == 1);
if(DEVELOPMENT) {
	ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE);
} else {
	error_reporting(0);
}

if(!in_array($_W['config']['setting']['cache'], array('mysql', 'file', 'memcache'))) {
	$_W['config']['setting']['cache'] = 'mysql';
}
load()->func('cache');

if(function_exists('date_default_timezone_set')) {
	date_default_timezone_set($_W['config']['setting']['timezone']);
}
if(!empty($_W['config']['memory_limit']) && function_exists('ini_get') && function_exists('ini_set')) {
	if(@ini_get('memory_limit') != $_W['config']['memory_limit']) {
		@ini_set('memory_limit', $_W['config']['memory_limit']);
	}
}

$_W['script_name'] = htmlspecialchars(scriptname());

$sitepath = substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
$_W['siteroot'] = htmlspecialchars('http://' . $_SERVER['HTTP_HOST'] . $sitepath);
if(substr($_W['siteroot'], -1) != '/') {
	$_W['siteroot'] .= '/';
}
$urls = parse_url($_W['siteroot']);
$urls['path'] = str_replace(array('/web', '/app', '/payment/wechat', '/payment/alipay', '/api'), '', $urls['path']);
$_W['siteroot'] = $urls['scheme'].'://'.$urls['host'].((!empty($urls['port']) && $urls['port']!='80') ? ':'.$urls['port'] : '').$urls['path'];
$_W['siteurl'] = $urls['scheme'].'://'.$urls['host'].((!empty($urls['port']) && $urls['port']!='80') ? ':'.$urls['port'] : '') . $_W['script_name'] . (empty($_SERVER['QUERY_STRING'])?'':'?') . $_SERVER['QUERY_STRING'];
unset($sitepath);

$_W['isajax'] = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
$_W['ispost'] = $_SERVER['REQUEST_METHOD'] == 'POST';

if(MAGIC_QUOTES_GPC) {
	$_GET = istripslashes($_GET);
	$_POST = istripslashes($_POST);
	$_COOKIE = istripslashes($_COOKIE);
}
$cplen = strlen($_W['config']['cookie']['pre']);
foreach($_COOKIE as $key => $value) {
	if(substr($key, 0, $cplen) == $_W['config']['cookie']['pre']) {
		$_GPC[substr($key, $cplen)] = $value;
	}
}
unset($cplen, $key, $value);

$_GPC = array_merge($_GET, $_POST, $_GPC);
$_GPC = ihtmlspecialchars($_GPC);
if(!$_W['isajax']) {
	$input = file_get_contents("php://input");
	if(!empty($input)) {
		$__input = @json_decode($input, true);
		if(!empty($__input)) {
			$_GPC['__input'] = $__input;
			$_W['isajax'] = true;
		}
	}
	unset($input, $__input);
}

setting_load('upload');
if (empty($_W['setting']['upload'])) {
	$_W['setting']['upload'] = array_merge($_W['config']['upload']);
}

$_W['attachurl'] = empty($_W['config']['upload']['attachurl']) ? $_W['siteroot'] . $_W['config']['upload']['attachdir'] . '/' : $_W['config']['upload']['attachurl'] . '/';

$_W['os'] = Agent::deviceType();
if($_W['os'] == Agent::DEVICE_MOBILE) {
	$_W['os'] = 'mobile';
} elseif($_W['os'] == Agent::DEVICE_DESKTOP) {
	$_W['os'] = 'windows';
} else {
	$_W['os'] = 'unknown';
}

$_W['container'] = Agent::browserType();
if(Agent::isMicroMessage() == Agent::MICRO_MESSAGE_YES) {
	$_W['container'] = 'wechat';
} elseif ($_W['container'] == Agent::BROWSER_TYPE_ANDROID) {
	$_W['container'] = 'android';
} elseif ($_W['container'] == Agent::BROWSER_TYPE_IPAD) {
	$_W['container'] = 'ipad';
} elseif ($_W['container'] == Agent::BROWSER_TYPE_IPHONE) {
	$_W['container'] = 'iphone';
} elseif ($_W['container'] == Agent::BROWSER_TYPE_IPOD) {
	$_W['container'] = 'ipod';
} else {
	$_W['container'] = 'unknown';
}

$controller = $_GPC['c'];
$action = $_GPC['a'];
$do = $_GPC['do'];

header('Content-Type: text/html; charset=' . $_W['charset']);