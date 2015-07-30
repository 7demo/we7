/**
 * 获得ajax请求的deferred对象
 */
define('lib/js/web/common/ajaxRequest', ['require', 'jquery'],function (require) {
    var $ = require('jquery');
	var request = function (url, data, type) {
		var deferred = $.Deferred();
		$.ajax({
			type : type || 'POST',
			url : url,
			data : data,
			success : deferred.resolve,
			error : deferred.reject
		})
		return deferred.promise();
	}
	return request;
})