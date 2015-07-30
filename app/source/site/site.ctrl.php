<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
$do = in_array($do, array('list', 'detail', 'handsel')) ? $do : 'list';
load()->model('site');
load()->model('mc');

if($do == 'list') {
	$cid = intval($_GPC['cid']);
	$category = pdo_fetch("SELECT * FROM ".tablename('site_category')." WHERE id = '{$cid}' AND uniacid = '{$_W['uniacid']}'");
	if (empty($category)) {
		message('分类不存在或是已经被删除！');
	}
	if (!empty($category['linkurl'])) {
		header('Location: '.$category['linkurl']);
		exit;
	}
	$_share['desc'] = $category['description'];
	$_share['title'] = $category['name'];

	$title = $category['name'];
	$category['template'] = pdo_fetchcolumn('SELECT b.name FROM ' . tablename('site_styles') . ' AS a LEFT JOIN ' . tablename('site_templates') . ' AS b ON a.templateid = b.id WHERE a.id = :id', array(':id' => $category['styleid']));
	if(!empty($category['template'])) {
		$styles_vars = pdo_fetchall('SELECT * FROM ' . tablename('site_styles_vars') . ' WHERE styleid = :styleid', array(':styleid' => $category['styleid']));
		if(!empty($styles_vars)) {
			foreach($styles_vars as $row) {
				if (strexists($row['variable'], 'img')) {
					$row['content'] = tomedia($row['content']);
				}
				$_W['styles'][$row['variable']] = $row['content'];
			}
		}
	}

	if (empty($category['ishomepage'])) {
		$ishomepage = 0;
				if(!empty($category['template'])) {
			$_W['template'] = $category['template'];
		}
		template('site/list');
		exit;
	} else {
		if(!empty($category['template'])) {
			$_W['template'] = $category['template'];
		}
		$ishomepage = 1;
		$navs = pdo_fetchall("SELECT * FROM ".tablename('site_category')." WHERE uniacid = '{$_W['uniacid']}' AND parentid = '$cid' ORDER BY displayorder DESC,id DESC");
		if (!empty($navs)) {
			foreach ($navs as &$row) {
				if(empty($row['linkurl']) || (!strexists($row['linkurl'], 'http://') && !strexists($row['linkurl'], 'https://'))) {
					$row['url'] = url('site/site/list', array('cid' => $row['id']));
				} else {
					$row['url'] = $row['linkurl'];
				}
				if (!empty($row['icontype']) && $row['icontype'] == 1) {
					$row['css'] = iunserializer($row['css']);
					$row['icon'] = '';
					$row['css']['icon']['style'] = "color:{$row['css']['icon']['color']};font-size:{$row['css']['icon']['font-size']}px;";
					$row['css']['name'] = "color:{$row['css']['name']['color']};";
				}
				if (!empty($row['icontype']) && $row['icontype'] == 2) {
					$row['css'] = '';
				}
			}
		}
		template('home/home');
		exit;
	}
} elseif($do == 'detail') {
	$id = intval($_GPC['id']);
	$sql = "SELECT * FROM " . tablename('site_article') . " WHERE `id`=:id AND uniacid = :uniacid";
	$detail = pdo_fetch($sql, array(':id'=>$id, ':uniacid' => $_W['uniacid']));
	if (!empty($detail['linkurl'])) {
		if(strtolower(substr($detail['linkurl'], 0, 4)) != 'tel:' && !strexists($detail['linkurl'], 'http://') && !strexists($detail['linkurl'], 'https://')) {
			$detail['linkurl'] = $_W['siteroot'] . 'app/' . $detail['linkurl'];
		}
		header('Location: '. $detail['linkurl']);
		exit;
	}
	$detail = istripslashes($detail);

	$detail['content']= preg_replace("/<img(.*?)(http[s]?\:\/\/mmbiz.qpic.cn[^\?]*?)(\?[^\"]*?)?\"/i", '<img $1$2"', $detail['content']);

	if (!empty($detail['incontent'])) {
		$detail['content'] = '<p><img src="' . tomedia($detail['thumb']) . '" title="' . $detail['title'] . '" /></p>' . $detail['content'];
	}
	if(!empty($detail['thumb'])) {
		$detail['thumb'] = tomedia($detail['thumb']);
	} else {
		$detail['thumb'] = '';
	}
	$title = $detail['title'];
		if(!empty($detail['template'])) {
		$_W['template'] = $detail['template'];
	}
	
	if($_W['os'] == 'android' && $_W['container'] == 'wechat' && $_W['account']['account']) {
		$subscribeurl = "weixin://profile/{$_W['account']['account']}";
	} else {
		$sql = 'SELECT `subscribeurl` FROM ' . tablename('account_wechats') . " WHERE `acid` = :acid";
		$subscribeurl = pdo_fetchcolumn($sql, array(':acid' => intval($_W['acid'])));
	}
		$detail['click'] = intval($detail['click']) + 1;
	pdo_update('site_article', array('click' => $detail['click']), array('uniacid' => $_W['uniacid'], 'id' => $id));
		$_share = array('desc' => $detail['description'], 'title' => $detail['title'], 'imgUrl' => $detail['thumb']);
	template('site/detail');
} elseif($do == 'handsel') {
		if($_W['ispost']) {
		$id = intval($_GPC['id']);
		$article = pdo_fetch('SELECT id, credit FROM ' . tablename('site_article') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
		$credit = iunserializer($article['credit']) ? iunserializer($article['credit']) : array();
		if(!empty($article) && $credit['status'] == 1) {
			if($_GPC['action'] == 'share') {
				$touid = $_W['member']['uid'];
				$formuid = -1;
				$handsel = array('module' => 'article', 'sign' => md5(iserializer(array('id' => $id))), 'action' => 'share', 'credit_value' => $credit['share'], 'credit_log' => '分享文章,赠送积分');
			} elseif($_GPC['action'] == 'click') {
				$touid = intval($_GPC['u']);
				$formuid = CLIENT_IP;
				$handsel = array('module' => 'article', 'sign' => md5(iserializer(array('id' => $id))), 'action' => 'click', 'credit_value' => $credit['click'], 'credit_log' => '分享的文章在朋友圈被阅读,赠送积分');
			}
			$total = pdo_fetchcolumn('SELECT SUM(credit_value) FROM ' . tablename('mc_handsel') . ' WHERE uniacid = :uniacid AND module = :module AND sign = :sign', array(':uniacid' => $_W['uniacid'], ':module' => 'article', ':sign' => $handsel['sign']));
			if(($total >= $credit['limit']) || (($total + $handsel['credit_value']) > $credit['limit'])) {
				exit(json_encode(error(-1, '赠送积分已达到上限')));
			}

			$status = mc_handsel($touid, $formuid, $handsel, $_W['uniacid']);
			if(is_error($status)) {
				exit(json_encode($status));
			} else {
				exit('success');
			}
		} else {
			exit(json_encode(array(-1, '文章没有设置赠送积分')));
		} 
	} else {
		exit(json_encode(array(-1, '非法操作')));
	}
}
