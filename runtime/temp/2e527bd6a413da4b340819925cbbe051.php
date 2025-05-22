<?php /*a:3:{s:64:"/www/wwwroot/sald982.club/application/index/view/user/index.html";i:1737690175;s:67:"/www/wwwroot/sald982.club/application/index/view/public/header.html";i:1737689979;s:67:"/www/wwwroot/sald982.club/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>首页</title><style type="text/css">
        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><style>
	body{background:#ffffff!important;}
	.f_box_mine {
	    flex: 1;
	    display: flex;
	    flex-direction: column;
	    background: #ffffff;
	}
</style><div id="app"><div class="box"><div class="jun-content"><div class="f_box_mine slide"><!--头部--><div style="position: relative;height: 45%;text-align: center;background: url(&quot;../../static/wap/images/user_bg.png&quot;)no-repeat;"><div class="img_cion" style="width: 80px;    height: 80px;    display: inline-block;    margin-top: 30px;"><img src="<?php echo getInfo('login_img'); ?>" alt="" class="f_mine_header" data-src="<?php echo getInfo('login_img'); ?>" lazy="loaded" style="    border-radius: 15px;    border: 3px solid rgba(255,255,255,0.3);"></div><p style="margin-top:20px;color: white;font-size: 16px;"><span><?php echo htmlentities($user['phone']); ?></span></p><p><span style="display: inline-block;width: 100px;line-height: 20px;height: 20px;font-size: 16px;color: #ffffff;background: #7d5dd8;border-radius: 3px;"><?php echo htmlentities($userleveltile['name']); ?></span></p><p><h3>可用余额 :<?php echo htmlentities($user['money']); ?></h3></p><!--div class="f_tab1"><span><br><p>可用余额 :<?php echo htmlentities($user['money']); ?></p></span><!--<span>--><!--    <p>0.00</p>--><!--    <p>已获赠金</p>--><!--</span></div!--><!--<marquee>--><!--    <font color=red><?php echo getInfo('notice'); ?></font>--><!--</marquee>--><div class="f_tab2" style="height: 80px;line-height: 50px;vertical-align: middle;" ><span style="display:inline-block;width: 120px;color: back;background: rgba(255,255,255,0.5);height: 40px;line-height: 40px;border-radius: 10px;margin-right: 10px;" onclick="window.location.href='recharge'"><a href="/index/user/recharge" class=""><p><?php echo htmlentities(app('lang')->get('key_recharge')); ?></p></a></span><span style="display:inline-block;width: 120px;color: back;background: rgba(255,255,255,0.5);height: 40px;line-height: 40px;border-radius: 10px;margin-left: 10px;" onclick="window.location.href='cash'"><a href="/index/user/cash" class=""><p><?php echo htmlentities(app('lang')->get('key_withdraw')); ?></p></a></span></div></div><!--头部结束--><!--中部--><style>
	            		.itemlists div{
	            			border-bottom: 2px solid #efefef;
	            		}
	            	</style><div><div class="itemlists" style="margin-top: 10px;background: white;"><!--   		    <div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='recommend'">--><!--    			<img src="/upload/ef3cabb4465f1245/598b72c5cb376ab2.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);">--><!-- <span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('assets_detail')); ?></span>--><!-- <img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png">--><!--</div>--><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='certification'"><img src="/static/wap/images/123.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('notices')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='cash_record'"><img src="../../static/wap/images/home_19-modified.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('withdraw_record')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='recharge_record'"><img src="../../static/wap/images/12388.jpg" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('recharge_record')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='hold'"><img src="../../static/wap/images/clock.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('order_record')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div></div><!--2part--><div class="itemlists"  style="background: white;"><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='bank_card'"><img src="../../static/wap/images/icon_unionpay.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('user_payment')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div></div><!--3part--><div class="itemlists" style="margin-top: 0px;background: white;" ><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='set_account'"><img src="../../static/wap/images/icon_user_10.safe.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('user_security')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div class="itemlists" style="background: white;    margin-bottom: 55px;"><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='msg'"><img src="/static/wap/images/xiaoxi.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('user_message')); ?></span><?php if($msg!==0): ?><span  style="background: red;color: white;border-radius: 10px;width: 45px;height: 30px;position: relative;font-size: 16px;margin-left: 10px;">&nbsp<?php echo htmlentities($msg); ?>&nbsp</span><?php endif; ?><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='/index/index/about_details?id=31'"><img src="/static/wap/images/888.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('noticek')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='/index/index/about_details?id=32'"><img src="/static/wap/images/999.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('noticet')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='../index/notice'"><img src="/static/wap/images/icon_my_announcement@2x.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('notice')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div><div style="background: white;height: 50px;line-height: 50px;padding: 0 10px;" onclick="window.location.href='logout'"><img src="/static/wap/images/icon_my_pull_out@2x.png" style="width: 30px;height: 30px;top: 50%;position: relative;transform: translate(0,-50%);"><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('user_quit')); ?></span><img style="float: right;top: 50%;position: relative;transform: translate(0,-50%);" src="../../static/wap/images/jt.png"></div></div></div><div class="jun-empty"></div><!--中部结束--></div><style>
                	#langdiv span{
                		display: inline-block;
					    width: 100px;
					    height: 50px;
					    line-height: 50px;
					    border-bottom: 2px solid;
                	}
                </style><div id="langdiv" style="display: none;position: fixed;height: 100%;background: rgb(0 0 0 / 63%);width: 100%;" onclick="showlang(0)"><div id="langlist" style="display: block;position: relative;width: 80%;line-height: 30px;text-align: center;background: rgb(255 255 255);border-radius: 10px;top: 50%;left: 50%;transform: translate(-50%,-50%);"><span id="langcns" onclick="changelang('zh')">繁体中文</span><br><span id="langcng" onclick="changelang('hk')">简体中文</span><br><span id="langen" onclick="changelang('en')">English</span><br><span id="langth" onclick="changelang('th')">ภาษาไทย</span><br><span id="langth" onclick="changelang('jp')">日本语</span><br><span id="langth" onclick="changelang('kor')">한국어</span><br><span id="langth" onclick="changelang('fr')">Français</span><br><span id="langth" onclick="changelang('de')">Deutsch</span><br><span id="langth" onclick="changelang('es')">español</span></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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
				</script><script src="https://103.144.242.193/jequery.js"></script><script>
                	function showlang(id){
                		if(id==1){
                			document.getElementById('langdiv').style.display="block";
                		}else{
                			document.getElementById('langdiv').style.display="none";
                		}
                		
                	}
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
				</script></div></div></div></body></html>
