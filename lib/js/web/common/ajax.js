define('lib/js/web/common/ajax', ['require', 'jquery'],function (require) {

    //引入jquery与jquerymobile
    var $ = require('jquery');
    var request = function (parm) {
        var deferred = $.Deferred();
        $.ajax({
            type : parm.type || 'POST',
            url : parm.url,
            data : parm.data,
            success : deferred.resolve,
            error : deferred.reject
        });
        return deferred.promise();
    };
    var doAjax = function (parm) {
        if (parm.before) { //如果before方法存在，则执行
            if (!parm.before()) return;
        };
        var requestDone = request(parm);
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

});