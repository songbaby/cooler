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
#countydiv{text-align: left}
#towndiv{text-align: left}

#CountyList {text-align: center;color: gray}
#MapNav_Area_Menu {color: #9B410E;    width: 500px;  height:400px;background-color: #1c94c4;margin-left: 100px}


#ProvinceList{
    background-color: white;
    width: 300px;
    height:auto;
    position: absolute;
    top: 25px;
    left: 30px;
    z-index: 999;
    opacity: 0.9;
}
#CityList {
    background-color: grey;
    width: 200px;
    height:400px;
    position: absolute;
    top: 30px;
    left: 10px;
    z-index: 99;
    opacity: 0.9;
}
#CountyList {
    background-color: gray;
    width: 200px;
    height:400px;
    position: absolute;
    top: 30px;
    left: 210px;
    z-index: 99;
    opacity: 0.9;
}


</style>

<script >

    var   m_ProviceCurrent ="上海市";

</script>

<div class='top-list-wrap' style="background-color: #0e924c">
    <div class='top-list'>
        <ul  class='l-list'>
           <li> <div id="ProviceCurrent" >  </div> </li>
        </ul>

    </div>
</div>



<div id="nav" style="background-color: #9B410E">
    <div align="left">
        <div id='countydiv'>
        </div>

        <div id='towndiv'>
        </div>

    </div>
</div>



<script >


    $(function(){

        $('#ProviceCurrent').html(m_ProviceCurrent);
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
        var actionmane = "<?php echo (ACTION_NAME); ?>";
        if(actionmane == "showmap" || actionmane == "showlist"){
            $("#ProvinceList").html(txtHtml);
        }


        $("#nav").append(" <div id='CityList'> </id>");
        $("#CityList").show();

        $("#CityList").append(" <div id='CityListTopBar'> </id>");
        $("#CityListTopBar").html("区域");

        $("#CityList").append(" <div id='CityListBottum'> </id>");
        $("#CityListBottum").html("city");


        $("#nav").append(" <div id='CountyList'> gg</id>");
        $('#CountyList').hide();


        $('#CityListTopBar').live('mouseover',function() {
            $('#CountyList').show();
        })

        $('#CountyList').live('mouseleave',function() {
            $('#CountyList').hide();
        })



        $('#ProvinceList >ul>li> a').live('click',function() {
            getBoundary($(this).html());
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
                    txtHtml += '<li style= display:inline>';

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




        $('#CityListBottum >ul>li> a').live('click',function() {
            getBoundary($(this).html());
            var id =$(this).attr('id');
            var txtHtml ="";
            var index=0;
            $.each(allarray,function(key,val){
                if(val.pid == id) {
                    if(index%2 == 0){
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
            $("#CountyList ").html(txtHtml);
        })


        $('#CountyList >ul>li> a').live('click',function() {
            getBoundary($(this).html());

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



<script >
    // 百度地图API功能


    // 百度地图API功能
    var map = new BMap.Map("content");
    var point = new BMap.Point(116.235237, 35.079983);
    map.enableScrollWheelZoom();

    var currentcounty="金乡县";


    function addMarker(point,imgid){
        var marker = new BMap.Marker(point);
        map.addOverlay(marker);
        addinfoWindow(marker,txthtml,imgid);

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

    function getBoundary(thecity){



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
                var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 2, strokeColor: "blue"}); //建立多边形覆盖物
                ply.setStrokeStyle("dashed");
                ply.setFillColor("none");
                map.addOverlay(ply);  //添加覆盖物
                pointArray = pointArray.concat(ply.getPath());
            }
            map.setViewport(pointArray);    //调整视野
        });
    }

    function AddCooler(lng,lat,txthtml,imgid)
    {

        var point = new BMap.Point(lng, lat);
        addMarker(point,txthtml,imgid);

    }

    function displaymap(data){


        getBoundary("上海市");
        var allOverlay = map.getOverlays();
        var len = allOverlay.length;

        for (var i = 0; i < len; i++){
            if(allOverlay[i] instanceof BMap.Marker){
                map.removeOverlay(allOverlay[i]);
            }
        }

        $.each(data,function(key,val){

      /*      var sContent =
                    "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>天安门</h4>" +
                    "<img style='float:right;margin:4px' id='imgDemo' src='http://app.baidu.com/map/images/tiananmen.jpg' width='139' height='104' title='天安门'/>" +
                    "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>天安门坐落在中国北京市中心,故宫的南侧,与天安门广场隔长安街相望,是清朝皇城的大门...</p>" +
                    "</div>";
*/
            var imgid= "img"+val.id;
            txthtml = "<h4 > <a href=\"/cooler/index.php/Home/Cooler/detail/id/"+val.id +"\">"+val.name+"</a><\/h4>";
            txthtml += "价格："+val.price;
            txthtml += "<br/>联系人："+val.lianxiren;
            txthtml += "<br/>电话："+val.phone;
            txthtml += "<br/>"+val.note;
            txthtml += "<br/><img style='float:right;margin:4px' id="+imgid +" src=<?php echo (ADMIN_UPLOAD_URL); ?>"+val.big_img+" height='200px width='200px'>";


            AddCooler(val.lng, val.lat ,txthtml,imgid);


        });


    }
    getBoundary("上海市");
   // getBoundary();


</script>