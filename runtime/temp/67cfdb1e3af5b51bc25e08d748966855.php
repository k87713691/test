<?php /*a:3:{s:69:"/www/wwwroot/4.fgdw5349.cn/application/index/view/user/uadd_card.html";i:1687700002;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/header.html";i:1737689979;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>添加数字货币</title><style type="text/css">
        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/tipmask.css"><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><div id="app"><div class="box"><div class="jun-content"><div class="f_box_addbank"><div class="t_header"><span><img src="/static/wap/images/goback.png" alt="" onClick="javascript:history.back()"></span><span><i>添加USDT</i></span></div><div class="f_content"><ul><li><label>类型</label><span><input type="text" name="bank" id="bank" value="TRC-20" placeholder="TRC-20" onfocus="this.placeholder=''" onblur="this.placeholder='TRC-20'" ></span></li><input type="hidden" name="name" id="name" value="<?php echo htmlentities($user['name']); ?>"><input type="hidden" name="id" id="id" value="<?php echo htmlentities($user['id']); ?>"><input type="hidden" name="area" id="area" value=""><li><label>地址</label><span><input type="text" name="account" id="account" value="" placeholder="地址" onfocus="this.placeholder=''" onblur="this.placeholder='地址'"></span></li></ul><div class="sure"><button id="sub_btn" type="button" class="el-button el-button--danger">确认绑定 </button></div></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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
				</script></div></div><div class="tipMask hide"><div class="cont"><p class="title">温馨提示</p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi">确定</div></div></div></div></body><script type="text/javascript" src="/static/theme/index/js/jquery.js"></script><script type="text/javascript">
    $(function () {
        $("#sub_btn").on("click", function () {
            var bank = $('#bank').val();
            var area = $('#account').val();
            var account = $('#account').val();
            var name = $('#name').val();
            var id = $('#id').val();
            if (account.length < 10) {
                msg("错误", "地址", 1);
                return false;
            }
             
            var url = "/index/user/uadd_card";
            $.ajax({
                type : "POST",
                url : url,
                data: {'bank':bank,'area':area,'account':account,'name':name,'id':id},
                dataType : "json",
                success : function(result){
                    if(result.code == 1){
                         msg("提示",result.info,1);
                        window.location.href = "/index/user/bank_card"
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
            var btn = '<div class="confirm guanbi" onclick="$(\'.tipMask\').hide();">确定</div>';
        }
        else {
            var btn = '<div class="confirm guanbi" onclick="window.location.href=\'' + url + '\'">确定</div>';
        }
        $("#msgBtn").html(btn);
        $(".tipMask").show();
    }
</script></html>
