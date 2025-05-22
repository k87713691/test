<?php /*a:2:{s:71:"/www/wwwroot/x.yc66453.cn/application/akszadmin/view/info/payments.html";i:1622140918;s:62:"/www/wwwroot/x.yc66453.cn/application/akszadmin/view/main.html";i:1619957640;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><button class='layui-btn layui-btn-sm layui-btn-primary' onclick="addnew()">添加支付方式</button></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><input data-auto-none data-check-target='.list-check-box' type='checkbox'></th><th class='list-table-sort-td'><button type="button" data-reload class="layui-btn layui-btn-xs">刷 新</button></th><th class='text-left nowrap' width="10%">二维码</th><th class='text-left nowrap' width="10%">支付名称</th><th class='text-left nowrap' width="15%">链接地址</th><th class='text-left nowrap' width="25%">附加信息</th><th class='text-left nowrap' width="5%">状态</th><th></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick><td class='list-table-check-td think-checkbox'><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></td><td class='list-table-sort-td'><input class="list-sort-input" value='<?php echo htmlentities($vo['id']); ?>'></td><td class='text-left nowrap'><?php if(!(empty($vo['img']) || (($vo['img'] instanceof \think\Collection || $vo['img'] instanceof \think\Paginator ) && $vo['img']->isEmpty()))): ?><img data-tips-image style="width:100px;height:50px" src="<?php echo htmlentities((isset($vo['img']) && ($vo['img'] !== '')?$vo['img']:'')); ?>" class="margin-right-5 text-top"><?php endif; ?></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:'--')); ?></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['addr']) && ($vo['addr'] !== '')?$vo['addr']:'--')); ?></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['more']) && ($vo['more'] !== '')?$vo['more']:'--')); ?></td><td class='text-left nowrap'><?php if($vo['status'] == 0): ?><span class="color-desc">已失效</span><?php endif; if($vo['status'] == 1): ?><span class="color-green">正常</span><?php endif; ?></td><td class='text-left nowrap'><div class="nowrap margin-bottom-5"><a class="layui-btn layui-btn-sm" onclick="editlist(<?php echo htmlentities($vo['id']); ?>)">编 辑</a><a class="layui-btn layui-btn-sm layui-btn-danger" onclick="delpayment(<?php echo htmlentities($vo['id']); ?>)">删 除</a></div></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><div id="editform" class="layui-card-body padding-left-40" style="    display: none;    position: fixed;background: white;    border: 2px dotted;    left: 50%;    top: 50%;    transform: translate(-50%);"><div style="    display: block;    position: relative;    width: 100%;    height: 50px;    line-height: 50px;    margin: 0;    text-align: center;    border-bottom: 2px solid;    margin-bottom: 20px;"><span>添加/编辑支付方式</span></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs4 relative"><span class="color-green">支付名称</span><input name="title" class="layui-input" placeholder="支付名称" value=""></label><label class="layui-col-xs4 relative"><span class="color-green">链接地址</span><input name="addr" class="layui-input" placeholder="链接地址" value=""></label><label class="layui-col-xs4 relative"><span class="color-green">状态</span><input name="status" class="layui-input" placeholder="状态" value=""></label><input name="id" class="layui-input" type="hidden" value=""></div><div class="layui-form-item layui-row layui-col-space15"><span class="color-green">附加信息</span><br><input name="more" class="layui-input" type="text" multiple="true" style="width:90%"></div><div class="layui-form-item layui-row layui-col-space15"><span class="color-green label-required-prev">上传二维码图片</span><table class="layui-table"><thead><tr><th class="text-center">300x300像素</th></tr><tr><td width="160px" height="80px" class="text-center"><input name="path" type="hidden" value=""></td></tr></thead></table><script>$('[name="path"]').uploadOneImage()</script></div><div class="layui-form-item text-center"><input type='hidden' value='0' name='id'><button class="layui-btn" type='button' onclick="dosave()">保存数据</button><button class="layui-btn layui-btn-danger" type='button' onclick="document.getElementById('editform').style.display='none'" data-close>取消编辑</button></div></div><script>	function addnew(){
		$('[name="id"]').val("");
		$('[name="title"]').val("");
		$('[name="status"]').val("");
		$('[name="addr"]').val("");
		$('[name="path"]').val("");
		$('[name="more"]').val("");
		document.getElementById('editform').style.display='block';
		
	};
	function editlist(id){
		$.ajax({
			type:'get',
			url:'akszadmin/info/getpaymentbyid?id='+id,
			dataType: "json",
			success: function (res) {
				$('[name="id"]').val(res.id);
				$('[name="title"]').val(res.title);
				$('[name="status"]').val(res.status);
				$('[name="addr"]').val(res.addr);
				$('[name="path"]').val(res.img);
				$('[name="more"]').val(res.more);
				//$('.uploadimage').css('');
				document.getElementById('editform').style.display='block';
			},
		});
	};
	function delpayment(id){
		$.ajax({
			type:'get',
			url:'akszadmin/info/delpaymentbyid?id='+id,
			dataType: "json",
			success: function (res) {
				if(res=="ok"){
						layer.msg('操作成功！');
						document.getElementById('editform').style.display='none';
						window.setTimeout(window.location.reload(),1000);
						
					}else{
						layer.msg(res);
					}
			},
		});
		
	}
	function dosave(){
		var id=$('[name="id"]').val();
		var title=$('[name="title"]').val();
		var status=$('[name="status"]').val();
		var addr=$('[name="addr"]').val();
		var img=$('[name="path"]').val();
		var more=$('[name="more"]').val();
		if(id>0){
			$.ajax({
				type:'post',
				url:'akszadmin/info/editpayment',
				dataType: "json",
				data:{id:id,title:title,status:status,addr:addr,img:img,more:more},
				success: function (res) {
					if(res=="ok"){
						layer.msg('操作成功！');
						document.getElementById('editform').style.display='none';
						window.setTimeout(window.location.reload(),1000);
						
					}else{
						layer.msg(res);
					}
					//$('.uploadimage').css('');
					
				},
			});
		}else{
			$.ajax({
				type:'post',
				url:'akszadmin/info/addpayment',
				dataType: "json",
				data:{title:title,status:status,addr:addr,img:img,more:more},
				success: function (res) {
					if(res=="ok"){
						layer.msg('操作成功！');
						document.getElementById('editform').style.display='none';
						window.setTimeout(window.location.reload(),1000);
						
					}else{
						layer.msg(res);
					}
					//$('.uploadimage').css('');
					
				},
			});
			
		}
	}
</script></div></div>