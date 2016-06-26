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



<style>

    .table{width:100%;}
    .table,.table td{border:solid 1px #ccc;}
    .table th{border:solid 1px #ccc;width:10px;}
    .table thead tr td{background: #eee;color:#333;}
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

        txthtml +="<table id=\"table\" class=\"table\">";
        txthtml+=" <tr>";
        txthtml+=" <th>名称<\/th>";
        txthtml+="<th>价格<\/th>";
        txthtml+="<th>区域<\/th>";
        txthtml+=" <\/tr>";


        $.each(data,function(key,val){
            txthtml +="<tr>";
            txthtml += "<td width=\"8%\"> <a href=\"/cooler/index.php/Home/Cooler/detail/id/"+val.id +"\">"+val.name+"</a><\/td>"
            txthtml += "<td width=\"8%\">"+val.price+"<\/td>"
            txthtml += "<td width=\"8%\">"+val.loc+"<\/td>"
            txthtml +="<\/tr>"

        });

        txthtml+=" <\/table>";


        $('#listdiv').html(txthtml);

    }


</script>