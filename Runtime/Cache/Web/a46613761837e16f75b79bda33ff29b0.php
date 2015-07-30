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


    <!--//我的订单 包含账户信息-->
    <div data-role="page" id="dingdan">
        
        <!-- //header -->
        <div data-role="header" data-tap-toggle="false" data-position="fixed">
            <h1 class="yousi_title">我的订单</h1>
        </div>
        <!-- //header end -->
        
        <!-- //ctn -->
        <div data-role="content" class="ui-content"  data-theme="c">
            <div class="no_dingdan">
                <p>暂无可操作订单，请发布需求。</p>
                <a href="#fabu" class="ui-btn">发布家教需求</a>
            </div>
            <!--未付款订单-->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">立即付款</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：请尽快支付试听费用<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!--未付款订单END-->
            <!-- //公开订单 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">加价</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：等待教员接单<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //公开订单end -->

            <!-- //指定订单 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 等待中</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">加价</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：您可以公开订单让所有教员可见可接单<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //指定订单end -->

            <!-- //已接单 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 已接单</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">加价</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：该订单已被接取，请保持手机畅通，等待教员约定试听时间<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //已接单end -->

            <!-- //待试听 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 待试听</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">加价</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    试听时间2015-07-12 12:12<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //待试听end -->

            <!-- //试听待结课 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 待结课</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">结课</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：请保证教员授课结束后，再执行确认结课。<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //试听待结课end -->

            <!-- //聘用不聘用 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 待结课</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">聘用</a></p>
                        <p><a href="#" class="abtn">不聘用</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：请请根据教员表现选择是否聘用。<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //聘用不聘用end -->

            <!-- //不聘用 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">关闭订单</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：无效订单。<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //不聘用end -->

            <!-- //聘用 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <p>课时数量：0</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 上课中</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">购买课时包</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：无效订单。<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //聘用end -->

            <!-- //待结课 -->
            <div class="weifukuan">
                <div class="dingdan_title fn-clear">
                    订单号:21212515
                    <span class="dingdan_title_time fn-right">2015-06-15 13:00</span>
                </div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>教员性别：不限</p>
                        <p>发布高校：上海交通大学</p>
                        <p>授课地址：浙江中路229号百米香榭3楼(近汉口路) Just in花式桌球俱乐部</p>
                        <p>课时数量：0</p>
                        <div class="fn-clear order_img">
                            <div class="fn-left">
                                <a href="#">
                                    <img src="/lib/images/web/pic7.jpg" alt=""/>
                                </a>
                            </div>
                            <div class="fn-left">
                                <h6>王教员 上课中</h6>
                                <p>15527953923</p>
                            </div>
                        </div>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">待结课</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：请保证教员授课结束，再执行确认结课。<span><a href="#" class="">查看详情</a></span>
                </div>
            </div>
            <!-- //待结课end -->


        </div>
        <!-- //ctn -->

    </div>
    <!-- //我的订单 包含账户信息 end -->
    
    <!-- //结课按钮 -->
    <div data-role="page" id="jieke">
        <!-- //header -->
        <div data-role="header" data-theme="a" data-position="fixed" data-tap-toggle="false">
            <a href="#dingdan" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-l ui-btn-icon-notext">返回</a>
            <h1 class="yousi_title">家教结课</h1>
        </div>
        <!-- //header end -->

        <!-- //ctn -->
        <div data-role="content" class="ui-content"  data-theme="c">

            <!--无教员授课-->
            <div class="no_dingdan">
                <p>暂无可教员开始授课，请确认。</p>
                <a href="#fabu" class="ui-btn">刷新列表</a>
            </div>
            <!--无教员授课END-->

            <!--试听结课-->
            <div class="weifukuan">
                <div class="dingdan_title">课程号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>教员姓名：周兴天</p>
                        <p>主辅科目：数学，物理</p>
                        <p>联系方式：18621572653</p>
                        <p>授课时长：2小时</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">

                        <p ><a href="#" class="bbtn">确认结课</a></p>

                    </div>
                </div>
                <div class="dingdan_notice">
                    状态：试听课程等待结课
                </div>
            </div>
            <!--试听结课END-->

            <!--常规结课-->
            <div class="weifukuan">
                <div class="dingdan_title">课程号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>教员姓名：周兴天</p>
                        <p>主辅科目：数学，物理</p>
                        <p>联系方式：18621572653</p>
                        <p>授课时长：2小时</p>

                    </div>
                    <div class="dingdan_dep_right ui-block-c">

                        <p ><a href="#" class="bbtn">确认结课</a></p>

                    </div>
                </div>
                <div class="dingdan_notice">
                    状态：常规授课等待结课
                </div>
            </div>
            <!--常规结课END-->

        </div>
        <!-- //ctn end -->
    </div>
    <!-- //结课按钮 end -->

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