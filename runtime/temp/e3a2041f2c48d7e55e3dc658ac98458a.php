<?php /*a:3:{s:61:"/www/wwwroot/gxzqht.top/application/index/view/user/cash.html";i:1688488692;s:65:"/www/wwwroot/gxzqht.top/application/index/view/public/header.html";i:1623340146;s:65:"/www/wwwroot/gxzqht.top/application/index/view/public/footer.html";i:1687681818;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>提现</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/tipmask.css"><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><style type="text/css">
    span {
        display: inline-block;
    }
    body {background:#f9f9f9!important;}
</style><div id="app"><div class="box"><!----><div class="jun-content"><div class="t_box_withdraw"><div class="t_header" style="    background: white;"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span style="color:black"><i><?php echo htmlentities(app('lang')->get('key_withdraw')); ?></i><i style="float:right;position: relative;right: 0;left: 0;top: 50%;font-size: 12px;margin-right: -5px;" onclick="window.location.href='cash_record'"><?php echo htmlentities(app('lang')->get('key_records')); ?></i></span></div><style>
                	.t_box_withdraw .t_con_withdraw div input {
					    margin-top: .133333rem;
					    height: 1.066667rem;
					    font-size: 0.6rem;
					    text-indent: .266667rem;
					    background-color: rgb(0,0,0,0);
					    border: none;
					    outline: none;
					    color: black;
					}
					.t_box_withdraw .t_con_withdraw div label {
					    display: inline-block;
					    margin-left: .4rem;
					    color: black;
					    width: 2.666667rem;
					    font-size: 0.6rem;
					    height: 100%;
					    line-height: 1.333333rem;
					    float: left;
					}
					.t_box_withdraw .t_con_withdraw div {
					    height: 1.333333rem;
					    font-size: .4rem;
					    border-bottom: .026667rem solid #ececec;
					    position: relative;
					    display: flex;
					    flex-direction: row;
					}
					.t_box_withdraw .t_con_withdraw .notice p {
					    color: gray;
					    font-size: .32rem;
					    text-indent: .4rem;
					    margin-bottom: .133333rem;
					}
					.input
{
    font-weight:bold;
}
                </style><div class="t_con_withdraw" style="background: #ffffff;border-top: 1px solid lightgray;"><div><label for="username"><?php echo htmlentities(app('lang')->get('key_balance')); ?></label><h2><input type="text" id="username" disabled="disabled" value="<?php echo htmlentities($user['money']); ?>"></h2><span class="r_span r_span1">√</span></div><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('key_amount')); ?></label><input type="number" placeholder="<?php echo htmlentities(app('lang')->get('withdraw_amount')); ?>" oninput="xxoopp()" id="money" onfocus="this.placeholder=''" onblur="this.placeholder='<?php echo htmlentities(app('lang')->get('withdraw_amount')); ?>'"></div><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('sxf')); ?></label><input type="number" disabled="true" placeholder="<?php echo htmlentities(app('lang')->get('sxf')); ?>" id="txsxf" onfocus="this.placeholder=''"></div><script>
                                function xxoopp(){
                                    
                                    console.log($("#money").val());
                                    var sxf1 = new BigNumber(0.01);
                                    var sxf2 = new BigNumber(<?php echo htmlentities($txsxf); ?>);
                                    var sxf3 = new BigNumber(sxf1.times(sxf2));
                                    var sxf4 = sxf3.times($("#money").val());
                                     $("#txsxf").val(sxf4);
                                    // alert(123);
                                }
                            </script><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('key_password')); ?></label><input type="password" placeholder="<?php echo htmlentities(app('lang')->get('withdraw_payment_password')); ?>" id="pwd" onfocus="this.placeholder=''" onblur="this.placeholder='<?php echo htmlentities(app('lang')->get('withdraw_payment_password')); ?>'"></div><div><label>类型</label><div class="select"><select name="bank" id="bank" style="width: 100%;border: none;color: gray;background: rgb(0,0,0,0);"><?php if(is_array($bank) || $bank instanceof \think\Collection || $bank instanceof \think\Paginator): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bank): $mod = ($i % 2 );++$i;?><option >请选择提现方式</option><option value="<?php echo htmlentities($bank['id']); ?>"><?php echo htmlentities($bank['bank']); ?>: ****<?php echo substr($bank['account'], strlen($bank['account']) -4, 4); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></div></div><!--
                    <div><label for="withdraw"><?php echo htmlentities(app('lang')->get('key_bank')); ?></label><input type="text"  id="bank" ></div><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('zh')); ?></label><input type="text"  id="area" ></div><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('key_transaction_code')); ?></label><input type="text"  id="codes"></div><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('key_account')); ?></label><input type="text"  id="account" ></div><div><label for="withdraw"><?php echo htmlentities(app('lang')->get('key_name')); ?></label><input type="text"  id="name" ></div>
                    --><!--              <div>--><!--                  <label><?php echo htmlentities(app('lang')->get('withdraw_type')); ?></label>--><!--                  <div class="select">--><!--<?php if($bank): ?>--><!--                      <select name="bank" id="bank" style="width: 100%;border: none;color: gray;background: rgb(0,0,0,0);">--><!--                          <option value="<?php echo htmlentities($bank['id']); ?>"><?php echo htmlentities($bank['bank']); ?> ****<?php echo substr($bank['account'], strlen($bank['account']) - 4, 4); ?></option>--><!--                      </select>--><!--<?php else: ?>--><!--	<p style="line-height:30px;color:#fff;margin-top:6px;">--><!--	<input type="hidden" name="bank" id="bank" value="0">--><!--	 <a href="/index/user/add_card" style="color:green"><?php echo htmlentities(app('lang')->get('user_payment_bind')); ?></a>--><!--	</p>--><!--                  <?php endif; ?>						--><!--                  </div>--><!--              </div>--><span class="notice"><p><?php echo htmlentities(app('lang')->get('key_tips')); ?>：</p><p>1.<?php echo htmlentities(app('lang')->get('withdraw_tips_1')); ?>：<?php echo htmlentities($cash_min); ?> - <?php echo htmlentities($cash_max); ?></p><p>2.<?php echo htmlentities(app('lang')->get('withdraw_tips_2')); ?>：<?php echo htmlentities($cash_start); ?> - <?php echo htmlentities($cash_end); ?></p><p>3.<?php echo htmlentities(app('lang')->get('withdraw_tips_3')); ?></p></span><div class="t_withdraw_btn"><button id="sub_btn" type="button"><?php echo htmlentities(app('lang')->get('key_submit')); ?></button></div><!--<?php if($bank): ?>--><!--<?php else: ?>--><!-- <div class="t_withdraw_btn">--><!--                   <button id="sdtn" type="button"><?php echo htmlentities(app('lang')->get('user_payment_add')); ?></button>--><!--               </div>--><!--<?php endif; ?>--></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/wallet" class="t_span two"><i></i><span><?php echo htmlentities(app('lang')->get('key_assets')); ?></span></a></div><div><a href="/index/user/hold" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "user";
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
				</script></div></div><div class="tipMask hide"><div class="cont"><p class="title"><?php echo htmlentities(app('lang')->get('key_tips')); ?></p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div></div></div></div></body><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
    $(function () {
	    $("#sdtn").click(function(){
		   var ulrs="/index/user/add_card";
		   window.location.href =ulrs;
		});
        $('#withdraw').on('blur',function(){
            var withdraw = parseFloat($(this).val());
            var reg_par = (withdraw * 0/100).toFixed(2);
            $('#reg_par').val(reg_par>=0?reg_par:0);
        });
        $("#sub_btn").on("click", function () {
            var bank = $('#bank').val();
            var pwd = $("#pwd").val();
            var money = $("#money").val();
           
            var bank = $('#bank').val();
             /*
            var area = $("#area").val();
            var code = $("#codes").val();
            var account = $('#account').val();
            var name = $("#name").val();
            */
            if (money < <?php echo htmlentities($cash_min); ?>) {
                msg("错误", "最低提现金额为<?php echo htmlentities($cash_min); ?>元", 1);
                return false;
            }
            if (money ><?php echo htmlentities($cash_max); ?>) {
                msg("错误", "最高提现金额为<?php echo htmlentities($cash_max); ?>元", 1);
                return false;
            }
            if (pwd.length < 4) {
                msg("错误", "请输入交易密码", 1);
                return false;
            }
            var url = "/index/user/cash";
            $.ajax({
                type : "POST",
                url : url,
                //data: {'money':money,'bank':bank,'area':area,'code':code,'account':account,'name':name},
                data: {'money':money,'bank':bank,'pwd':pwd},
                dataType : "json",
                success : function(result){
                    if(result.code == 1){
                    	  msg("提示",result.info,2,"/index/user/cash_record");
                    }else{
					   msg("提示",result.info,1);
                       
                    }
                }
            });
        })
    })

    function msg(title, content, type, url) {
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