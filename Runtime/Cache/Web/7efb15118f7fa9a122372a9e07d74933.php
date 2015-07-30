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

            <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="tutors_filter">
                <select name="select-native-1" id="select-native-1">
                    <option value="1">年级</option>
                    <option value="2">小学二年级</option>
                    <option value="3">小学三年级</option>
                    <option value="4">小学四年级</option>
                    <option value="4">小学五年级</option>
                    <option value="4">初中预备班</option>
                    <option value="4">初中一年级</option>
                    <option value="4">初中二年级</option>
                    <option value="4">初中三年级</option>
                    <option value="4">高中一年级</option>
                    <option value="4">高中二年级</option>
                    <option value="4">高中三年级</option>
                    <option value="4">成人</option>
                </select>
                <select name="select-native-1" id="select-native-2">
                    <option value="1">科目</option>
                    <option value="2">小学二年级</option>
                    <option value="3">小学三年级</option>
                    <option value="4">小学四年级</option>
                    <option value="4">小学五年级</option>
                    <option value="4">初中预备班</option>
                    <option value="4">初中一年级</option>
                    <option value="4">初中二年级</option>
                    <option value="4">初中三年级</option>
                    <option value="4">高中一年级</option>
                    <option value="4">高中二年级</option>
                    <option value="4">高中三年级</option>
                    <option value="4">成人</option>
                </select>
                <select name="select-native-1" id="select-native-3" >
                    <option value="1">综合排序</option>
                    <option value="2">星级排序</option>
                    <option value="3">好评排序</option>
                </select>
            </fieldset>


            <ul data-role="listview" data-inset="true" class="list tutor_list" data-theme="c">

                <li class="list_li fn-clear">
                    <div class="fn-left tutor_list_l">
                        <img src="/lib/images/web/pic1.jpg" alt=""/>
                        <p>
                            <img src="/lib/images/web/nameplate_tutor_star1.png" alt=""/>
                            <img src="/lib/images/web/nameplate_tutor_star1.png" alt=""/>
                            <img src="/lib/images/web/nameplate_tutor_star1.png" alt=""/>
                        </p>
                    </div>
                    <div class="fn-left tutor_list_m">
                        <p>测试教员 女</p>
                        <p>辅导科目：数</p>
                        <p>累计授课：46小时</p>
                        <p class="slogan">给孩子家长和自己带来开心和成长！</p>
                    </div>
                    <div class="fn-left tutor_list_r">
                        <img src="/lib/images/web/authen_1.png" alt=""/>
                        <p>积极指数</p>
                        <div class="star_rank fn-clear">
                            <span>
                                <img src="/lib/images/web/star_colorful.png" alt=""/>
                            </span>
                            <img src="/lib/images/web/star_gray.png" alt=""/>
                        </div>
                        <p>积极指数</p>
                        <div class="star_rank fn-clear">
                            <span style="width:3em">
                                <img src="/lib/images/web/star_colorful.png" alt=""/>
                            </span>
                            <img src="/lib/images/web/star_gray.png" alt=""/>
                        </div>

                    </div>
                    <div class="fn-left tutor_list_button">
                        <a href="http://www.yousi.com/Account/showApp/tid/94" data-role="button" data-icon="arrow-r" data-iconpos="notext"></a>
                    </div>
                </li>

                <li class="list_li fn-clear">
                    <div class="fn-left tutor_list_l">
                        <img src="/lib/images/web/pic1.jpg" alt=""/>
                        <p>
                            <img src="/lib/images/web/nameplate_tutor_star1.png" alt=""/>
                            <img src="/lib/images/web/nameplate_tutor_star1.png" alt=""/>
                            <img src="/lib/images/web/nameplate_tutor_star1.png" alt=""/>
                        </p>
                    </div>
                    <div class="fn-left tutor_list_m">
                        <p>测试教员 女</p>
                        <p>辅导科目：数</p>
                        <p>累计授课：46小时</p>
                        <p class="slogan">给孩子家长和自己带来开心和成长！</p>
                    </div>
                    <div class="fn-left tutor_list_r">
                        <img src="/lib/images/web/authen_1.png" alt=""/>
                        <p>积极指数</p>
                        <div class="star_rank fn-clear">
                            <span>
                                <img src="/lib/images/web/star_colorful.png" alt=""/>
                            </span>
                            <img src="/lib/images/web/star_gray.png" alt=""/>
                        </div>
                        <p>积极指数</p>
                        <div class="star_rank fn-clear">
                            <span style="width:3em">
                                <img src="/lib/images/web/star_colorful.png" alt=""/>
                            </span>
                            <img src="/lib/images/web/star_gray.png" alt=""/>
                        </div>

                    </div>
                    <div class="fn-left tutor_list_button">
                        <a href="http://www.yousi.com/Account/showApp/tid/94" data-role="button" data-icon="arrow-r" data-iconpos="notext"></a>
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
        <a class="ui-block-e" data-role="button" data-icon="info" data-iconpos="bottom" href="#">客服</a>
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