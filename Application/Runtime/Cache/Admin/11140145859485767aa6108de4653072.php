<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改管理员信息</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：管理员管理-》修改管理员信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/cooler/index.php/Admin/Goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            {*/shop/index.php/Admin/Goods/add*}
            <form action="/cooler/index.php/Admin/Manager/upd/mg_id/4" method="post" enctype="multipart/form-data">
            <input type='hidden' name='mg_id' value='<?php echo ($mg_id); ?>' />
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>管理员名称</td>
                    <td><input type="text" name="mg_name" value='<?php echo ($info["mg_name"]); ?>'/></td>
                </tr>
                <tr>
                    <td>角色</td>
                    <td>
                        <select name='mg_role_id'>
                            <option value='0'>请选择</option>
                            <?php if(is_array($rinfo)): foreach($rinfo as $key=>$v): ?><option value="<?php echo ($v); ?>"> <?php echo ($v); ?> </option><?php endforeach; endif; ?>

                            {html_options options=$rinfo selected=$role_id}
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>