<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');

$dos = array('display', 'post', 'del', 'default', 'copy', 'quickmenu');
$do = in_array($do, $dos) ? $do : 'display';
$setting = uni_setting($_W['uniacid'], 'default_site');
$default_site = intval($setting['default_site']);

if($do == 'quickmenu') {
	$id = intval($_GPC['mtid']);
	$multi = pdo_fetch('SELECT id,quickmenu FROM ' . tablename('site_multi') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
	if(empty($multi)) {
		message('微站不存在或已删除', referer(), 'error');
	}
	$modules = uni_modules();
	$quickmenu = iunserializer($multi['quickmenu']);
	if(!is_array($quickmenu)) {
		$quickmenu = array();
	}
	if (checksubmit('submit')) {
		$module = array();
		if (!empty($_GPC['module'])) {
			foreach ($_GPC['module'] as $row) {
				if (isset($modules[$row])) {
					$module[] = $row;
				}
			}
		}
				$params = $insert = array(':position' => '3');
		$sql = 'DELETE FROM ' . tablename('site_nav') . " WHERE `multiid` = :multiid AND `position` = :position AND `module` <> :module";
		$params[':multiid'] = $id;
		$params[':module'] = '';
		$insert['uniacid'] = $_W['uniacid'];
		$insert['multiid'] = $id;
		$insert['status'] = '1';
		if (pdo_query($sql, $params)) {
			foreach ($module as $value) {
				$entry = module_entries($value, array('home'));
				$insert['module'] = $value;
				$insert['name'] = $entry['home'][0]['title'];
				$insert['url'] = $entry['home'][0]['url'];
				pdo_insert('site_nav', $insert);
			}
		}
		
		$quickmenu = array(
			'template' => $_GPC['template'],
			'enablemodule' => $module,
		);
		pdo_update('site_multi', array('quickmenu' => iserializer($quickmenu)), array('uniacid' => $_W['uniacid'], 'id' => $id));
		message('快捷菜单模板设置成功！', url('site/multi/quickmenu', array('mtid' => $id, 'f' => $_GPC['f'])), 'success');
	}
	$path = IA_ROOT . '/app/themes/quick';
	if (is_dir($path)) {
		if ($handle = opendir($path)) {
			while (false !== ($templatepath = readdir($handle))) {
				$ext = pathinfo($templatepath);
				$ext = $ext['extension'];
				if ($templatepath != '.' && $templatepath != '..' && !empty($ext)) {
					$pathinfo = pathinfo($templatepath);
					$template[] = $pathinfo['filename'];
				}
			}
		}
	}
	$spcmodules = array('basic', 'news', 'recharge');
	foreach ($modules as $key=>$module) {
		if (in_array($module['name'], $spcmodules)) {
			continue;
		}
		if (in_array($module['name'], $sysmodules)) {
			unset($modules[$key]);
		}
	}
	template('multi/quickmenu');
}

if($do == 'post') {
	$id = intval($_GPC['multiid']);
	if(!empty($id)) {
		$multi = pdo_fetch('SELECT * FROM ' . tablename('site_multi') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
		if(empty($multi)) {
			message('微站不存在或已删除', referer(), 'error');
		}
		$multi['site_info'] = iunserializer($multi['site_info']) ? iunserializer($multi['site_info']) : array();
	}

	$sql = 'SELECT `s`.*, `t`.`name` AS `tname`, `t`.`title` FROM ' . tablename('site_styles') . ' AS `s` LEFT JOIN ' .
			tablename('site_templates') . ' AS `t` ON `s`.`templateid` = `t`.`id` WHERE `s`.`uniacid` = :uniacid';
	$styles = pdo_fetchall($sql, array(':uniacid' => $_W['uniacid']));

	if(checksubmit('submit')) {
		if (checksubmit('submit')) {
			$pdata['title'] = trim($_GPC['title']) ? trim($_GPC['title']) : message('请填写站点标识', referer(), 'error');
			$pdata['styleid'] = intval($_GPC['styleid']);
			$pdata['status'] = intval($_GPC['status']);
			$pdata['site_info'] = iserializer(array(
				'sitename' => $_GPC['sitename'],
				'keywords' => $_GPC['keywords'],
				'description' => $_GPC['description'],
				'footer' => htmlspecialchars_decode($_GPC['footer'])
			));
			$pdata['bindhost'] = $_GPC['bindhost'];
			if(!empty($id)) {
				pdo_update('site_multi', $pdata, array('uniacid' => $_W['uniacid'], 'id' => $id));
			} else {
				$pdata['uniacid'] = $_W['uniacid'];
				pdo_insert('site_multi', $pdata);
			}
			message('更新站点信息成功！', url('site/multi/display'), 'success');
		}
	}	
	template('multi/post');
} 

if($do == 'display') {
	$templates = uni_templates();
	$multis = pdo_fetchall('SELECT * FROM ' . tablename('site_multi') . ' WHERE uniacid = :uniacid', array(':uniacid' => $_W['uniacid']));
	foreach($multis as &$li) {
		$li['style'] = pdo_fetch('SELECT * FROM ' .tablename('site_styles') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $li['styleid']));
	}
	template('multi/display');
}

if($do == 'del') {
	$id = intval($_GPC['id']);
	if($default_site == $id) {
		message('您删除的微站是默认微站,删除前先指定其他微站为默认微站', referer(), 'error');
	}
		pdo_delete('site_nav', array('uniacid' => $_W['uniacid'], 'multiid' => $id));
		$rid = pdo_fetchcolumn('SELECT rid FROM ' .tablename('cover_reply') . ' WHERE uniacid = :uniacid AND multiid = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
	if(pdo_delete('rule', array('id' => $rid, 'uniacid' => $_W['uniacid'])) !== false) {
		pdo_delete('rule_keyword', array('rid' => $rid));
		pdo_delete('cover_reply', array('rid' => $rid, 'multiid' => $id));
				pdo_delete('stat_rule', array('rid' => $rid));
		pdo_delete('stat_keyword', array('rid' => $rid));
	}
		pdo_delete('site_multi', array('uniacid' => $_W['uniacid'], 'id' => $id));
	message('删除微站成功', referer(), 'success');	
}

if($do == 'copy') {
	$id = intval($_GPC['multiid']);
	$multi = pdo_fetch('SELECT * FROM ' . tablename('site_multi') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
	if(empty($multi)) {
		message('微站不存在或已删除', referer(), 'error');
	}
	$multi['title'] = $multi['title'] . '_' . random(6);
	unset($multi['id']);
	pdo_insert('site_multi', $multi);
	$multi_id = pdo_insertid();
	if(!$multi_id) {
		message('复制微站出错', '', 'error');
	} else {
				$navs = pdo_fetchall('SELECT * FROM ' . tablename('site_nav') . ' WHERE uniacid = :uniacid AND multiid = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
		if(!empty($navs)) {
			foreach($navs as &$nav) {
				unset($nav['id']);
				$nav['multiid'] = $multi_id;
				pdo_insert('site_nav', $nav);
			}
		}
				$cover = pdo_fetch('SELECT * FROM ' . tablename('cover_reply') . ' WHERE uniacid = :uniacid AND multiid = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
		if(!empty($cover)) {
			$rule = pdo_fetch('SELECT * FROM ' . tablename('rule') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $cover['rid']));
			$keywords = pdo_fetchall('SELECT * FROM ' . tablename('rule_keyword') . ' WHERE uniacid = :uniacid AND rid = :id', array(':uniacid' => $_W['uniacid'], ':id' => $cover['rid']));
			if(!empty($rule) && !empty($keywords)) {
				$rule['name'] = $multi['title'] . '入口设置';
				unset($rule['id']);
				pdo_insert('rule', $rule);
				$new_rid = pdo_insertid();
				foreach($keywords as &$keyword) {
					unset($keyword['id']);
					$keyword['rid'] = $new_rid;
					pdo_insert('rule_keyword', $keyword);
				}
				unset($cover['id']);
				$cover['title'] =  $multi['title'] . '入口设置';
				$cover['multiid'] =  $multi_id;
				$cover['rid'] =  $new_rid;
				pdo_insert('cover_reply', $cover);
			}			
		}
		message('复制微站成功', url('site/multi/post', array('multiid' => $multi_id)), 'success');
	}
}