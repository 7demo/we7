/**
 * 优思工具函数库
 * 兼容一般引入与node环境
 * 2015-02-02 SAMPAN
 * @return {[type]}     [description]
 */
var Yousi_tool = function () {

    this.cropCache = undefined; //裁剪缓存

};

Yousi_tool.prototype.contains = function (arr, str)
{
    var i = arr.length;
    while (i--) {
        if (arr[i] === str) {
            return i;
        }
    }
    return -1;
};
/**
 * [date 返回固定格式日期时间]
 * @param  {[string]} fmt [时间格式 'string']
 * @return {[string]}7      
 */
Yousi_tool.prototype.getDate = function (fmt)
{
    var datedate = new Date();
    var o = {
        "m+": datedate.getMonth() + 1, //月份 
        "d+": datedate.getDate(), //日 
        "h+": datedate.getHours(), //小时 
        "i+": datedate.getMinutes(), //分 
        "s+": datedate.getSeconds(), //秒 
        "q+": Math.floor((datedate.getMonth() + 3) / 3), //季度 
        "S": datedate.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt))
        fmt = fmt.replace(RegExp.$1, (datedate.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};
/**
 * 数组去重
 * @param  {[array]} data [原始数组]
 * @return {[array]}     [返回数组]
 */
Yousi_tool.prototype.arrayUnique = function (data) {
    var n = {}, r = []; //n为hash表，r为临时数组
    for (var i = 0; i < data.length; i++) //遍历当前数组
    {
        if (!n[data[i]]) //如果hash表中没有当前项
        {
            n[data[i]] = true; //存入hash表
            r.push(data[i]); //把当前数组的当前项push到临时数组里面
        }
    }
    return r;
};
/**
 * 需要引入jcrop库
 * 裁剪方法  15-01-23 SAMPAN
 */
Yousi_tool.prototype.crop = function (arg) {
    var boundx, boundy, url, _width, _height, _marginLeft, _marginTop,
            aspectRatio = arg.aspectRatio || false,
            boxWidth = arg.boxWidth || 400,
            boxHeight = arg.boxHeight || 200,
            minSize = arg.minSize || [0, 0],
            maxSize = arg.maxSize || [9999, 9999],
            width = arg.width,
            height = arg.height,
            self = this;
    if (self.cropCache) {
        self.cropCache.destroy();
        $(arg.cropImg).attr('style', '');
    }
    ;
    if (arg.url) {
        $(arg.cropImg).attr('src', arg.url);  //原图
        $(arg.cropShowImg).attr('src', arg.url); //示意图
        $(arg.img).attr('src', url); //完成图

        //初始隐藏
        arg.initFunc();

        //进行初始化图片，避免iebug
        var _oldImg = $(arg.cropImg);
        var _cloneImg = _oldImg.clone();
        _oldImg.after(_cloneImg);
        _oldImg.remove();

        //裁剪
        _cloneImg.Jcrop({
            aspectRatio: arg.aspectRatio,
            boxWidth: arg.boxWidth,
            boxHeight: arg.boxHeight,
            maxSize: arg.maxSize,
            minSize: arg.minSize,
            onSelect: updateCoords,
            onChange: updatePreview
        }, function () {
            setTimeout(function () {
                var _parent_width = $('.jcrop-holder').parent().width();
                var _parent_height = $('.jcrop-holder').parent().height();
                var _self_width = $('.jcrop-holder').width();
                var _self_height = $('.jcrop-holder').height();

                $('.jcrop-holder').css('margin-left', (_parent_width - _self_width) / 2);
                $('.jcrop-holder').css('margin-top', (_parent_height - _self_height) / 2);
            }, 0);

            //得到当前缓存
            self.cropCache = this;
            self.cropCache.animateTo(arg.autoPosition);
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
        });
    }
    ;

    //裁剪确定
    $(arg.submitBtn).click(function () {
        $(arg.img).attr('src', arg.url); //完成图
        $('input[name=' + arg.pathInput + ']').val(arg.path);
        $('input[name=' + arg.nameInput + ']').val(arg.name);
        var $img = $(arg.img);
        $img.css({
            width: _width,
            height: _height,
            marginLeft: _marginLeft,
            marginTop: _marginTop
        });
        self.cropCache.destroy();
        if ($('input[name=' + arg.inputPoint + ']').val() == '' || $('input[name=' + arg.inputPoint + ']').val() == undefined) {
            $('input[name=' + arg.inputPoint + ']').attr('value', arg.defaultArea);
        }
        arg.subFun();

    });

    //关闭裁剪
    $(document).on('click', arg.cancleBtn, function () {
        self.cropCache.destroy();
        arg.canFun();
    });

    function updatePreview(c) {  //移动图片位置
        var $pimg = $(arg.cropShowImg);
        if (parseInt(c.w) > 0) {
            var rx = arg.width / c.w;
            var ry = arg.height / c.h;
            _width = Math.round(rx * boundx) + 'px';
            _height = Math.round(ry * boundy) + 'px';
            _marginLeft = '-' + Math.round(rx * c.x) + 'px';
            _marginTop = '-' + Math.round(ry * c.y) + 'px';
            $pimg.css({
                width: _width,
                height: _height,
                marginLeft: _marginLeft,
                marginTop: _marginTop
            });
        }
    }
    ;

    function updateCoords(c) { //更新坐标
        var _array = [c.w, c.h, c.x, c.y];
        $('input[name=' + arg.inputPoint + ']').attr('value', _array.join(','));
    }
};
/**
 * 倒计时 15-03-17  SAMPAN
 * @param {[time]} [毫秒数] [倒计时停止时间]
 * @param {type} [时间格式] [dd-hh-mm-ss]
 */
Yousi_tool.prototype.count_down = function () {

    var Alarm = function (startime, endtime, countFunc, endFunc) {
        this.time = Math.floor((endtime - startime) / 1000); //时间
        this.countFunc = countFunc; //计时函数
        this.endFunc = endFunc; //结束函数
        this.flag = 't' + Date.parse(new Date()); //
    };
    Alarm.prototype.start = function () {
        var self = this;

        self.flag = setInterval(function () {
            if (self.time < 0) {
                clearInterval(self.flag);
                self.endFunc();
                console.log('计时结束');
            } else {

                var minute, hour, day, second;
                day = Math.floor(self.time / 60 / 60 / 24) < 10 ? '0' + Math.floor(self.time / 60 / 60 / 24) : Math.floor(self.time / 60 / 60 / 24);
                hour = Math.floor(self.time / 60 / 60 % 24) < 10 ? '0' + Math.floor(self.time / 60 / 60 % 24) : Math.floor(self.time / 60 / 60 % 24);
                minute = Math.floor(self.time / 60 % 60) < 10 ? '0' + Math.floor(self.time / 60 % 60) : Math.floor(self.time / 60 % 60);
                second = Math.floor(self.time % 60) < 10 ? '0' + Math.floor(self.time % 60) : Math.floor(self.time % 60);
                //倒计时执行函数
                self.countFunc(second, minute, hour, day);
                self.time--;

            }
        }, 1000);
    }
    return Alarm;

};
/**
 * descript 需要引jquery
 * @type : 提示类型
 * @time ：提示框自动关闭时间 毫秒
 * @ctn  : 提示内容
 * 提示 15-01-26 SAMPAN
 */
Yousi_tool.prototype.prop = function (type, time, title, text) {
    var _prop = $('.prop'), t;

    if (title) {
        _prop.find('.prop_h').text(title);
    }
    ;

    if (text) {
        _prop.find('.prop_text').text(text);
    }
    ;

    _prop.addClass(type).removeClass('fn-hide');

    if (time) {
        t = setTimeout(function () {
            _prop.removeClass(type).addClass('fn-hide');
            _prop.find('.prop_h').text('');
            _prop.find('.prop_text').text('');
        }, time);
    }
    ;

    _prop.find('.close').on('click', function () {
        clearTimeout(t);
        _prop.removeClass(type).addClass('fn-hide');
        _prop.find('.prop_h').text('');
        _prop.find('.prop_text').text('');
    });
};

/**
 * 正则表达式规范
 * @return {[object]} [正则表达式]
 */
Yousi_tool.prototype.reg = function () {
    var reg = {
        phone: /^1[3,4,5,7,8][0-9]{1}[0-9]{8}$/, //11位手机号
        name: /^[A-Za-z0-9]{6,20}$/, //账户名：6-20位字母或数字
        safe_code: /^[0-9]{6}$/, //安全码：6位数字
        realname: /^[\u4e00-\u9fa5]+$/, //真名：汉字
        idcard: /(^[0-9]{17}[0-9xX]$)|(^[0-9]{15}$)/, //身份证号
        email: /^[a-z0-9]([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]+(-?[a-z0-9]+)?)(\.[a-z0-9]+(-?[a-z0-9]+))*[\.][a-z]{2,4}$/i, //邮箱
        password: /^[A-Za-z0-9]{6,20}$/, //密码：不包含特殊符号
        number: /^[1-9]+$/, //至少一位数字
        verify: /^[0-9]{5}$/ //验证码5位数字
    }
    var info = {
        phone: {
            0: '手机号不能为空',
            1: '手机号码格式错误，请输入11数字位手机号'
        },
        name: {
            0: '账户名不能为空',
            1: '账户名格式错误，请输入6~20位字母或数字'
        },
        safe_code: {
            0: '安全码不能为空',
            1: '安全码错误，请输入6位数字'
        },
        realname: {
            0: '姓名不能为空',
            1: '请输入中文姓名'
        },
        idcard: {
            0: '身份证不能为空',
            1: '身份证格式错误'
        },
        email: {
            0: '邮箱不能为空',
            1: '邮箱格式错误'
        },
        password: {
            0: '密码不能为空',
            1: '密码格式错误，请输入6~20字母或数字'
        },
        number: {
            0: '小时不能为空',
            1: '小时格式错误，请输入至少1位大于0的数字'
        },
        verify: {
            0: '验证码不能为空',
            1: '验证码格式有误，请输入5位数字'
        }

    }
    return {
        reg: reg,
        info: info
    }
};

/**
 * 进行正则验证
 * @param  {[string]} input   [表单验证名字]
 * @param  {[reg]} regPara [input的正则表达式，可选。若有则替换原规范]
 * @param  {[string]} val [input表单只]
 * @return {[string/true]}         [若正则无误，则返回true，否则返回错误信息]
 */
Yousi_tool.prototype.checkReg = function (input, val, regPara, regInfos) {
    var reg = this.reg();

    if (regPara) {//若regPara存在，则替换原来
        for (i in reg.reg) {
            if (reg[i] == input) {
                reg.reg[i] = regPara;
            }
            ;
        }
        ;
    }
    ;

    var returnInfo = true;
    if (val == '' || val == undefined || val.length == 0) {
        return reg.info[input][0];
    } else {
        if (!reg.reg[input].test(val)) {
            return reg.info[input][1]
        }
        ;
    }
    ;
    return true;

};

// exports.yousi_tool = new Yousi_tool();
if (typeof module !== 'undefined' && module.exports) {
    exports.yousi_tool = new Yousi_tool();
} else if (typeof define === 'function') {
    var yousi_tool = new Yousi_tool();
    define('lib/js/web/common/ys_core', yousi_tool);
} else {
    var yousi_tool = new Yousi_tool();
}