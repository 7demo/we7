<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
        @require "lib/css/web/main.scss"
     -->

    <title></title>
    
<link rel="stylesheet" type="text/css" href="/lib/css/web/main.css">
<link rel="stylesheet" type="text/css" href="/lib/components/jquerymobile/jquery.mobile-1.4.5.min.css">

</head>
<body>


<!--订单-->
<div data-role="page" id="dingdan" data-theme="d">

<div data-role="panel" id="mypanel" data-display="push">
    <ul class="panel_ul">
        <li> <p><span style="padding-right: 2em;">XXX教员</span><span class="fufeiuser">正式教员</span></p>
            <p>欢迎使用交大家教中心网站</p></li>
        <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-grid">家教订单</button></li>
        <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-calendar">我要结课</button></li>
        <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-power">退出账号</button></li>
        <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-arrow-d">下载APP更方便</button></li>
    </ul>
    <div class="panel_notice">
        <p>提示：</p>
        <p>修改密码或接单等更多功能</p>
        <p>请用电脑登录网站</p>
        <P>或下载手机APP应用即可</P>
    </div>

</div>


<div data-role="header" data-tap-toggle="false" data-position="fixed" data-theme="d">
    <a href="#mypanel" class="ui-btn ui-shadow ui-corner-all ui-icon-bullets ui-btn-icon-notext">中心</a>
    <h1 class="yousi_title">上海交通大学家教部</h1>
</div><!-- /header -->

<div data-role="content" class="ui-content"  data-theme="d">
<div class="no_dingdan">
    <p>暂无可操作订单，请用电脑登录官网或通过APP接单。</p>
    <a href="#" class="ui-btn">刷新列表</a>
</div>
<!--已接取未确认-->
<div class="weifukuan">
    <div class="jy_dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
    <div class="dingdan_dep ui-grid-b">
        <div class="dingdan_dep_left ">
            <p>学生姓名：周兴天</p>
            <p>学生年级：二年级</p>
            <p>授课科目：物理，数学</p>
            <p>小时单价：60元/时</p>
            <p>试听总价：120元</p>

        </div>
        <div class="dingdan_dep_right ui-block-c">
            <p><a href="#" class="bbtn">确认试教时间</a></p>
            <p class="padding_top_1"><a href="#" class="dbtn">查看详情</a></p>
        </div>
    </div>
    <div class="dingdan_notice">
        提示：请尽快确认试听时间<span><a href="#" class="">放弃订单</a></span>
    </div>
</div>
<!--已接取未确认订单END-->
<!--以确定时间-->
<div class="weifukuan">
    <div class="jy_dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
    <div class="dingdan_dep ui-grid-b">
        <div class="dingdan_dep_left ">
            <p>学生姓名：周兴天</p>
            <p>学生年级：二年级</p>
            <p>授课科目：物理，数学</p>
            <p>小时单价：60元/时</p>
            <p>试听总价：120元</p>
        </div>
        <div class="dingdan_dep_right ui-block-c">
            <p><a href="#" class="bbtn">出发去试教</a></p>
            <p class="padding_top_1"><a href="#" class="dbtn">查看详情</a></p>
        </div>
    </div>
    <div class="dingdan_notice">
        状态：已确认试教，时间：2014-06-15 13:00
    </div>
</div>
<!--已确定时间END-->
<!--去试教-->
<div class="weifukuan">
    <div class="jy_dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
    <div class="dingdan_dep ui-grid-b">
        <div class="dingdan_dep_left ">
            <p>学生姓名：周兴天</p>
            <p>学生年级：二年级</p>
            <p>授课科目：物理，数学</p>
            <p>小时单价：60元/时</p>
            <p>试听总价：120元</p>
        </div>
        <div class="dingdan_dep_right ui-block-c">
            <p ><a href="#" class="bbtn">结束试教</a></p>
            <p class="padding_top_1"><a href="#" class="dbtn">查看详情</a></p>
            <p ><a href="#" class="cbtn">取消授课</a></p>
        </div>
    </div>
    <div class="dingdan_notice">
        状态：出发试教中...试教结束后请点击结束试教，并由家长确认试教，即为完成。
    </div>
</div>
<!--去试教END-->
<!--等待雇佣-->
<div class="weifukuan">
    <div class="jy_dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
    <div class="dingdan_dep ui-grid-b">
        <div class="dingdan_dep_left ">
            <p>学生姓名：周兴天</p>
            <p>学生年级：二年级</p>
            <p>授课科目：物理，数学</p>
            <p>小时单价：60元/时</p>
            <p>试听总价：120元</p>
        </div>
        <div class="dingdan_dep_right ui-block-c">
            <p><a href="#" class="dbtn">查看详情</a></p>
        </div>
    </div>
    <div class="dingdan_notice">
        状态：等待家长是否雇佣
    </div>
</div>
<!--等待雇佣END-->
<!--出发去授课-->
<div class="weifukuan">
    <div class="jy_dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
    <div class="dingdan_dep ui-grid-b">
        <div class="dingdan_dep_left ">
            <p>学生姓名：周兴天</p>
            <p>学生年级：二年级</p>
            <p>授课科目：物理，数学</p>
            <p>小时单价：60元/时</p>
            <p>试听总价：120元</p>
        </div>
        <div class="dingdan_dep_right ui-block-c">
            <p><a href="#" class="bbtn">出发去授课</a></p>
            <p class="padding_top_1"><a href="#" class="dbtn">查看详情</a></p>
        </div>
    </div>
    <div class="dingdan_notice">
        状态：常规授课订单<span>剩余课时包：2小时</span>
    </div>
</div>
<!--确认试听时间后教员放弃END-->


<!--教员结课-->
<div class="weifukuan">
    <div class="jy_dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
    <div class="dingdan_dep ui-grid-b">
        <div class="dingdan_dep_left ">
            <p>学生姓名：周兴天</p>
            <p>学生年级：二年级</p>
            <p>授课科目：物理，数学</p>
            <p>小时单价：60元/时</p>
            <p>本次授课：2小时</p>
        </div>
        <div class="dingdan_dep_right ui-block-c">
            <p ><a href="#" class="bbtn">结束授课</a></p>
            <p class="padding_top_1"><a href="#" class="dbtn">查看详情</a></p>
            <p ><a href="#" class="cbtn">取消授课</a></p>
        </div>
    </div>
    <div class="dingdan_notice">
        状态：结束授课，由家长确认，即完成<span>剩余课时包：2小时</span>
    </div>
</div>
<!--教员结课END-->





</div>

</div>



<script type="text/javascript" src="/lib/components/requirejs/require.js"></script>
<script type="text/javascript" src="/lib/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/lib/js/web/init.js"></script>
<script type="text/javascript" src="/lib/components/jquerymobile/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript" src="/lib/js/web/index.js"></script>




<script type="text/javascript" charset="utf-8" src="http://172.16.3.78:8313/livereload.js"></script></body>
</html>
<script type="text/javascript">
    require(['lib/js/web/index'], function (app) {
        
    });
</script>