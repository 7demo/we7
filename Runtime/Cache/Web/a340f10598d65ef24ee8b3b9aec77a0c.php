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



<!-- //家长登录 -->
<div data-role="page" id="login" >

    <!-- //header -->
    <div data-role="header" data-position="fixed" data-tap-toggle="false" data-theme="d">
        <a href="index.html" data-ajax="false" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-l ui-btn-icon-notext">返回</a>
        <h1 class="yousi_title">登录家长账号</h1>
    </div>
    <!-- //header end -->

    <!-- //ctn -->
    <div data-role="content" class="ui-content" data-theme="d">
        <form id="parentLogin" action="">
            <input type="tel" name="phone" id="tel" value="" placeholder="请输入手机号码">
            <input type="password" name="password" id="password" value=""  placeholder="请输入密码">
            <button id="submit" type="submit" class="ui-btn">确认登录</button>
            <a href="#">没有账号，去注册</a>
        </form>

    </div>
    <!-- //ctn end -->

</div>
<!-- //家长登录 end -->

<!-- //家长注册账号 -->
<div data-role="page" id="register" >
    <!-- //header -->
    <div data-role="header" data-position="fixed" data-tap-toggle="false">
        <h1 id='cor' class="yousi_title">注册账号</h1>
    </div>
    <!-- //header end -->

    <!-- //ctn -->
    <div data-role="content" class="ui-content" >
        <form id="parentRegister" action="">
            <ul data-role="listview" data-inset="true" class="list" data-theme="c">

                <li class="list_li">
                    <div class="ui-field-contain">
                        <input type="text" name="phone" placeholder="请输入手机号码" required='required'  value="">
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <div class="ui-grid-a">
                            <div class="ui-block-a">
                                <input type="text" name="verify" data-inline='true' id="verify" required='required' placeholder="请输入验证码" value="">
                            </div>
                            <div class="ui-block-b">
                                <a id="getVerify" class='ui-btn ui-btn-active ui-corner-all' data-inline='true' style="margin:0; position: relative; top: .5em; padding: 0.5em 0">获取验证码</a>
                            </div>
                        </div>


                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <input type="text" name="password" placeholder="请输入密码" required='required'  value="">
                    </div>
                </li>
                <button type="submit" id="submit" class='ui-btn ui-btn-active ui-corner-all' data-inline='true'>注册</button>
                <a href="#">已有账号，去登录</a>
            </ul>
        </form>
    </div>
    <!-- //ctn -->

</div>
<!-- //家长注册账号 end -->

<!-- //安全码 -->
<div data-role="page" id="safecode" >
    <!-- //header -->
    <div data-role="header" data-position="fixed" data-tap-toggle="false">
        <h1 id='cor' class="yousi_title">安全码</h1>
    </div>
    <!-- //header end -->

    <!-- //ctn -->
    <div data-role="content" class="ui-content" >
        <form action="" id="setSafecode">
            <ul data-role="listview" data-inset="true" class="list" data-theme="c">

                <li class="list_li">
                    <div class="ui-field-contain">
                        <input type="text" name="safe_code" placeholder="请输入安全码" required='required'  value="">
                    </div>
                </li>
                <li class="list_li">
                <button class='ui-btn ui-btn-active ui-corner-all' id="submit" data-inline='true'>确定</button>
                <p>安全码用于授课结算，请牢记</p>
            </ul>
        </form>
    </div>
    <!-- //ctn -->

</div>
<!-- //安全码 end -->

<script type="text/javascript" src="/lib/components/requirejs/require.js"></script>
<script type="text/javascript" src="/lib/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/lib/js/web/common/ys_core.js"></script>
<script type="text/javascript" src="/lib/js/web/common/countDown.js"></script>
<script type="text/javascript" src="/lib/js/web/common/ajax.js"></script>
<script type="text/javascript" src="/lib/js/web/init.js"></script>
<script type="text/javascript" src="/lib/components/jquerymobile/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript" src="/lib/js/web/account/account.js"></script>




<script type="text/javascript" charset="utf-8" src="http://172.16.3.78:8313/livereload.js"></script></body>
</html>
<script type="text/javascript">
    require(['lib/js/web/account/account'], function (app) {
        
    });
</script>