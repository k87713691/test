<?php /*a:2:{s:70:"/www/wwwroot/ww1.yx46856.xyz/application/akszadmin/view/cash/edit.html";i:1665425152;s:65:"/www/wwwroot/ww1.yx46856.xyz/application/akszadmin/view/main.html";i:1619957640;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><form onsubmit="return false;" action="<?php echo request()->url(); ?>" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-card-body think-box-shadow padding-left-40"><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs4 relative"><span class="color-green">银行名称</span><input   class="layui-input"  value="<?php echo htmlentities((isset($vo['bank']) && ($vo['bank'] !== '')?$vo['bank']:'')); ?>" style="border:none"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs4 relative"><span class="color-green">支行名称</span><input   class="layui-input"  value="<?php echo htmlentities((isset($vo['area']) && ($vo['area'] !== '')?$vo['area']:'0')); ?>" style="border:none"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs4 relative"><span class="color-green">银行卡号</span><input   class="layui-input"   value="<?php echo htmlentities((isset($vo['account']) && ($vo['account'] !== '')?$vo['account']:'')); ?>" style="border:none"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs4 relative"><span class="color-green">提现金额</span><input   class="layui-input"   value="<?php echo htmlentities((isset($vo['money']) && ($vo['money'] !== '')?$vo['money']:'')); ?>" style="border:none"></label></div><div class="layui-form-item block"><span class="color-green">拒绝理由</span><input name="reaolae"  class="layui-input"      ></div><div class="layui-form-item text-center"><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): ?><input type="hidden" name="id" value="<?php echo htmlentities($vo['id']); ?>"><?php endif; ?><button class="layui-btn" type="submit">立即拒绝</button></div></div></form></div><script>window.form.render();
require(['ckeditor', 'angular'], function() {
    window.createEditor('[name="content"]', { height: 500 });
    var app = angular.module("GoodsForm", []).run(callback);
    angular.bootstrap(document.getElementById(app.name), [app.name]);

    function callback($rootScope) {
        $rootScope.hsitoryBack = function() {
            $.msg.confirm('确定要取消编辑吗？', function(index) {
                history.back(), $.msg.close(index);
            });
        };
    }

})
</script></div>