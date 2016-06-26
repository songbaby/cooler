<?php if (!defined('THINK_PATH')) exit();?><html>


<head>
    <link rel="stylesheet" href="/cooler/Public/Home/css/style.css"/>
    <style>
    </style>
</head>


<body>

<script type="text/JavaScript" src='<?php echo (JS_URL); ?>jquery_1.6.1.js'></script>

<?php import('Class.Category',APP_PATH); $cate = M('cate')->order('sort')->select(); $cate = Category::unLimitedForLevel($cate); $allstr = json_encode($cate); $province = Category::getChilds2($cate,1); $jsonstr = json_encode($province); ?>


<?php
 $array = array("name" => "Eric","age" => 23); $result = json_encode($array); ?>












<script language=javascript>

    var   allstr = '<?php echo $allstr ?>';
    var allarray=eval("("+allstr+")");

    $(function(){

        var txtHtml ="";
        $.each(allarray,function(key,val){
            if(val.pid == 1) {
                console.log('_mozi数组中 ,索引 : '+key+' 对应的值为: '+val.name);
                txtHtml += '<a href="#" id='+val.id+'>'+ val.name +'</a>';
            }
        });
        $("#provincediv").html(txtHtml); // 把返回的数据添加到页面上



        $('#provincediv > a').live("click",function() {
            var iid =$(this).attr('id');

            var txtHtml ="";
            $.each(allarray,function(key,val){

                if(val.pid == iid) {
                    console.log('_mozi数组中 ,索引 : '+key+' 对应的值为: '+val.name);
                    txtHtml += '<a href="#" id='+val.id+'>'+ val.name +'</a>';
                }
            });
            $("#citydiv ").html(txtHtml);


            $("#countydiv").html("");
            $("#towndiv").html("");
        })


        $('#citydiv > a').live('click',function() {

            console.log("ffff");
            var iid =$(this).attr('id');

            var txtHtml ="";
            $.each(allarray,function(key,val){

                if(val.pid == iid) {
                    console.log('_mozi数组中 ,索引 : '+key+' 对应的值为: '+val.name);
                    txtHtml += '<a href="#" id='+val.id+'>'+ val.name +'</a>';
                }
            });
            $("#countydiv ").html(txtHtml);

            $("#towndiv").html("");
        })



        $('#countydiv > a').live('click',function() {

            console.log("ffff");
            var iid =$(this).attr('id');

            var txtHtml ="";
            $.each(allarray,function(key,val){

                if(val.pid == iid) {
                    console.log('_mozi数组中 ,索引 : '+key+' 对应的值为: '+val.name);
                    txtHtml += '<a href="#" id='+val.id+'>'+ val.name +'</a>';
                }
            });
            $("#towndiv ").html(txtHtml);
        })


    })


</script>


<div class='top-list-wrap'>
    <div class='top-list'>
        <ul class='l-list'>
            <li><a href="/cooler/index.php/Home/Index/index" >首页</a></li>
            <li><a href="#" >地图</a></li>
            <li><a href="#">列表</a></li>

        </ul>
        <ul class='r-list'>
            <li><a href="/cooler/index.php/Admin/Manager/login">登录</a></li>
            <li><a href="#">注册</a></li>
        </ul>
    </div>
</div>


<div id="nav">
    <div align="left">


        <div id='provincediv' style="text-align: left">
        </div>

        <div id='citydiv' style="text-align: left">

        </div>

        <div id='countydiv' style="text-align: left">
        </div>

        <div id='towndiv' style="text-align: left">

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