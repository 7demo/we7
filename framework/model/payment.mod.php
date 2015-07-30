<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
define('ALIPAY_GATEWAY', 'https://mapi.alipay.com/gateway.do');

function alipay_build($params, $alipay = array()) {
	global $_W;
	$tid = $params['tid'];
	$set = array();
	$set['service'] = 'alipay.wap.create.direct.pay.by.user';
	$set['partner'] = $alipay['partner'];
	$set['_input_charset'] = 'utf-8';
	$set['sign_type'] = 'MD5';
	$set['notify_url'] = $_W['siteroot'] . 'payment/alipay/notify.php';
	$set['return_url'] = $_W['siteroot'] . 'payment/alipay/return.php';
	$set['out_trade_no'] = $tid;
	$set['subject'] = $params['title'];
	$set['total_fee'] = $params['fee'];
	$set['seller_id'] = $alipay['account'];
	$set['payment_type'] = 1;
	$set['body'] = $_W['uniacid'];
	$prepares = array();
	foreach($set as $key => $value) {
		if($key != 'sign' && $key != 'sign_type') {
			$prepares[] = "{$key}={$value}";
		}
	}
	sort($prepares);

function wechat_build($params, $wechat) {
				continue;
			}
			$string1 .= "{$key}={$v}&";
		$package['trade_type'] = 'JSAPI';
		ksort($package, SORT_STRING);
				continue;
			}
			$string1 .= "{$key}={$v}&";