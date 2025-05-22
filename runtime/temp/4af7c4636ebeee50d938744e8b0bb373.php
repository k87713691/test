<?php /*a:1:{s:66:"/www/wwwroot/ww1.yx46856.xyz/application/index/view/login/reg.html";i:1716155490;}*/ ?>
﻿<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title><?php echo htmlentities(app('lang')->get('reg_account')); ?></title><script type="text/javascript">
    window.onload = function() {
        //设置适配rem
        var change_rem = ((window.screen.width > 450) ? 450 : window.screen.width) / 375 * 100;
        document.getElementsByTagName("html")[0].style.fontSize = change_rem + "px";
        window.onresize = function() {
            change_rem = ((window.screen.width > 450) ? 450 : window.screen.width) / 375 * 100;
            document.getElementsByTagName("html")[0].style.fontSize = change_rem + "px";
        }
    }
    </script><link rel="stylesheet" type="text/css" href="/static/wap/css/ionic.css"><link rel="stylesheet" type="text/css" href="/static/wap/css/style.css"><style type="text/css">
        /* tipMask CSS */
        .tipMask {
            width: 100%;
            height: 100%;
            background: rgba(95, 95, 95, 0.3);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 3;
        }

        .hide {
            display: none;
        }

        .tipMask .cont {
            width: 80%;
            padding: 5% 10%;
            border-radius: 5px;
            background-color: #FFFFFF;
            position: absolute;
            top: 30%;
            left: 10%;
            text-align: center;
        }

        .tipMask .cont .title {
            /*font-size: .34rem;*/
            /*line-height: .48rem;*/
            color: #191919;
        }

        .tipMask .cont .stitle {
            /*font-size: .3rem;*/
            /*line-height: .42rem;*/
            color: #606060;
            /*margin-top: .36rem;*/
        }

        .tipMask .cont .confirm {
            width: 100%;
            height: .38rem;
            background-color: #EF6F6C;
            border-radius: 4px;
            /*font-size: .34rem;*/
            color: #fff;
            line-height: .38rem;
            text-align: center;
            margin-top: .2rem;
        }
        .confirm {
            background-color: #0084FF !important;
        }
        .newinput{
        	width: 100%;
		    height: 0.51rem;
		    border-bottom: 1px solid #ffffff;
		    padding-top: 0.2rem;
        }
        .newinput .input-text {
		    display: inline-block;
		    vertical-align: top;
		    width: 0.6rem;
		    height: 0.3rem;
		    text-align: justify;
		    text-align-last: justify;
		    font-size: 0.12rem;
		    line-height: 0.3rem;
		    color: white;
		}
		.newbutton {
		    height: 0.4rem;
		    border-radius: 0.05rem;
		    background: #c6d3ec;
		    color: #ffffff;
		    line-height: 0.4rem;
		    text-align: center;
		    font-size: 0.15rem;
		    border: none;
		}
		.signin-footer > a {
		    color: #fff3d9;
		    font-size: .14rem;
		    text-decoration: none;
		}
		.newinput input {
		    display: inline-block;
		    vertical-align: top;
		    border: none;
		    padding: 0;
		    width: 2rem;
		    height: 0.3rem;
		    color: #ffffff;
		    background: transparent;
		    font-size: 0.14rem;
		    line-height: 0.3rem;
		    margin-left: 0.1rem;
		}

    </style></head><body><div class="view-container signin-view" style="background:linear-gradient(90deg,#03aaff,#3a63ff);"><div style="height: 50px;line-height: 50px;font-size: 20px;font-weight: bold;color: white;text-align: center;border-bottom: 1px solid rgba(255,255,255,0.3);"><span style="margin-left: 10px;float: left;" onclick="history.back(-1);"> &lt; </span><span><?php echo htmlentities(app('lang')->get('reg_account')); ?></span></div><form action="" method="post" id="formid"><div class="sign_up"><div class="sign_up_content"><ul class="sign_up_list"><li class="newinput"><span class="input-text">
                                账户:
                            </span><input type="text" placeholder=注册账户 id="phone"></li><li class="newinput"><span class="input-text">
                                姓名:
                            </span><input type="text" placeholder="填写姓名" id="name"></li><li class="newinput"><span class="input-text"><?php echo htmlentities(app('lang')->get('key_password')); ?>:
                            </span><input type="password" placeholder="<?php echo htmlentities(app('lang')->get('user_password')); ?>" id="pwd"></li><li class="newinput"><span class="input-text"><?php echo htmlentities(app('lang')->get('key_confirm')); ?>:
                            </span><input type="password" placeholder="<?php echo htmlentities(app('lang')->get('user_password_confirm')); ?>" id="pwd2"></li><li class="newinput"><span class="input-text"><?php echo htmlentities(app('lang')->get('key_password')); ?>:
                            </span><input type="password" placeholder="<?php echo htmlentities(app('lang')->get('user_ppass')); ?>" id="pwd3"></li><li class="newinput"><span class="input-text"><?php echo htmlentities(app('lang')->get('key_confirm')); ?>:
                            </span><input type="password" placeholder="<?php echo htmlentities(app('lang')->get('user_ppass_confirm')); ?>" id="pwd4"></li><!--<li class="newinput">--><!--    <span class="input-text">--><!--       <?php echo htmlentities(app('lang')->get('key_password')); ?>:--><!--    </span>--><!--    <input type="password" placeholder="<?php echo htmlentities(app('lang')->get('user_ppass')); ?>" id="pwd3">--><!--</li>--><!--<li class="newinput">--><!--    <span class="input-text">--><!--       <?php echo htmlentities(app('lang')->get('key_confirm')); ?>:--><!--    </span>--><!--    <input type="password" placeholder="<?php echo htmlentities(app('lang')->get('user_ppass_confirm')); ?>" id="pwd4">--><!--</li>--><!--<li class="newinput">--><!--    <span class="input-text">--><!--        <?php echo htmlentities(app('lang')->get('key_invitation')); ?>:--><!--    </span>--><!--    <input placeholder="<?php echo htmlentities(app('lang')->get('key_invitation_code')); ?>" id="top" value="<?php echo htmlentities($phone); ?>">--><!--</li>--><!--
                        <li class="newinput"><span class="input-text" style="float: left;"><?php echo htmlentities(app('lang')->get('key_verification_code')); ?>:
                            </span><input type="text" id="verify" style="float: left;width: 135px;"><img src="<?php echo captcha_src(); ?> " alt="captcha" class="verifyimg reloadverify" style="float: left;width: 100px;height: 100%;"/></li>
                        --></ul><!--div style="height: 50px;line-height: 50px;color: white;text-align: center;"><input type="radio" name="agreement" style=""><span style="margin-left: 10px;"><?php echo htmlentities(app('lang')->get('key_agreement')); ?></span></div--><button class="newbutton sign_up_btn" id="reg_btn" type="button"><?php echo htmlentities(app('lang')->get('confirm')); ?></button></div></div></form><div class="signin-footer"><a href="/index/login"><?php echo htmlentities(app('lang')->get('go_login')); ?></a></div></div><div class="tipMask hide"><div class="cont"><p class="title"><?php echo htmlentities(app('lang')->get('key_tips')); ?></p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi" style="background-color:#33B497;"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div></div></div></div></body><script src="/static/wap/js/jquery-1.9.1.min.js"></script><script>
        $(function(){
            // 刷新验证码
            var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
        })
    </script><script type="text/javascript">
    $(function(){
        $('#reg_btn').click(function(){
            
            var phone = $("#phone").val();
   
            var phones = "/^(\+?886\-?|0)?9\d{8}$/";
            // var email= "/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/";
            //if(!email.test(phone.value)&&!phones.test(phone.value)){
            //if(!phones.test(phone)){
                 //msg("错误", "格式错误非邮箱/电话", 1);
                 //return false;
             //}
            if($('#pwd').val() != $('#pwd2').val())
            {
                msg("错误", "登录密码不一致", 1);
                 return false;
            }
            if($('#pwd3').val() != $('#pwd4').val())
            {
                msg("错误", "取款密码不一致", 1);
                 return false;
            }
            var url = "/index/login/reg";
            $.ajax({
                type : "POST",
                url : url,
                data: {
                    phone: $('#phone').val(),
                    name: $('#name').val(),
                    password: $('#pwd').val(),
                    password2: $('#pwd3').val(),
                     password3: $('#pwd3').val(),
                      password4: $('#pwd4').val(),
                    //verify: $('#verify').val(),
                    // top: $('#top').val(),
                },
                dataType : "text",
                success : function(result){
                    result = JSON.parse(result);
                    if (result.code == 1) {
                        msg("<?php echo htmlentities(app('lang')->get('key_tips')); ?>",result.info,2,"/index/user/index");
                        //location.href="/index/user/index"
                    } else {
                        result = JSON.parse(result);
                        msg("<?php echo htmlentities(app('lang')->get('key_tips')); ?>", result.info, 1);
                    }
                },
                error:function(){
                    $("#imgcode").html('8888');
                }
            });
        })
    });
    function msg(title, content, type, url) {
        $(".contents").html(content);
        if (type == 1) {
            var btn = '<div class="confirm guanbi"  style="background-color:#33B497;" onclick="$(\'.tipMask\').hide();"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div>';
        }
        else {
            var btn = '<div class="confirm guanbi"  style="background-color:#33B497;" onclick="window.location.href=\'' + url + '\'"><?php echo htmlentities(app('lang')->get('key_ok')); ?></div>';
        }
        $("#msgBtn").html(btn);
        $(".tipMask").show();
    }
</script></html>
