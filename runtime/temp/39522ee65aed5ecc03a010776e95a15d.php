<?php /*a:2:{s:74:"/www/wwwroot/xa.xxss6.cn/application/akszadmin/view/wallet/walletuser.html";i:1622111788;s:61:"/www/wwwroot/xa.xxss6.cn/application/akszadmin/view/main.html";i:1619957640;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5">用户钱包列表</span><div class="pull-right"><button onclick="addnew()" class="layui-btn layui-btn-sm layui-btn-primary">
			帮客户添加钱包
		</button></div></div><div class="think-box-shadow"><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='text-left nowrap'>序号</th><th class='text-left nowrap'>用户ID</th><th class='text-left nowrap'>钱包名称</th><th class='text-left nowrap'>余额</th><th class='text-left nowrap'>RMB汇率</th><th class='text-left nowrap'>USDT汇率</th><th class='text-left nowrap'>添加时间</th><th class='text-left nowrap'>更新时间</th><th class='text-left nowrap'>状态</th><th class='text-left nowrap'>操作</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick ><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></label></td><td class='text-left nowrap'><?php echo htmlentities($vo['id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['uid']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['title']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['balance']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['exc_rmb']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['exc_usdt']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['addtime']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['uptime']); ?></td><td class='text-left nowrap'><?php echo $vo['status']==0 ? "已冻结" : ""; ?><?php echo $vo['status']==1 ? "使用中" : ""; ?></td><td class='text-left nowrap'><button onclick="stop(<?php echo htmlentities($vo['id']); ?>)"><?php echo $vo['status']==0 ? "上线" : "下线"; ?></button> / <button onclick="edit(<?php echo htmlentities($vo['id']); ?>)">修改</button> / <button onclick="del(<?php echo htmlentities($vo['id']); ?>)">删除</button></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><div id="editform" style="display: none; position: fixed; width: 100%; height: 1000px; top: 0px; left: 0px; background: rgba(0, 0, 0, 0.5); z-index: 999;"><div style="display:block;position:fixed;width: 300px;height: 550px;top:50%;left:50%;background:#fff;z-index:3;transform:translate(-50%,0);box-shadow: 0px 0px 2px 1px lightgrey;border-radius: 5px;"><div style="background:#d3d3d3;height:50px;line-height:50px;"><span style="float:left;margin-left:10px;color:black">创建/编辑钱包</span><span style="float:right;margin-right:0;margin-top:-3px;font-size:20px;font-weight:700;color:#f08080;display:inline-block;height:50px;width:50px;text-align:center;line-height:50px;cursor: pointer;" onclick="document.getElementById('editform').style.display='none'"> x </span></div><div style="padding:10px;margin-top: 20px;text-align: center;"><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">客户UID</p><input name="uid" id="setuid" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">使用中=1 / 冻结=0</p><input name="status" id="setstatus" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">标题/名称</p><input name="title" id="settitle" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">余额</p><input name="balance" id="setbalance" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">RMB汇率</p><input name="exc_rmb" id="setrmb" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">USDT汇率</p><input name="exc_usdt" id="setusdt" style="width: 90%;height: 30px;line-height: 30px;"></div></div><div style="padding:10px;margin-top: 20px;text-align: center;height: 50px;line-height: 50px;"><input type="hidden" name="walletuserid" id="walletuserid" style="width: 90%;height: 30px;line-height: 30px;"><button style="height: 40px;line-height: 40px;width: 100px;border: 0;border-radius: 5px;margin: 0 10px;background: lightcoral;color: white;" onclick="document.getElementById('editform').style.display='none'">取消</button><button style="height: 40px;line-height: 40px;width: 100px;border: 0;border-radius: 5px;margin: 0 10px;background: #4684e0;color: white;" onclick="doaddnew()">提交</button></div></div></div><script>
	function edit(id){
		document.getElementById('editform').style.display='block';
		$.ajax({
			type:'get',
			url:'akszadmin/wallet/walletusergetbyid?id='+id,
			dataType: "json",
		    success: function (res) {
		    	console.log(res);
				$('#setstatus').val(res.status);
				$('#settitle').val(res.title);
				$('#setusdt').val(res.exc_usdt);
				$('#setrmb').val(res.exc_rmb);
				$('#walletuserid').val(res.id);
				$('#setuid').val(res.uid);
				$('#setbalance').val(res.balance);
		    }
			
		});
	}
	function stop(id){
		$.ajax({
			type:'get',
			url:'akszadmin/wallet/walletuserstop?id='+id,
			dataType: "json",
		    success: function (res) {
		    	console.log(res);
		    	layer.msg(res);
		    	setTimeout(location.reload(),1000);
		    }
			
		});
		
	}
	function del(id){
		$.ajax({
			type:'get',
			url:'akszadmin/wallet/walletuserdel?id='+id,
			dataType: "json",
		    success: function (res) {
		    	console.log(res);
		    	layer.msg(res);
		    	setTimeout(location.reload(),1000);
		    }
			
		});
		
	}
	function addnew(){
		document.getElementById('editform').style.display='block';
		$('#setstatus').val("");
		$('#setusdt').val("");
		$('#setrmb').val("");
		$('#settitle').val("");
		$('#walletid').val("0");
		$('#setuid').val("");
		$('#setbalance').val("");
		
	}
	function doaddnew(){
		//var stars=$('#stars').val();
		var status=$('#setstatus').val();
		var exc_usdt=$('#setusdt').val();
		var exc_rmb=$('#setrmb').val();
		var balance=$('#setbalance').val();
		var title=$('#settitle').val();
		var walletuserid=$('#walletuserid').val();
		var uid=$('#setuid').val();
		
		if(status=="" || exc_usdt=="" || exc_rmb=="" || title==""){
			layer.msg("内容不完整，请检查");return;
		}
		var gourl="";
		if(walletuserid>0){
			gourl='akszadmin/wallet/walletuseredit';
			$.ajax({
				type:'post',
				url:gourl,
				dataType: "json",
				data:{status:status,exc_usdt:exc_usdt,exc_rmb:exc_rmb,title:title,id:walletuserid,balance:balance},
			    success: function (res) {
			    	console.log(res);
			    	layer.msg(res);
			    	setTimeout(location.reload(),1000);
			    }
				
			});
		}else{
			gourl='akszadmin/wallet/walletuseradd';
			$.ajax({
				type:'post',
				url:gourl,
				dataType: "json",
				data:{status:status,exc_usdt:exc_usdt,exc_rmb:exc_rmb,title:title,balance:balance,uid:uid},
			    success: function (res) {
			    	console.log(res);
			    	layer.msg(res);
			    	setTimeout(location.reload(),1000);
			    }
				
			});
		}
		
	}
</script></div></div>