<?php 
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
load()->model('cloud');
load()->func('communication');
$r = cloud_prepare();
if(is_error($r)) {
	message($r['message'], url('cloud/profile'), 'error');
}

$dos = array('upgrade');
$do = in_array($do, $dos) ? $do : 'upgrade';

if($do == 'upgrade') {
	$_W['page']['title'] = '一键更新 - 云服务';
	if(checksubmit('submit')) {
		$upgrade = cloud_build();
		if (is_error($upgrade)) {
			message($upgrade['message'], '', 'error');
		}
		if($upgrade['upgrade']) {
			message("检测到新版本: <strong>{$upgrade['version']} (Release {$upgrade['release']})</strong>, 请立即更新.", 'refresh');
		} else {
			cache_delete('checkupgrade:system');
			message('检查结果: 恭喜, 你的程序已经是最新版本. ', 'refresh');
		}
	}
	cache_load('upgrade');
	if(!empty($_W['cache']['upgrade'])) {
		$upgrade = $_W['cache']['upgrade'];
	}
	if(empty($upgrade) ||  TIMESTAMP - $upgrade['lastupdate'] >= 3600 * 24 || $upgrade['upgrade']) {
		$upgrade = cloud_build();
	}
	if(!empty($upgrade['schemas'])) {
		$upgrade['database'] = array();
		foreach($upgrade['schemas'] as $remote) {
			$row = array();
			$row['tablename'] = $remote['tablename'];
			$name = substr($remote['tablename'], 4);
			$local = db_table_schema(pdo(), $name);
			unset($remote['increment']);
			unset($local['increment']);
			if(empty($local)) {
				$row['new'] = true;
			} else {
				$row['new'] = false;
				$row['fields'] = array();
				$row['indexes'] = array();
				$diffs = db_schema_compare($local, $remote);
				if(!empty($diffs['fields']['less'])) {
					$row['fields'] = array_merge($row['fields'], $diffs['fields']['less']);
				}
				if(!empty($diffs['fields']['diff'])) {
					$row['fields'] = array_merge($row['fields'], $diffs['fields']['diff']);
				}
				if(!empty($diffs['indexes']['less'])) {
					$row['indexes'] = array_merge($row['indexes'], $diffs['indexes']['less']);
				}
				if(!empty($diffs['indexes']['diff'])) {
					$row['indexes'] = array_merge($row['indexes'], $diffs['indexes']['diff']);
				}
				$row['fields'] = implode($row['fields'], ' ');
				$row['indexes'] = implode($row['indexes'], ' ');
			}
			$upgrade['database'][] = $row;
		}
	}
}
template('cloud/upgrade');
