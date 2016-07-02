<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <script type="text/JavaScript" src='<?php echo (JS_URL); ?>jquery_1.6.1.js'></script>
<style>
    body{background:#fff;}
    table,th,td{border:solid 0px #dcdcdc;background:#F1F1F1;}
    th{width:80px; font-size: 12px;}
    #top{background:url("<?php echo (ADMIN_IMG_URL); ?>header_right.jpg") #F1F1F1 10px 10px no-repeat;height:80px;border-bottom: solid 1px #ccc;}
    div.login{background: #F1F1F1;width:600px;border:solid 1px #ccc;padding:20px;margin:0px auto;margin-top:30px;}
    .title{font-size:16px;height: 35px;}
    .left{width:280px;}
</style>

<script >
    function change_code(obj){

        $("#code").attr("src","/cooler/index.php/Admin/Manager/verifyImg" + '/'+Math.random());
        console.log($("#code").attr("src"));
    }
</script>

</head>
<body>
<div id="top">

</div>
<div class="login">
    <form action="/cooler/index.php/Admin/Manager/login.html" method="post" id="login">
        <div class="title">
            后盾网 | 登录后台
        </div>
        <table border="1" width="100%">
            <tr>
                <th>管理员帐号:</th>
                <td>
                    <input type="username" name="mg_username" class="len250"/>
                </td>
            </tr>
            <tr>
                <th>密码:</th>
                <td>
                    <input type="password" class="len250" name="mg_password"/>
                </td>
            </tr>
            <tr>
                <th>验证码:</th>
                <td>
                    <input type="code" class="len250" name="captcha"/> <img src="/cooler/index.php/Admin/Manager/verifyImg" id="code"/> <a href="javascript:void(change_code(this));">看不清</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:160px;"> <input type="submit" class="submit" value="登录"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>