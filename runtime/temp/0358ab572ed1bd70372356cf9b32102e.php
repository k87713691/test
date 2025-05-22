<?php /*a:2:{s:60:"/www/wwwroot/03/application/akszadmin/view/yuebao/index.html";i:1621319144;s:52:"/www/wwwroot/03/application/akszadmin/view/main.html";i:1619957640;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><!--<script src="static/plugs/jquery/jquery.min.js"></script>--><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5">余额宝理财</span><div class="pull-right"><button onclick="addnew()" class="layui-btn layui-btn-sm layui-btn-primary">
			增加项目
		</button></div></div><div class="think-box-shadow"><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='text-left nowrap'>序号</th><th class='text-left nowrap'>余额宝名称</th><th class='text-left nowrap'>年化收益率(%)</th><th class='text-left nowrap'>锁定天数</th><th class='text-left nowrap'>最低金额(天)</th><th class='text-left nowrap'>推荐</th><th class='text-left nowrap'>添加时间</th><th class='text-left nowrap'>状态</th><th class='text-left nowrap'></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick ><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></label></td><td class='text-left nowrap'><?php echo htmlentities($vo['id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['title']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['lily']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['days']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['lowmoney']); ?></td><td class='text-left nowrap'><?php echo $vo['stars']==0 ? "未推荐" : ""; ?><?php echo $vo['stars']==1 ? "已推荐" : ""; ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['addtime']); ?></td><td class='text-left nowrap'><?php echo $vo['status']==0 ? "已下架" : ""; ?><?php echo $vo['status']==1 ? "已上线" : ""; ?></td><td class='text-left nowrap'><button onclick="stop(<?php echo htmlentities($vo['id']); ?>)"><?php echo $vo['status']==0 ? "上线" : "下线"; ?></button> / <button onclick="edit(<?php echo htmlentities($vo['id']); ?>)">修改</button> / <button onclick="del(<?php echo htmlentities($vo['id']); ?>)">删除</button></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><div id="editform" style="display:none;position: fixed;width: 100%;height: 1000px;top: 0;left: 0;background: rgb(0 0 0 / 50%);z-index: 999;"><div  style="display:block;position:fixed;width:800px;height: 360px;top:50%;left:50%;background:#fff;z-index:3;transform:translate(-50%,0);box-shadow: 0px 0px 2px 1px lightgrey;border-radius: 5px;"><div style="background:#d3d3d3;height:50px;line-height:50px"><span style="float:left;margin-left:10px;color:#009688">创建/编辑余额宝</span><span style="float:right;margin-right:0;margin-top:-3px;font-size:20px;font-weight:700;color:#f08080;display:inline-block;height:50px;width:50px;text-align:center;line-height:50px;cursor: pointer;" onclick="document.getElementById('editform').style.display='none'"> x </span></div><div style="padding:10px;margin-top: 20px;text-align: center;"><div style="width:33%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">标题/名称</p><input name="title" id="settitle" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width:33%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">年化收益率(%)</p><input name="lily" id="setlily" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width:33%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">锁定天数(天)</p><input name="days" id="setdays" style="width: 90%;height: 30px;line-height: 30px;"></div></div><div style="padding:10px;margin-top: 20px;text-align: center;"><div style="width:33%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">最低金额(元)</p><input name="lowmoney" id="setlowmoney" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width:33%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">上线=1 / 下架=0</p><input name="status" id="setstatus" style="width: 90%;height: 30px;line-height: 30px;"></div><div style="width:33%;display:inline-block;line-height: 30px;"><p style="text-align: left;padding-left: 3%;width: 80%;">是否推荐0/1</p><input name="stars" id="stars" style="width: 90%;height: 30px;line-height: 30px;"><input name="yebid" id="yebid" value="0" type="hidden"></div></div><div style="padding:10px;margin-top: 20px;text-align: center;height: 50px;line-height: 50px;"><button style="height: 40px;line-height: 40px;width: 100px;border: 0;border-radius: 5px;margin: 0 10px;background: lightcoral;color: white;" onclick="document.getElementById('editform').style.display='none'">取消</button><button style="height: 40px;line-height: 40px;width: 100px;border: 0;border-radius: 5px;margin: 0 10px;background: #4684e0;color: white;" onclick="doaddnew()">提交</button></div></div></div><script>
	function edit(id){
		document.getElementById('editform').style.display='block';
		$.ajax({
			type:'get',
			url:'akszadmin/yuebao/yebgetbyid?id='+id,
			dataType: "json",
		    success: function (res) {
		    	console.log(res);
		        $('#stars').val(res.stars);
				$('#setstatus').val(res.status);
				$('#setlowmoney').val(res.lowmoney);
				$('#setdays').val(res.days);
				$('#setlily').val(res.lily);
				$('#settitle').val(res.title);
				$('#yebid').val(res.id);
				
		    }
			
		});
	}
	function stop(id){
		$.ajax({
			type:'get',
			url:'akszadmin/yuebao/yebstop?id='+id,
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
			url:'akszadmin/yuebao/yebdel?id='+id,
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
		$('#stars').val("");
		$('#setstatus').val("");
		$('#setlowmoney').val("");
		$('#setdays').val("");
		$('#setlily').val("");
		$('#settitle').val("");
		$('#yebid').val("0");
	}
	function doaddnew(){
		var stars=$('#stars').val();
		var status=$('#setstatus').val();
		var lowmoney=$('#setlowmoney').val();
		var days=$('#setdays').val();
		var lily=$('#setlily').val();
		var title=$('#settitle').val();
		var yebid=$('#yebid').val();
		
		if(status=="" || lowmoney=="" || days=="" || lily=="" || title==""){
			layer.msg("内容不完整，请检查");return;
		}
		var gourl="";
		if(yebid>0){
			gourl='akszadmin/yuebao/yebedit';
		}else{
			gourl='akszadmin/yuebao/yebadd';
		}
		$.ajax({
			type:'post',
			url:gourl,
			dataType: "json",
			data:{stars:stars,status:status,lowmoney:lowmoney,days:days,lily:lily,title:title,yebid:yebid},
		    success: function (res) {
		    	console.log(res);
		    	layer.msg(res);
		    	setTimeout(location.reload(),1000);
		    }
			
		});
	}
</script></div></div>