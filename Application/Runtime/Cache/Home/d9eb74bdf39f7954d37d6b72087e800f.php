<?php if (!defined('THINK_PATH')) exit();?><html>


<head>
    <link rel="stylesheet" href="/cooler/Public/Home/css/style.css"/>
    <link href="/cooler/Public/Home/css/navigation20141112.css" rel="stylesheet" type="text/css" />
    <link href="/cooler/Public/Home/css/soufang-style.css" rel="stylesheet" type="text/css">
    <style>
    </style>
</head>


<body>

<script type="text/JavaScript" src='<?php echo (JS_URL); ?>jquery_1.6.1.js'></script>

<style>

#ProvinceList{
    background-color: white;
    width: auto;
    height:auto;
    position: absolute;
    top: 25px;
    left: 30px;
    z-index: 999;
    opacity: 0.9;
    border: solid 1px grey;
}

#CityList {
    background-color: white;
    color: black;
    width: 100px;
    height:auto;
    position: absolute;
    top: 30px;
    left: 10px;
    z-index: 99;
    opacity: 0.9;
    border: solid 1px grey;
}
#CityListTopBar{
    color: red;
    text-align:center;
}

#CountyList {
    background-color: white;
    color: black;
    width: auto;
    height:auto;
    position: absolute;
    top: 30px;
    left: 110px;
    z-index: 99;
    opacity: 0.9;
    text-align: left;
    border: solid 1px grey;
}
</style>


<div class='top-list-wrap'>
    <div class='top-list'>
        <ul  class='l-list'>
           <li> <div id="ProviceCurrent" >  </div> </li>
        </ul>
    </div>
</div>
<div id="nav">
</div>


<script >


        var   m_ProviceCurrent ="上海市";




    $(function(){

        $('#ProviceCurrent').html(m_ProviceCurrent);
        getBoundary(m_ProviceCurrent,"black","solid",2);



  /*      var map = new BMap.Map("content");
        map.enableScrollWheelZoom(true);
        var myGeo = new BMap.Geocoder();

        var add = "山东省青岛市崂山区松岭路1111号";
        myGeo.getPoint(add, function(point){
            console.log("point = " + point.lng ,point.lat);
            if (point) {
                var address = new BMap.Point(point.lng, point.lat);
                var marker = new BMap.Marker(address);
                map.addOverlay(marker);
                marker.setLabel("aaaa");

                map.centerAndZoom(new BMap.Point(point.lng,point.lat), 13);

            }
        }, "合肥市");
        return ;
*/



        var   allstr = '<?php echo ($allstr); ?>';
        var allarray=eval("("+allstr+")");

        var txtHtml ="";
        var index = 0;
        $.each(allarray,function(key,val){
           if(val.pid == 1 ) {
               //txtHtml += '<a href="#" id='+val.id+'>'+ " " +val.province +'</a>';
               if(index%2 == 0){
                   txtHtml += '<ul> ';
               }
               txtHtml += '<li style= display:inline>';

               txtHtml += '<a href="#" id=';
               txtHtml +=val.id+'>';
               txtHtml += " ";
               txtHtml +=val.province;
               txtHtml +='</a>';

               txtHtml += '</li> ';
               index++;
               if(index%2 == 0){
                   txtHtml += '</ul> ';
               }
            }
        });



        $("#nav").append(" <div id='ProvinceList'> </id>");
        $('#ProviceCurrent').live('mouseover',function() {
            $('#ProvinceList').show();
        })
        $('#ProvinceList').live('mouseleave',function() {
            $('#ProvinceList').hide();
        })

        $("#ProvinceList").html(txtHtml);
        $("#ProvinceList").hide();
/*
        var actionmane = "<?php echo (ACTION_NAME); ?>";
        if(actionmane == "showmap" || actionmane == "showlist"){
            $("#ProvinceList").html(txtHtml);
        }
*/


        $("#nav").append(" <div id='CityList'> </id>");
        $("#CityList").show();

        $("#CityList").append(" <div id='CityListTopBar'> </id>");
        $("#CityListTopBar").html("区域");

        $("#CityList").append(" <div id='CityListBottum'> </id>");



        $("#nav").append(" <div id='CountyList'> gg</id>");
        $('#CountyList').hide();


        $('#CountyList').live('mouseleave',function() {
            $('#CountyList').hide();
        })


        $('#ProvinceList >ul>li> a').live('click',function() {
            getBoundary($(this).html(),"black","solid",2);
            m_ProviceCurrent = $(this).html();
            $('#ProviceCurrent').html(m_ProviceCurrent);
            var id =$(this).attr('id');
            var txtHtml ="";
            var index=0;


            $.each(allarray,function(key,val){

                if(val.pid == id) {
                    if(index%2 == 0){
                        txtHtml += '<ul> ';
                    }
                    txtHtml += '<li style= display:inline >';

                    txtHtml += '<a href="#" id=';
                    txtHtml +=val.id;
                    txtHtml +='>';
                    txtHtml += " ";
                    txtHtml +=val.city;
                    txtHtml +='</a>';

                    txtHtml += '</li> ';
                    index++;
                    if(index%2 == 0){
                        txtHtml += '</ul> ';
                    }
                }
            });

            $("#CityListBottum ").html(txtHtml);
        })



        $('#CityListBottum li a').live('click',function() {

            $.post("/cooler/index.php/Home/Cooler/getcooler", {
                cid :  $(this).attr('id') ,
            }, function (data, textStatus){
                displaymap(data);
            },"json");

        })

        $('#CityListBottum li a').live('mouseover',function() {

            $('#CountyList').show();
            getBoundary($(this).html(),"blue","solid",1);

            console.log("city:"+$(this).html() + ",id:"+$(this).attr('id'));

            var txtHtml ="";

            $(this).parent().parent().find('a').each(function(){
                var index=0;
                var id =$(this).attr('id');
                txtHtml += '<ul><li style= "text-align:center;color: red" >';
                txtHtml += $(this).html();
                txtHtml += '</li></ul>';

                $.each(allarray,function(key,val){
                    if(val.pid == id) {
                        if(index%2 == 0){
                            txtHtml += '</ul> ';
                            txtHtml += '<ul> ';
                        }
                        txtHtml += '<li style= display:inline>';

                        txtHtml += '<a href="#" id=';
                        txtHtml +=val.id+'>';
                        txtHtml += " ";
                        txtHtml +=val.district;
                        txtHtml +='</a>';

                        txtHtml += '</li> ';
                        index++;
                        if(index%2 == 0){
                            txtHtml += '</ul> ';
                        }

                    }
                });

            });

            $("#CountyList ").html(txtHtml);




        })

        $('#CountyList >ul>li> a').live('mouseover',function() {
            console.log("city:"+$(this).html() + ",id:"+$(this).attr('id'));
            getBoundary($(this).html(),"red","solid",1);

/*
            $.post("/cooler/index.php/Home/Cooler/getcooler", {
                cid :  $(this).attr('id') ,
            }, function (data, textStatus){
                displaymap(data);
            },"json");

*/




        })



    })


</script>


<div id="content"></div>



</div>

<div id="bottum">
    网络文化经营许可证：沪[2016]0268-027号|增值电信业务经营许可证：沪A2-20080224|信息网络传播视听节目许可证：1109364号|互联网违法和不良信息举报电话:021-81683755 blxx@list.alibaba-inc.com
</div>

</body>
</html>





<script  src="http://api.map.baidu.com/api?v=2.0&ak=3nbIhiC4xvRt2ofWcRPAo4uj"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/TextIconOverlay/1.2/src/TextIconOverlay_min.js"></script>

<script type="text/JavaScript" src='<?php echo (JS_URL); ?>MarkClusterer.js'></script>


<script >


        // 百度地图API功能
        var m_cities = new Object();
        var m_map = new BMap.Map("content");
        m_map.enableScrollWheelZoom();

        var m_markerClusterer = new BMapLib.MarkerClusterer(m_map, 0);
        function AddCooler(lng,lat,txthtml)
        {
            var point = new BMap.Point(lng, lat);
            addMarker(point,txthtml);
        }

        function addMarker(point,txthtml){
            var marker = new BMap.Marker(point);
            var label = new BMap.Label(txthtml,{offset:new BMap.Size(20,-10)});
            marker.setLabel(label);

          //  m_map.addOverlay(marker);
            m_markerClusterer.addMarker(marker);
        }


        function addinfoWindow(marker,sContent,imgid){

            var infoWindow = new BMap.InfoWindow(sContent);
            marker.addEventListener("mouseover", function(){
                this.openInfoWindow(infoWindow);
                //图片加载完毕重绘infowindow
                document.getElementById(imgid).onload = function (){
                    infoWindow.redraw();   //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
                }
            });
        }

        function getBoundary(thecity,clr,line,weight){

            var bdary = new BMap.Boundary();
            bdary.get(thecity, function(rs){       //获取行政区域
                // map.clearOverlays();        //清除地图覆盖物
                var count = rs.boundaries.length; //行政区域的点有多少个
                if (count === 0) {
                    alert('未能获取当前输入行政区域');
                    return ;
                }
                var pointArray = [];
                for (var i = 0; i < count; i++) {
                    var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: weight, strokeColor: clr}); //建立多边形覆盖物
                    ply.setStrokeStyle(line);
                    ply.setFillColor("none");

                    if (m_cities[thecity] != 1) {
                        m_cities[thecity] = 1;
                        m_map.addOverlay(ply);  //添加覆盖物
                    }

                    pointArray = pointArray.concat(ply.getPath());
                }
                m_map.setViewport(pointArray);    //调整视野
            });
        }


        function displaymap(data){

            var allOverlay = m_map.getOverlays();
            var len = allOverlay.length;

            for (var i = 0; i < len; i++){
                if(allOverlay[i] instanceof BMap.Marker){
                    m_map.removeOverlay(allOverlay[i]);
                }
            }

            $.each(data,function(key,val){

                var myGeo = new BMap.Geocoder();
                myGeo.getPoint(val.address, function(point){
                   // console.log("point = " + point.lng ,point.lat);

                    if (point) {
                        AddCooler(point.lng, point.lat ,val.name);
                    }else{
                        alert("get point failed:"+val.name);
                    }
                }, "青岛市");

            });
        }

</script>