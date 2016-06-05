<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <link rel="stylesheet" href="/cooler/Public/Home/css/style.css"/>
    <style>
    </style>
</head>

<body>

<div id="top">
    dsgg仿
</div>

<div id="content">
    <div id="left">
    <ul>
        <li><a href="#">金乡镇</a></li>
        <li><a href="#">马庙</a></li>
        <li><a href="#">鱼山</a></li>
    </ul>
</div>

    <div id="right"></div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3nbIhiC4xvRt2ofWcRPAo4uj"></script>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("right");
    var point = new BMap.Point(116.417854,39.921988);
    map.centerAndZoom(point, 15);
    var opts = {
        position : point,    // 指定文本标注所在的地理位置
        offset   : new BMap.Size(30, -30)    //设置文本偏移量
    }
    var label = new BMap.Label("欢迎使用百度地图，这是一个简单的文本标注哦~", opts);  // 创建文本标注对象
    label.setStyle({
        color : "red",
        fontSize : "12px",
        height : "20px",
        lineHeight : "20px",
        fontFamily:"微软雅黑"
    });
    map.addOverlay(label);
</script>



</div>

<div id="bottum">
    dsgg仿f
</div>