<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <script type="text/JavaScript" src='<?php echo (JS_URL); ?>jquery_1.6.1.js'></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("button").live("click",function(){

                $("body").append(" <a id='countydiv'> ff</a>")
            });
            $("a").live("click",function(){
                alert('cicl');
            });
        });
    </script>
</head>
<body>
<p>这是一个段落。</p>
<button>请点击这里</button>

</body>
</html>