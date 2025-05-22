<?php /*a:3:{s:70:"/www/wwwroot/12.jhf67.top/application/index/view/index/about_list.html";i:1619957640;s:68:"/www/wwwroot/12.jhf67.top/application/index/view/public/header1.html";i:1619957640;s:67:"/www/wwwroot/12.jhf67.top/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>平台公告</title><link rel="stylesheet" type="text/css" href="/static/theme/index/css/header.css" /><script type="text/javascript" src="/static/theme/index/js/yatongle.js"></script><link rel="stylesheet" type="text/css" href="/static/theme/index/css/iconfont.css" /><link rel="stylesheet" type="text/css" href="/static/theme/index/css/footer.css"/><script type="text/javascript" src="/static/theme/index/js/font.js"></script><script type="text/javascript" src="/static/theme/index/js/jquery.js"></script><style>	.htitle {
		padding-left: .3rem;
	}

	.container {
		padding-bottom: 1rem;
	}

	.list {
		padding: 0 .4rem;
	}

	.list .item {
		padding-top: .34rem;
		padding-bottom: .28rem;
		border-bottom: 1px solid #E9E9E9;
	}

	.list .item:last-child {
		border-bottom: 0;
	}

	.list .item img {
		width: .32rem;
		height: .32rem;
		float: left;
		margin-left: .12rem;
		margin-right: .18rem;
	}

	.list .item span {
		font-size: .28rem;
		line-height: .32rem;
		color: #4A4A4A;
		float: left;
	}

	.list .item .iconfont {
		font-size: .34rem;
		line-height: 1;
		color: #9B9B9B;
		float: right;
	}

	.list .item:after {
		content: "";
		clear: both;
		display: block;
	}
</style></head><body><div class="container"><div class="header"><div class="left" onclick="window.history.back()"><i class="iconfont icon-arrow-left"></i></div><div class="htitle"><?php echo htmlentities($type_name); ?></div></div><div class="list"><?php if(is_array($about) || $about instanceof \think\Collection || $about instanceof \think\Paginator): $i = 0; $__LIST__ = $about;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><a href="/index/index/about_details?id=<?php echo htmlentities($t['id']); ?>"><div class="item" style="border-bottom: 1px solid #E9E9E9;"><img src="/static/theme/index/img/icon_aboutus_notice.png" alt=""/><span><?php echo htmlentities($t['title']); ?></span><i class="iconfont icon-arrow-right"></i></div></a><?php endforeach; endif; else: echo "" ;endif; ?></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "";
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
				</script></body></html>