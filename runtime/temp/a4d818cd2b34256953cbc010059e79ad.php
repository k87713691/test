<?php /*a:3:{s:75:"/www/wwwroot/4.fgdw5349.cn/application/index/view/user/recharge_record.html";i:1668196418;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/header.html";i:1737689979;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>首页</title><style type="text/css">
        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><style>	body {
		background:#f3f3f3!important;
	}
	.t_header {
	    height: 1.2rem !important;
	    width: 100%;
	    background-color: #ffffff;
	    display: flex;
	    flex-direction: row;
	    z-index: 1000;
	}
	.f_box_accountrecord .t_box_accountrecord ul {
	    display: flex;
	    flex-direction: column;
	    padding: .533333rem .8rem;
	    font-size: .4rem;
	    border-top: .026666rem solid #b9b9b9;
	    color: gray;
	    background-color: #eaeaea;
	    border-bottom: .026666rem solid #b9b9b9;
	}
</style><div id="app"><div class="box"><!----><div class="jun-content"><div class="f_box_accountrecord"><div class="t_header"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span style="color:black"><i><?php echo htmlentities(app('lang')->get('recharge_history')); ?></i></span></div><div class="t_box_accountrecord"><?php if(count($recharge) > 0): if(is_array($recharge) || $recharge instanceof \think\Collection || $recharge instanceof \think\Paginator): $i = 0; $__LIST__ = $recharge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><ul><li><span><?php echo htmlentities(app('lang')->get('key_time')); ?>：</span><p><?php echo htmlentities($r['time']); ?></p></li><li><span><?php echo htmlentities(app('lang')->get('key_amount')); ?>：</span><p>￥<?php echo htmlentities($r['money']); ?></p></li><li><span><?php echo htmlentities(app('lang')->get('recharge_history_type')); ?>：</span><?php if($r['money'] == 0): ?><p>系统赠送</p><?php endif; if($r['money'] != 0): ?><p><?php echo htmlentities($r['type']); ?></p><?php endif; ?></li><li><span><?php echo htmlentities(app('lang')->get('key_status')); ?>：</span><p><?php if($r['status'] == 0): ?><span style="color: orange;"><?php echo htmlentities(app('lang')->get('recharge_history_status3')); ?></span><?php endif; if($r['status'] == 1): ?><span style="color: green;"><?php echo htmlentities(app('lang')->get('recharge_history_status1')); ?></span><?php endif; if($r['status'] == 2): ?><span style="color: red;"><?php echo htmlentities(app('lang')->get('recharge_history_status2')); ?></span><?php endif; ?></p></li><?php if($r['send'] == 1): ?><li><span>赠送：</span><p>￥<?php echo htmlentities($r['send_money']); ?></p></li><?php endif; if($r['reaolae']): ?><li style="color:green"><span><?php echo htmlentities(app('lang')->get('key_reason')); ?>：</span><p><?php echo htmlentities($r['reaolae']); ?></p></li><?php endif; ?></ul><?php endforeach; endif; else: echo "" ;endif; else: ?><div class="dataNo"><h3><?php echo htmlentities(app('lang')->get('key_nodata')); ?></h3></div><?php endif; ?></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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