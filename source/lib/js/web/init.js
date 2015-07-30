define(function (require){
	//引入jquery与jquerymobile
	var $ = require('jquery');
    //避免闪烁 但是会出现顶部与内容遮盖的现在，所以触发一次window的resize事件进行设定
    $('body').css('display','block');
    $(window).resize();
    $(document).on('pagebeforecreate', function () {
        //console.log('出发前')
    });
    $(document).on("pageinit",function(event){
        //console.log('出发后')
        //$('body').css('display','block')
    });
	$(document).on('mobileinit', function () {
        //$('body').css('display','block')
	});
})