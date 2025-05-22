<?php /*a:3:{s:73:"/www/wwwroot/4.fgdw5349.cn/application/index/view/user/certification.html";i:1732806345;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/header.html";i:1737689979;s:68:"/www/wwwroot/4.fgdw5349.cn/application/index/view/public/footer.html";i:1732714105;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><meta content="email=no" name="format-detection"><title>实名认证</title><style type="text/css">
        html {
            font-size: 35px;
        }
    </style><link rel="stylesheet" type="text/css" href="/static/wap/css/common.css"><script type="text/javascript" src="/bignumber.min.js"></script></head><body><link rel="stylesheet" type="text/css" href="/static/wap/css/tipmask.css"><link rel="stylesheet" type="text/css" href="/static/wap/css/box_pay.css"><style>
    .eye-icon {
        width: 20px;
        height: 20px;
        cursor: pointer;
        position: relative;
        top: 14px;
        margin-left: -30px;
    }
    .input-container {
        position: relative;
        display: inline-block;
    }
    .upload-container {
        position: relative;
        width: 214px; /* 可以根据需要调整宽度 */
        height: 135px; /* 可以根据需要调整高度 */
        border: 2px dashed #007bff; /* 边框样式 */
        border-radius: 10px; /* 圆角边框 */
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        margin: 10px 0; /* 上下外边距 */
        transition: border-color 0.3s; /* 边框颜色过渡 */
    }

    .upload-container:hover {
        border-color: #0056b3; /* 鼠标悬停时边框颜色 */
    }

    .file-upload {
        display: none; /* 隐藏原始文件输入框 */
    }

    .upload-label {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .upload-icon {
        font-size: 40px; /* 加号的字号 */
        color: #007bff; /* 加号的颜色 */
    }

    .preview-img {
        width: 214px;
        height: 135px;
        /*margin-top: 10px;  上边距 */
        border-radius: 10px; /* 圆角 */
    }
</style><div id="app"><div class="box"><div class="jun-content"><div class="f_box_addbank"><div class="t_header"><span><img src="/static/wap/images/goback.png" alt="" onClick="javascript:history.back()"></span><span><i>实名认证</i></span></div><div class="f_content"><?php if(!empty($card) && $card['status']==1): ?><div style="padding: 1rem;text-align: center;">
                        已认证
                    </div><ul><li><label>姓名</label><span><?php echo htmlentities($card['name']); ?></span></li><li><label>身份证号</label><span><?php echo htmlentities($card['id_card']); ?></span></li></ul><!--<div style="display: flex;flex-direction: column;align-items: center;text-align:center;">--><!--    <div>--><!--        <label>身份证正面</label>--><!--            <span class="upload-container">--><!--                <img src="<?php echo htmlentities($card['id_card_front']); ?>" id="frontPreview" class="preview-img" src="" alt="身份证正面预览" style="display:black;" />--><!--            </span> --><!--    </div>--><!--    <div>--><!--        <label>身份证反面</label>--><!--            <span class="upload-container">--><!--                <img src="<?php echo htmlentities($card['id_card_back']); ?>" id="backPreview" class="preview-img" src="" alt="身份证反面预览" style="display:black;" />--><!--            </span>--><!--    </div>--><!--</div>--><?php elseif(!empty($card) && $card['status']==0): ?><div style="padding: 1rem;text-align: center;">
                        实名审核中
                    </div><ul><li><label>姓名</label><span><?php echo htmlentities($card['name']); ?></span></li><li><label>身份证号</label><span><?php echo htmlentities($card['id_card']); ?></span></li></ul><!--<div style="display: flex;flex-direction: column;align-items: center;text-align:center;">--><!--    <div>--><!--        <label>身份证正面</label>--><!--            <span class="upload-container">--><!--                <img src="<?php echo htmlentities($card['id_card_front']); ?>" id="frontPreview" class="preview-img" src="" alt="身份证正面预览" style="display:black;" />--><!--            </span> --><!--    </div>--><!--    <div>--><!--        <label>身份证反面</label>--><!--            <span class="upload-container">--><!--                <img src="<?php echo htmlentities($card['id_card_back']); ?>" id="backPreview" class="preview-img" src="" alt="身份证反面预览" style="display:black;" />--><!--            </span>--><!--    </div>--><!--</div>--><?php else: if(!empty($card) && $card['status']==2): ?><div style="padding: 1rem;text-align: center;">
                            未通过请重新提交
                        </div><?php endif; ?><ul><li><label>姓名</label><span><input type="text" name="name" id="name" value="" placeholder="输入姓名" onfocus="this.placeholder=''" onblur="this.placeholder='输入姓名'"></span></li><li><label>身份证号</label><span><input type="password" name="id_card" id="idcard" value="" placeholder="输入身份证号" 
                                       onfocus="this.placeholder=''" 
                                       onblur="this.placeholder='输入身份证号'"><!--<img src="/static/image/eye-icon.png" alt="显示" class="eye-icon" id="togglePassword" onclick="togglePassword()" />--></span></li></ul><div style="    display: flex;flex-direction: column;align-items: center;text-align:center;"><div><label>身份证正面</label><span class="upload-container"><input type="file" name="id_card_front" id="id_card_front" class="file-upload" accept="image/*" onchange="previewImage(this, 'frontPreview')" /><label for="id_card_front" class="upload-label"><span class="upload-icon">+</span></label><img width='214' height='135' id="frontPreview" class="preview-img" src="" alt="身份证正面预览" style="display:none;" /></span></div><div><label>身份证反面</label><span class="upload-container"><input type="file" name="id_card_back" id="id_card_back" class="file-upload" accept="image/*" onchange="previewImage(this, 'backPreview')" /><label for="id_card_back" class="upload-label"><span class="upload-icon">+</span></label><img width='214' height='135' id="backPreview" class="preview-img" src="" alt="身份证反面预览" style="display:none;" /></span></div></div><div class="sure"><button id="sub_btn" type="button" class="el-button el-button--danger">确认 </button></div><?php endif; ?></div></div></div><div class="footer"><div><a href="/index/index/home" class="t_span one"><i></i><span><?php echo htmlentities(app('lang')->get('key_market')); ?></span></a></div><div><a href="/index/user/yeb" class="t_span three"><i></i><span><?php echo htmlentities(app('lang')->get('yuebao_title')); ?></span></a></div><div><a href="/index/user/hold" class="t_span four"><i></i><span><?php echo htmlentities(app('lang')->get('key_orders')); ?></span></a></div><div><a href="<?php echo getInfo('service'); ?>" class="t_span five"><i></i><span><?php echo htmlentities(app('lang')->get('key_cs')); ?></span></a></div><div><a href="/index/user/index" class="t_span fix"><i></i><span><?php echo htmlentities(app('lang')->get('key_mine')); ?></span></a></div></div><script type="text/javascript" src="/static/wap/js/jquery-1.9.1.min.js"></script><script type="text/javascript">
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
				</script></div></div><div class="tipMask hide"><div class="cont"><p class="title">温馨提示</p><p class="stitle contents"></p><div id="msgBtn"><div class="confirm guanbi">确定</div></div></div></div><script type="text/javascript" src="/static/theme/index/js/jquery.js"></script><script type="text/javascript">
    $(function () {
        $("#sub_btn").on("click", function () {
            var name = $("#name").val();
            var idcard = $("#idcard").val();
            var frontFile = $("#id_card_front")[0].files[0]; // 获取身份证正面文件
            var backFile = $("#id_card_back")[0].files[0]; // 获取身份证反面文件

            if (name.length < 2) {
                msg("错误", "输入姓名！", 1);
                return false;
            }
            if (idcard.length < 15) {
                msg("错误", "输入身份证号！", 1);
                return false;
            }
            if (!frontFile) {
                msg("错误", "请上传身份证正面！", 1);
                return false;
            }
            if (!backFile) {
                msg("错误", "请上传身份证反面！", 1);
                return false;
            }

            var url = "/index/user/certification";
            var formData = new FormData(); // 创建 FormData 对象
            formData.append('name', name);
            formData.append('id_card', idcard);
            formData.append('id_card_front', frontFile); // 添加身份证正面文件
            formData.append('id_card_back', backFile); // 添加身份证反面文件

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // 不处理数据
                contentType: false, // 不设置内容类型
                dataType: "json",
                success: function (result) {
                    if (result.code == 1) {
                        // window.location.href = "/index/user/index";
                    } else {
                        msg("提示", result.info, 1);
                    }
                }
            });
        });
    });

    function previewImage(input, previewId) {
        var file = input.files[0]; // 获取文件对象
        var preview = document.getElementById(previewId);
        
        if (file) {
            var reader = new FileReader(); // 创建 FileReader 对象
            reader.onload = function(e) {
                preview.src = e.target.result; // 设置预览图的 src
                preview.style.display = "block"; // 显示预览图
            }
            reader.readAsDataURL(file); // 读取文件作为 Data URL
        } else {
            preview.src = ""; // 如果没有选择文件，清空 src
            preview.style.display = "none"; // 隐藏预览图
        }
    }

    function togglePassword() {
        var idCardInput = document.getElementById("idcard");
        var eyeIcon = document.getElementById("togglePassword");
        
        if (idCardInput.type === "password") {
            idCardInput.type = "text"; // 显示密码
            eyeIcon.src = "/static/image/eye-open-icon.png"; // 更换为显示眼睛图标
        } else {
            idCardInput.type = "password"; // 隐藏密码
            eyeIcon.src = "/static/image/eye-icon.png"; // 更换为隐藏眼睛图标
        }
    }

    function msg(title, content, type, url) {
        $(".contents").html(content);
        var btn = '<div class="confirm guanbi" onclick="$(\'.tipMask\').hide();">确定</div>';
        $("#msgBtn").html(btn);
        $(".tipMask").show();
    }
</script></body></html>
