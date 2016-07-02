<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改冷库</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
            <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：冷库管理-》修改冷库信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/cooler/index.php/Admin/Goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/cooler/index.php/Admin/Cooler/upd/cooler_id/16" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />

                <table border="1" width="100%" class="table_a">
                    <tr>
                        <td>冷库名称</td>
                        <td><input type="text" name="name" value="<?php echo ($info["name"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>联系人</td>
                        <td><input type="text" name="lianxiren" value="<?php echo ($info["lianxiren"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>联系电话</td>
                        <td><input type="text" name="phone" value="<?php echo ($info["phone"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>冷库价格</td>
                        <td><input type="text" name="price" value="<?php echo ($info["price"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>总吨位</td>
                        <td><input type="text" name="total" value="<?php echo ($info["total"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>剩余吨位</td>
                        <td><input type="text" name="free" value="<?php echo ($info["free"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>冷库位置</td>
                        <td><input type="text" name="loc" value="<?php echo ($info["loc"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>冷库经度</td>
                        <td><input type="text" name="lng" value="<?php echo ($info["lng"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>冷库纬度</td>
                        <td><input type="text" name="lat" value="<?php echo ($info["lat"]); ?>"/></td>
                    </tr>
                    <tr>
                        <td>冷库图片 </td>
                        <td><img src="<?php echo (ADMIN_UPLOAD_URL); echo ($info["small_img"]); ?>" height="40" width="40">
                    </tr>
                    <tr>
                        <td>更换冷库图片</td>
                        <td><input type="file" name="img" /></td>
                    </tr>
                    <tr>
                        <td>冷库详细描述</td>
                        <td>
                            <textarea name="note"><?php echo ($info["note"]); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="修改">
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </body>
</html>