/**
 * 执行ajax的请求
 */
define('lib/js/web/common/doAjax', ['require', 'lib/js/web/common/ajaxRequest'],function (require) {
    var request = require('lib/js/web/common/ajaxRequest');
	var doAjax = function (parm) {
		if (parm.before) { //如果before方法存在，则执行
			if (!parm.before()) return;
		};
		var requestDone = request(parm.url, parm.data, parm.type);
        console.log(requestDone);
		requestDone
		.done(function (data) {
			if (data.code == 200) {
				parm.done(data);
			} else {
				if (parm.fail) {
					parm.fail(data);
				}
			}
		})
		.fail(function (data) {  //网络请求错误，可能改为alert框
			if (parm.fail) {
				data.desc = '网络请求有错误，请重试'; //自己设定网络请求错误的描述
				parm.fail(data);
			}
		})
	}
	return doAjax;
})