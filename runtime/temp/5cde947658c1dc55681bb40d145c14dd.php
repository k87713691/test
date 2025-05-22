<?php /*a:2:{s:68:"/www/wwwroot/gxzqht.top/application/akszadmin/view/wallet/index.html";i:1622092908;s:60:"/www/wwwroot/gxzqht.top/application/akszadmin/view/main.html";i:1619939640;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><!--<script src="static/plugs/jquery/jquery.min.js"></script>--><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5">前台钱包配置</span><div class="pull-right"><button onclick="addnew()" class="layui-btn layui-btn-sm layui-btn-primary">
			增加钱包
		</button></div></div><div class="think-box-shadow"><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='text-left nowrap'>序号</th><th class='text-left nowrap'>钱包名称</th><th class='text-left nowrap'>RMB汇率(%)</th><th class='text-left nowrap'>USDT汇率</th><th class='text-left nowrap'>添加时间</th><th class='text-left nowrap'>状态</th><th class='text-left nowrap'>操作</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick ><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></label></td><td class='text-left nowrap'><?php echo htmlentities($vo['id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['title']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['exc_rmb']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['exc_usdt']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['addtime']); ?></td><td class='text-left nowrap'><?php echo $vo['status']==0 ? "已下架" : ""; ?><?php echo $vo['status']==1 ? "已上线" : ""; ?></td><td class='text-left nowrap'><button onclick="stop(<?php echo htmlentities($vo['id']); ?>)"><?php echo $vo['status']==0 ? "上线" : "下线"; ?></button> / <button onclick="edit(<?php echo htmlentities($vo['id']); ?>)">修改</button> / <button onclick="del(<?php echo htmlentities($vo['id']); ?>)">删除</button></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><div id="editform" style="display: none; position: fixed; width: 100%; height: 1000px; top: 0px; left: 0px; background: rgba(0, 0, 0, 0.5); z-index: 999;"><div style="display:block;position:fixed;width: 300px;height: 450px;top:50%;left:50%;background:#fff;z-index:3;transform:translate(-50%,0);box-shadow: 0px 0px 2px 1px lightgrey;border-radius: 5px;"><div style="background:#d3d3d3;height:50px;line-height:50px;"><span style="float:left;margin-left:10px;color:black">创建/编辑钱包</span><span style="float:right;margin-right:0;margin-top:-3px;font-size:20px;font-weight:700;color:#f08080;display:inline-block;height:50px;width:50px;text-align:center;line-height:50px;cursor: pointer;" onclick="document.getElementById('editform').style.display='none'"> x </span></div><div style="padding:10px;margin-top: 20px;text-align: center;"><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">上线=1 / 下架=0</p><input name="status" id="setstatus" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">标题/名称</p><input name="title" id="settitle" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">RMB汇率</p><input name="exc_rmb" id="setrmb" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width: 100%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">USDT汇率</p><input name="exc_usdt" id="setusdt" style="width: 90%;height: 30px;line-height: 30px;"></div></div><div style="padding:10px;margin-top: 20px;text-align: center;height: 50px;line-height: 50px;"><input type="hidden" name="walletid" id="walletid" style="width: 90%;height: 30px;line-height: 30px;"><button style="height: 40px;line-height: 40px;width: 100px;border: 0;border-radius: 5px;margin: 0 10px;background: lightcoral;color: white;" onclick="document.getElementById('editform').style.display='none'">取消</button><button style="height: 40px;line-height: 40px;width: 100px;border: 0;border-radius: 5px;margin: 0 10px;background: #4684e0;color: white;" onclick="doaddnew()">提交</button></div></div></div><script>
	function edit(id){
		document.getElementById('editform').style.display='block';
		$.ajax({
			type:'get',
			url:'akszadmin/wallet/walletgetbyid?id='+id,
			dataType: "json",
		    success: function (res) {
		    	console.log(res);
				$('#setstatus').val(res.status);
				$('#settitle').val(res.title);
				$('#setusdt').val(res.exc_usdt);
				$('#setrmb').val(res.exc_rmb);
				$('#walletid').val(res.id);
				
		    }
			
		});
	}
	function stop(id){
		$.ajax({
			type:'get',
			url:'akszadmin/wallet/walletstop?id='+id,
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
			url:'akszadmin/wallet/walletdel?id='+id,
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
	//	$('#stars').val("");
		$('#setstatus').val("");
		$('#setusdt').val("");
		$('#setrmb').val("");
		$('#settitle').val("");
		$('#walletid').val("0");
	}
	function doaddnew(){
		//var stars=$('#stars').val();
		var status=$('#setstatus').val();
		var exc_usdt=$('#setusdt').val();
		var exc_rmb=$('#setrmb').val();
	//	var title=$('#settitle').val();
		var title=$('#settitle').val();
		var walletid=$('#walletid').val();
		
		if(status=="" || exc_usdt=="" || exc_rmb=="" || title==""){
			layer.msg("内容不完整，请检查");return;
		}
		var gourl="";
		if(walletid>0){
			gourl='akszadmin/wallet/walletedit';
			$.ajax({
				type:'post',
				url:gourl,
				dataType: "json",
				data:{status:status,exc_usdt:exc_usdt,exc_rmb:exc_rmb,title:title,id:walletid},
			    success: function (res) {
			    	console.log(res);
			    	layer.msg(res);
			    	setTimeout(location.reload(),1000);
			    }
				
			});
		}else{
			gourl='akszadmin/wallet/walletadd';
			$.ajax({
				type:'post',
				url:gourl,
				dataType: "json",
				data:{status:status,exc_usdt:exc_usdt,exc_rmb:exc_rmb,title:title},
			    success: function (res) {
			    	console.log(res);
			    	layer.msg(res);
			    	setTimeout(location.reload(),1000);
			    }
				
			});
		}
		
	}
</script></div></div>