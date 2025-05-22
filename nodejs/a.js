var localurl = 'ht.lapepe.cc',
    http = require('https'),
    schedule = require('node-schedule'),
	headers = {"User-Agent": "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36"};

// 定时器，每1秒执行
schedule.scheduleJob('*/1 * * * * *', function(){
    var option = {
            host: localurl,
            timeout: 5000,
            path: '/index/index/order',
            headers: headers
        };
    http.request(option, function (res) {
        var data = "";
        res.on("data", function (_data) {
            
        });
        res.on("end", function () {
            
        });
    }).end();
});

// 定时器，每1秒执行
schedule.scheduleJob('*/1 * * * * *', function(){
    var option = {
            host: localurl,
            timeout: 5000,
            path: '/index/index/product',
            headers: headers
        };
    http.request(option, function (res) {
        var data = "";
        res.on("data", function (_data) {
            
        });
        res.on("end", function () {
            
        });
    }).end();
});


schedule.scheduleJob('*/1 * * * * *', function(){
    var option = {
            host: localurl,
            timeout: 5000,
            path: '/index/index/yebeveryday?token=ABCD484088',
            headers: headers
        };
    http.request(option, function (res) {
        var data = "";
        res.on("data", function (_data) {
            
        });
        res.on("end", function () {
            
        });
    }).end();
});

// 定时器，每1秒执行
schedule.scheduleJob('*/1 * * * * *', function(){
    var option = {
            host: localurl,
            timeout: 5000,
            path: '/index/index/yebeveryday1?token=ABCD484088',
            headers: headers
        };
    http.request(option, function (res) {
        var data = "";
        res.on("data", function (_data) {
            
        });
        res.on("end", function () {
            
        });
    }).end();
});

// 定时器，每1秒执行
schedule.scheduleJob('*/1 * * * * *', function(){
    var option = {
            host: localurl,
            timeout: 5000,
            path: '/index/index/yebeveryday2?token=ABCD484088',
            headers: headers
        };
    http.request(option, function (res) {
        var data = "";
        res.on("data", function (_data) {
            
        });
        res.on("end", function () {
            
        });
    }).end();
});