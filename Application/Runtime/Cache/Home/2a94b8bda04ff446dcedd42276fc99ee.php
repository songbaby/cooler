<?php if (!defined('THINK_PATH')) exit();?><html>


<head>
    <link rel="stylesheet" href="/cooler/Public/Home/css/style.css"/>
    <style>
    </style>
</head>


<body>


<div id="top">


      <div align="center">

          <div style="text-align: right">
              <a href="/cooler/index.php/Home/Index/map" > 地图</a>
              <a href="/cooler/index.php/Home/Index/list" > 列表 </a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="/cooler/index.php/Admin/Manager/login" > 登录</a>
              <a href="#" > 注册</a>
          </div>

          <div style="text-align: left">

          <a href="/cooler/index.php/Home/Index/select/county/1" >金乡县</a>
              <a href="/cooler/index.php/Home/Index/select/county/2" >成武县</a>
              <a href="/cooler/index.php/Home/Index/select/county/3" >寿光市</a>
          </div>

          <div style="text-align: left">
              <?php if(is_array($loc_town)): foreach($loc_town as $k=>$vo): ?><a href="/cooler/index.php/Home/Index/select/county/1/town/<?php echo ($vo[id]); ?>"> <?php echo ($vo[name]); ?>,</a><?php endforeach; endif; ?>
        </div>
        
        </div>





</div>

<div id="content">

</div>


<div id="bottum">
    网络文化经营许可证：沪[2013]0268-027号|增值电信业务经营许可证：沪A2-20080224|信息网络传播视听节目许可证：1109364号|互联网违法和不良信息举报电话:021-81683755 blxx@list.alibaba-inc.com
</div>

</body>
</html>


<?php echo $cooler ?>;

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3nbIhiC4xvRt2ofWcRPAo4uj"></script>




<script type="text/javascript">
    // 百度地图API功能

    function addMarker(point){
        var marker = new BMap.Marker(point);
        map.addOverlay(marker);
    }

    // 百度地图API功能
    var map = new BMap.Map("content");
    var point = new BMap.Point(116.235237, 35.079983);
    map.enableScrollWheelZoom();
      //map.centerAndZoom(point, 12);
    // addMarker(point);

    function getBoundary(){
        var bdary = new BMap.Boundary();
        bdary.get("金乡县", function(rs){       //获取行政区域
           // map.clearOverlays();        //清除地图覆盖物
            var count = rs.boundaries.length; //行政区域的点有多少个
            if (count === 0) {
                alert('未能获取当前输入行政区域');
                return ;
            }
            var pointArray = [];
            for (var i = 0; i < count; i++) {
                var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 2, strokeColor: "blue"}); //建立多边形覆盖物
                ply.setStrokeStyle("dashed");
                ply.setFillColor("none");
                map.addOverlay(ply);  //添加覆盖物
                pointArray = pointArray.concat(ply.getPath());
            }
            map.setViewport(pointArray);    //调整视野
        });
    }

    function AddCooler()
   {
             var   user ={"name":"Eric","age":23};
            var   coolerArray =  <?php echo $cooler ?>;
            console.log(coolerArray);
            for(var i = 0; i<coolerArray.length;i++)
            {
                console.log(coolerArray[i].name,coolerArray[i].lat,coolerArray[i].lng);
                var point = new BMap.Point(coolerArray[i].lng, coolerArray[i].lat);
                addMarker(point);
            }

    }

    getBoundary();
    AddCooler();

</script>