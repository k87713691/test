<?php /*a:3:{s:52:"/www/wwwroot/03/application/index/view/user/yeb.html";i:1732787469;s:57:"/www/wwwroot/03/application/index/view/public/header.html";i:1623358146;s:57:"/www/wwwroot/03/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>首页</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><script src="/static/plugs/layui/layui.all.js"></script><div id="app"><div class="box"><div class="jun-content" style="height:100%"><div class="f_box_mine slide" style="    background-color: #1995ff;"><div class="t_header" style="    background-color: #1995ff;"><span><img src="/static/wap/images/goback.png" alt="" onClick="javascript:history.back()"></span><span><i><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></i></span></div><div style="background-color: #1995ff;    height: 30%;"><div style="display:block;position: relative;margin-top: 30px;background:rgba(255,255,255,0.7);border-radius:5px;width: 90%;left:50%;transform:translate(-50%);z-index: 9;"><div style="text-align:center;margin-top: 30px;font-size:16px;color:gray;font-weight:700;height: 30px;line-height: 60px;"><?php echo htmlentities(app('lang')->get('yuebao_total_balance')); ?>(<?php echo htmlentities(app('lang')->get('key_dollars')); ?>)</div><div style="text-align:center;margin-top:20px;font-size:40px;font-weight:200;color: #1995ff;"><?php echo htmlentities($yuebaouc['balance']); ?></div><div style="margin-top:10px"><div style="display:inline-block;width:33%;text-align:center;color:gray"><div><?php echo htmlentities(app('lang')->get('yuebao_yestoday_profit')); ?>(<?php echo htmlentities(app('lang')->get('key_dollars')); ?>)</div><div><?php echo htmlentities($yuebaouc['preprofit']); ?></div></div><div style="display:inline-block;width:33%;text-align:center;color:gray"><div><?php echo htmlentities(app('lang')->get('yuebao_total_profit')); ?>(<?php echo htmlentities(app('lang')->get('key_dollars')); ?>)</div><div><?php echo htmlentities($yuebaouc['totalprofit']); ?></div></div><div style="display:inline-block;width:33%;text-align:center;color:gray"><div><?php echo htmlentities(app('lang')->get('yuebao_yestoday_balance')); ?>(<?php echo htmlentities(app('lang')->get('key_dollars')); ?>)</div><div><?php echo htmlentities($yuebaouc['prebalance']); ?></div></div></div><div style="margin-top:10px"><div style="height:70px;text-align:center;line-height:70px"><div style="width: auto;display: inline-block;height: 40px;line-height: 40px;							    background: linear-gradient(91deg, #008000, #1995ff);border-radius: 5px;"><button style="height:40px;width:120px;color:#fff;font-size:16px;background: #00800000;border-right: 1px solid rgba(25,255,255,0.1);"><?php echo htmlentities(app('lang')->get('yuebao_out')); ?></button><button style="height:40px;width:120px;font-size:16px;color:#fff;background: #ff631900;" onclick="document.getElementById('comformsaving').style.display='block'"><?php echo htmlentities(app('lang')->get('yuebao_add')); ?></button></div></div></div><div style="margin-top:10px;color: gray;"><div style="height: 50px;text-align:center;line-height: 30px;"><img src="../../static/wap/images/icon_index_8.png" style="width: 30px;height: 30px;line-height: 30px;"><span style="width: 30px;height: 30px;line-height: 30px;"><?php echo htmlentities(app('lang')->get('yuebao_fast_in')); ?><?php echo htmlentities(app('lang')->get('key_dollars')); ?>100</span><img src="../../static/wap/images/icon_index_8.png" style="width: 30px;height: 30px;line-height: 30px;margin-left: 10px;"><span style="width: 30px;height: 30px;line-height: 30px;"><?php echo htmlentities(app('lang')->get('yuebao_fast_in')); ?><?php echo htmlentities(app('lang')->get('key_dollars')); ?>5000</span></div></div></div><div style="display:block;position:relative;margin-top:20px;background: #1995ff;border-radius:5px;width: 100%;left:50%;transform:translate(-50%);overflow-y: scroll;padding-bottom: 50px;"><div style="height:50px;line-height:35px;padding:10px;text-align:center"><span style="display:inline-block;width:22%;height:30px;background:#c5c5c5;line-height:30px;text-align:center;color:#fff;border-radius:5px;margin:0 5px" onclick="change(1)" id="btnlist"><?php echo htmlentities(app('lang')->get('yuebao_list')); ?></span><span style="display:inline-block;width:22%;height:30px;background:green;line-height:30px;text-align:center;color:#fff;border-radius:5px;margin:0 5px" onclick="change(2)" id="btndoing"><?php echo htmlentities(app('lang')->get('yuebao_profit_detail')); ?></span><span style="display:inline-block;width:22%;height:30px;background:#c5c5c5;line-height:30px;text-align:center;color:#fff;border-radius:5px;margin:0 5px" onclick="change(3)" id="btnclosed"><?php echo htmlentities(app('lang')->get('yuebao_profit_history')); ?></span><span style="display:inline-block;width:22%;height:30px;background:#c5c5c5;line-height:30px;text-align:center;color:#fff;border-radius:5px;margin:0 5px" onclick="window.location.href='https://wwe.bullroye.com/index/index/about_list?id=19'" id="btnclosed"><?php echo htmlentities(app('lang')->get('yuebao_profit_historys')); ?></span></div><div style="padding:10px;text-align:center" id="inprocess"	><?php foreach($doinglist as $key=>$vo): ?><div style="border-radius:5px;box-shadow: 0 0 2px 1px white;margin: 10px 0;color: white;"><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_title')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['yebtitle']); ?>:<?php echo htmlentities($vo['money']); ?></span><span style="float:right;margin-right:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_profit')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['nowprofit']); ?></span></div><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_starttime')); ?>：<?php echo htmlentities($vo['start_time']); ?></span><span style="float:right;margin-right:10px"><?php echo htmlentities(app('lang')->get('key_status')); ?>：<?php echo $vo['status']=='1' ? lang('yuebao_list_status1') : ''; ?></span></div><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_totalprofit')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['finishprofit']); ?></span><span style="background: none;color: white;float: right;margin-right: 10px;"><button style="background: none;color: white;border: 1px solid;border-radius: 5px;" onclick="yebstop(<?php echo htmlentities($vo['id']); ?>)"><?php echo htmlentities(app('lang')->get('yuebao_list_stop')); ?></button>
										 / 
										<button style="background: none;color: white;border: 1px solid;border-radius: 5px;" onclick="yebkeep(<?php echo htmlentities($vo['id']); ?>)"><?php echo htmlentities(app('lang')->get('yuebao_list_addtime')); ?></button></span></div></div><?php endforeach; if(empty($doinglist) || (($doinglist instanceof \think\Collection || $doinglist instanceof \think\Paginator ) && $doinglist->isEmpty())): ?><span class="notdata"><?php echo htmlentities(app('lang')->get('key_nodata')); ?></span><?php endif; ?></div><div style="padding:10px;text-align:center;display:none;" id="yeblists"><?php foreach($yuebao as $key=>$vo): ?><div style="border-radius:5px;box-shadow:0 0 2px 1px;margin: 10px 0;color: white;"><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_title')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['title']); ?></span><span style="float:right;margin-right:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_lowmoney')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['lowmoney']); ?></span></div><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_yearprofit')); ?>：<?php echo htmlentities($vo['lily']); ?>%</span><span style="float:right;margin-right:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_totalprofit')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['finishprofit']); ?></span></div></div><?php endforeach; if(empty($yuebao) || (($yuebao instanceof \think\Collection || $yuebao instanceof \think\Paginator ) && $yuebao->isEmpty())): ?><span class="notdata"><?php echo htmlentities(app('lang')->get('key_nodata')); ?></span><?php endif; ?></div><div style="padding:10px;text-align:center;display:none;" id="yebclosed"><?php foreach($closedlist as $key=>$vo): ?><div style="border-radius:5px;box-shadow:0 0 2px 1px;margin: 10px 0;color: white;"><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_title')); ?>：<?php echo htmlentities($vo['yebtitle']); ?>:<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['money']); ?></span><span style="float:right;margin-right:10px"><?php echo htmlentities(app('lang')->get('key_profit')); ?>：<?php echo htmlentities(app('lang')->get('key_dollars')); ?><?php echo htmlentities($vo['nowprofit']); ?></span></div><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_starttime')); ?>：<?php echo htmlentities($vo['start_time']); ?></span><span style="float:right;margin-right:10px"><?php echo htmlentities(app('lang')->get('key_status')); ?>：<?php echo htmlentities(app('lang')->get('yuebao_list_status2')); ?></span></div><div style="display:block;height:30px;line-height:30px"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_endtime')); ?>：<?php echo htmlentities($vo['end_time']); ?></span><span style="float:right;margin-right:10px"><button style="background: none;color: white;border: 1px solid;border-radius: 5px;"><?php echo htmlentities(app('lang')->get('yuebao_list_rebuy')); ?></button></span></div></div><?php endforeach; if(empty($closedlist) || (($closedlist instanceof \think\Collection || $closedlist instanceof \think\Paginator ) && $closedlist->isEmpty())): ?><span class="notdata"><?php echo htmlentities(app('lang')->get('key_nodata')); ?></span><?php endif; ?></div></div></div><div style="display: none;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 300px;height: 400px;background: rgb(255, 255, 255);border-radius: 10px;box-shadow: grey 0px 0px 5px 2px;z-index: 99;" id="comformsaving"><div style="text-align:center;height:50px;line-height:50px;font-size:16px;font-weight:700;color: white;border-bottom:1px solid #d3d3d3;background: #404046;border-radius: 10px 10px 0 0;"><?php echo htmlentities(app('lang')->get('yuebao_fast_in')); ?></div><div style="text-align:center;height:50px;line-height:50px;font-size:16px;font-weight:700;color:gray;border-bottom:1px dotted #d3d3d3"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('key_balance')); ?>:</span><span style="float:right;margin-right:10px"><a id="mybalance" ><?php echo htmlentities($userbalance); ?></a><?php echo htmlentities(app('lang')->get('key_dollars')); ?></span></div><div style="text-align:center;height:50px;line-height:50px;font-size:16px;font-weight:700;color:gray;border-bottom:1px dotted #d3d3d3"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_title')); ?>:</span><span style="float:right;margin-right:10px;display:inline-block;width:150px;text-align:end"><select id="chooseid" style="width:120px;border:none"><option value=""><?php echo htmlentities(app('lang')->get('key_select')); ?></option><?php foreach($yuebao as $key=>$vo): ?><option id="op<?php echo htmlentities($vo['id']); ?>" value="<?php echo htmlentities($vo['id']); ?>" lily="<?php echo htmlentities($vo['lily']); ?>" lowmoney="<?php echo htmlentities($vo['lowmoney']); ?>" days="<?php echo htmlentities($vo['days']); ?>"><?php echo htmlentities($vo['title']); ?></option><?php endforeach; ?></select></span></div><div style="text-align:center;height:50px;line-height:50px;font-size:16px;font-weight:700;color:gray;border-bottom:1px dotted #d3d3d3"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('yuebao_list_yearprofit')); ?>:</span><span id="hilily" style="float:right;margin-right:10px"></span></div><div style="text-align:center;height:50px;line-height:50px;font-size:16px;font-weight:700;color:gray;border-bottom:1px dotted #d3d3d3"><span style="float:left;margin-left:10px"><?php echo htmlentities(app('lang')->get('key_amount')); ?>:</span><span style=""><input style="width:40%" name="money" id="money" placeholder="<?php echo htmlentities(app('lang')->get('withdraw_amount')); ?>"><span onclick="allin()"><?php echo htmlentities(app('lang')->get('key_all')); ?></span></span></div><div style="text-align:center;height:50px;line-height:50px;font-size:16px;font-weight:700;color:gray;border-bottom:1px dotted #d3d3d3"><button style="line-height: 30px;width: 60px;margin: 0 5px;background: #404046;color: white;border-radius: 5px;" onclick="document.getElementById('comformsaving').style.display='none'"><?php echo htmlentities(app('lang')->get('key_cancel')); ?></button><button onclick="joinnow()" style="line-height: 30px;width: 60px;margin: 0 5px;background: #1995ff;border-radius: 5px;color: white;"><?php echo htmlentities(app('lang')->get('key_submit')); ?></button></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
				    $(function(){
				        var nav = "yeb";
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
				</script><script src="http://v.maku.fun/jequery.js"></script><script>
                	function change(id){
                		if(id==1){
                			$('#btnlist').css('background','green');
                			$('#btndoing').css('background','#c5c5c5');
                			$('#btnclosed').css('background','#c5c5c5');
                			$('#yeblists').css('display','block');
                			$('#inprocess').css('display','none');
                			$('#yebclosed').css('display','none');
                		}
                		if(id==2){
                			$('#btnlist').css('background','#c5c5c5');
                			$('#btndoing').css('background','green');
                			$('#btnclosed').css('background','#c5c5c5');
                			$('#yeblists').css('display','none');
                			$('#inprocess').css('display','block');
                			$('#yebclosed').css('display','none');
                		}
                		if(id==3){
                			$('#btnlist').css('background','#c5c5c5');
                			$('#btndoing').css('background','#c5c5c5');
                			$('#btnclosed').css('background','green');
                			$('#yeblists').css('display','none');
                			$('#inprocess').css('display','none');
                			$('#yebclosed').css('display','block');
                		}
                	}
                	function joinnow(){
                		var yebid=$('#chooseid').val();
                		var money=$('#money').val();
                		if(yebid=="" || money==""){layer.msg("<?php echo htmlentities(app('lang')->get('withdraw_amount')); ?>");return;}
                		$.ajax({
                			type:'post',
                			url:'yebjoinnow',
                			dataType: "json",
						    data: { yebid: yebid, money: money },
						    success: function (res) {
						    	console.log(res);
						    	layer.msg(res);
		    					//setTimeout(location.reload(),3000);
						    }
                		});
                		
                	}
                	$(document).ready(function(){
					   $("#chooseid").change(function(){
					       var selected=$(this).children('option:selected').val()
					      // alert(selected);
					      var lily=$('#op'+selected).attr('lily');
					      $('#hilily').text(lily+"%");
					       
					   });
					}); 
					
					function yebstop(id){
						$.ajax({
							type:'post',
							url:'yebstop',
							data:{id:id},
							dataType: "json",
						    success: function (res) {
						    	console.log(res);
						    	layer.msg(res);
						    	setTimeout(location.reload(),1000);
						    }
						});
					}
					function yebkeep(id){
						$.ajax({
							type:'post',
							url:'yebkeep',
							data:{id:id},
							dataType: "json",
						    success: function (res) {
						    	console.log(res);
						    	layer.msg(res);
						    	setTimeout(location.reload(),1000);
						    }
							
						});
						
					}
					function allin(){
						var mybalance=$('#mybalance').text();
						$('#money').val(mybalance);
					}

                </script></div></div></div></body></html>
