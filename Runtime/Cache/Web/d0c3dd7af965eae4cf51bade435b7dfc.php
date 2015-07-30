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

	

    <!-- //订单信息 -->
    <div data-role="page" id="orderDetail">

        <!-- //header -->
        <div data-role="header" data-theme="a" data-position="fixed" data-tap-toggle="false">
            <a href="#dingdan" class="ui-btn ui-shadow ui-corner-all ui-icon-delete ui-btn-icon-notext">Delete</a>
            <h1 class="yousi_title">订单信息</h1>
        </div>
        <!-- //header end -->

        <!-- //ctn -->
        <div data-role="content" class="ui-content order_detail"  data-theme="c">

            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li data-role="list-divider" class="fc_white">订单信息</li>


                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>订单编号:</label>
                        <div>1368</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>订单状态:</label>
                        <div>未付款</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>订单提示:</label>
                        <div class="order_detail_tips">请及时支付2小时视听费，以便后续进行试听</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>下单时间:</label>
                        <div>2015-06-30 09:40:59</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>订单类型:</label>
                        <div>指定订单</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>指定教员:</label>
                        <div>
                            <span>翁教员</span> <a href="#"><img src="/lib/images/web/pic7.jpg" alt=""/></a>
                        </div>
                    </div>
                </li>
            </ul>

            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li data-role="list-divider" class="fc_white">个人信息</li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>学生姓名:</label>
                        <div>胡学生</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>学生年级:</label>
                        <div>幼儿</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>学生性别:</label>
                        <div>男</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>家长姓名:</label>
                        <div>胡家长</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>联系方式:</label>
                        <div>15527953923</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>授课地址:</label>
                        <div>
                            虹桥枢纽4路；江川3路；江川7撸；闵行线 沧源路东川路（公交站）
                        </div>
                    </div>
                </li>
            </ul>

            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li data-role="list-divider" class="fc_white">家教信息</li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>教员性别:</label>
                        <div>男</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>辅导科目:</label>
                        <div>英语</div>
                    </div>
                </li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>详细需求:</label>
                        <div>请输入详细需求</div>
                    </div>
                </li>
            </ul>

            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li data-role="list-divider" class="fc_white">价格信息</li>
                <li class="list_li">
                    <div class="ui-field-contain">
                        <label>小时单价:</label>
                        <div>45元（幼儿45元/时 + 加价0元/时 + 多人辅导0元/时）</div>
                    </div>
                </li>

            </ul>




        </div>
        <!-- //ctn end -->

        <div data-role="footer" data-position="fixed" data-tap-toggle="false" role="contentinfo" class="ui-footer ui-bar-inherit ui-footer-fixed slideup">
            <div class="footer_left">
                <a href="#" class="ui-link">其他操作</a>
            </div>
            <div class="footer_right myBtn">
                <a href="./jiaoyuan.html" data-ajax="false" class="ui-link">继续付款</a>
            </div>
        </div>

    </div>
    <!-- //订单信息 end -->


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