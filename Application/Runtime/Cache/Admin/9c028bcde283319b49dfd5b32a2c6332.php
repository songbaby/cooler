<?php if (!defined('THINK_PATH')) exit();?><html>



<body>


<div id="content"></div>



</div>



</body>
</html>




<script type="text/JavaScript" src='<?php echo (JS_URL); ?>jquery_1.6.1.js'></script>
<script  src="http://api.map.baidu.com/api?v=2.0&ak=3nbIhiC4xvRt2ofWcRPAo4uj"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/TextIconOverlay/1.2/src/TextIconOverlay_min.js"></script>

<script type="text/JavaScript" src='<?php echo (JS_URL); ?>MarkClusterer.js'></script>


<script >

    {
        var allstr = '<?php echo ($allstr); ?>';
        console.log(allstr);
        var allarray = eval("(" + allstr + ")");

        var txtHtml = "";
        var index = 0;

        $.each(allarray, function (key, val) {

            var str = val.address;
            var myGeo = new BMap.Geocoder();
            myGeo.getPoint(str, function (point) {

                if (point) {
                    //AddCooler(point.lng, point.lat ,val.name);
                    console.log(str + ": " + point.lng + "," + point.lat)
                    $.post("/cooler/index.php/Admin/Stock/autoupdateLatLngProccess", {
                        code: val.code,
                        lat: point.lat,
                        lng: point.lng,
                    }, function (data, textStatus) {
                        console.log(data);
                    }, "json");
                } else {
                    console.log("get point failed:" + str);
                }
            }, "");

        });
    }



    /*   var myGeo = new BMap.Geocoder();
       myGeo.getPoint("上海", function(point){
           console.log("point = " + point.lng ,point.lat);

           if (point) {
               //AddCooler(point.lng, point.lat ,val.name);
           }else{
               alert("get point failed:"+val.name);
           }
       }, "");
   */





</script>