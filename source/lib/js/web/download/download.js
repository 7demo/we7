/**
 * Created by Administrator on 2015/7/16.
 */
define(function (require){
    var $ = require('jquery');
    require('/lib/js/web/init.js');
    require('/lib/components/jquerymobile/jquery.mobile-1.4.5.min.js');

    var browser={
        versions:function(){
            var u = navigator.userAgent, app = navigator.appVersion;
            return {
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,//火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1, //是否web应该程序，没有头部与底部
                weixin: u.indexOf('MicroMessenger') > -1, //是否微信 （2015-01-22新增）
                qq: u.match(/\sQQ/i) == " qq" //是否QQ
            };
        }(),
        language:(navigator.browserLanguage || navigator.language).toLowerCase()
    }

    //下载APP
    $('#downloadAPP').click(function () {
        // alert(JSON.stringify(navigator))
        if (browser.versions.ios) {
            // alert('iOS')
            location.href = 'http://172.16.3.78:81/index.php/web/index/downloadIos';
        } else if (browser.versions.android) {
            // alert('安卓')
            location.href = 'http://172.16.3.78:81/index.php/web/index/downloadAndroid';
        } else {
            location.href = 'http://www.yousi.com/apps/index.html';
        }
    });

})