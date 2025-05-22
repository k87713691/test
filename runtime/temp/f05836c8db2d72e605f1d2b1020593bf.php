<?php /*a:2:{s:68:"/www/wwwroot/sald982.club/application/akszadmin/view/card/index.html";i:1732799387;s:62:"/www/wwwroot/sald982.club/application/akszadmin/view/main.html";i:1619957640;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><style>
.image-viewer {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* 确保在最上层 */
}

.image-viewer img {
    max-width: 90%;
    max-height: 90%;
}

.hide {
    display: none;
}
</style><div class="think-box-shadow"><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><input data-auto-none data-check-target='.list-check-box' type='checkbox'></th><th class='text-center nowrap'>用户id</th><th class="text-center">姓名</th><th class="text-center">身份证</th><th class="text-center">身份证正面</th><th class="text-center">身份证反面</th><th class="text-center">审核状态</th><th class="text-center"></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></td><td class='text-center nowrap'><?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?></td><td class='text-center nowrap'><?php echo htmlentities((isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:'')); ?></td><td class='text-center nowrap'><?php echo htmlentities((isset($vo['id_card']) && ($vo['id_card'] !== '')?$vo['id_card']:'')); ?></td><td class='text-center nowrap'><img src="<?php echo htmlentities((isset($vo['id_card_front']) && ($vo['id_card_front'] !== '')?$vo['id_card_front']:'')); ?>" width='50' height='50' class="preview-image" onclick="openViewer('<?php echo htmlentities((isset($vo['id_card_front']) && ($vo['id_card_front'] !== '')?$vo['id_card_front']:'')); ?>')" alt="身份证正面"></td><td class='text-center nowrap'><img src="<?php echo htmlentities((isset($vo['id_card_back']) && ($vo['id_card_back'] !== '')?$vo['id_card_back']:'')); ?>" width='50' height='50' class="preview-image" onclick="openViewer('<?php echo htmlentities((isset($vo['id_card_back']) && ($vo['id_card_back'] !== '')?$vo['id_card_back']:'')); ?>')" alt="身份证反面"></td><td class='text-center nowrap'><?php if($vo['status']==0): ?>未审核<?php elseif($vo['status']==1): ?>已通过<?php else: ?>未通过<?php endif; ?></td><td class='text-center nowrap'><?php if(auth("akszadmin/card/edit")): if($vo['status']==0): ?><a class="layui-btn" data-action="<?php echo url('statusup'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" data-csrf="<?php echo systoken('statusup'); ?>">审核通过</a><a class="layui-btn" data-action="<?php echo url('statusdown'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" data-csrf="<?php echo systoken('statusdown'); ?>">拒绝通过</a><?php endif; ?><?php endif; if(auth("akszadmin/card/remove")): ?><a class="layui-btn layui-btn-sm layui-btn-danger" data-confirm="确定要删除数据吗?" data-action="<?php echo url('remove'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" data-csrf="<?php echo systoken('remove'); ?>">删 除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><div id="imageViewer" class="image-viewer hide" onclick="closeViewer()"><img id="fullImage" src="" alt="查看图片"></div><script>
function openViewer(imgSrc) {
    // 设置查看器中的图片源
    document.getElementById('fullImage').src = imgSrc;
    // 显示查看器
    document.getElementById('imageViewer').classList.remove('hide');
}

function closeViewer() {
    // 隐藏查看器
    document.getElementById('imageViewer').classList.add('hide');
}
</script></div></div>