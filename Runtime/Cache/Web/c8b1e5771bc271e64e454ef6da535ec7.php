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



<!-- //首页 -->
<div data-role="page" id="index">

    <!-- //header -->
    <div data-role="header" data-theme="a" data-position="fixed" data-tap-toggle="false">
        <h1 class="yousi_title">百所名校 优思家教</h1>
        <a href="#" class="ui-btn ui-shadow ui-corner-all" data-icon="home" data-iconpos="left">帮助</a>
    </div>
    <!-- //header end -->

    <!-- //ctn -->
    <div data-role="content" class="ui-content"  data-theme="c">

        <!-- //大图 -->
        <div id="slide1" data-theme="a" data-transition="fade">
            <img src="/lib/images/web/index_img.jpg" width="100%" alt=""/>
        </div>
        <!-- //大图 end -->

        <!-- // 优思家教教员订单信息 -->
        <div data-role="navbar">
            <ul>
                <li><a href="#" data-icon="star">2201位教员</a></li>
                <li><a href="#" data-icon="grid">456份订单</a></li>
                <li><a href="#" data-icon="home">1170小时授课</a></li>
            </ul>
        </div>
        <!-- // 优思家教教员订单信息 end -->

        <!-- //按钮 -->
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <a href="#pagetwo" data-corners="false" data-role="button" data-theme="a">发布普通订单</a>
            </div>
            <div class="ui-block-b">
                <a href="#pagetwo" data-corners="false" data-role="button" data-theme="d">教员入口</a>
            </div>
        </div>
        <!-- //按钮 end -->

        <!-- //校方点评  -->
        <h3 class="index_school_evaluate">校方点评</h3>
        <div data-role="content" class="ui-content"  data-theme="c">
            <ul data-role="listview" data-inset="true" class="list index_evaluate_list" data-theme="c" style="margin:0">
                <li data-role="list-divider fn-clear">
                    <div class="fn-left">
                        <img src="/lib/images/web/pic7.jpg" alt=""/>
                    </div>
                    <div class="fn-right">
                        上海高校勤工助学协会唯一家教合作品牌，名校保障加上优思快捷方便的系统，将为广大家长和教员提供优质服务。
                        <p>上海高校勤工助学协会秘书长——徐老师</p>
                    </div>
                </li>
                <li data-role="list-divider fn-clear">
                    <div class="fn-left">
                        <img src="/lib/images/web/pic9.jpg" alt=""/>
                    </div>
                    <div class="fn-right">
                        在互联网+时代，O2O将改变家教市场，我相信基于O2O模式的优思教育将很快超越交大昂立。
                        <p>上海交通大学家教中心——陈老师</p>
                    </div>
                </li>
                <div class="fn-clear">

                </div>
            </ul>
        </div>
        <!-- //校方点评 end -->

        <!-- //名校推荐  -->
        <h3 class="index_school_evaluate">名校推荐</h3>
        <div data-role="content" class="ui-content"  data-theme="c">
            <ul data-role="listview" data-inset="true" class="list index_school_list" style="margin:0">
                <li data-role="list-divider">
                    <div class="fn-left">
                        <img src="/lib/images/web/pic2.jpg" alt=""/>
                    </div>
                    <div class="fn-right">
                        <h2>上海交通大学</h2>
                        <p>教员423名/授课2183</p>
                    </div>
                </li>
                <li data-role="list-divider">
                    <div class="fn-clear">
                        <div class="fn-left">
                            <img src="/lib/images/web/pic3.jpg" alt=""/>
                        </div>
                        <div class="fn-right">
                            <h2>华东理工大学</h2>
                            <p>教员102名/授课428小时</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- //名校推荐 end -->

        <!-- // 首页其他入口 -->
        <div data-role="navbar" class="index_login" data-theme="b">
            <ul>
                <li><a class="" href="#">家长登录</a></li>
                <li><a class="" href="#">家长注册</a></li>
                <li><a class="" href="#">教员入口</a></li>
            </ul>
        </div>
        <!-- // 首页其他入口 -->

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
<!-- //首页 end -->

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