define(function (require) {

    var CountDown = function (proFunc, sucFunc, time) {
        this.time = time || 120;
        this.flag = undefined;
        this.proFunc = proFunc;
        this.sucFunc = sucFunc;
    }
    CountDown.prototype.start = function () {
        var self = this;
        self.time --;
        if (self.time > -1) {
            self.proFunc();
            self.flag = setTimeout( function () {
                self.start();
            }, 1000);
        } else {
            self.sucFunc();
            clearTimeout(self.flag);
        }

    }
    return CountDown;

});