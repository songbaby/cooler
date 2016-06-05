<?php if (!defined('THINK_PATH')) exit();?><html>


<head>
    <link rel="stylesheet" href="/cooler/Public/Home/css/style.css"/>
    <style>
    </style>
</head>


<body>
<?php dump($info_cooler) ?>;


<div id="top">

    <form id="form1" name="form1" method="post" action="">

      <div align="center">
        <p>
          <input type="text" name="search" id="search" />
          <input type="submit" name="search2" id="search2" value="search" />
            <div>
          <ul>
              <li style="float:right;">
                   列表
              </li>
              <li style="float:right;">
                  -
              </li>
              <li style="float:right;">
                  地图
              </li>
          </ul>

            </div>
        </p>
      </div>
    </form>

</div>

<div id="content">
    <div id="left">
    <ul>
        <li><a onclick="addp()">金乡镇</a></li>
        <li><a href="#">马庙</a></li>
        <li><a href="#">鱼山</a></li>
    </ul>
</div>
    <div id="right_map"></div>
    <div id="right_list"></div>
</div>


<div id="bottum">
    网络文化经营许可证：浙网文[2013]0268-027号|增值电信业务经营许可证：浙B2-20080224|信息网络传播视听节目许可证：1109364号|互联网违法和不良信息举报电话:0571-81683755 blxx@list.alibaba-inc.com
</div>

</body>
</html>




<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3nbIhiC4xvRt2ofWcRPAo4uj"></script>
<script type="text/javascript">
    // 百度地图API功能

    // 百度地图API功能
    var map = new BMap.Map("right_map");
    var point = new BMap.Point(116.404, 39.915);
    map.centerAndZoom(point, 15);
    // 编写自定义函数,创建标注
    function addMarker(point){
        var marker = new BMap.Marker(point);
        map.addOverlay(marker);
    }
    // 随机向地图添加25个标注
    var bounds = map.getBounds();
    var sw = bounds.getSouthWest();
    var ne = bounds.getNorthEast();
    var lngSpan = Math.abs(sw.lng - ne.lng);
    var latSpan = Math.abs(ne.lat - sw.lat);
    for (var i = 0; i < 25; i ++) {
        var point = new BMap.Point(sw.lng + lngSpan * (Math.random() * 0.7), ne.lat - latSpan * (Math.random() * 0.7));
        addMarker(point);
    }

</script>