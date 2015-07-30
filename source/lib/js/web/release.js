define(function (require){
	//引入jquery与jquerymobile
	var $ = require('jquery'),
        ajax = require('/lib/js/web/common/ajax.js');
	require('/lib/js/web/init.js');
	require('/lib/components/jquerymobile/jquery.mobile-1.4.5.min.js');


    /*
    *
    *
    * 改变年级获取科目
    *
    * */
    $('#release select[name=grade]').change(function () {
        var val = $('#release select[name=grade]').val(),
            done = function (data) {
                $.each(data.data.list, function (i, v) {

                });
            },
            fail = function (data) {
                alert(data.desc);
                btn.text(btnTxt).removeAttr('disabled');
            };
        ajax({
            url : '',
            data : {
                grade : val
            },
            done : done,
            fail : fail
        });

    });

    /*
    * 根据值生成主辅科目
    * */
    var setSubject = function (data) {
        var tpl = '';

        //$.each(data, function (i, v) {
        //    tpl += '<input type="checkbox" name="subject" id="radio-choicejy-aa" value="1">'
        //    tpl += '<label for="radio-choicejy-aa">物理</label>'
        //});

        tpl +='<fieldset id="subject" data-role="controlgroup" data-type="horizontal" data-mini="true">'
        for (var i = 0; i < 5; i++) {
                tpl += '<input type="checkbox" name="subject" id="radio-choicejy-'+ i +'" value="'+ i +'">'
                tpl += '<label for="radio-choicejy-'+ i +'">物理</label>'
        }d
        tpl +='</fieldset>'

        $('#subjectDiv').html(tpl);
        $('#subjectDiv').trigger("create");
    }
    setSubject();

    /*
    * 签署家长合约
    * */
    $('input[name=parentConcat]').click(function () {
        $('#release #fabu_submit').addClass('ui-btn-active');
    });

    /*
    * 提交发布订单信息
    * */

    $('#release #fabu_submit').click(function () {

        if (!$(this).hasClass('ui-btn-active')) {
            alert('请阅读并签署家教公约');
            return false
        };

        var parent = $('#release'),
            btn = $(this),
            btntxt = btn.text(),
            parentname = parent.find('input[name=parentname]'),
            nickname = parent.find('input[name=nickname]'),
            s_sex = parent.find('input[name=s_sex]:checked').val(),
            grade = parent.find('select[name=grade]').val(),
            phone = parent.find('input[name=phone]').val(),
            address = parent.find('input[name=address]').val(),
            coordinate = parent.find('input[name=coordinate]').val(),
            province = parent.find('input[name=province]').val(),
            city = parent.find('input[name=city]').val(),
            area = parent.find('input[name=area]').val(),
            subjectInput = parent.find('input[name=subject]:checked'),
            subject = [],
            specail = [],
            specailSubjectInput = parent.find('input[name=special]:checked'),
            t_sex = parent.find('input[name=t_sex]:checked').val(),
            addprice = parent.find('select[name=addPrice]').val(),
            direct = parent.find('select[name=direct]').val(),
            schoolInput = parent.find('input[name=school]:checked'),
            school = [],
            detail = parent.find('textarea[name=detail]').val();

            before = function () {
                $.each(subjectInput, function (i, v) {
                    subject.push($(v).val());
                });
                $.each(specailSubjectInput, function (i, v) {
                    specail.push($(v).val());
                });
                $.each(schoolInput, function (i, v) {
                    school.push($(v).val());
                });
                if (!parentname) {
                    alert('父母姓名不能为空');
                    return false;
                }
                if (!nickname) {
                    alert('学生姓名不能为空');
                    return false;
                }
                if (!s_sex) {
                    alert('请选择学生性别');
                    return false;
                }
                if (!grade) {
                    alert('请选择学生年级');
                    return false;
                }
                if (!phone) {
                    alert('联系方式不能为空');
                    return false;
                }
                if (!address) {
                    alert('地址不能为空');
                    return false;
                }
                if (!subject.length) {
                    alert('请选择辅导学科');
                    return false;
                }
                if (!school.length) {
                    alert('请选择发布高校');
                    return false;
                }
                if (!detail) {
                    alert('详细需求不能为空');
                    return false;
                }

                btn.text('请求中').attr('disabled', 'disabeld');
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
            url : '/Account/login',
            data : {
                parentname : parentname,
                nickname : nickname,
                s_sex : s_sex,
                grade : grade,
                phone : phone,
                address : address,
                coordinate : coordinate,
                province : province,
                city : city,
                area : area,
                subject : subject,
                t_sex : t_sex,
                specail : specail,
                addprice : addprice,
                direct : direct,
                school : school,
                detail : detail
            },
            done : done,
            fail : fail
        });

    });






})