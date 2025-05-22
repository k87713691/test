<?php /*a:3:{s:57:"/www/wwwroot/03/application/index/view/user/recharge.html";i:1688508844;s:57:"/www/wwwroot/03/application/index/view/public/header.html";i:1623358146;s:57:"/www/wwwroot/03/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>Recharge</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/tipmask.css"><!--<link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css">--><style>
	body {
		background: linear-gradient(45deg, #3476FE, #34C7FE);
	}
</style><div id="app" style="display:block"><div class="box" style="display:block;height: 100%;position: relative;"><!----><div class="t_header" style="background: rgba(255,255,255,0.2);border-bottom: 1px solid rgba(255,255,255,0.2);"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span style="color:black"><i><?php echo htmlentities(app('lang')->get('key_recharge')); ?></i><i style="float:right;position: relative;right: 0;left: 0;top: 50%;font-size: 12px;margin-right: -5px;" onclick="window.location.href='recharge_record'"><?php echo htmlentities(app('lang')->get('key_records')); ?></i></span></div><div style="display:block;height:30px;line-height:50px;text-align:center;color:#000;font-size:12px;font-weight:700"><span><?php echo htmlentities(app('lang')->get('recharge_type')); ?></span></div><style>
			.paytypelist select {
			    display: inline-block;
			    width: 120px;
			    height: 30px;
			    border-radius: 5px;
			    background: #707171;
			    color: #fff;
			    margin: 5px;
			    line-height: 30px;
			}
			
		</style><div class="paytypelist" style="text-align:center;padding:10px"><select name="paytype"  style="display:none"><?php foreach($payments as $y): ?><a href="#"><option value="<?php echo htmlentities($y['id']); ?>"><?php echo htmlentities($y['title']); ?></option></a><?php endforeach; ?></select><button style="display:inline-block;width:100px;height:30px;margin:10px;border-radius:5px"  onclick="window.location.href='/index/user/recharge';"  >银行卡</button><br><button style="display:inline-block;width:100px;height:30px;margin:10px;border-radius:5px"  onclick="window.location.href='/index/user/reusdtcharge';" >USDT</button></div><div style="padding:10px"><div style="background: rgba(255,255,255,0.43);border-radius:10px;"><?php foreach($payments as $y): ?><div class="infoshow" id="info<?php echo htmlentities($y['id']); ?>" style="display:none"><div style="display:block;text-align:center"><img src="<?php echo htmlentities($y['img']); ?>" style="width: 200px;height: 200px;margin-top:10px;"></div><div  id="addr<?php echo htmlentities($y['id']); ?>" style="display:block;text-align:center;margin-top:10px"><p><?php echo htmlentities($y['title']); ?></p><p style="color:#f08080"><?php echo htmlentities($y['addr']); ?></p><p><?php echo htmlentities($y['more']); ?></p></div></div><?php endforeach; ?><div style="display:block;text-align:center;margin-top:10px"><input type="text" name="name" placeholder="<?php echo htmlentities(app('lang')->get('user_name')); ?>" style="height: 30px;line-height: 30px;width: 250px;text-align: center;border-radius: 5px;"><br><br><input type="text" name="money" oninput="xxoopp()" id="money" onfocus="this.placeholder=''"  ="this.placeholder='<?php echo htmlentities(app('lang')->get('withdraw_amount')); ?>'" placeholder="<?php echo htmlentities(app('lang')->get('recharge_steps')); ?>" style="height: 30px;line-height: 30px;width: 250px;text-align: center;border-radius: 5px;"><br><br><script>
                                function xxoopp(){
                                    
                                    console.log($("#money").val());
                                    var sxf1 = new BigNumber(1);
                                    var sxf2 = new BigNumber(<?php echo htmlentities($duihuan); ?>);
                                    var sxf3 = new BigNumber(sxf1.times(sxf2));
                                    var sxf4 =  sxf3.times($("#money").val());
                                     $("#txsxf").val(sxf4);
                                    // alert(123);
                                }
                            </script><!--<button id="copybtn" style="display:inline-block;width:100px;height:30px;margin:10px;border-radius:5px" onClick="window.open('<?php echo getInfo('service'); ?>','_blank');"><?php echo htmlentities(app('lang')->get('recharge_copy_address')); ?></button>--><button style="display:inline-block;width:100px;height:30px;margin:10px;border-radius:5px" onclick="dopost()"><?php echo htmlentities(app('lang')->get('recharge_confirm_order')); ?></button></div></div></div><div style="padding:10px;height:200px"><div><?php echo htmlentities(app('lang')->get('recharge_remarks_1')); ?></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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
				</script></div></div><div class="tipMask" style="display:none"><div class="cont"><p class="title"><?php echo htmlentities(app('lang')->get('key_tips')); ?></p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div></div></div></div></body><script type="text/javascript" src="/static/theme/index/js/layer.js"></script><script type="text/javascript" src="/static/theme/index/js/clipboard.min.js"></script><script>
	function dopost(){
		var paytye=$('[name="paytype"]').val();
			var name=$('[name="name"]').val();
		var money = $('[name="money"]').val();
	    if (isNaN(money)||money=="") {
	        msg("<?php echo htmlentities(app('lang')->get('key_wrong')); ?>", "<?php echo htmlentities(app('lang')->get('recharge_amout_tips')); ?>", 1);
	        return false;
	    }
	    var url = "/index/user/dorecharge";
	    $.ajax({
	        type : "POST",
	        url : url,
	        data: {money:money,type:paytye,name:name},
	        dataType : "json",
	        success : function(result){
	            if(result.code == 1){
	            	layer.msg(result.info);
	            	window.setTimeout(function(){window.location.href="/index/user/recharge_record";},1000);
	            }else{
	            	layer.msg(result.info);
	            }
	        }
	    });
        
	};
	function docopy(){
		var paytye=$('[name="paytype"]').val();
		var clipboard = new Clipboard('#copybtn', {
	        text: function() {
	            return $('#addr'+paytye).text();
	        }
	    });
		if(Clipboard.isSupported()) {
	        clipboard.on('success', function(e) {
	            layer.msg('OK');
	        });
	        clipboard.on('error', function(e) {
	            layer.msg('OK');
	            console.log(e);
	        });
	    } else {
	        layer.msg('<?php echo htmlentities(app('lang')->get('key_network_error')); ?>');
	    }
	}
</script><script type="text/javascript">    $(function () {
    	var paytye=$('[name="paytype"]').val();
    	$('#info'+paytye).show();
    	$('[name="paytype"]').change(function(){
    		$(".infoshow").hide();
	    	var selected=$(this).children('option:selected').val()
	    	$('#info'+selected).show();
	   });
	   

    })

    function msg(title, content, type, url) {
    	//alert("ok");
        $(".contents").html(content);
        if (type == 1) {
            var btn = '<div class="confirm guanbi" onclick="$(\'.tipMask\').hide();"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div>';
        }
        else {
            var btn = '<div class="confirm guanbi" onclick="window.location.href=\'' + url + '\'"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div>';
        }
        $("#msgBtn").html(btn);
        $(".tipMask").show();
    }
</script></html>
