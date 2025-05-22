<?php /*a:3:{s:69:"/www/wwwroot/4.fgdw5349.cn/application/index/view/user/bank_card.html";i:1732802343;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/header.html";i:1737689979;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>银行卡管理</title><style type="text/css">
        html {
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

	
</style><div id="app"><div class="box"><div class="jun-content"><div class="f_box_bank"><div class="t_header"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span><i>银行卡管理</i></span></div><div class="f_content"><?php if($bank): if(is_array($bank) || $bank instanceof \think\Collection || $bank instanceof \think\Paginator): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><ul class="f_withdraw"><li class="banklist"><span><?php echo htmlentities($b['bank']); ?>: ***************<?php echo substr($b['account'], strlen($b['account']) -4, 4); ?></span><i data-myid="<?php echo htmlentities($b['id']); ?>" class="awesome"></i></li></ul><?php endforeach; endif; else: echo "" ;endif; else: ?><?php endif; if($bank['leixing'] = "2"): ?><div class="addbank"><a href="/index/user/uadd_card" class=""><button type="button" class="el-button el-button--danger" id="l_addBankBtn"><span>绑定 USDT 地址</span></button></a></div><?php else: ?><div class="addbank"><a href="/index/user/uadd_card" class=""><button type="button" class="el-button el-button--danger" id="l_addBankBtn"><span>绑定 USDT 地址</span></button></a></div><?php endif; if($bank['leixing'] = "1"): ?><div class="addbank"><a href="/index/user/add_card" class=""><button type="button" class="el-button el-button--danger" id="l_addBankBtn"><span>绑定银行卡</span></button></a></div><?php else: ?><div class="addbank"><a href="/index/user/add_card" class=""><button type="button" class="el-button el-button--danger" id="l_addBankBtn"><span>绑定银行卡</span></button></a></div><?php endif; ?><div class="addbank"><a href="<?php echo getInfo('service'); ?>" class=""><button type="button" class="el-button el-button--danger" id="l_addBankBtn"><span>修改银行卡请联系在线客服</span></button></a></div></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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