<?php /*a:3:{s:65:"/www/wwwroot/27.124.40.61/application/index/view/index/about.html";i:1619957640;s:68:"/www/wwwroot/27.124.40.61/application/index/view/public/header1.html";i:1619957640;s:67:"/www/wwwroot/27.124.40.61/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>关于我们</title><link rel="stylesheet" type="text/css" href="/static/theme/index/css/header.css" /><script type="text/javascript" src="/static/theme/index/js/yatongle.js"></script><link rel="stylesheet" type="text/css" href="/static/theme/index/css/iconfont.css" /><link rel="stylesheet" type="text/css" href="/static/theme/index/css/footer.css"/><script type="text/javascript" src="/static/theme/index/js/font.js"></script><script type="text/javascript" src="/static/theme/index/js/jquery.js"></script><style>    .htitle {
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
</style></head><body><div class="header"><div class="left" onclick="window.history.back()"><i class="iconfont icon-arrow-left"></i></div><div class="htitle">关于我们</div></div><div class="container"><div class="list"><?php if(is_array($abour_type) || $abour_type instanceof \think\Collection || $abour_type instanceof \think\Paginator): $i = 0; $__LIST__ = $abour_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><a href="/index/index/about_list?id=<?php echo htmlentities($t['id']); ?>"><div class="item" style="border-bottom: 1px solid #E9E9E9;"><img src="/static/theme/index/img/icon_aboutus_notice.png" alt=""/><span><?php echo htmlentities($t['name']); ?></span><i class="iconfont icon-arrow-right"></i></div></a><?php endforeach; endif; else: echo "" ;endif; ?><!--<a href="<?php echo getInfo('service'); ?>"><div class="item"><img src="/static/theme/index/img/icon_aboutus_kf.png" alt="" /><span>在线客服</span><i class="iconfont icon-arrow-right"></i></div></a>--><!--<div class="item"><span>服务热线：<a href="tel:<?php echo getInfo('tel'); ?>"><strong><?php echo getInfo('tel'); ?></strong></a></span></div><div class="item"><span>在线客服QQ：<strong style="color: red;"><?php echo getInfo('qq'); ?></strong></span></div>--></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "about";
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