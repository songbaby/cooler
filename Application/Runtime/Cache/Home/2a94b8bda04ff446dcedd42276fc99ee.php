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
#MapNav{
    background-color: white;
    width: 200px;
    height:400px;
    position: absolute;
    left: 0px;
    z-index: 9999;
    top: 50px;
    opacity: 0.9;
}
#MapNav_Area{text-align: center;color: gray}
#MapNav_Area_Menu {color: #9B410E;    width: 500px;  height:400px;background-color: #1c94c4;margin-left: 100px}
</style>

<script >



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


        $("#content").append(" <div id='MapNav'> </id>");
        //$("#MapNav").attr("class","MapNav");


        $("#MapNav").append(" <div id='MapNav_Area'> </id>");
        $("#MapNav_Area").html("区域");

        $("#MapNav_Area").append(" <div id='MapNav_Area_Menu'> gg</id>");
        $('#MapNav_Area_Menu').hide();



        $('#MapNav_Area').live('mouseover',function() {
            $('#MapNav_Area_Menu').show();
        })
        $('#MapNav_Area_Menu').live('mouseout',function() {
            $('#MapNav_Area_Menu').hide();
        })
        $('#MapNav_Area').live('mouseout',function() {
            $('#MapNav_Area_Menu').hide();
        })




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