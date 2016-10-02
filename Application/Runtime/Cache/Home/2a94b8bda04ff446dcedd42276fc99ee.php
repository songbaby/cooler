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
#CityList {
    background-color: white;
    width: 200px;
    height:400px;
    position: absolute;
    left: 0px;
    z-index: 9999;
    top: 50px;
    opacity: 0.9;
}
#CountyList {text-align: center;color: gray}
#MapNav_Area_Menu {color: #9B410E;    width: 500px;  height:400px;background-color: #1c94c4;margin-left: 100px}


#ProvinceList{
    background-color: white;
    width: 400px;
    height:auto;
    position: absolute;
    top: 25px;
    left: 30px;
    z-index: 9999;
    opacity: 0.9;
}


</style>

<script >



    $(function(){

        var   allstr = '<?php echo ($allstr); ?>';
        var allarray=eval("("+allstr+")");

        var txtHtml ="";
        $.each(allarray,function(key,val){
           if(val.pid == 1 ) {
                txtHtml += '<a href="#" id='+val.id+'>'+ " " +val.province +'</a>';
            }
        });

        var actionmane = "<?php echo (ACTION_NAME); ?>";
        if(actionmane == "showmap" || actionmane == "showlist"){
            $("#countydiv").html(txtHtml); // 把返回的数据添加到页面上
        }

        $("#content").append(" <div id='CityList'> </id>");
        //$("#MapNav").attr("class","MapNav");

        $("#CityList").append(" <div id='CountyList'> </id>");
        $("#CountyList").html("区域");

        $("#CountyList").append(" <div id='MapNav_Area_Menu'> gg</id>");
        $('#MapNav_Area_Menu').hide();


        $('#CountyList').live('mouseover',function() {
            $('#MapNav_Area_Menu').show();
        })
        $('#MapNav_Area_Menu').live('mouseout',function() {
            $('#MapNav_Area_Menu').hide();
        })
        $('#CountyList').live('mouseout',function() {
            $('#MapNav_Area_Menu').hide();
        })



        $("#nav").append(" <div id='ProvinceList'> </id>");
        $("#ProvinceList").hide();

        $('#ProviceCurrent').live('mouseover',function() {
            $('#ProvinceList').show();
        })
        $('#ProvinceList').live('mouseout',function() {
            $('#ProvinceList').hide();
        })
        $('#ProviceCurrent').live('mouseout',function() {
            $('#ProvinceList').hide();
        })






        $('#countydiv > a').live('click',function() {

            var id =$(this).attr('id');
            currentcounty=$(this).html();

            var txtHtml ="";
            $.each(allarray,function(key,val){
                if(val.pid == id) {
                    txtHtml += '<a href="#" id='+val.id+'>'+ " " +val.city +'</a>';
                }
            });
            $("#towndiv ").html(txtHtml);
            $("#ProvinceList").html(txtHtml); // 把返回的数据添加到页面上
            $("#MapNav_Area_Menu ").html(txtHtml);

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


<div class='top-list-wrap' style="background-color: #0e924c">
    <div class='top-list'>
        <ul  class='l-list'>
            <li id="ProviceCurrent"><a href="/cooler/index.php/Home/Index/index" >上海▽</a></li>

        </ul>
        <ul class='r-list'>
            <li><a href="/cooler/index.php/Admin/Manager/login">登录</a></li>
            <li><a href="#">注册</a></li>
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

<div id="content">

</div>

<div id="bottum">
    网络文化经营许可证：沪[2016]0268-027号|增值电信业务经营许可证：沪A2-20080224|信息网络传播视听节目许可证：1109364号|互联网违法和不良信息举报电话:021-81683755 blxx@list.alibaba-inc.com
</div>

</body>
</html>