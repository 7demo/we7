var autoOptions = {
    pageIndex:1,
    pageSize:10,
    city: "021", //城市，默认全国
    extensions:"all"
},
map = new AMap.Map('map', {
    level: 13, //设置地图缩放级别
    center: new AMap.LngLat(121.480353,31.236503) //设置地图中心点
});
//点击获取地址
document.getElementById('getAddress').onclick = function (e) {
    //定位
    document.getElementById('mapSearchList').style.display = 'block';
    map.plugin(['AMap.Geolocation'], function () {
        var geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：无穷大
            maximumAge: 0,           //定位结果缓存0毫秒，默认：0
            convert: true,           //自动偏移坐标，偏移后的坐标为高德坐标，默认：true
            showButton: true,        //显示定位按钮，默认：true
            buttonPosition: 'LB',    //定位按钮停靠位置，默认：'LB'，左下角
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            showMarker: true,        //定位成功后在定位到的位置显示点标记，默认：true
            showCircle: true,        //定位成功后用圆圈表示定位精度范围，默认：true
            panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
            zoomToAccuracy:true      //定
        })
        map.addControl(geolocation);
        AMap.event.addListener(geolocation, 'complete', function (data) {
            console.log(data); //data.position.lng, data.position.lat
            var lnglatXY = new AMap.LngLat(data.position.lng,data.position.lat);
            var MGeocoder;
            var _points = data.position.lng + ',' +data.position.lat
            //加载地理编码插件
            AMap.service(["AMap.Geocoder"], function() {
                MGeocoder = new AMap.Geocoder({
                    radius: 1000,
                    extensions: "all"
                });
                //逆地理编码
                MGeocoder.getAddress(lnglatXY, function(status, data){
                    if(status === 'complete' && data.info === 'OK'){
                        var _data = data.regeocode.pois,
                            _address = data.regeocode.addressComponent,
                            _tpl = '';
                        var _city = _address.city==''?_address.province:_address.city;
                        _tpl += '<dl class="address_dl" data-address="'+ _address.township + _address.street + _address.streetNumber +'" data-province="' + _address.province + '" data-city="'+ _city +'"  data-area="'+ _address.district +'" data-coordinate="'+ _points +'">'
                        _tpl += '<dt>'
                        _tpl += (_address.township + _address.street + _address.streetNumber)
                        _tpl += '</dt>'
                        _tpl += '<dd>'
                        _tpl += (_address.city||_address.province + _address.district)
                        _tpl += '</dd>'
                        _tpl += '</dl>'
                        _data.forEach(function (v, i) {
                            var _cityv = _address.city==''?_address.province:_address.city;
                            _tpl += '<dl class="address_dl" data-address="'+ v.address +  v.name +'" data-province="'+ _address.province +'" data-city="'+ _cityv +'" data-area="'+ _address.district +'" data-coordinate="'+ _points +'">'
                            _tpl += '<dt>'
                            _tpl += v.address +  v.name
                            _tpl += '</dt>'
                            _tpl += '<dd>'
                            _tpl += (_address.city||_address.province + _address.district)
                            _tpl += '</dd>'
                            _tpl += '</dl>'
                        })
                        document.getElementById('searchList').innerHTML = _tpl;

                    }
                });
            });


        });//返回定位信息
        geolocation.getCurrentPosition();
    });

    e.preventDefault();
    e.stopPropagation();
};

/*
*
* 搜索地址
*
* */

document.getElementsByName('addressInput')[0].oninput = function () {
    var value = this.value;
    //搜索
    map.plugin(['AMap.PlaceSearch'], function () {
        var auto = new AMap.PlaceSearch(autoOptions);
        AMap.event.addListener(auto, "complete", function (data) {
            document.getElementById('searchList').innerHTML = '';
            if (data.info == 'OK') {
                var _data = data.poiList.pois,
                    _tpl = '';
                _data.forEach(function (v, i) {
                    _tpl += '<dl class="address_dl" data-address="'+ v.cityname + v.adname + v.name +'" data-province="'+ v.pname +'" data-city="'+ v.cityname +'" data-area="'+ v.adname +'" data-coordinate="'+ v.location.lng + ',' + v.location.lat +'">'
                    _tpl += '<dt>'
                    _tpl += v.name
                    _tpl += '</dt>'
                    _tpl += '<dd>'
                    _tpl += v.cityname + v.adname
                    _tpl += '</dd>'
                    _tpl += '</dl>'
                })
                document.getElementById('searchList').innerHTML = _tpl;
                document.getElementById('searchList').style.display = 'block';
            } else {
                document.getElementById('searchList').innerHTML = '没有数据，请换个地址';
                document.getElementById('searchList').style.display = 'block';
            }
        });
        auto.search(value);
    })
};

/*点击获取地址*/
document.onclick = function (event) {
    var e = event || window.event,
        target = e.target || e.srcElement,
        dl = target.parentNode;
    if (dl.className == 'address_dl') {
        var _address = dl.attributes['data-address'].value,
            _province = dl.attributes['data-province'].value,
            _city = dl.attributes['data-city'].value,
            _area = dl.attributes['data-area'].value;
            _coordinate = dl.attributes['data-coordinate'].value;
        document.getElementById('addressPlaceholder').innerHTML = _address;
        document.getElementsByName('address')[0].value = _address;
        document.getElementsByName('province')[0].value = _province;
        document.getElementsByName('city')[0].value = _city;
        document.getElementsByName('area')[0].value = _area;
        document.getElementsByName('coordinate')[0].value = _coordinate;
        document.getElementById('getAddress').innerHTML = '重新编辑';
        document.getElementById('mapSearchList').style.display = 'none';
    }

}
