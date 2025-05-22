<?php /*a:3:{s:64:"/www/wwwroot/sald982.club/application/index/view/index/home.html";i:1732777555;s:67:"/www/wwwroot/sald982.club/application/index/view/public/header.html";i:1737689979;s:67:"/www/wwwroot/sald982.club/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>首页</title><style type="text/css">
        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/theme/index/css/swiper.min.css"/><style type="text/css">
    body {
        background: #f3f3f3;
        overflow: auto;
    }
    span {
        display: inline-block;
    }

    .ad {
        width: 100%;
        margin: 0 auto;
        font-size: 0;
    }

    .swiper-container2 .swiper-slide {
        line-height: 0;
    }

    .swiper-container2 .swiper-slide img {
        width: 100%;
    }
	#d1{
	  position:absolute;
	  top:110px;
	  left:20px;
	  background:#fff;
	  border-radius:8px;
	  padding:15px;
	  width:80%;
	      border: 2px solid;
 
	  z-index:999999
	}
	.tc1{
	  text-align:center;
	  line-height:35px;
	  color:red;
	  font-size:30px;
	}
	.mp{
	  line-height:30px;
	  height:368px ;
	  overflow-y: scroll;
	}
	.mp img{
	    width:100%;
	}
	.redbox{
	  height:40px;
	   margin:0 auto;
	   text-align:center;
	   margin-top:8px;
	}
	.redbox .btn{
	  width:100px;
	  margin:0 auto;
	   text-align:center;
	   display:block;
	  height:35px;
	  line-height:35px;
	  color:#fff;
	   border-radius:31px;
	  background:#000
	}
	
	.red{
 color: #f72e2e;
}
 .green{
 color: #10d310;
}
    .t_table .green.kbg{
	background: url('/static/wap/images/rise.png') center no-repeat;
	background-size: 100% 100%;
	color:#50d8b9;
}
.t_table .red.kbg{
	background: url('/static/wap/images/decline.png') center no-repeat;
	background-size: 100% 100%;
	
}
</style><script>function clickMath(){

 

 

var round2 = Math.round(Math.random()*10); 

document.getElementById("round2").value = round2;

}

</script><div onclick="clickMath()" id="app"><div style="background-color: #5db5ad;color: white;padding-top: 0rem;"><?php if(is_array($notice) || $notice instanceof \think\Collection || $notice instanceof \think\Paginator): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span id="langset"style=" color:#000100; width: 5.5rem;    line-height: 30px;font-size: 25px; "  ><img src="<?php echo htmlentities($vo['logo_img']); ?>"/></span><?php endforeach; endif; else: echo "" ;endif; ?><span id="langset"style="float: right;display: inline-block;width: 2.5rem;    line-height: 30px;height: 30px;margin-right: 10px;text-align: center;border-radius: 10px;background: rgb(255,255,255,0.2);margin-top:10px;" onclick="changelang('list')"><img src="/static/wap/images/lang123.png" style="width: 33px;height:20px;vertical-align: middle;margin-right: 5px;"><?php echo lang('key_language'); ?></span><br><div id="langlist"style="display: none;position: absolute;right: 10px;margin-top: 10px;width: 2.5rem;line-height: 30px;text-align: center;background: rgb(2 0 0 / 65%);border-radius: 10px;z-index: 99999;"><span id="langcns" onclick="changelang('hk')">简体中文</span><br><span id="langcng" onclick="changelang('zh')">繁体中文</span><br><span id="langen" onclick="changelang('en')">English</span><br><!--<span id="langth" onclick="changelang('th')">ภาษาไทย</span><br>--><!--<span id="langth" onclick="changelang('jp')">日本语</span><br>--><!--<span id="langth" onclick="changelang('kor')">한국어</span>--><!--<span id="langth" onclick="changelang('fr')">Français</span><br>--><!--<span id="langth" onclick="changelang('de')">Deutsch</span><br>--><!--<span id="langth" onclick="changelang('es')">español</span>--></div></div><div class="ad"><div class="swiper-container swiper-container2"><div class="swiper-wrapper"><?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><a href="<?php echo htmlentities($s['url']); ?>"><img src="<?php echo htmlentities($s['path']); ?>"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div><ul class="marquee"><?php if(is_array($notice) || $notice instanceof \think\Collection || $notice instanceof \think\Paginator): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><marquee><span style="font-weight: bolder;font-size: 15px;color: #ff0303;"><?php echo htmlentities($vo['notice']); ?></span></marquee><?php endforeach; endif; else: echo "" ;endif; ?></ul><div style="padding:0px 0;line-height:30px;text-align:center;border-bottom:1px solid #d3d3d3;padding-bottom:0px;font-size:15px"><?php if(is_array($rec_lists) || $rec_lists instanceof \think\Collection || $rec_lists instanceof \think\Paginator): $i = 0; $__LIST__ = $rec_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!--<div style="display:inline-block;width:30%;margin-top:10px;border-radius:5px;color:#000100">--><!--	<p><?php echo htmlentities($v['title']); ?></p><p id="re_p_<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['Price']); ?></p>--><!--	<p  id="re_ps_<?php echo htmlentities($v['id']); ?>" close="<?php echo htmlentities($v['Close']); ?>" Price="<?php echo htmlentities($v['Price']); ?>">%</p>--><!--</div>--><?php endforeach; endif; else: echo "" ;endif; ?><!--<input id="rec_lists_ids" type="hidden" value="<?php echo htmlentities($rec_lists['0']['id']); ?>&<?php echo htmlentities($rec_lists['1']['id']); ?>&<?php echo htmlentities($rec_lists['2']['id']); ?>">--><input id="rec_lists_ids" type="hidden" value=""></div><div style="padding:10px 20px;display:block;font-size:12px"><div style="position:relative;display:inline-block;height:100px;width:60%;float:left;background:#92abff;text-align:left;line-height:40px;border-radius:5px"><div style="display:inline-block;height:100px;line-height:50px;width:65%;text-align:center"><p style="font-size:18px;font-weight:700" onclick="window.location.style='';">今日交易金额</p><h2>美元$<span id="num" style="color: #d60000">85475284</span></h2></div><div style="display:inline-block;height:100px;position:absolute;line-height:100px;width:35%;text-align:center"><img src="/static/wap/images/kxian.gif" style="width:60px;margin:25px 0"></div></div><div style="position:relative;display:inline-block;height:100px;width:38%;float:right;background:#fff;border-radius:5px"><div style="height:50px;line-height:50px;text-align:center;margin-bottom:1px;background:#8cc6fa;border-radius:5px" onclick="window.location.href='/index/index/about.html'"><img src="../../static/wap/images/kf.png" style="width:30px;float:left;margin:10px"><h3>关于我们</h3></div><div style="height:50px;line-height:50px;text-align:center;margin-top:1px;background:#fa8c8c;border-radius:5px" onclick="window.location.href='/index/user/recharge'"><img src="../../static/wap/images/home_19.png" style="width:30px;float:left;margin:10px"><h3>快速加仓</h3></div></div></div><!--<div style="padding:10px 20px;display:block;font-size:12px"><div style="position:relative;display:inline-block;height:100px;width:60%;float:left;background:#8cc6fa;text-align:left;line-height:40px;border-radius:5px"><div style="display:inline-block;height:100px;line-height:50px;width:65%;text-align:center"><p style="font-size:18px;font-weight:700" onclick="window.location.href='/index/user/recharge';">快速充值</p><p>BTC/USDT/ETH</p></div><div style="display:inline-block;height:100px;position:absolute;line-height:100px;width:35%;text-align:center"><img src="../../static/wap/images/index_api_auth_left.b4c5c8b.png" style="width:60px;margin:25px 0"></div></div><div style="position:relative;display:inline-block;height:100px;width:38%;float:right;background:#fff;border-radius:5px"><div style="height:50px;line-height:50px;margin-bottom:1px;background:#8cc6fa;border-radius:5px"  ><img src="<?php echo htmlentities($app['appimg1']); ?>" style="width:25px;float:left;margin:10px"><span onclick="window.location.href='<?php echo htmlentities($app['appurl1']); ?>';"><?php echo htmlentities($app['appname1']); ?></span></div><div style="height:50px;line-height:50px;margin-top:1px;background:#8cc6fa;border-radius:5px"  ><img src="<?php echo htmlentities($app['appimg2']); ?>" style="width:25px;float:left;margin:10px" ><span onclick="window.location.href='<?php echo htmlentities($app['appurl2']); ?>';" ><?php echo htmlentities($app['appname2']); ?></span></div></div>--><!--</div>--><div style="border-bottom: 1px solid rgb(165 160 160 / 50%);"></div><div class="box"><div class="jun-content"><div class="t_box slide" style="background:#f3f3f3"><div class="t_table"><div class="t_lineher" style="display: block;height: 30px;line-height: 30px;text-align: justify;text-align-last: center;border-bottom: 1px solid rgb(165 160 160 / 50%);color: #000100;"><span style="width: 24.5%;"><?php echo htmlentities(app('lang')->get('market_pro_title')); ?></span><span style="width: 24.5%;"><?php echo htmlentities(app('lang')->get('market_pro_low')); ?></span><span style="width: 24.5%;"><?php echo htmlentities(app('lang')->get('market_pro_high')); ?></span><span style="width: 24.5%;"><?php echo htmlentities(app('lang')->get('market_pro_price')); ?></span></div><div style="margin-bottom: 50px;"><?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="height: 50px;line-height: 50px;text-align: center;border-bottom: 1px solid rgb(165 160 160 / 20%);color: #000100;font-weight: bold;font-size:14px!important" onclick="startdo(<?php echo htmlentities($vo['id']); ?>)"><span id="in_<?php echo htmlentities($vo['id']); ?>" style="width: 24.5%;" key="<?php echo htmlentities($vo['isclosetime']); ?>"><?php echo htmlentities($vo['title']); ?></span><span style="width: 24.5%;" id="L_<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['Low']); ?></span><span style="width: 24.5%;" id="H_<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['High']); ?></span><span style="width: 24.5%;" class="kbg" id="p_<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['Price']); ?></span></div><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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
				</script></div></div></div><?php if($ater && $is_hide == 0): ?><div id="d1"  class="cox xs" style="position:fixed" ><div class="tc"><input type="submit" value="X" class="btn btn1 close"   id="sday4" style="position:absolute;right:10px;top:10px;font-size:20px;display:block;width:25px;height:25px;"><div class="tc1"><?php echo htmlentities($ater['title']); ?></div><div class="mp"><?php echo $ater['content']; ?></div></div></div><?php endif; ?><script src="/static/theme/index/js/swiper.min.js"></script><script>
    	function startdo(id){
    		var closed=$('#in_'+id).attr('key');
    		if(closed=="0"){
    			window.location.href="<?php echo url('index/goods'); ?>?id="+id;
    		};
    		if(closed=="1") msg('<?php echo htmlentities(app('lang')->get('key_tips')); ?>','<?php echo htmlentities(app('lang')->get('key_notradetime')); ?>！',1,'#');
    	};
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
    </script><script type="text/javascript">
        $(function () {
        //	window.setInterval(updaterecp(),3000);
		    $("#sday4").click(function(){
			  $("#d1").hide();
			  	$.ajax({
				type:'get',
				url:'/index/index/hide',
				dataType : "json",
				success : function(res){

				}
				
			})
			})
            var swiper2 = new Swiper('.swiper-container2', {
                loop: true,
                autoplay: {
                    delay: 3000
                },
                pagination: {
                    el: '.swiper-pagination',
                },
            });
        });
        function updaterecp(){
        
        }
        
        // function getdt() {
        // 	//$.get('/index/index/product');
        // 	//$.get('/index/index/order');
        //     $.get('/index/index/ajaxdata', '', function(datajson) {
        //         var pro = eval('(' + datajson + ')');
        //         $.each(pro, function(k, v) {
        //             id = '#' + 'p_' + v.id;
        //             pdid = '#' + 'pd_' + v.id;
        //             lid= '#' + 'L_' + v.id;
        //             hid= '#' + 'H_' + v.id;
        //             $(id).html(v.Price); //全部的价格进行变动
        //             if (v.is_rise == 2) {
        //                 $(id).css('background', '#1cbbb4');
        //                 $(lid).css('color', '#1cbbb4');
        //                 $(hid).css('color', '#1cbbb4');
        //             } else {
        //                 $(id).css('background', '#ec4d70');
        //                 $(lid).css('color', '#ec4d70');
        //                 $(hid).css('color', '#ec4d70');
        //             }
        //             if (v.is_deal == 0) {
        //                 $(pdid).css('background', 'rgb(58, 142, 230)');
        //                 $(pdid).html("<?php echo htmlentities(app('lang')->get('key_closed')); ?>");
        //             } else {
        //                 $(pdid).html("<?php echo htmlentities(app('lang')->get('key_opening')); ?>");
        //             }
        //             var allid=$('#rec_lists_ids').val();
        //             if(allid.indexOf(v.id)>=0){
	       //         	$('#re_p_'+v.id).text(v.Price);
	       //         	var close=$('#re_ps_'+v.id).attr('Close');
	       //         	var ps=Number((((v.Price-close)/close)*100)).toFixed(1);
	       //         	$('#re_ps_'+v.id).text(ps+"%");
	       //         	if (v.is_rise == 2) {
	       //                $('#re_p_'+v.id).css('color', '#1cbbb4');
	       //                $('#re_ps_'+v.id).css('color', '#1cbbb4');
	       //               //  $(hid).css('color', '#1cbbb4');
	       //             } else {
	       //                $('#re_p_'+v.id).css('color', '#ec4d70');
	       //                $('#re_ps_'+v.id).css('color', '#ec4d70');
	       //                 //$(hid).css('color', '#ec4d70');
	       //             }
                    	
        //             }
        			

        //         })
        //     });
        // }
        function getdt() {
        	//$.get('/index/index/product');
        	//$.get('/index/index/order');
            $.get('/index/index/ajaxdata', '', function(datajson) {
                var pro = eval('(' + datajson + ')');
			/*	console.log('pro',pro);*/
				const findAry=pro.filter(f=>[85,81,72].includes(f.id));
				var dom=''
				$.each(findAry,function(k,item){
					var cls=item.is_rise == 2?'red':'green'
					 dom+='<div><p>'+item.Name+'</p><span class="'+cls+'">'+item.Price+'</span></div>'
				})
				$('#market-top').html('');
				$('#market-top').append(dom);
				
                $.each(pro, function(k, v) {
                    id = '#' + 'p_' + v.id;
                    pdid = '#' + 'pd_' + v.id;
                    lid= '#' + 'L_' + v.id;
                    hid= '#' + 'H_' + v.id;
                    $(id).html(v.Price); //全部的价格进行变动
                    if (v.is_rise == 2) {
                        $(id).removeClass('green').addClass('red');
                        $(lid).removeClass('green').addClass('red');
                        $(hid).removeClass('green').addClass('red');
                    } else {
						$(id).removeClass('red').addClass('green');
                        $(lid).removeClass('red').addClass('green');
                        $(hid).removeClass('red').addClass('green');
                    }
                    if (v.is_deal == 0) {
                        $(pdid).css('background', 'rgb(58, 142, 230)');
                        $(pdid).html("休市中");
                    } else {
                        $(pdid).html("交易中");
                    }
                    var allid=$('#rec_lists_ids').val();
                    if(allid.indexOf(v.id)>=0){
	                	$('#re_p_'+v.id).text(v.Price);
	                	var close=$('#re_ps_'+v.id).attr('Close');
	                	var ps=Number((((v.Price-close)/close)*100)).toFixed(1);
	                	$('#re_ps_'+v.id).text(ps+"%");
	                	if (v.is_rise == 2) {
	                       $('#re_p_'+v.id).css('color', '#1cbbb4');
	                       $('#re_ps_'+v.id).css('color', '#1cbbb4');
	                      //  $(hid).css('color', '#1cbbb4');
	                    } else {
	                       $('#re_p_'+v.id).css('color', '#ec4d70');
	                       $('#re_ps_'+v.id).css('color', '#ec4d70');
	                        //$(hid).css('color', '#ec4d70');
	                    }
                    	
                    }
        			

                })
            });
        }
        getdt();
        window.setInterval("getdt()", 1000);
        
        function type() {
    		var num = 85473498;
    		num+=Math.ceil(Math.random() * (9999-1001+1) + 1001-1);
    		$("#num").html(num);
    	}
    	type();
    	window.setInterval("type()", 2000);
    </script><script>
		function changelang(t){
		if(t=="list"){
			$('#langlist').fadeToggle();return;
		}else{
			$.ajax({
				type:'get',
				url:'/index/index/changelang?lang='+t,
				dataType : "json",
				success : function(res){
					console.log(t);
					window.localStorage.setItem('lang',t);
					var td=$('#lang'+t).text();
					$('#langset').text(td);
					//$('#langlist').fadeToggle();
					window.location.reload();
					
				}
				
			})
		}
		
		
		
		
	};
	</script></body></html>
