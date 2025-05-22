<?php /*a:3:{s:63:"/www/wwwroot/03/application/index/view/index/about_details.html";i:1732805169;s:57:"/www/wwwroot/03/application/index/view/public/header.html";i:1623358146;s:57:"/www/wwwroot/03/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>用户协议</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><style>
	body{
		background: #e4e4e4;
	}
	.t_header {
	    height: 1.2rem;
	    background-color: #ffffff!important;
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
	    border-bottom: .026667rem solid #d4d4d4;
	    position: relative;
	    color: gray;
	}
	label {
	    cursor: default;
	    color:gray;
	}
	.t_box_pay .t_con_pay {
	    flex: 1;
	    background-color: #e4e4e4;
	    overflow-y: scroll;
	    -webkit-overflow-scrolling: touch;
	}

	
</style><div id="app"><div class="box"><div class="jun-content"><div class="t_box_pay"><div class="t_header"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span><i><?php echo htmlentities($article['title']); ?></i></span></div><div class="t_con_pay"><div style="background: #e4e4e4;border-top: .026667rem solid #e4e4e4;color: gray;padding: .333333rem;"><?php echo htmlspecialchars_decode($article['content']); ?></div></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "[menu]";
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
