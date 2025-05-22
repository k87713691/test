<?php /*a:3:{s:65:"/www/wwwroot/12.jhf67.top/application/index/view/index/goods.html";i:1716239866;s:67:"/www/wwwroot/12.jhf67.top/application/index/view/public/header.html";i:1737689979;s:67:"/www/wwwroot/12.jhf67.top/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>1��际黄金</title><style type="text/css">
        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><style type="text/css">
    html{
        font-size: 120px;
    }
</style><script type="text/javascript">
window.onload=function(){
    //设置适配rem
    var change_rem = ((window.screen.width > 450) ? 450 : window.screen.width)/375*100;
    document.getElementsByTagName("html")[0].style.fontSize=change_rem+"px";
    window.onresize = function(){
        change_rem = ((window.screen.width > 450) ? 450 : window.screen.width)/375*100;
        document.getElementsByTagName("html")[0].style.fontSize=change_rem+"px";
    }
}
</script><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript" src="/static/wap/js/function.js"></script><script type="text/javascript" src="/static/wap/js/base64.js"></script><script type="text/javascript">
  var Base64 = new Base64();
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

    .l_chartDataNav {
        width: 100%;
        height: 1.2rem;
        background: #ff3d3d;
        color: #fff;
        overflow: hidden;
        /*margin-top: 1.2rem;*/
        position: relative
    }
    .l_chartDataNav .l_chartDataNavR {
        width: 60%;
        height: 100%;
        float: left
    }

    .l_chartDataNav .l_chartDataNavR ul {
        width: 100%;
        height: 100%
    }

    .l_chartDataNav .l_chartDataNavR ul li {
        width: 50%;
        height: 50%;
        float: left;
        text-align: center;
        line-height: .6rem;
        font-size: .35rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }
    .l_chartDataNav {
        width: 100%;
        height: 0.48rem;
        background: #ff3d3d;
        color: #fff;
        overflow: hidden;
        /*margin-top: 1.2rem;*/
        position: relative
    }

    .l_chartDataNav .l_chartDataNavL {
        width: 40%;
        height: 100%;
        float: left;
        text-align: center;
        line-height:0.48rem;
        font-size: .26rem
    }

    .l_chartDataNav .l_chartDataNavR {
        width: 60%;
        height: 100%;
        float: left
    }

    .l_chartDataNav .l_chartDataNavR ul {
        width: 100%;
        height: 100%
    }

    .l_chartDataNav .l_chartDataNavR ul li {
        width: 50%;
        height: 50%;
        float: left;
        text-align: center;
        line-height: .25rem;
        font-size: .14rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }

    .l_chart {
        width: 100%;
        height: 8rem;
        background: url("/public/jpg/xtx/shijieditu.png") no-repeat;
        background-size: 100% 100%;
        position: relative;
        padding-right: .333333rem
    }
    .l_chart .l_spot {
        background: red;
        left: 1.333333rem
    }

    .l_chart .l_spot, .l_chart .l_spot span {
        position: absolute;
        width: .133333rem;
        height: .133333rem;
        top: 0;
        border-radius: 50%
    }

    .l_chart .l_spot span {
        left: 0
    }

    .l_chart .l_spot .l_bigSpot {
        width: .133333rem;
        height: .133333rem;
        background: rgba(240, 101, 105, .8);
        animation: big 1.5s infinite
    }

    .l_chart .l_spot .l_centerSpot {
        width: .2rem;
        height: .2rem;
        left: -.026rem;
        top: -.0288rem;
        background: #fff
    }

    .l_chart .l_spot .l_smallSpot {
        background: #ef4b4f
    }

    .l_chart .l_showKlineVal {
        display: none;
        width: 100%;
        height: .026667rem;
        position: absolute
    }

    .l_chart .l_showKlineVal div {
        width: 2rem;
        height: .666667rem;
        position: absolute;
        left: 50%;
        top: -.333333rem;
        margin-left: -1rem;
        text-align: center;
        line-height: .666667rem;
        color: #fff;
        border-radius: .133333rem
    }
    canvas{
        height:452px !important;
    }
    .headerbar {
	    border: none !important;
	    height: 40px;
	    line-height: 40px;
	    background-color: white !important;
	    padding: 0;
	}
    .headerbar .header-item {
	    height: 40px;
	    line-height: 40px;
	    color: black !important;
	    font-size: 15px;
	    font-weight: 600;
	}
	.trade-content nav {
	    height: 0.4rem;
	    background: #ffffff;
	    display: flex;
	    width: 100%;
	    padding: 0 2%;
	    border-top: 1px solid lightgray;
	    border-bottom: 1px solid lightgray;
	}
	.trade-view .trade_bar {
	    bottom: 55px !important;
	}
	#container>.txt2 {
	    position: absolute;
	    left: 13px;
	    top: 395px;
	}
	.trade-content nav article {
	    padding: 0 0.02rem;
	    flex: 2;
	    height: 0.3rem;
	    display: flex;
	    border-radius: 0.1rem;
	    background: #525256;
	    color: white;
	    margin-top: 0.05rem;
	}
	.trade-content nav article span.active {
	    color: #ff003b;
	    background: #ffffff;
	    border-radius: 0.1rem;
	    box-shadow: 0 0 2px #3e3c42;
	}
	.trade-content nav section.active {
	    color: #525256;
	    font-weight: bold;
	    border-bottom: 5px solid #525256;
	    box-shadow: 0px 0px 2px 2px;
	    border-radius: 20px;
        height: 0.26rem;
	    line-height: 0.26rem;
	    margin-top: 0.068rem;
	}
	#container>.txt1>span.e {
	    color: #ff5382;
	}

</style><script>
    var order_type = 0;
    var order_pid = <?php echo htmlentities($info['id']); ?>;
    var order_price = <?php echo htmlentities($order_price[0]); ?>;
    var order_sen = <?php echo htmlentities($info['protime_1'] * 60); ?>;
    var order_shouyi = <?php echo htmlentities($info['proscale_1']); ?>;
    var order_kuishun = <?php echo htmlentities($info['lossrate_1']); ?>;
    var newprice = <?php echo htmlentities($info['Price']); ?>;  //实时价格
    var rawData_data = [];
    var my_money = <?php echo htmlentities($user['money']); ?>;
    var order_min_price = <?php echo getinfo('order_min'); ?>;
    var order_max_price = <?php echo getinfo('order_max'); ?>;
</script><div id="app"><div class="box"><ion-nav-bar class="bar-stable headerbar nav-bar-container" nav-bar-transition="ios" nav-bar-direction="exit" nav-swipe=""><div class="nav-bar-block" nav-bar="active"><ion-header-bar class="bar-stable headerbar bar bar-header" align-title="center"><div class="buttons buttons-left" style="transition-duration: 0ms;"><span class="left-buttons"><a href="index/index/home" class="back-button" style="transition-duration: 0ms;"><img src="/static/wap/images/icon_back.png" alt=""  style="width: 10px;height: 15px;"></a></span></div><div class="title title-center header-item goodstitle" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); left: 48px; right: 48px;font-size:18px;"><?php echo htmlentities($info['title']); ?></div></ion-header-bar></div></ion-nav-bar><ion-nav-view class="view-container" nav-view-transition="ios" nav-view-direction="exit" nav-swipe=""><ion-view class="trade-view pane" hide-nav-bar="false" state="trade" nav-view="active" style="opacity: 1; transform: translate3d(0%, 0px, 0px);"><ion-content class="trade-content content-background scroll-content ionic-scroll  has-header" scroll="true"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><div class="l_chartDataNav" style="background:#000"><div class="l_chartDataNavL" id="jk"><?php echo htmlentities($info['Price']); ?></div><div class="l_chartDataNavR"><ul><li><?php echo htmlentities(app('lang')->get('key_open')); ?>：<?php echo htmlentities($info['Open']); ?></li><li style="color:#ff3d3d;"><?php echo htmlentities(app('lang')->get('key_high')); ?>：<?php echo htmlentities($info['High']); ?></li><li><?php echo htmlentities(app('lang')->get('key_close')); ?>：<?php echo htmlentities($info['Close']); ?></li><li style="color:#26a848;"><?php echo htmlentities(app('lang')->get('key_low')); ?>：<?php echo htmlentities($info['Low']); ?></li></ul></div><div class="l_NoviceStepBox step4"></div><div class="l_NoviceStepBox step5"></div><div class="l_NoviceStepBox step6"></div><div class="l_NoviceStepBox step7"></div><div class="l_NoviceStepBox step8"></div></div><nav><article><span class="trade-chart-type stock active Kxian" onclick="change_chart_type('stock')"><?php echo htmlentities(app('lang')->get('market_kline_kline')); ?></span><span class="trade-chart-type line zoushi" onclick="change_chart_type('line')"><?php echo htmlentities(app('lang')->get('market_kline_line')); ?></span></article><section class="trade-chart-period 1M active" onclick="change_chart_period('1M')">1M</section><section class="trade-chart-period 5M" onclick="change_chart_period('5M')">5M</section><section class="trade-chart-period 15M" onclick="change_chart_period('15M')">15M</section><section class="trade-chart-period 30M" onclick="change_chart_period('30M')">30M</section><section class="trade-chart-period 1H" onclick="change_chart_period('1H')">1H</section><section class="trade-chart-period 1D" onclick="change_chart_period('1D')">1D</section></nav><footer><div id="container" style="background: #ffffff;"><div id="ecKx" style="width:551px;height:600px;"></div><div class="txt1" style="color: gray;">Time:<span class="a" style="color: gray;"></span><span class="b"></span><span class="c"></span><span class="d"></span><span class="e"></span></div><div class="txt2" style="color: gray;">DIFF:<span class="a DIFF" style="color: gray;"><i></i></span>DEA:<span class="b DEA"><i></i></span>MACD:<span class="c MACD"><i></i></span></div></div></footer></div><div class="scroll-bar scroll-bar-v"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px;"></div></div></ion-content><div class="trade_bar" style="justify-content:space-between;width:95%;margin:0 auto;right:0px;"><section onclick="toggle_order_confirm_panel('lookup')" class="" style="flex-basis:48% !important;color:#fff;background: #ff3d3d;border-radius:0.1rem;"><i class="iconfont icon--18"></i><p class="maizhang"><?php echo htmlentities(app('lang')->get('key_buy')); ?></p></section><section onclick="toggle_order_confirm_panel('lookdown')" class="" style="flex-basis:48% !important;color:#fff;background: #26a848;border-radius:0.1rem;"><i class="iconfont icon--17"></i><p class="maidie"><?php echo htmlentities(app('lang')->get('key_sell')); ?></p></section></div><!--ngInclude: 'templates/order-confirm-panel.html' --><div ng-include="'templates/order-confirm-panel.html'" class=""><div class="pro_mengban "><div class="order-confirm-panel"><div class="panel-header"><div><?php echo htmlentities(app('lang')->get('market_do_title')); ?><div class="close" onclick="toggle_order_close_panel()"><i class="icon ion-ios-close-empty close_tag"></i></div></div></div><div class="panel-body"><div class="period" style="height:auto"><p class="end_time"><?php echo htmlentities(app('lang')->get('market_do_seconds')); ?></p><ion-scroll direction="x" class="scroll-view ionic-scroll scroll-x" style="height:auto"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><div class="period-widget-view"><?php if($info['protime_1'] > 0): ?><div class="period-widget active" data-sen="<?php echo htmlentities($info['protime_1']*60); ?>" data-shouyi="<?php echo htmlentities($info['proscale_1']); ?>" data-kuishun="<?php echo htmlentities($info['lossrate_1']); ?>" style="height:auto"><div class="period-widget-header"><?php echo htmlentities(app('lang')->get('market_do_seconds')); ?></div><div class="period-widget-content"><span class="final_time ng-binding"><?php echo htmlentities($info['protime_1']*60); ?></span><span class="final_unit"><?php echo htmlentities(app('lang')->get('key_second')); ?></span></div><?php if($info['showps']==1 or $info['showps2']==1): ?><div class="period-widget-footer period_footer ng-binding" style="font-size:12px;height:auto"><?php if($info['showps']==1): ?><?php echo htmlentities(app('lang')->get('key_win')); ?>：<?php echo htmlentities($info['proscale_1']); ?>%<br><?php endif; if($info['showps2']==1): ?><?php echo htmlentities(app('lang')->get('key_loss')); ?>：-<?php echo htmlentities($info['lossrate_1']); ?>%<?php endif; ?></div><?php endif; ?></div><?php endif; if($info['protime_2'] > 0): ?><div class="period-widget" data-sen="<?php echo htmlentities($info['protime_2']*60); ?>" data-shouyi="<?php echo htmlentities($info['proscale_2']); ?>" data-kuishun="<?php echo htmlentities($info['lossrate_2']); ?>" style="height:auto"><div class="period-widget-header"><?php echo htmlentities(app('lang')->get('market_do_seconds')); ?></div><div class="period-widget-content"><span class="final_time ng-binding"><?php echo htmlentities($info['protime_2']*60); ?></span><span class="final_unit"><?php echo htmlentities(app('lang')->get('key_second')); ?></span></div><?php if($info['showps']==1 or $info['showps2']==1): ?><div class="period-widget-footer period_footer ng-binding" style="font-size:12px;height:auto"><?php if($info['showps']==1): ?><?php echo htmlentities(app('lang')->get('key_win')); ?>：<?php echo htmlentities($info['proscale_2']); ?>%<br><?php endif; if($info['showps2']==1): ?><?php echo htmlentities(app('lang')->get('key_loss')); ?>：-<?php echo htmlentities($info['lossrate_2']); ?>%<?php endif; ?></div><?php endif; ?></div><?php endif; if($info['protime_3'] > 0): ?><div class="period-widget" data-sen="<?php echo htmlentities($info['protime_3']*60); ?>" data-shouyi="<?php echo htmlentities($info['proscale_3']); ?>" data-kuishun="<?php echo htmlentities($info['lossrate_3']); ?>" style="height:auto"><div class="period-widget-header" ><?php echo htmlentities(app('lang')->get('market_do_seconds')); ?></div><div class="period-widget-content"><span class="final_time ng-binding"><?php echo htmlentities($info['protime_3']*60); ?></span><span class="final_unit"><?php echo htmlentities(app('lang')->get('key_second')); ?></span></div><?php if($info['showps']==1 or $info['showps2']==1): ?><div class="period-widget-footer period_footer ng-binding" style="font-size:12px;height:auto"><?php if($info['showps']==1): ?><?php echo htmlentities(app('lang')->get('key_win')); ?>：<?php echo htmlentities($info['proscale_3']); ?>%<br><?php endif; if($info['showps2']==1): ?><?php echo htmlentities(app('lang')->get('key_loss')); ?>：-<?php echo htmlentities($info['lossrate_3']); ?>%<?php endif; ?></div><?php endif; ?></div><?php endif; if($info['protime_4'] > 0): ?><div class="period-widget" data-sen="<?php echo htmlentities($info['protime_4']*60); ?>" data-shouyi="<?php echo htmlentities($info['proscale_4']); ?>" data-kuishun="<?php echo htmlentities($info['lossrate_4']); ?>" style="height:auto"><div class="period-widget-header"><?php echo htmlentities(app('lang')->get('market_do_seconds')); ?></div><div class="period-widget-content"><span class="final_time ng-binding"><?php echo htmlentities($info['protime_4']*60); ?></span><span class="final_unit"><?php echo htmlentities(app('lang')->get('key_second')); ?></span></div><?php if($info['showps']==1 or $info['showps2']==1): ?><div class="period-widget-footer period_footer ng-binding" style="font-size:12px;height:auto"><?php if($info['showps']==1): ?><?php echo htmlentities(app('lang')->get('key_win')); ?>：<?php echo htmlentities($info['proscale_4']); ?>%<br><?php endif; if($info['showps2']==1): ?><?php echo htmlentities(app('lang')->get('key_loss')); ?>：-<?php echo htmlentities($info['lossrate_4']); ?>%<?php endif; ?></div><?php endif; ?></div><?php endif; ?></div></div><div class="scroll-bar scroll-bar-h"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleX(1); width: 289px;"></div></div></ion-scroll></div><div class="amount"><p class="invest_account tousijine"><span class=" ng-hide  no-money"><?php echo htmlentities(app('lang')->get('tips_moneynotenough')); ?></span><span class="ng-hide no-max"><?php echo htmlentities(app('lang')->get('tips_maxmoney')); ?><?php echo getinfo('order_max'); ?></span><span class="ng-hide no-min"><?php echo htmlentities(app('lang')->get('tips_minmoney')); ?><?php echo getinfo('order_min'); ?></span></p><ion-scroll direction="x" class="scroll-view ionic-scroll scroll-x"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><div class="amount-view"><div class="amount-box ng-binding" data-price="<?php echo htmlentities($user['money']); ?>">
                                                    全部金额 </div><?php if(is_array($order_price) || $order_price instanceof \think\Collection || $order_price instanceof \think\Paginator): $i = 0; $__LIST__ = $order_price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="amount-box ng-binding" data-price="<?php echo htmlentities($vo); ?>">
                                                    ￥<?php echo htmlentities($vo); ?></div><?php endforeach; endif; else: echo "" ;endif; ?><!--<div class="amount-box ng-binding" data-price="<?php echo htmlentities($user['money']); ?>">--><!--    全部金额 </div>--></div></div><div class="scroll-bar scroll-bar-h"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleX(1); width: 192px;"></div></div></ion-scroll><label class="other-amount"><input type="number" placeholder="<?php echo htmlentities(app('lang')->get('market_do_money_2')); ?>" ng-init="onfocus=false" ng-focus="onfocus==true" ng-model="order_params.other_amount" ng-keydown="min_money()" class="ng-pristine ng-untouched ng-valid ng-empty"></label></div><div class="info-view"><div class="ng-binding my-money"><?php echo htmlentities(app('lang')->get('key_balance')); ?>: <?php echo htmlentities(app('lang')->get('key_dollars')); ?><span class="pay_mymoney"><?php echo htmlentities($user['money']); ?></span></div><div class="ng-binding"><?php echo htmlentities(app('lang')->get('market_do_fee')); ?>：<span><?php echo getinfo('order_charge'); ?></span>%</div></div><div class="order-detail-view"><div class="order-detail"><div class="row fields"><div class="col"><?php echo htmlentities(app('lang')->get('key_symbol')); ?></div><div class="col"><?php echo htmlentities(app('lang')->get('market_do_direction')); ?></div><div class="col"><?php echo htmlentities(app('lang')->get('market_do_price')); ?></div><div class="col"><?php echo htmlentities(app('lang')->get('market_do_money')); ?></div></div><div class="row"><div class="col qoute_name ng-binding goodstitle"><?php echo htmlentities($info['title']); ?></div><div class="col ng-binding order_type"><?php echo htmlentities(app('lang')->get('key_sell')); ?></div><div class="col ng-binding rise col-nowprice"><?php echo htmlentities($info['Price']); ?></div><div class="col ng-binding" id="money"></div></div><div class="row btn_confirm"><div class="col"><button class="button" onclick="addorder()"><?php echo htmlentities(app('lang')->get('market_do_confirm')); ?></button></div></div><p class="expect_profit"><span class="ng-binding"><?php echo htmlentities(app('lang')->get('market_do_bewin')); ?> : <?php echo htmlentities(app('lang')->get('key_dollars')); ?><span id="yuqi"></span></span>
                                            &nbsp;&nbsp;
                                            <span class="ng-binding"><?php echo htmlentities(app('lang')->get('market_do_bewin')); ?> : <?php echo htmlentities(app('lang')->get('key_dollars')); ?> 0.00</span></p></div></div></div></div></div></div><!-- ngInclude: 'templates/order-state-panel.html' --><div class="order_mengban" id="div2" style="width:100%;height:100%;" onclick="close_order()" style="display: none;"><div><div><div class="order-state-panel"  style="display: none;" ><div class="panel-header"><div class="close" onclick="close_order()"><i class=" icon ion-ios-close-empty"></i></div></div><div class="panel-body"><div class="paysuccess  ng-hide" ng-show="order_result.status == 'SUCCESS'"><div class="circle_wrapper" ng-show="order_params.cycle.time.indexOf('-') == -1"><div class="right_circle"><img class="img_circle_right" style="-webkit-animation: run 60s linear;" src="/static/wap/images/right_circle1.png"></div><div class="left_circle"><img class="img_circle_lift" style="-webkit-animation: runaway 60s linear;" src="/static/wap/images/left_circle1.png"></div></div><div class="row remaining count_remaining" ng-show="order_params.cycle.time.indexOf('-') == -1"><div class="col"><div class="ng-binding pay_order_sen"></div><div><?php echo htmlentities(app('lang')->get('market_do_price')); ?></div><div class="ng-binding newprice"><?php echo htmlentities($info['Price']); ?></div></div></div><div class="pupil_success ng-hide" ng-show="order_params.cycle.time.indexOf('-') >= 0"><p><?php echo htmlentities(app('lang')->get('market_do_waiting')); ?></p><p class="ng-binding"><span><?php echo htmlentities(app('lang')->get('market_time_remain')); ?>：</span></p></div><div class="row info_list"><div class="col col-15 first_info"><p><?php echo htmlentities(app('lang')->get('market_do_direction')); ?></p><p class="ng-binding pay_order_type"></p></div><div class="col col-30"><p><?php echo htmlentities(app('lang')->get('market_do_money')); ?></p><p class="ng-binding"><?php echo htmlentities(app('lang')->get('key_dollars')); ?><span class="pay_order_price"></span></p></div><div class="col col-30"><p><?php echo htmlentities(app('lang')->get('market_do_price_now')); ?></p><p class="ng-binding pay_order_buypricee"></p></div><div class="col col-25 last_info"><p><?php echo htmlentities(app('lang')->get('market_do_won')); ?></p><p class="ng-binding yuce"></p></div></div></div><div class="wait" ng-show="order_result.status == 'POST'"><div class="row"><div class="col ng-binding"><i class="ion-paper-airplane"></i></div></div></div><div class="fail ng-hide" ng-show="order_result.status == 'FAIL'"><div class="row"><div class="col ng-binding"><i class="ion-close-circled"></i></div></div></div><div class="fail ng-hide order_fail" ng-show="order_result.status == 'FAIL'" style=""><div class="row"><div class="col ng-binding"><i class="ion-close-circled"></i><span class="fail-info" style="    font-size: 18px;color: #fff;"></span></div></div></div><div class="ordersuccess ng-hide" style="" onclick="close_order()" style="display: none;"><div class="row remaining finish_remaining"><div class="col"><div class="result_profit ng-binding " style=""></div><div class="expired_statements"><?php echo htmlentities(app('lang')->get('market_do_result')); ?></div></div></div><div class="row info_list"><div class="col col-15 first_info"><p><?php echo htmlentities(app('lang')->get('market_do_direction')); ?></p><p class="ng-binding pay_order_type"></p></div><div class="col col-30"><p><?php echo htmlentities(app('lang')->get('market_do_money')); ?></p><p class="ng-binding"><?php echo htmlentities(app('lang')->get('key_dollars')); ?><span class="pay_order_price"></span></p></div><div class="col col-30"><p><?php echo htmlentities(app('lang')->get('market_do_price_now')); ?></p><p class="ng-binding pay_order_buypricee"></p></div><div class="col col-25 last_info"><p><?php echo htmlentities(app('lang')->get('market_do_price_deal')); ?></p><p class="ng-binding rise endprice" style=""></p></div></div></div><div class="row button_row"><div class="col"><!--button class="button" onclick="toggle_order_close_panel()"><?php echo htmlentities(app('lang')->get('market_do_next')); ?></button--><button class="button" onclick="window.location.reload()"><?php echo htmlentities(app('lang')->get('market_do_next')); ?></button></div></div></div></div></div></div></div><!-- ngInclude: 'templates/history-order-panel.html' --><div class=""><div class="history-panel" ng-include="1"><div class="panel-header chicangmingxi"><div class="close" onclick="toggle_history_order_panel()"><i class="icon ion-ios-close-empty"></i></div></div><div class="trade_history_list"><ion-scroll style="height: 100%" class="scroll-view ionic-scroll scroll-y"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><ul></ul><!-- ngIf: has_more_order --></div><div class="scroll-bar scroll-bar-v"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px;"></div></div></ion-scroll></div></div></div></ion-view></ion-nav-view><div class="backdrop"></div><div class="ionic_toast"><div class="toast_section" ng-class="ionicToast.toastClass" ng-style="ionicToast.toastStyle" ng-click="hideToast()" style="display: none; opacity: 0;"><span class="ionic_toast_close"><i class="ion-android-close toast_close_icon"></i></span><span ng-bind-html="ionicToast.toastMessage" class="ng-binding"></span></div></div><div class="click-block click-block-hide"></div><div class="modal-backdrop hide"><div class="modal-backdrop-bg"></div><div class="modal-wrapper" ng-transclude=""><ion-modal-view class="order-modal modal slide-in-up ng-leave ng-leave-active"><ion-header-bar class="order-modal-header bar bar-header"><h1 class="title" style="left: 54px; right: 54px;"><?php echo htmlentities(app('lang')->get('order_history')); ?></h1><div class="close" ng-click="capital_history_modal_hide()"><i class="icon ion-ios-arrow-left"></i></div></ion-header-bar><ion-content class="person_money_list scroll-content ionic-scroll  has-header"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><ion-scroll style="height:100%" class="scroll-view ionic-scroll scroll-y"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);"><ul></ul></div><div class="scroll-bar scroll-bar-v"><div class="scroll-bar-indicator scroll-bar-fade-out" style="height: 0px; transform: translate3d(0px, 0px, 0px) scaleY(1); transform-origin: center bottom 0px;"></div></div></ion-scroll></div><div class="scroll-bar scroll-bar-v"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px;"></div></div></ion-content><div class="button-bar"><a class="button button-dark" ng-click="capital_history_modal_hide()"><?php echo htmlentities(app('lang')->get('key_ok')); ?></a></div></ion-modal-view></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "index";
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
				</script></div></div></body><script type="text/javascript" src="/static/wap/js/order.js"></script><script type="text/javascript" src="/static/theme/index/js/layer.js"></script><script type="text/javascript" src="/static/wap/js/lodash.min.js"></script><script type="text/javascript" src="/static/wap/js/chardata.js"></script><script type="text/javascript" src="/static/wap/js/echarts.js"></script><script type="text/javascript" src="/static/wap/js/m.js"></script><script>
    setInterval('getdata(<?php echo htmlentities($info['id']); ?>)', 5000);
    setInterval("window.location.reload();", 5000 * 60 * 5);
    $('.amount-box').eq(0).click();
</script><script>
    var flag = false;
    var cur = {
        x: 0,
        y: 0
    }
    var nx, ny, dx, dy, x, y;

    function down() {
        flag = true;
        var touch;
        if (event.touches) {
            touch = event.touches[0];
        } else {
            touch = event;
        }
        cur.x = touch.clientX;
        cur.y = touch.clientY;
        dx = div2.offsetLeft;
        dy = div2.offsetTop;
    }

    function move() {

        if (flag) {
            var touch;
            if (event.touches) {
                touch = event.touches[0];
            } else {
                touch = event;
            }
            nx = touch.clientX - cur.x;
            ny = touch.clientY - cur.y;
            x = dx + nx;
            y = dy + ny;
            div2.style.left = x + "px";
            div2.style.top = y + "px";
            //阻止页面的滑动默认事件
            document.addEventListener("touchmove", function() {
                event.preventDefault();
            }, false);
        }
    }
    //鼠标释放时候的函数
    function end() {
        flag = false;
    }
    var div2 = document.getElementById("div2");
    div2.addEventListener("mousedown", function() {
        down();
    }, false);
    div2.addEventListener("touchstart", function() {
        down();
    }, false)
    div2.addEventListener("mousemove", function() {
        move();
    }, false);
    div2.addEventListener("touchmove", function() {
        move();
    }, false)
    document.body.addEventListener("mouseup", function() {
        end();
    }, false);
    div2.addEventListener("touchend", function() {
        end();
    }, false);
</script></body></html>