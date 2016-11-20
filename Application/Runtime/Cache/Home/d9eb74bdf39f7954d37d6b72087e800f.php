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

#ProvinceCurrent {
    float:left;
}

#AllChina {
    float:left;
}

</style>


<div class='top-list-wrap'>
    <div class='top-list'>
        <ul  class='l-list'>
           <li> <div id="ProvinceCurrent" >  </div> <div id="AllChina" >  </div> </li>
        </ul>
    </div>
</div>
<div id="nav">
</div>


<script >


        var   m_ProvinceCurrent ="北京市";




    $(function(){
        $('#AllChina').html("&nbsp; 全国");
        $('#ProvinceCurrent').html(m_ProvinceCurrent);

        getBoundary(m_ProvinceCurrent,"black","solid",2);




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



        $('#AllChina').live('click',function() {



            $.post("/cooler/index.php/Home/Cooler/getStockStatistic", {
                cid :  1,
            }, function (data, textStatus){
                displayStockStatistic(data);
            },"json");

        })




        $("#nav").append(" <div id='ProvinceList'> </id>");
        $('#ProvinceCurrent').live('mouseover',function() {
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
            m_ProvinceCurrent = $(this).html();
            $('#ProvinceCurrent').html(m_ProvinceCurrent);
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
            getBoundary($(this).html(),"blue","solid",1);

            $.post("/cooler/index.php/Home/Cooler/getcooler", {
                cid :  $(this).attr('id') ,
            }, function (data, textStatus){
                displaymap(data);
            },"json");

        })

        $('#CityListBottum li a').live('mouseover',function() {

            $('#CountyList').show();


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

        $('#CountyList >ul>li> a').live('click',function() {
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
           // var marker = new BMap.Marker(point);
           // var label = new BMap.Label(txthtml,{offset:new BMap.Size(20,-10)});
            //marker.setLabel(label);

           // m_map.addOverlay(marker);
          //  m_markerClusterer.addMarker(marker);


            var myLabel = new BMap.Label(txthtml,     //为lable填写内容
                    {offset:new BMap.Size(-20,-20),                  //label的偏移量，为了让label的中心显示在点上
                        position:point});                                //label的位置

            myLabel.setTitle("我是文本标注label");               //为label添加鼠标提示



            myLabel.setStyle({                                   //给label设置样式，任意的CSS都是可以的
                color:"black",                   //颜色
                fontSize:"10px",               //字号
                border:"0",                    //边
                height:"50px",                //高度
                width:"50px",                 //宽
                textAlign:"center",            //文字水平居中显示
                lineHeight:"10px",            //行高，文字垂直居中显示
                background:"url(http://127.0.0.1/cooler/Public/Home/img/circle.png) no-repeat -1px -1px",    //背景图片，这是房产标注的关键！
                cursor:"pointer"
            });


            m_map.addOverlay(myLabel);

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
                }, "");

            });


        }



        function displayStockStatistic(data) {


            var allOverlay = m_map.getOverlays();
            var len = allOverlay.length;

            for (var i = 0; i < len; i++) {
                if (allOverlay[i] instanceof BMap.Marker) {
                    m_map.removeOverlay(allOverlay[i]);
                }
            }
            if(data.length <= 0){
                return ;
            }

            if(data[0].pid == 1){

                m_map.centerAndZoom(new BMap.Point(108.2775440000, 36.0919520000), 5);
               // getBoundary(data[0],"black","solid",2);
            }

           else  {

               m_map.centerAndZoom(new BMap.Point(data[0].lng, data[0].lat), 11);
              //  getBoundary(data[0],"black","solid",2);
            }


            $.each(data,function(key,val){

                console.log(val.pid);
                addStockStatistic(val.lng, val.lat ,val);
            });
        }


        function addStockStatistic(lng,lat,val)
        {
            var point = new BMap.Point(lng, lat);
            var txthtml;
            if(val.city == ""){
                 txthtml =  "<br>"+ val.stockcount + "<br>"+val.province;
            }
           else{
                 txthtml =  "<br>"+ val.stockcount + "<br>"+val.city;
            }

            var myLabel = new BMap.Label(txthtml,     //为lable填写内容
                    {offset:new BMap.Size(-20,-20),                  //label的偏移量，为了让label的中心显示在点上
                        position:point});                                //label的位置

            myLabel.setTitle("我是文本标注label");               //为label添加鼠标提示

            var bgpng="circle-small.png";
            var ht=40,wd=40;
            if(val.stockcount < 50){
                bgpng = "circle-small.png";
                wd = 40;
                ht=40;
            }else if(val.stockcount >= 50 && val.stockcount < 100){
                bgpng = "circle.png";
                wd = 50;
                ht=50;
            }else if(val.stockcount >= 100 && val.stockcount < 200){
                bgpng = "circle-middle.png";
                wd = 60;
                ht=60;
            }else if(val.stockcount >= 200 ){
                bgpng = "circle-big.png";
                wd = 70;
                ht=70;
            }

            myLabel.setStyle({                                   //给label设置样式，任意的CSS都是可以的
                color:"black",                   //颜色
                fontSize:"10px",               //字号
                border:"0",                    //边
                height:ht,                //高度
                width:wd,                 //宽
                textAlign:"center",            //文字水平居中显示
                lineHeight:"10px",            //行高，文字垂直居中显示
                background:"url(http://127.0.0.1/cooler/Public/Home/img/"+bgpng+") no-repeat -1px -1px",    //背景图片，这是房产标注的关键！
                cursor:"pointer"
            });



            myLabel.addEventListener("click", function(){
                //map.openInfoWindow(infoWindow, point);
                //alert(myLabel.getTitle());

                $.post("/cooler/index.php/Home/Cooler/getStockStatistic", {
                    cid :  val.id ,
                }, function (data, textStatus){

                    displayStockStatistic(data);

                },"json");

            });


            m_map.addOverlay(myLabel);



        }




</script>