<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class StockController extends AdminController {
    //商品列表展示

    
    function autoupdate(){

        p(1);die;
        $cooler = D("Cooler");
        
        //1. 获得当前记录总条数
        $total = $cooler -> count();
        $per = 20;
        //2. 实例化分页类对象
        $page = new \Component\Page($total, $per); //autoload
        //3. 拼装sql语句获得每页信息
        $sql = "select * from c_cooler ".$page->limit;
        $info = $cooler -> query($sql);
        //4. 获得页码列表
        $pagelist = $page -> fpage();
        
        $this -> assign('info', $info);
        $this -> assign('pagelist', $pagelist);
        $this -> display();
    }




}

