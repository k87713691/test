<?php /*a:3:{s:71:"/www/wwwroot/ww1.yx46856.xyz/application/index/view/user/pwd_login.html";i:1622098134;s:70:"/www/wwwroot/ww1.yx46856.xyz/application/index/view/public/header.html";i:1623358146;s:70:"/www/wwwroot/ww1.yx46856.xyz/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>设置密码</title><style type="text/css">        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/tipmask.css"><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><style>	body{
		background: #e4e4e4;
	}
	.t_header {
	    height: 1.2rem;
	    background-color: #ffffff;
	    display: flex;
	    flex-direction: row;
	    position: relative;
	}
	.t_header span:last-child i {
	    font-size: .48rem;
	    position: absolute;
	    left: 46%;
	    top: 50%;
	    transform: translate(-50%, -50%);
	    color: black;
	}
	.f_box_bank .f_content ul li {
	    height: 1.333333rem;
	    line-height: 1.333333rem;
	    padding-left: 1.066666rem;
	    text-align: left;
	    background: #e4e4e4;
	    border-bottom: .026667rem solid #d4d4d4;
	    position: relative;
	    color: gray;
	}
	label {
	    cursor: default;
	    color:gray;
	}

	
</style><div id="app"><div class="box"><div class="jun-content"><div class="f_box_addbank"><div class="t_header"><span><img src="/static/wap/images/icon_back.png" alt="" onClick="javascript:history.back()"></span><span><i>修改登录密码</i></span></div><div class="f_content"><ul><li><label>原登录密码</label><span><input type="password" name="oldpwd" id="oldpwd" value="" placeholder="输入原登录密码" onfocus="this.placeholder=''" onblur="this.placeholder='输入原登录密码'"></span></li><li><label>新登录密码</label><span><input type="password" name="pwd" id="pwd" value="" placeholder="输入新登录密码" onfocus="this.placeholder=''" onblur="this.placeholder='输入新登录密码'"></span></li><li><label>确认密码</label><span><input type="password" name="pwd2" id="pwd2" value="" placeholder="输入确认密码" onfocus="this.placeholder=''" onblur="this.placeholder='输入确认密码'"></span></li></ul><div class="sure"><button id="sub_btn" type="button" class="el-button el-button--danger">确认 </button></div></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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
				</script></div></div><div class="tipMask hide"><div class="cont"><p class="title">温馨提示</p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi">确定</div></div></div></div></body><script type="text/javascript" src="/static/theme/index/js/jquery.js"></script><script type="text/javascript">    $(function () {
        $("#sub_btn").on("click", function () {
            var oldpwd = $("#oldpwd").val();
            var pwd = $("#pwd").val();
            var pwd2 = $("#pwd2").val();
            if (oldpwd.length < 6 || oldpwd.length > 16) {
                msg("错误", "请输入6-16个字符的原登录密码！", 1);
                return false;
            }
            if (pwd.length < 6 || pwd.length > 16) {
                msg("错误", "请输入6-16个字符的新登录密码！", 1);
                return false;
            }
            if (pwd2.length < 6 || pwd2.length > 16) {
                msg("错误", "请再次输入6-16个字符的新登录密码！", 1);
                return false;
            }
            if (pwd != pwd2) {
                msg("错误", "两次密码不一致！", 1);
                return false;
            }
            var url = "/index/user/pwd_login";
            $.ajax({
                type : "POST",
                url : url,
                data: {'pwd':pwd,'pwd2':pwd2,'oldpwd':oldpwd},
                dataType : "json",
                success : function(result){
                    if(result.code == 1){
                        window.location.href = "/index/user/index"
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