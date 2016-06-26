<?php if (!defined('THINK_PATH')) exit();?><html>


<head>
    <link rel="stylesheet" href="/cooler/Public/Home/css/style.css"/>
    <style>
    </style>
</head>


<body>

<script type="text/JavaScript" src='<?php echo (JS_URL); ?>jquery_1.6.1.js'></script>




<style>
#countydiv{text-align: left}
#towndiv{text-align: left}
</style>

<script language=javascript>


    $(function(){



        var   allstr = '<?php echo ($allstr); ?>';
        var allarray=eval("("+allstr+")");

        var txtHtml ="";
        $.each(allarray,function(key,val){
            if(val.pid == 4 || val.pid == 5 || val.pid == 38) {
                txtHtml += '<a href="#" id='+val.id+'>'+ " " +val.name +'</a>';
            }
        });

        var actionmane = "<?php echo (ACTION_NAME); ?>";
        if(actionmane == "showmap" || actionmane == "showlist"){
            $("#countydiv").html(txtHtml); // 把返回的数据添加到页面上
        }





        $('#countydiv > a').live('click',function() {

            var id =$(this).attr('id');
            currentcounty=$(this).html();

            var txtHtml ="";
            $.each(allarray,function(key,val){
                if(val.pid == id) {
                    txtHtml += '<a href="#" id='+val.id+'>'+ " " +val.name +'</a>';
                }
            });
            $("#towndiv ").html(txtHtml);


            $.post("/cooler/index.php/Home/Cooler/getcooler", {
                cid :  id ,
            }, function (data, textStatus){


                var actionmane = "<?php echo (ACTION_NAME); ?>";
                if(actionmane == "showmap"){
                    displaymap(data);
                }else{
                    displaylist(data);
                }


            },"json");


        })

        $('#towndiv > a').live('click',function() {

            var id =$(this).attr('id');

            $.post("/cooler/index.php/Home/Cooler/getcooler", {
                cid :  id ,
            }, function (data, textStatus){

                var actionmane = "<?php echo (ACTION_NAME); ?>";
                if(actionmane == "showmap"){
                    displaymap(data);
                }else{
                    displaylist(data);
                }

            },"json");

        })

        })


</script>


<div class='top-list-wrap'>
    <div class='top-list'>
        <ul class='l-list'>
            <li><a href="/cooler/index.php/Home/Index/index" >首页</a></li>
            <li><a href="/cooler/index.php/Home/Cooler/showmap" id="showmap" >地图</a></li>
            <li><a href="/cooler/index.php/Home/Cooler/showlist" id="showlist" >列表</a></li>


        </ul>
        <ul class='r-list'>
            <li><a href="/cooler/index.php/Admin/Manager/login">登录</a></li>
            <li><a href="#">注册</a></li>
        </ul>
    </div>
</div>


<div id="nav">
    <div align="left">
        <div id='countydiv'>
        </div>

        <div id='towndiv'>
        </div>

        </div>
</div>

<div id="content">

</div>

<div id="bottum">
    网络文化经营许可证：沪[2016]0268-027号|增值电信业务经营许可证：沪A2-20080224|信息网络传播视听节目许可证：1109364号|互联网违法和不良信息举报电话:021-81683755 blxx@list.alibaba-inc.com
</div>

</body>
</html>





<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3nbIhiC4xvRt2ofWcRPAo4uj"></script>



<script type="text/javascript">
    // 百度地图API功能


    // 百度地图API功能
    var map = new BMap.Map("content");
    var point = new BMap.Point(116.235237, 35.079983);
    map.enableScrollWheelZoom();

    var currentcounty="金乡县";

    function addMarker(point){
        var marker = new BMap.Marker(point);
        map.addOverlay(marker);
    }

    function getBoundary(){
        var bdary = new BMap.Boundary();
        bdary.get(currentcounty, function(rs){       //获取行政区域
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

    function AddCooler(lng,lat)
    {

        var point = new BMap.Point(lng, lat);
        addMarker(point);

    }

    function displaymap(data){

        getBoundary();
        var allOverlay = map.getOverlays();
        var len = allOverlay.length;

        for (var i = 0; i < len; i++){
            if(allOverlay[i] instanceof BMap.Marker){
                map.removeOverlay(allOverlay[i]);
            }
        }

        $.each(data,function(key,val){
            AddCooler(val.lng, val.lat);
        });
    }


    getBoundary();


</script>