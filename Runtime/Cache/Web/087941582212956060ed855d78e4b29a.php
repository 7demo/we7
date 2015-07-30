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

	

    <!-- //个人资料设置 -->
    <div data-role="page" id="info">

        <!-- //header -->
        <div data-role="header" data-theme="a" data-position="fixed" data-tap-toggle="false">
            <a href="#dingdan" class="ui-btn ui-shadow ui-corner-all ui-icon-delete ui-btn-icon-notext">Delete</a>
            <h1 class="yousi_title">个人资料</h1>
        </div>
        <!-- //header end -->

        <!-- //ctn -->
        <div data-role="content" class="ui-content"  data-theme="c">

            <form action="" id="resetInfo">
                <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                    <li data-role="list-divider" class="fc_white">基本信息</li>
                    <li class="list_li">
                        <div class="ui-field-contain">
                            <label for="textinput-jzname">家长姓名:</label>
                            <input type="text" name="parentname" id="textinput-jzname" placeholder="请输入家长姓名" value="">
                        </div>
                    </li>
                    <li class="list_li">
                        <div class="ui-field-contain" >
                            <label for="textinput-name">学生姓名:</label>
                            <input type="text" name="nickname" id="textinput-name" placeholder="请输入学生姓名" value="">
                        </div>
                    </li>

                    <li class="list_li">
                        <div class="ui-field-contain" >
                            <label >学生性别:</label>
                            <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
                                <input type="radio" name="sex" id="radio-choice-c" value="list" checked="checked">
                                <label for="radio-choice-c">男生</label>
                                <input type="radio" name="sex" id="radio-choice-d" value="grid">
                                <label for="radio-choice-d">女生</label>
                            </fieldset>
                            </div>
                    </li>

                    <li class="list_li">
                        <div class="ui-field-contain" >
                            <label for="select-native-1">学生年级:</label>
                            <select name="grade" id="select-native-1">
                                <option value="1">小学一年级</option>
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
                        </div>
                    </li>
                    <li class="list_li">
                        <div class="ui-field-contain">
                            <label for="textinput-jzname">联系方式:</label>
                            <input type="text" name="phone" id="textinput-tel"  value="18621572653">
                        </div>
                    </li>
                    <li class="list_li">
                        <div class="ui-field-contain">
                            <label for="textinput-jzname">授课地址:</label>
                            <div class="addressPlaceholder">
                                <span id="addressPlaceholder"></span>
                                <input type="hidden" name="address" value="">
                                <input type="hidden" name="coordinate" value="">
                                <input type="hidden" name="province" value="">
                                <input type="hidden" name="city" value="">
                                <input type="hidden" name="area" value="">
                                <a href="#" id="getAddress">获取地址</a>
                            </div>
                        </div>
                        <div id="mapSearchList" class="mapSearchList">
                            <div id="map"></div>
                            <input type="text" name="addressInput" id="textinput-dizhi" placeholder="输入地址名称进行搜索" value="">
                            <div id="searchList">

                            </div>
                        </div>
                    </li>
                </ul>
                <button class="ui-btn ui-corner-all" id="submit">确认提交</button>

            </form>
        </div>
        <!-- //ctn end -->

    </div>
    <!-- //个人资料设置 end -->

    <!-- //安全码重设 -->
    <div data-role="page" id="safecode" >
        <!-- //header -->
        <div data-role="header" data-position="fixed" data-tap-toggle="false">
            <h1 id='cor' class="yousi_title">重设安全码</h1>
        </div>
        <!-- //header end -->

        <!-- //ctn -->
        <div data-role="content" class="ui-content" >
            <form action="" id="retsetSafecode">
                <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                    <li class="list_li">
                        <div class="ui-field-contain">
                            验证码发送手机号：15527953923
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
                            <input type="text" name="safe_code" placeholder="请输入新安全码" required='required'  value="">
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
    <!-- //安全码重设 end -->

    <!-- //重设密码 -->
    <div data-role="page" id="password" >
        <!-- //header -->
        <div data-role="header" data-position="fixed" data-tap-toggle="false">
            <h1 id='cor' class="yousi_title">重设密码</h1>
        </div>
        <!-- //header end -->

        <!-- //ctn -->
        <div data-role="content" class="ui-content" >
            <form action="" id="resetpwd">
                <ul data-role="listview" data-inset="true" class="list" data-theme="c">

                    <li class="list_li">
                        <div class="ui-field-contain">
                            <input type="password" name="oldpwd" placeholder="请输入旧密码" required='required'  value="">
                        </div>
                    </li>
                    <li class="list_li">
                        <div class="ui-field-contain">
                            <input type="text" name="newpwd" placeholder="请输入新密码" required='required'  value="">
                        </div>
                    </li>
                    <li class="list_li">
                        <button class='ui-btn ui-btn-active ui-corner-all' type="submit" id="submit" data-inline='true'>确定</button>
                </ul>
            </form>
        </div>
        <!-- //ctn -->

    </div>
    <!-- //重设密码 end -->

    <!-- //确认支付订单 -->
    <div data-role="page" id="pay" >
        <!-- //header -->
        <div data-role="header" data-position="fixed" data-tap-toggle="false">
            <h1 class="yousi_title">订单确认</h1>
        </div>
        <!-- //header -->

        <!-- //ctn -->
        <div data-role="content" class="ui-content"  data-theme="c">
            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li class="list_li jiage_dep">
                    <div class="jiage_dep_content">
                        四年级定价：45元/时<br/>
                        <span>+加价15元/时 + 中文教材20元/时<br/></span>
                        <span style="float:right;margin-top: 0.5em;"><a href="#"> 查看交大家教部官方定价</a></span>
                    </div>
                </li>
                <li class="list_li jiage_dep2">
                    小时单价  <span class="jiage_dep2_num">180元/时</span>
                </li>
            </ul>
            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li class="list_li jiage_dep3" >
                    预付2小时试听费 <span class="jiage_dep3_num">180元</span>
                </li>
                <li class="list_li jiage_dep4">
                    未接订单随时退款  <span class="jiage_dep4_num">试听不满意半款返还</span>
                </li>
            </ul>

            <ul data-role="listview" data-inset="true" class="list" data-theme="c">
                <li data-role="list-divider" class="fc_white">请选择支付方式</li>
                <li class="list_li">
            <fieldset data-role="controlgroup" data-iconpos="right">
                <input type="radio" name="radio-choice-w-6" id="radio-choice-w-6a" value="on" checked="checked">
                <label for="radio-choice-w-6a">支付宝</label>
                <input type="radio" name="radio-choice-w-6" id="radio-choice-w-6b" value="off">
                <label for="radio-choice-w-6b">微信支付</label>
                <input type="radio" name="radio-choice-w-6" id="radio-choice-w-6c" value="other">
                <label for="radio-choice-w-6c">财付通</label>
            </fieldset>
                </li>
            </ul>

            <button class="ui-btn ui-corner-all" type="submit" id="pay_submit">确认支付订单</button>
            <button class="ui-btn ui-corner-all " type="submit" id="change_submit">返回修改订单</button>

        </div>
        <!-- //ctn -->

    </div>
    <!-- //确认支付订单 end -->

    <!--//我的订单 包含账户信息-->
    <div data-role="page" id="dingdan">
        
        <!-- //账户信息 -->
        <div data-role="panel" id="mypanel" data-display="push">
            <ul class="panel_ul">
                <li> <p><span style="padding-right: 2em;">XXX家长</span><span class="fufeiuser">付费用户</span></p>
                    <p>欢迎使用交大家教中心网站</p></li>
                <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-grid">家教订单</button></li>
                <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-calendar">我要结课</button></li>
                <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-power">退出账号</button></li>
                <li><button class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-arrow-d">下载APP更方便</button></li>
            </ul>
            <div class="panel_notice">
                <p>提示：</p>
                <p>修改密码，安全码</p>
                <p>指定心仪教员等更多功能</p>
                <P>请用电脑登录网站</P>
                <P>或下载手机APP应用即可</P>
            </div>
        </div>
        <!-- //账户信息 end -->
        
        <!-- //header -->
        <div data-role="header" data-tap-toggle="false" data-position="fixed">
            <a href="#mypanel" class="ui-btn ui-shadow ui-corner-all ui-icon-bullets ui-btn-icon-notext">中心</a>
            <h1 class="yousi_title">上海交通大学家教部</h1>
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
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>

                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">立即付款</a></p>

                        <p class="padding_top_1"><a href="#" class="abtn">查看详情</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：请尽快支付试听费用<span><a href="#" class="">删除订单</a></span>
                </div>
                <div class='dingdan_photo'>
                    <em>
                        <img src="image/pic1.jpg" alt="">
                        未响应
                    </em>
                </div>
            </div>
            <!--未付款订单END-->
            <!--已支付未被接单-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    提示：请等待教员接单<span><a href="#" class="">订单退款</a></span>
                </div>
            </div>
            <!--已支付未被接单END-->
            <!--已接取未联系-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：请等待接单教员联系
                </div>
            </div>
            <!--已支付未被接单END-->
            <!--确认试听时间-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：已确认试教时间：2014-03-15 13:00
                </div>
            </div>
            <!--确认试听时间END-->
            <!--确认试听时间后，教员放弃-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                        <p class="padding_top_1"><a href="#" class="bbtn">重新发布</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：教员放弃试听，若未联系家长，请向家教部反馈，若已联系家长并征得同意，请重新发布订单
                </div>
            </div>
            <!--确认试听时间后教员放弃END-->
            <!--常规授课，教员放弃-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                        <p class="padding_top_1"><a href="#" class="bbtn">确认退款</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：教员放弃试听，若未联系家长，请向家教部反馈，若已联系家长并征得同意，请确认退款。剩余课时包将原路退回您的支付路径。
                </div>
            </div>
            <!--常规授课，教员放弃END-->

            <!--试听中，需要家长确认-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听总价：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                        <p class="padding_top_1"><a href="#" class="bbtn">试听结课</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：请结试听课程
                </div>
            </div>
            <!--试听中，需要家长确认END-->
            <!--授课中，需要家长确认-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>剩余课时包：6小时</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                        <p class="padding_top_1"><a href="#" class="bbtn">确认结课</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：有课程需要确认结课
                </div>
            </div>
            <!--授课中，时需要家长确认END-->
            <!--聘用中-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>剩余课时包：2小时</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">
                        <p><a href="#" class="abtn">查看详情</a></p>
                        <p class="padding_top_1"><a href="#" class="bbtn">购买课时</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：剩余 2 个课时包，请尽快购买！！
                </div>
            </div>
            <!--聘用中END-->
            <!--等待是否雇佣-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>剩余课时包：2小时</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">

                        <p ><a href="#" class="bbtn">雇佣教员</a></p>
                        <p class="padding_top_1"><a href="#" class="abtn">不雇佣</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    <p style="color: dodgerblue">接单教员：周兴天 18621572653</p>
                    状态：试听已结课，等待是否雇佣！！
                </div>
            </div>
            <!--等待是否雇佣END-->
            <!--不雇佣等待激活-->
            <div class="weifukuan">
                <div class="dingdan_title">订单号:21212515 <span class="dingdan_title_time">2015-06-15 13:00</span></div>
                <div class="dingdan_dep ui-grid-b">
                    <div class="dingdan_dep_left ">
                        <p>学生姓名：周兴天</p>
                        <p>学生年级：二年级</p>
                        <p>授课科目：物理，数学</p>
                        <p>小时单价：60元/时</p>
                        <p>试听价格：120元</p>
                    </div>
                    <div class="dingdan_dep_right ui-block-c">

                        <p ><a href="#" class="bbtn">激活订单</a></p>
                        <p class="padding_top_1"><a href="#" class="abtn">查看详情</a></p>
                    </div>
                </div>
                <div class="dingdan_notice">
                    状态：需支付剩余试听费（80元）再次激活
                </div>
            </div>
            <!--不雇佣等待激活END-->



        </div>
        <!-- //ctn -->
        
        <!-- //footer -->
        <div data-role="footer" data-position="fixed" data-tap-toggle="false">
            <div class="footer_left">
                <a href="#jieke">我要结课</a>
            </div>
            <div class="footer_right myBtn">
                <a href="#fabu">发布家教需求</a>
            </div>

        </div>
        <!-- //footer -->

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
<script type="text/javascript" src="/lib/components/jquery/jquery.js"></script>
<script type="text/javascript" src="/lib/js/web/common/ys_core.js"></script>
<script type="text/javascript" src="/lib/js/web/common/countDown.js"></script>
<script type="text/javascript" src="/lib/js/web/common/ajax.js"></script>
<script type="text/javascript" src="/lib/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/lib/js/web/init.js"></script>
<script type="text/javascript" src="/lib/components/jquerymobile/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript" src="/lib/js/web/account/account.js"></script>




<script type="text/javascript" charset="utf-8" src="http://172.16.3.78:8313/livereload.js"></script></body>
</html>
<script src="http://webapi.amap.com/maps?v=1.3&amp;key=6c6950072df95c1c9f64b571ad7487cb"></script>
<script src="/lib/js/web/map.js"></script>
<script type="text/javascript">
    require(['lib/js/web/account/account'], function (app) {
        
    });
</script>