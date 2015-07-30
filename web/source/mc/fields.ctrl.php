<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
$dos = array('display', 'post');

$do = in_array($do, $dos) ? $do : 'display';

if($do == 'display') {
	$_W['page']['title'] = '字段管理 - 会员字段管理 - 会员中心';
	if (checksubmit('submit')) {
		if (!empty($_GPC['displayorder'])) {
			$data = array('uniacid' => $_W['uniacid']);
			foreach ($_GPC['displayorder'] as $id => $displayorder) {
				$data['id'] = intval($_GPC['id'][$id]);
				$data['fieldid'] = intval($_GPC['fieldid'][$id]);
				$data['displayorder'] = intval($displayorder);
				$data['available'] = intval($_GPC['available'][$id]);
				if (empty($data['id'])) {
					$data['title'] = $_GPC['title'][$id];
					pdo_insert('mc_member_fields', $data);
				} else {
					pdo_update('mc_member_fields', $data, array('id' => $data['id']));
				}
			}
		}
		message('会员字段更新成功！', referer(), 'success');
	}

	$sql = 'SELECT `f`.`field`, `f`.`id` AS `fid`, `mf`.* FROM ' . tablename('profile_fields') . " AS `f` LEFT JOIN " .
			tablename('mc_member_fields') . " AS `mf` ON `f`.`id` = `mf`.`fieldid` WHERE `uniacid` = :uniacid ORDER BY `displayorder` DESC";
	$fields = pdo_fetchall($sql, array(':uniacid' => $_W['uniacid']));
	if (empty($fields)) {
		$sql = 'SELECT `id` AS `fid`, `field`, `title`, `displayorder` FROM ' . tablename('profile_fields');
		$fields = pdo_fetchall($sql);
	}
}

if ($do == 'post') {
	$_W['page']['title'] = '字段编辑 - 会员字段管理 - 会员中心';
	$id = intval($_GPC['id']);
	if (checksubmit('submit')) {
		if (empty($_GPC['title'])) {
			message('抱歉，请填写资料名称！');
		}
		$data = array(
			'title' => $_GPC['title'],
			'displayorder' => intval($_GPC['displayorder']),
			'available' => intval($_GPC['available']),
		);
		pdo_update('mc_member_fields', $data, array('id' => $id));
		message('会员字段更新成功！', url('mc/fields'), 'success');
	}
	$item = pdo_fetch("SELECT * FROM ".tablename('mc_member_fields')." WHERE id = :id", array(':id' => $id));
}


template('mc/fields');