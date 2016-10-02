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
.MapNav{
    background-color: white;
    width: 200px;
    height:400px;
    position: absolute;
    left: 0px;
    z-index: 9999;
    top: 50px;
    opacity: 0.9;
}
#Filter_Area{text-align: center;color: gray}
#MapNav_Area_Menu {color: #9B410E;    width: 200px;  height:400px;}
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
        $("#MapNav").attr("class","MapNav");

        $("#MapNav").append(" <div id='MapNav_Area'> </id>");
        $("#MapNav_Area").html("区域");

        $("#MapNav_Area").append(" <div id='MapNav_Area_Menu'> </id>");



        $('#Filter_Area ').live('click',function() {


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

            $("#MapNav ").html(txtHtml);
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



<style>

    .table{width:100%;}
    .table,.table td{border:solid 1px #ccc;}
    .table th{border:solid 1px #ccc;width:10px;}
    .table thead tr td{background: #f1f1f1;color:#F1F1F1;}
    .table,th,td{ border-collapse: collapse;background:#fff;}
    #listdiv{width: 90%; height:100px;MARGIN-RIGHT: auto; MARGIN-LEFT: auto;}
</style>



<div id="listdiv" >


</div>




</body>
</html>



<script type="text/javascript">
    // 百度地图API功能



    function displaylist(data){

        var txthtml="";

        txthtml +="<table id=\"table\" class=\"table\" >";
        txthtml+=" <tr>";
        txthtml+=" <th>冷库名称<\/th>";
        txthtml+=" <th>价格((元/吨/年)<\/th>";
        txthtml+=" <th>联系人<\/th>";
        txthtml+=" <th>电话<\/th>";
        txthtml+=" <th>总吨位<\/th>";
        txthtml+=" <th>剩余吨位<\/th>";
        txthtml+=" <th>满仓率<\/th>";
        txthtml+="<th>地址<\/th>";
        txthtml+="<th>缩略图<\/th>";
        txthtml+=" <\/tr>";


        $.each(data,function(key,val){
            txthtml +="<tr>";
            txthtml += "<td width=\"8%\"> <a href=\"/cooler/index.php/Home/Cooler/detail/id/"+val.id +"\">"+val.name+"</a><\/td>"
            txthtml += "<td width=\"8%\">"+val.price+"<\/td>"
            txthtml += "<td width=\"8%\">"+val.lianxiren+"<\/td>"
            txthtml += "<td width=\"8%\">"+val.phone+"<\/td>"
            txthtml += "<td width=\"8%\">"+val.total+"<\/td>"
            txthtml += "<td width=\"8%\">"+val.free+"<\/td>"
            txthtml += "<td width=\"8%\">"+(val.total - val.free)/val.total+"<\/td>"
            txthtml += "<td width=\"8%\">"+val.loc+"<\/td>"
            txthtml += "<td width=\"8%\"> <img src=<?php echo (ADMIN_UPLOAD_URL); ?>"+val.small_img+" height=\"40\" width=\"40\"><\/td>"
            txthtml +="<\/tr>"

        });

        txthtml+=" <\/table>";


        $('#listdiv').html(txthtml);

    }


</script>