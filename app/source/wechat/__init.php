<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
checkauth();
load()->model('coupon');
if(empty($_W['acid'])) {
	message('acid不存在', referer(), 'error');
}



