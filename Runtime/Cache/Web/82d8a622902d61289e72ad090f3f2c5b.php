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

	

    <!-- //发布家教需求 -->
    <div data-role="page" id="release">
        
        <!-- //header -->
        <div data-role="header" data-theme="a" data-position="fixed" data-tap-toggle="false">
            <h1 class="yousi_title">教员库</h1>
        </div>
        <!-- //header end -->
        
        <!-- //ctn -->
        <div data-role="content" class="ui-content"  data-theme="c" class="tutors">

            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li data-role="list-divider" class="fc_white">家教信息</li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <a href="#">个人资料</a>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <a href="#">修改安全码</a>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <a href="#">修改密码</a>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <a href="#">在线客服</a>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <a href="#">退出登录</a>
                    </div>
                </li>
            </ul>


        </div>
        <!-- //ctn end -->

        <!-- //nav -->
        <!-- //footer -->
<div data-role="footer" class="footer" data-position="fixed" data-tap-toggle="false">
    <div data-role="navbar" class="index_login ui-grid-d">
        <a class="ui-block-a" data-role="button" data-icon="star" data-iconpos="bottom" href="#">教员库</a>
        <a class="ui-block-b" data-role="button" data-icon="grid" data-iconpos="bottom" href="#">我的订单</a>
        <a class="ui-block-c" data-icon="home" data-role="button"  data-theme="d"  data-iconpos="bottom" href="#">首页</a>
        <a class="ui-block-d" data-role="button" data-icon="gear" data-iconpos="bottom" href="#">个人中心</a>
        <a class="ui-block-e" data-role="button" data-icon="info" data-iconpos="bottom" href="#">下载APP</a>
    </div>
</div>
<!-- //footer end -->
        <!-- //nav end -->

    </div>
    <!-- //发布家教需求 end -->


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