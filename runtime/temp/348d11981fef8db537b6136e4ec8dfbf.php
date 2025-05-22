<?php /*a:3:{s:63:"/www/wwwroot/gxzqht.top/application/index/view/user/wallet.html";i:1716125483;s:65:"/www/wwwroot/gxzqht.top/application/index/view/public/header.html";i:1623340146;s:65:"/www/wwwroot/gxzqht.top/application/index/view/public/footer.html";i:1687681818;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>首页</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/theme/index/css/mine.css"/><link rel="stylesheet" type="text/css" href="/static/theme/index/css/swiper.min.css"><!--<link rel="stylesheet" type="text/css" href="/static/theme/index/css/footer.css"/>--><script type="text/javascript" src="/static/theme/index/js/jquery.js"></script><script type="text/javascript" src="/static/theme/index/js/font.js"></script><script type="text/javascript" src="/static/theme/index/js/public.js"></script></head><style type="text/css">
    .bar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
        height: 45px;
        color: #fff;
        background: linear-gradient(to right, #3476fe, #34c7fe) !important;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    #alltit {
        position: absolute;
        z-index: 19;
        width: 100%;
        text-align: center;
        display: inline-block;
        line-height: 45px;
        font-size: 16px;
        color: #fff;
    }
    .page, .page-group {
        box-sizing: border-box;
	    margin: 0 auto;
	    overflow: hidden;
	    background: linear-gradient(56deg, #59acf1, #34a2fe);
	        height: 100%;
    }
    #main_content {
        padding-bottom: 1rem;
        width: 100%;
        margin: 0 auto;
    }
    img {
        vertical-align: middle;
    }
    .contentlist {
        overflow: hidden;
        width: 94%;
        margin: 150px auto;
    }
    .contentlist li {
        background-color: #fff;
        width: 49%;
        float: left;
        padding: 0.4rem 0;
        border-radius: 0.2rem;
        position: relative;
        margin-bottom: 0.2rem;
    }
    .contentlist li img {
        position: absolute;
        width: 28px;
        right: 0.22rem;
        top: 0.3rem;
    }
    .contentlist li .text1 {
        margin-left: .3rem;
        color: #000000;
        display: block;
        font-size: 14px;
    }
    .contentlist li .text2 {
        color: #000000;
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-top: 0.2rem;
        margin-left: .3rem;
    }
</style><body><header class="bar bar-nav"><a id="alltit"><?php echo htmlentities(app('lang')->get('assets_title')); ?></a></header><div class="page"><div class="content" id="main_content" style="background: white;"><div style="width: 100%;height: 2rem;background: linear-gradient(to right, #fdfdfd, #fdfdfd) !important;border-radius: 5px;"></div><div style="width:94%;margin: 0 3%;background:url('/static/theme/index/img/panbg.png') no-repeat center center;background-size: 100% 100%;height: 150px;position:absolute;top: 1.1rem;padding-top: 0.6rem;"><div style="font-size: 16px;color: #fff;margin-left: 0.4rem"><?php echo htmlentities(app('lang')->get('key_total_balance')); ?><img class="ybtn cur" src="/static/theme/index/img/yopen.png" style="width: 20px;margin-top:-0.05rem;margin-left: 0.1rem" alt=""></div><div style="font-size: 20px;color: #fff;margin-left: 0.3rem;margin-top:0.1rem;">
                CNY:<?php echo htmlentities($user['money']); ?></div><div style="width: 100%;overflow:hidden;position:absolute; 0.36rem"><a href="/index/user/recharge"><div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;border-right: 1px solid #fff"><img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/czico.png" alt=""><?php echo htmlentities(app('lang')->get('key_recharge')); ?></div></a><a href="/index/user/cash"><div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;border-right:"><img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/txico.png" alt=""><?php echo htmlentities(app('lang')->get('key_withdraw')); ?></div><!--     </a><a href="/index/user/recharge_record"><div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;border-right: 1px solid #fff"><img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/txico.png" alt="">加仓记录</div></a><a href="/index/user/cash_record"><div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;"><img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/txico.png" alt="">取款记录</div> --></a></div></div><style>
        	.contentlist li {
			    background-color: #fff;
			    width: 100%;
			    float: left;
			    padding: 0.4rem 0;
			    border-radius: 0.2rem;
			    position: relative;
			    margin-bottom: 0.2rem;
			}
        </style><ul class="contentlist"><!--     <li style="margin-right: 1%;">--><img src="https://cdn.pixabay.com/animation/2023/03/10/13/25/13-25-13-552_512.gif" alt=""><!--       <span class="text1">现金钱包</span><div><span class="text2" style="float:left">￥0.00</span><span class="text2" style="float:right;margin-right:10px"> =￥0.00</span></div></li>--></ul></div></div><!--<div class="page">--><!--    <div class="content" id="main_content">--><!--        <div style="width: 100%;height: 2rem;background: linear-gradient(to right, #3476FE, #34C7FE) !important;border-radius: 5px;">--><!--        </div>--><!--        <div style="width:94%;margin: 0 3%;background:url('/static/theme/index/img/panbg.png') no-repeat center center;background-size: 100% 100%;height: 150px;position:absolute;top: 1.1rem;padding-top: 0.6rem;">--><!--            <div style="font-size: 16px;color: #fff;margin-left: 0.4rem"><?php echo htmlentities(app('lang')->get('key_total_balance')); ?><img class="ybtn cur" src="/static/theme/index/img/yopen.png" style="width: 20px;margin-top:-0.05rem;margin-left: 0.1rem" alt=""></div>--><!--            <div style="font-size: 28px;color: #fff;margin-left: 0.4rem;margin-top:0.1rem;">--><!--                <?php echo htmlentities($user['money']); ?></div>--><!--            <div style="width: 200%;overflow:hidden;position:absolute;bottom: 0.36rem">--><!--                <a href="/index/user/recharge">--><!--                    <div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;border-right: 1px solid #fff">--><!--                        <img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/czico.png" alt=""><?php echo htmlentities(app('lang')->get('key_recharge')); ?></div>--><!--                </a>--><!--                <a href="/index/user/cash">--><!--                    <div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;/*border-right: 1px solid #fff">--><!--                        <img style="width: 25px;margin-top:-0.05rem;margin-right:0rem" src="/static/theme/index/img/txico.png" alt=""><?php echo htmlentities(app('lang')->get('key_withdraw')); ?></div>--><!--                </a>--><!--            </div>--><!--        </div>--><!--a href="/index/user/exchange"><!--                    <div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;border-right: 1px solid #fff">--><!--                        <img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/txico.png" alt=""><?php echo htmlentities(app('lang')->get('key_exchange')); ?></div>--><!--                </a>--><!--                <a href="javascript:msg('<?php echo htmlentities(app('lang')->get('key_tips')); ?>','<?php echo htmlentities(app('lang')->get('key_developing')); ?>',1,'#');">--><!--                    <div style="display:inline-block;width: 24.5%;text-align:center;font-size: 14px;color: #fff;">--><!--                        <img style="width: 25px;margin-top:-0.05rem;margin-right:0.1rem" src="/static/theme/index/img/txico.png" alt=""><?php echo htmlentities($duihuobi); ?></div>--><!--                </a-->--><!--        <style>--><!--        	.contentlist li {--><!--			    background-color: #fff;--><!--			    width: 100%;--><!--			    float: left;--><!--			    padding: 0.4rem 0;--><!--			    border-radius: 0.2rem;--><!--			    position: relative;--><!--			    margin-bottom: 0.2rem;--><!--			}--><!--        </style>--><!--        <ul class="contentlist">--><!--            <li style="margin-right: 1%;">--><!--                <img src="/static/theme/index/img/listico3.png" alt="">--><!--                <span class="text1"><?php echo htmlentities(app('lang')->get('assets_cash_package')); ?></span>--><!--                <div><span class="text2" style="float:left"><?php echo htmlentities($lcinfoa); ?><?php echo htmlentities($duihuobi); ?></span><span class="text2" style="float:right;margin-right:10px"> = <?php echo htmlentities($user['money']); ?> RMB</span></div>--><!--            </li>--><!--            <?php foreach($userwallets as $x): ?>--><!--            <li style="margin-right: 1%;">--><!--                <img src="/static/theme/index/img/listico3.png" alt="">--><!--                <span class="text1"><?php echo htmlentities($x['title']); ?>-<?php echo htmlentities(app('lang')->get('key_package')); ?></span>--><!--                <div><span class="text2" style="float:left"><?php echo htmlentities($x['balance']); ?></span><span class="text2" style="float:right;margin-right:10px"> =<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($x['rmbval']); ?></span></div>--><!--            </li>--><!--            <?php endforeach; ?>--><!--        </ul>--><!--    </div>--><!--</div>--><style>
	.footer div{
		display: inline-block;
	    width: 20%;
	    text-align: center;
	    height: 50px;
	    line-height: 25px;
	    
	}
	.footer img{
		width: 20px;
    	height: 20px;
    	    margin-top: 5px;
	}
	.footer span{
		color:gray;
		    font-size: 12px;
	}
</style><div class="footer" style="background-color: white;height: 50px;display: block;z-index: 100;"><div><a href="/index/index/home" class="t_span one "><img src="../../static/wap/images/market.png"><br><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/wallet" class="t_span two router-link-exact-active"><img src="../../static/wap/images/assets_active.png"><br><span style="color: rgb(58, 99, 255);"><?php echo htmlentities(app('lang')->get('key_assets')); ?></span></a></div><div><a href="/index/user/hold" class="t_span three"><img src="../../static/wap/images/trading.png"><br><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span four"><img src="../../static/wap/images/icon_my_vouchers@2x.png"><br><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span five"><img src="../../static/wap/images/user.png"><br><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><link rel="stylesheet" type="text/css" href="/static/wap/css/tipmask.css"><div class="tipMask" style="display:none"><div class="cont"><p class="title"><?php echo htmlentities(app('lang')->get('key_tips')); ?></p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi" style="background-color:#33B497;"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div></div></div></div><script>
function msg(title, content, type, url) {
	
    $(".contents").html(content);
    if (type == 1) {
        var btn = '<div class="confirm guanbi"  style="background-color:#33B497;" onclick="$(\'.tipMask\').hide();"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div>';
    }
    else {
        var btn = '<div class="confirm guanbi"  style="background-color:#33B497;" onclick="window.location.href=\'' + url + '\'"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div>';
    }
    $("#msgBtn").html(btn);
    $(".tipMask").show();
}
</script><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/wallet" class="t_span two"><i></i><span><?php echo htmlentities(app('lang')->get('key_assets')); ?></span></a></div><div><a href="/index/user/hold" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "wallet";
				        if(nav == "index"){
				            $(".one").addClass("router-link-exact-active");
				        }
				        if(nav == "wallet"){
				            $(".two").addClass("router-link-exact-active");
				        }
				        if(nav == "hold"){
				            $(".three").addClass("router-link-exact-active");
				        }
				        if(nav == "yeb"){
				            $(".four").addClass("router-link-exact-active");
				        }
				        if(nav == "user"){
				            $(".five").addClass("router-link-exact-active");
				        }
				    })
				</script></body></html>
