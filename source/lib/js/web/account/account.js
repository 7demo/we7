define(function (require){
	//引入jquery与jquerymobile

	var $ = require('jquery'),
        yousi_tool = require('/lib/js/web/common/ys_core.js'),
        countDown = require('/lib/js/web/common/countDown.js'),
        ajax = require('/lib/js/web/common/ajax.js');
	require('/lib/js/web/init.js');
	require('/lib/components/jquerymobile/jquery.mobile-1.4.5.min.js');
    /*
    *
    * 登录
    *
    * */
    $('#parentLogin').submit(function () {

        var loginwrap = $('#parentLogin'),
            btn = $('#parentLogin #submit'),
            btnTxt = btn.text(),
            nameInput = loginwrap.find('input[name=phone]'),
            pwdInput = loginwrap.find('input[name=password]'),
            name = nameInput.val(),
            pwd = pwdInput.val(),
            data = data || {},
            before = function () {


                var checkname = yousi_tool.checkReg('phone', name),
                    checkpwd = yousi_tool.checkReg('password', pwd);
                if (checkname !== true) { //手机号检测有误
                    alert(checkname);
                    return false;
                }
                if (checkpwd !== true) { //密码检测有误
                    alert(checkpwd);
                    return false;
                }
                btn.text('登录中').attr('disabled', 'disabeld');
                return true;
            },
            done = function (data) {
                location.href = data.data.url;
            },
            fail = function (data) {
                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');
            };
        ajax({
            before : before,
            url : '/index.php/web/account/login',
            data : {
                name : name,
                pwd : pwd
            },
            done : done,
            fail : fail
        });

        return false;
    });

    /*
     *
     * 注册获取验证码
     *
     * */
    $('#parentRegister #getVerify').click(function () {

        var loginwrap = $('#parentRegister'),
            btn = $('#parentLogin #getVerify'),
            btnTxt = btn.text(),
            nameInput = loginwrap.find('input[name=phone]'),
            name = nameInput.val(),
            data = data || {},
            before = function () {
                var checkname = yousi_tool.checkReg('phone', name);
                if (checkname !== true) { //手机号检测有误
                    alert(checkname);
                    return false;
                }
                btn.text('请求中').attr('disabled', 'disabeld');
                return true;
            },
            done = function (data) {
                var countDown = new CountDown(function () {
                    btn.text(this.time + '后再次获取');
                }, function () {
                    btn.removeClass('disabled').text(btnTxt);
                });
                countDown.start();
            },
            fail = function (data) {
                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');
            };
        ajax({
            before : before,
            url : '/Account/login',
            data : {
                name : name
            },
            done : done,
            fail : fail
        });

        return false;
    });

    /*
     *
     * 重设安全码获取验证码
     *
     * */
    $('#retsetSafecode #getVerify').click(function () {

        var loginwrap = $('#parentRegister'),
            btn = $('#retsetSafecode #getVerify'),
            btnTxt = btn.text(),
            data = data || {},
            before = function () {
                btn.text('请求中').attr('disabled', 'disabeld');
                return true;
            },
            done = function (data) {
                var countDown = new CountDown(function () {
                    btn.text(this.time + '后再次获取');
                }, function () {
                    btn.removeClass('disabled').text(btnTxt);
                });
                countDown.start();
            },
            fail = function (data) {
                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');
            };
        ajax({
            before : before,
            url : '/Account/login',
            data : {

            },
            done : done,
            fail : fail
        });

        return false;
    });

    /*
     *
     * 家长注册提交
     *
     * */
    $('#parentRegister').submit(function () {
        var loginwrap = $('#parentRegister'),
            btn = loginwrap.find('#submit'),
            btnTxt = btn.text(),
            nameInput = loginwrap.find('input[name=phone]'),
            verifyInput = loginwrap.find('input[name=verify]'),
            pwdInput = loginwrap.find('input[name=password]'),
            name = nameInput.val(),
            verify = verifyInput.val(),
            pwd = pwdInput.val(),
            data = data || {},
            before = function () {

                var checkname = yousi_tool.checkReg('phone', name),
                    checkverify = yousi_tool.checkReg('verify', verify),
                    checkpwd = yousi_tool.checkReg('password', pwd);
                if (checkname !== true) { //手机号检测有误
                    alert(checkname);
                    return false;
                }
                if (checkverify !== true) { //安全码
                    alert(checkverify);
                    return false;
                }
                if (checkpwd !== true) { //密码检测有误
                    alert(checkpwd);
                    return false;
                }
                btn.text('请求中').attr('disabled','disabled');
                return true;
            },
            done = function (data) {
                if (data.data.score) {
                    //进行是否要执行方法

                } else {
                    location.href = data.data.url;
                }
            },
            fail = function (data) {

                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');

            };
        ajax({
            before : before,
            url : '/index.php/web/account/register',
            data : {
                phone : name,
                verify : verify,
                pwd : pwd
            },
            done : done,
            fail : fail
        });
        return false;
    })

    /*
     *
     * 设定安全码
     *
     * */
    $('#setSafecode').submit(function () {
        var wrap = $('#setSafecode'),
            safe_code = wrap.find('input[name=safe_code]').val(),
            data = {},
            postData = {},
            self = $('#setSafecode #submit'),
            btnTxt = self.text();
            postData = {
                safe_code : safe_code
            };
        ajax({
            before : function () {

                var safecodeCheck = yousi_tool.checkReg('safe_code', safe_code);
                if (safecodeCheck != true) {
                    alert(safecodeCheck);
                    return false;
                }
                self.text('提交中').attr('disabled','disabled');
                return true;

            },
            done : function (data) {
                if (data.data.url) {
                    location.href = data.data.url;
                }
            },
            fail : function (data) {
                alert(data.desc);
                self.text(btnTxt).removeAttr('disabled');
            },
            url : '',
            data : postData
        })
        return false;
    });

    /*
    *
    *
    * ***个人资料 设定
    *
    * */
    $('#info #submit').click(function () {
        var self = $(this),
            btntxt = self.text(),
            parent = $('#info'),
            nickname = parent.find('input[name=nickname]').val(),
            parentname = parent.find('input[name=parentname]').val(),
            sex = parent.find('input[name=sex]:checked').val(),
            grade = parent.find('select[name=grade]').val(),
            address = parent.find('input[name=address]').val(),
            coordinate = parent.find('input[name=coordinate]').val(),
            province = parent.find('input[name=province]').val(),
            city = parent.find('input[name=city]').val(),
            area = parent.find('input[name=area]').val();
        ajax({
            before : function () {

                if (parentname == '' || parentname == undefined) {
                    alert('家长姓名不能为空');
                    return false;
                }
                if (nickname == '' || nickname == undefined) {
                    alert('学生姓名不能为空');
                    return false;
                }
                if (sex == '' || sex == undefined) {
                    alert('学生性别不能为空');
                    return false;
                }
                if (grade == '' || grade == undefined) {
                    alert('学生年级不能为空');
                    return false;
                }
                var addressFlag = false;
                $.each([address, coordinate, province, city, area], function (i, v) {
                    if (v == undefined || v == '') {
                        addressFlag = true;
                    }
                })
                if (addressFlag) {
                    alert('家庭地址不能为空');
                    return false;
                }
                self.text('提交中').addClass('disabled');
                return true;

            },
            done : function (data) {
                if (data.code == 200) {
                    successdiv.text('提交成功');
                    setTimeout(function () {
                        successdiv.text('');
                        window.location.reload();
                    }, 2000);
                } else {
                    alert(data.desc);
                    self.text(btntxt).removeClass('disabled')
                }
            },
            fail : function (data) {
                alert(data.desc);
                self.text(btntxt).removeAttr('disabled');
            },
            url : '',
            data : {
                nickname: nickname,
                parentname: parentname,
                sex: sex,
                grade: grade,
                address: address,
                coordinate: coordinate,
                province: province,
                city: city,
                area: area
            }
        })
        return false;
    });


    /*
     *
     * 重设安全码提交
     *
     * */
    $('#retsetSafecode').submit(function () {
        var loginwrap = $('#retsetSafecode'),
            btn = loginwrap.find('#submit'),
            btnTxt = btn.text(),
            verifyInput = loginwrap.find('input[name=verify]'),
            safecodeInput = loginwrap.find('input[name=safe_code]'),
            verify = verifyInput.val(),
            safecode = safecodeInput.val(),
            data = data || {},
            before = function () {

                var checkverify = yousi_tool.checkReg('verify', verify),
                    checksafecode = yousi_tool.checkReg('safe_code', safecode);
                if (checkverify !== true) { //安全码
                    alert(checkverify);
                    return false;
                }
                if (checksafecode !== true) { //检测安全码
                    alert(checksafecode);
                    return false;
                }
                btn.text('请求中').attr('disabled','disabled');
                return true;

            },
            done = function (data) {
                if (data.data.score) {
                    //进行是否要执行方法

                } else {
                    location.href = data.data.url;
                }
            },
            fail = function (data) {

                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');

            };
        ajax({
            before : before,
            url : '',
            data : {
                verify : verify,
                safecode : safecode
            },
            done : done,
            fail : fail
        });
        return false;
    })


    /*
     *
     * 重设密码
     *
     * */
    $('#resetpwd #submit').click(function () {
        var loginwrap = $('#resetpwd'),
            btn = loginwrap.find('#submit'),
            btnTxt = btn.text(),
            oldpwd = loginwrap.find('input[name=oldpwd]').val(),
            newpwd = loginwrap.find('input[name=newpwd]').val(),
            data = data || {},
            before = function () {

                var checkoldpwd = yousi_tool.checkReg('password', oldpwd),
                    checknewpwd = yousi_tool.checkReg('password', newpwd);
                if (checkoldpwd !== true) { //安全码
                    alert('旧' + checkoldpwd);
                    return false;
                }
                if (checknewpwd !== true) { //检测安全码
                    alert('新' + checknewpwd);
                    return false;
                }
                btn.text('请求中').attr('disabled','disabled');
                return true;

            },
            done = function (data) {
                if (data.data.score) {
                    //进行是否要执行方法

                } else {
                    location.href = data.data.url;
                }
            },
            fail = function (data) {

                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');

            };
        ajax({
            before : before,
            url : '/Accout/',
            data : {
                oldpwd : oldpwd,
                newpwd : newpwd
            },
            done : done,
            fail : fail
        });
        return false;
    })


})