<?php /*a:3:{s:53:"/www/wwwroot/03/application/index/view/user/hold.html";i:1665407182;s:57:"/www/wwwroot/03/application/index/view/public/header.html";i:1623358146;s:57:"/www/wwwroot/03/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>首页</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><style type="text/css">    html{
        font-size: 120px;
        background: white !important;
    }
    body{background:#f3f3f3!important;}

</style><script type="text/javascript">window.onload=function(){
    //设置适配rem
    var change_rem = ((window.screen.width > 450) ? 450 : window.screen.width)/375*100;
    document.getElementsByTagName("html")[0].style.fontSize=change_rem+"px";
    window.onresize = function(){
        change_rem = ((window.screen.width > 450) ? 450 : window.screen.width)/375*100;
        document.getElementsByTagName("html")[0].style.fontSize=change_rem+"px";
    }
}
</script><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript" src="/static/wap/js/order.js"></script><script type="text/javascript" src="/static/wap/js/function.js"></script><script type="text/javascript" src="/static/wap/js/base64.js"></script><script type="text/javascript">  var Base64 = new Base64();
</script><link rel="stylesheet" type="text/css" href="/static/wap/css/ionic.css"><link rel="stylesheet" type="text/css" href="/static/wap/css/style.css"><style type="text/css">    .box .footer {
        height: 0.52rem;
    }
    .box .footer > div a i {
        width: .21rem !important;
        height: .21rem !important;
        margin-top: .08rem;
    }
    .box .footer > div a i {
        width: .586667rem;
        height: .586667rem;
    }

    .box .footer > div a span {
        font-size: .12rem !important;
        margin-top: .02rem
    }
    .trade_history header article.active {
	    color: #3a63ff;
	    border-bottom: 2px solid #3a63ff;
	    font-weight: bold;
	}
	.trade_history header {
	    width: 100%;
	    height: 0.35rem;
	    background: #f3f3f3;
	    display: flex;
	    border-top: 1px solid lightgray;
	}
	.trade_history header article {
	    flex: 1;
	    height: 100%;
	    border-bottom: 1px solid gray;
	    color: gray;
	}
	.trade_history_list ul li {
	    width: 100%;
	    height: 0.73rem;
	    border-top: 1px solid #ffffff;
	    border-bottom: 1px solid #ffffff;
	    color: #3c3a3a;
	    background: #f3f3f3;
	    position: relative;
	}
	.trade_history header article:nth-of-type(1) p {
	    border-right: 1px solid #c1c1c1;
	}
</style><div id="app"><div class="box"><ion-nav-bar class="bar-stable headerbar nav-bar-container" nav-bar-transition="ios" nav-bar-direction="swap" nav-swipe=""><div class="nav-bar-block" nav-bar="active"><ion-header-bar class="bar-stable headerbar bar bar-header" align-title="center" style="border: none !important;    height: 40px;    line-height: 40px;    background-color: white !important;    padding: 0;"><div class="title title-center header-item jiaoyilishi" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); left: 15px; right: 15px;color:black!important"><?php echo htmlentities(app('lang')->get('key_orders')); ?></div></ion-header-bar></div></ion-nav-bar><ion-nav-view class="view-container" nav-view-transition="ios" nav-view-direction="none" nav-swipe=""><ion-tabs class="tabs-icon-top navbar pane tabs-bottom tabs-standard" abstract="true" nav-view="active" style="opacity: 1; transform: translate3d(0%, 0px, 0px);"><ion-nav-view name="tab-history" class="view-container tab-content" nav-view="active" nav-view-transition="ios" nav-view-direction="swap" nav-swipe=""><ion-view view-title="" hide-nav-bar="false" class="pane" state="tab.history" nav-view="active" style="opacity: 1; transform: translate3d(0%, 0px, 0px);"><ion-nav-buttons side="right" class="hide"></ion-nav-buttons><ion-content class="trade_history scroll-content ionic-scroll scroll-content-false  has-header has-tabs" scroll="false"><header><article class="left-table" onclick="change_category(0)" class="active" style=""><p class="chicangmingxi"><?php echo htmlentities(app('lang')->get('order_hold')); ?></p></article><article class="right-table" onclick="change_category(1)"><p class="lishimingxi"><?php echo htmlentities(app('lang')->get('order_history')); ?></p></article></header><div class="trade_history_list slider" style="visibility: visible;overflow:scroll;background: #f3f3f3;"><div class="slider-slides" ng-transclude=""><ion-slide class="slider-slide slider-left" data-index="0" style="width: 100%px; left: 0px; transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);"><ul></ul></ion-slide><ion-slide class="slider-slide slider-right" data-index="1" style=" left: 0px; top: -100%;transition-duration: 0ms; transform: translate(414px, 0px) translateZ(0px);"><ul class="uls"></ul></ion-slide></div><div class="modal-backdrop ng-hide"><div class="modal-backdrop-bg"></div><div class="modal-wrapper" ng-transclude=""><ion-modal-view class="order-modal modal slide-in-up ng-enter active ng-enter-active"><ion-header-bar class="order-modal-header bar bar-header"><h1 class="title lishimingxi" style="left: 54px; right: 54px;"></h1><div class="close" ng-click="close_order_modal.hide()"><i class="icon ion-ios-close-empty"></i></div></ion-header-bar><ion-content class="order-modal-content scroll-content ionic-scroll  has-header"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><ul class="list"><li class="item item-input"><span class="input-label" aria-label="商品" id="_label-0"><?php echo htmlentities(app('lang')->get('key_title')); ?></span><span class="input-content ng-binding ptitle"></span></li><li class="item item-input"><span class="input-label" aria-label="成交价" id="_label-2"><?php echo htmlentities(app('lang')->get('key_openprice')); ?></span><span class="input-content ng-binding buyprice"></span></li><li class="item item-input"><span class="input-label" aria-label="结算价" id="_label-3"><?php echo htmlentities(app('lang')->get('key_closeprice')); ?></span><span class="input-content ng-binding sellprice"></span></li><li class="item item-input"><span class="input-label" aria-label="手续费" id="_label-4"><?php echo htmlentities(app('lang')->get('key_fee')); ?></span><span class="input-content ng-binding">0</span></li><li class="item item-input"><span class="input-label" aria-label="盈亏" id="_label-5"><?php echo htmlentities(app('lang')->get('key_winloss')); ?></span><span class="input-content ng-binding rise ploss" style="">                                                                0.00
                                                            </span></li><li class="item item-input"><span class="input-label" aria-label="成交时间" id="_label-6"><?php echo htmlentities(app('lang')->get('key_opentime')); ?></span><span class="input-content ng-binding buytime"></span></li><li class="item item-input"><span class="input-label" aria-label="结算时间" id="_label-7"><?php echo htmlentities(app('lang')->get('key_closetime')); ?></span><span class="input-content ng-binding selltime"></span></li></ul></div><div class="scroll-bar scroll-bar-v"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px; transform-origin: center bottom 0px;"></div></div></ion-content><div class="button-bar"><a class="button button-dark" onclick="close_order_modal()"><?php echo htmlentities(app('lang')->get('key_ok')); ?></a></div></ion-modal-view></div></div></div></ion-content></ion-view></ion-nav-view></ion-tabs></ion-nav-view><div class="backdrop"></div><div class="ionic_toast"><div class="toast_section" ng-class="ionicToast.toastClass" ng-style="ionicToast.toastStyle" ng-click="hideToast()" style="display: none; opacity: 0;"><span class="ionic_toast_close"><i class="ion-android-close toast_close_icon"></i></span><span ng-bind-html="ionicToast.toastMessage" class="ng-binding"></span></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "hold";
				        if(nav == "index"){
				            $(".one").addClass("router-link-exact-active");
				        }
				        if(nav == "yeb"){
				            $(".three").addClass("router-link-exact-active");
				        }
				        if(nav == "hold"){
				            $(".four").addClass("router-link-exact-active");
				        }
				        if(nav == "user"){
				            $(".five").addClass("router-link-exact-active");
				        }
				        if(nav == "user"){
				            $(".fix").addClass("router-link-exact-active");
				        }
				    })
				</script></div></div></body><script type="text/javascript">var charturl = '/index/user/getchart.html';
$.get(charturl, function(_res) {
    var res = jQuery.parseJSON(Base64.decode(_res));
    $.each(res, function(k, v) {
        $('.' + k).html(v);
    })
})
</script><script type="text/javascript" src="/static/wap/js/hold.js"></script><script type="text/javascript">change_category(0)
</script></html>