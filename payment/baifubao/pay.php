<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
define('IN_MOBILE', true);
require '../../framework/bootstrap.inc.php';
$_GPC['i'] = !empty($_GPC['i']) ? $_GPC['i'] : $_GET['extra'];
require '../../app/common/bootstrap.app.inc.php';
load()->app('common');
load()->app('template');

$sl = $_GPC['ps'];
$params = @json_decode(base64_decode($sl), true);

$setting = uni_setting($_W['uniacid'], array('payment'));
if(!is_array($setting['payment'])) {
	exit('没有设定支付参数.');
}
$payment = $setting['payment']['baifubao'];
require 'bfb_sdk.php';

if (!empty($_GPC['pay_result']) && $_GPC['pay_result'] == '1') {
	$bfb_sdk = new bfb_sdk();
	if (true === $bfb_sdk->check_bfb_pay_result_notify()) {
		$plid = intval($_GPC['order_no']);
		
		$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `plid`=:plid';
		$params = array();
		$params[':plid'] = $plid;
		$log = pdo_fetch($sql, $params);
		if(!empty($log) && $log['status'] == '0') {
			$log['tag'] = iunserializer($log['tag']);
			$log['tag']['bfb_order_no'] = $_POST['bfb_order_no'];
			$record = array();
			$record['status'] = 1;
			$record['tag'] = iserializer($log['tag']);
			pdo_update('core_paylog', $record, array('plid' => $log['plid']));
			if($log['is_usecard'] == 1 && $log['card_type'] == 1 &&  !empty($log['encrypt_code']) && $log['acid']) {
				load()->classs('coupon');
				$acc = new coupon($log['acid']);
				$codearr['encrypt_code'] = $log['encrypt_code'];
				$codearr['module'] = $log['module'];
				$codearr['card_id'] = $log['card_id'];
				$acc->PayConsumeCode($codearr);
			}
			if($log['is_usecard'] == 1 && $log['card_type'] == 2) {
				$now = time();
				$log['card_id'] = intval($log['card_id']);
				$iscard = pdo_fetchcolumn('SELECT iscard FROM ' . tablename('modules') . ' WHERE name = :name', array(':name' => $log['module']));
				$condition = '';
				if($iscard == 1) {
					$condition = " AND grantmodule = '{$log['module']}'";
				}
				pdo_query('UPDATE ' . tablename('activity_coupon_record') . " SET status = 2, usetime = {$now}, usemodule = '{$log['module']}' WHERE uniacid = :aid AND couponid = :cid AND uid = :uid AND status = 1 {$condition} LIMIT 1", array(':aid' => $_W['uniacid'], ':uid' => $log['openid'], ':cid' => $log['card_id']));
			}
		}
		$site = WeUtility::createModuleSite($log['module']);
		if(!is_error($site)) {
			$method = 'payResult';
			if (method_exists($site, $method)) {
				$ret = array();
				$ret['weid'] = $log['uniacid'];
				$ret['uniacid'] = $log['uniacid'];
				$ret['result'] = 'success';
				$ret['type'] = $log['type'];
				$ret['from'] = 'return';
				$ret['tid'] = $log['tid'];
				$ret['user'] = $log['openid'];
				$ret['fee'] = $log['fee'];
				$ret['tag'] = $log['tag'];
				$site->$method($ret);
				$bfb_sdk->notify_bfb();
				exit('success');
			}
		}
	}
}

$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `plid`=:plid';
$paylog = pdo_fetch($sql, array(':plid' => $params['tid']));
if(!empty($paylog) && $paylog['status'] != '0') {
	exit('这个订单已经支付成功, 不需要重复支付.');
}
$auth = sha1($sl . $paylog['uniacid'] . $_W['config']['setting']['authkey']);
if($auth != $_GPC['auth']) {
	exit('参数传输错误.');
}
$_W['openid'] = intval($paylog['openid']);
$bfb_sdk = new bfb_sdk();

file_put_contents(IA_ROOT . '/data/' . microtime(true) . '.txt', print_r($_GET, true));
$params = array (
	'service_code' => sp_conf::BFB_PAY_INTERFACE_SERVICE_ID,
	'sp_no' => sp_conf::$SP_NO,
	'order_create_time' => date("YmdHis"),
	'order_no' => $paylog['plid'],
	'goods_name' => iconv('utf-8', 'gbk', $params['title']),
	'total_amount' => $params['fee'] * 100,
	'currency' => sp_conf::BFB_INTERFACE_CURRENTCY,
	'buyer_sp_username' => $_W['openid'],
	'return_url' => $_W['siteroot'] . 'notify.php',
	'page_url' => $_W['siteroot'] . 'pay.php',
	'pay_type' => '2',
	'bank_no' => '201', 
	'expire_time' => date('YmdHis', strtotime('+15 day')),
	'input_charset' => sp_conf::BFB_INTERFACE_ENCODING,
	'version' => sp_conf::BFB_INTERFACE_VERSION,
	'sign_method' => sp_conf::SIGN_METHOD_MD5,
	'extra' => $_W['uniacid'],
);

$order_url = $bfb_sdk->create_baifubao_pay_order_url($params, sp_conf::BFB_PAY_WAP_DIRECT_URL);
if(false !== $order_url) {
	echo "<script>window.location=\"" . $order_url . "\";</script>";
	exit;
}