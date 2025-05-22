<?php /*a:3:{s:70:"/www/wwwroot/x.yc66453.cn/application/index/view/user/set_account.html";i:1716147656;s:67:"/www/wwwroot/x.yc66453.cn/application/index/view/public/header.html";i:1623358146;s:67:"/www/wwwroot/x.yc66453.cn/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>账户安全</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><style>
	body{
		background: #e4e4e4;
	}
	.f_box_bank .t_header {
	    height: 1.2rem;
        background-color: #269efd9e;
	    display: flex;
	    flex-direction: row;
	    position: relative;
	}
	.t_header span:last-child i {
	    font-size: .48rem;
	    position: absolute;
	    left: 46%;
	    top: 50%;
	    transform: translate(-50%, -50%);
	    color: black;
	}
	.f_box_bank .f_content ul li {
	    height: 1.333333rem;
	    line-height: 1.333333rem;
	    padding-left: 1.066666rem;
	    text-align: left;
	    background: #e4e4e4;
	    /*border-bottom: .026667rem solid #d4d4d4;*/
	    position: relative;
	    color: #ff0000;
	    border-bottom: 0.026667rem solid #000;
	}
	
</style><div id="app"><div class="box"><div class="jun-content"><div class="f_box_bank"><div class="t_header"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span><i>账户安全</i></span></div><div class="f_content"><ul class="list"><li class="item"><span>用户名</span><span class="right" style="color:#f90303;"><?php echo htmlentities($user['phone']); ?></span></li><li class="item" onclick="window.location.href='/index/user/pwd_login'"><a href="/index/user/pwd_login"><span>修改登录密码</span><i class="iconfont icon-arrow-right"></i></a></li><li class="item" onclick="window.location.href='/index/user/pwd_pay'"><a href="/index/user/pwd_pay"><span>修改提现密码</span><i class="iconfont icon-arrow-right"></i></a></li><!--<li class="item" onclick="window.location.href='/index/user/pwd_pay'">--><!--    <a href="/index/user/pwd_pay">--><!--        <span>修改支付密码</span>--><!--        <i class="iconfont icon-arrow-right"></i>--><!--    </a>--><!--</li>--></ul></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "user";
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
				</script></div></div></body></html>