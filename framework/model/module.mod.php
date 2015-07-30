<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');


function module_types() {
	static $types = array(
		'business' => array(
			'name' => 'business',
			'title' => '主要业务',
			'desc' => ''
		),
		'customer' => array(
			'name' => 'customer',
			'title' => '客户关系',
			'desc' => ''
		),
		'activity' => array(
			'name' => 'activity',
			'title' => '营销及活动',
			'desc' => ''
		),
		'services' => array(
			'name' => 'services',
			'title' => '常用服务及工具',
			'desc' => ''
		),
		'biz' => array(
			'name' => 'biz',
			'title' => '行业解决方案',
			'desc' => ''
		),
		'other' => array(
			'name' => 'other',
			'title' => '其他',
			'desc' => ''
		)
	);
	return $types;
}


function module_entries($name, $types = array(), $rid = 0, $args = null) {
	global $_W;
	$ts = array('rule', 'cover', 'menu', 'home', 'profile', 'shortcut', 'function', 'mine');
	if(empty($types)) {
		$types = $ts;
	} else {
		$types = array_intersect($types, $ts);
	}
	$fields = implode("','", $types);
	$sql = 'SELECT * FROM ' . tablename('modules_bindings')." WHERE `module`=:module AND `entry` IN ('{$fields}') ORDER BY eid ASC";
	$pars = array();
	$pars[':module'] = $name;
	$bindings = pdo_fetchall($sql, $pars);
	$entries = array();
	foreach($bindings as $bind) {
		if(!empty($bind['call'])) {
			$extra = array();
			$extra['Host'] = $_SERVER['HTTP_HOST'];
			load()->func('communication');
			$urlset = parse_url($_W['siteurl']);
			$urlset = pathinfo($urlset['path']);
			$response = ihttp_request('http://127.0.0.1/'. $urlset['dirname'] . '/' . url('utility/bindcall', array('modulename' => $bind['module'], 'callname' => $bind['call'], 'args' => $args, 'uniacid' => $_W['uniacid'])), array('W'=>base64_encode(iserializer($_W))), $extra);
			if (is_error($response)) {
				continue;
			}
			$response = json_decode($response['content'], true);
			$ret = $response['message'];
			if(is_array($ret)) {
				foreach($ret as $et) {
					$et['url'] .= '&__title=' . urlencode($et['title']);
					$entries[$bind['entry']][] = array('title' => $et['title'], 'url' => $et['url'], 'from' => 'call','direct' => $et['direct']);
				}
			}
		} else {
			if($bind['entry'] == 'cover') {
				$url = wurl("platform/cover", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'menu') {
				$url = wurl("site/entry", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'rule') {
				$par = array('eid' => $bind['eid']);
				if (!empty($rid)) {
					$par['id'] = $rid;
				}
				$url = wurl("site/entry", $par);
			}
			if($bind['entry'] == 'home') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'profile') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'shortcut') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			$entries[$bind['entry']][] = array('eid' => $bind['eid'], 'title' => $bind['title'], 'url' => $url, 'from' => 'define', 'direct' => $bind['direct']);
		}
	}
	return $entries;
}

function module_app_entries($name, $types = array(), $args = null) {
	$ts = array('rule', 'cover', 'menu', 'home', 'profile', 'shortcut', 'function');
	if(empty($types)) {
		$types = $ts;
	} else {
		$types = array_intersect($types, $ts);
	}
	$fields = implode("','", $types);
	$sql = 'SELECT * FROM ' . tablename('modules_bindings')." WHERE `module`=:module AND `entry` IN ('{$fields}') ORDER BY eid ASC";
	$pars = array();
	$pars[':module'] = $name;
	$bindings = pdo_fetchall($sql, $pars);
	$entries = array();
	foreach($bindings as $bind) {
		if(!empty($bind['call'])) {
			$extra = array();
			$extra['Host'] = $_SERVER['HTTP_HOST'];
			load()->func('communication');
			$urlset = parse_url($_W['siteurl']);
			$urlset = pathinfo($urlset['path']);
			$response = ihttp_request('http://127.0.0.1/'. $urlset['dirname'] . '/' . url('utility/bindcall', array('modulename' => $bind['module'], 'callname' => $bind['call'], 'args' => $args, 'uniacid' => $_W['uniacid'])), array('W'=>base64_encode(iserializer($_W))));
			if (is_error($response)) {
				continue;
			}
			$response = json_decode($response['content'], true);
			$ret = $response['message'];
			if(is_array($ret)) {
				foreach($ret as $et) {
					$et['url'] .= '&__title=' . urlencode($et['title']);
					$entries[$bind['entry']][] = array('title' => $et['title'], 'url' => $et['url'], 'from' => 'call');
				}
			}
		} else {
			if($bind['entry'] == 'cover') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'home') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'profile') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			if($bind['entry'] == 'shortcut') {
				$url = murl("entry", array('eid' => $bind['eid']));
			}
			$entries[$bind['entry']][] = array('title' => $bind['title'], 'url' => $url, 'from' => 'define');
		}
	}
	return $entries;
}



function module_build_form($name, $rid) {
	$rid = intval($rid);
	$m = WeUtility::createModule($name);
	return $m->fieldsFormDisplay($rid);
}


function module_fetch($name) {
	$modules = uni_modules();
	return $modules[$name];
}


function module_build_privileges() {
	$uniacid_arr = pdo_fetchall('SELECT uniacid, groupid FROM ' . tablename('uni_account'));
	foreach($uniacid_arr as $uniacid){
		if (empty($uniacid['groupid'])) {
			$modules = pdo_fetchall("SELECT name FROM ".tablename('modules') . " WHERE issystem = 1 ORDER BY issystem DESC, mid ASC", array(), 'name');
		} elseif ($uniacid['groupid'] == '-1') {
			$modules = pdo_fetchall("SELECT name FROM ".tablename('modules') . " ORDER BY issystem DESC, mid ASC", array(), 'name');
		} else {
			$wechatgroup = pdo_fetch("SELECT `modules` FROM ".tablename('uni_group')." WHERE id = '{$uniacid['groupid']}'");
			$ms = '';
			if (!empty($wechatgroup['modules'])) {
				$wechatgroup['modules'] = iunserializer($wechatgroup['modules']);
				if(!empty($wechatgroup['modules'])) {
					$ms = implode("','", array_keys($wechatgroup['modules']));
					$ms = " OR `name` IN ('{$ms}')";
				}
			}
			$modules = pdo_fetchall("SELECT name FROM ".tablename('modules') . " WHERE issystem = 1{$ms} ORDER BY issystem DESC, mid ASC", array(), 'name');
		}
		$modules = array_keys($modules);
		
				$mymodules = pdo_fetchall("SELECT `module` FROM ".tablename('uni_account_modules')." WHERE uniacid = '{$uniacid['uniacid']}' ORDER BY enabled DESC ", array(), 'module');
		$mymodules = array_keys($mymodules);
				foreach($modules as $module){
			if(!in_array($module, $mymodules)) {
				$data = array();
				$data['uniacid'] = $uniacid['uniacid'];
				$data['module'] = $module;
				$data['enabled'] = 1;
				$data['settings'] = '';
				pdo_insert('uni_account_modules', $data);
			}
		}
	}
	return true;
}


function module_solution_check($name){
	global $_W;
	$module = module_fetch($name);
	if(empty($module)) {
		return error(-1, '您访问的模块不存在');
	}
	if($module['issolution'] <> 1) {
		return error(-1, '您访问的模块不是行业解决方案');
	}
	if($module['target'] != $_W['uniacid']) {
		return error(-1, '当前公众号没有使用该行业模块的权限');
	}
	return true;
}
