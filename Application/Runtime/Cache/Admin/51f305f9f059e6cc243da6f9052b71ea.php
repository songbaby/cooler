<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>

            .tr_color{background-color: #9F88FF}

        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：冷库管理-》冷库列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/cooler/index.php/Admin/Cooler/add">【添加冷库】</a>
                </span>
            </span>
        </div>
        <div></div>
        


        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>冷库名称</td>
                        <td>价格(元/吨/年)</td>
                        <td>联系人</td>
                        <td>电话</td>
                        <td>总吨位</td>
                        <td>剩余吨位</td>
                        <td>经纬度，位置</td>
                        <td>缩略图</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>
                    <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr id="product1">
                        <td><?php echo ($v["id"]); ?></td>
                        <td><a href="#"><?php echo ($v["name"]); ?></a></td>
                        <td><?php echo ($v["price"]); ?></td>
                        <td><?php echo ($v["lianxiren"]); ?> </td>
                        <td><?php echo ($v["phone"]); ?> </td>
                        <td><?php echo ($v["total"]); ?> </td>
                        <td><?php echo ($v["free"]); ?> </td>
                        <td><?php echo ($v["lng"]); ?>,<?php echo ($v["lat"]); ?>,<?php echo ($v["loc"]); ?> </td>
                        <td><img src="<?php echo (ADMIN_UPLOAD_URL); echo ($v["small_img"]); ?>" height="40" width="40"></td>
                        <td><?php echo ($v["create_time"]); ?></td>
                        <td><a href="/cooler/index.php/Admin/Cooler/upd/cooler_id/<?php echo ($v["id"]); ?>">修改</a>
                        <a href="/cooler/index.php/Admin/Cooler/del/cooler_id/<?php echo ($v["id"]); ?>">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($pagelist); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>