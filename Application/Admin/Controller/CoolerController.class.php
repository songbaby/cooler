<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class CoolerController extends AdminController {
    //商品列表展示

    
    function showlist(){
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

    function add(){
        $cooler = D("Cooler");

        if(!empty($_POST)){
            //判断附件是否有上传
            //如果有则实例化Upload，把附件上传到服务器指定位置
            //然后把附件的路径名获得到，存入$_POST

            if(!empty($_FILES)){

                $config = array(
                    'rootPath'      =>     './public/',  //根目录
                    'savePath'      =>     'upload/', //保存路径
                );
                //附件被上传到路径：根目录/保存目录路径/创建日期目录
                $upload = new \Think\Upload($config);
                //uploadOne会返回已经上传的附件信息
                $z = $upload -> uploadOne($_FILES['img']);
                if(!$z){
                    show_bug($upload->getError()); //获得上传附件产生的错误信息
                }else {
                    //拼装图片的路径名
                    $bigimg = $z['savepath'].$z['savename'];
                    $_POST['big_img'] = $bigimg;
                    
                    //把已经上传好的图片制作缩略图Image.class.php
                    $image = new \Think\Image();
                    //open();打开图像资源，通过路径名找到图像
                    $srcimg = $upload->rootPath.$bigimg;
                    $image -> open($srcimg);
                    $image -> thumb(150,150);  //按照比例缩小
                    $smallimg = $z['savepath']."small_".$z['savename'];
                    $image -> save($upload->rootPath.$smallimg);
                    $_POST['small_img'] = $smallimg;
                }
            }

            $cooler -> create(); //收集post表单数据
            $z = $cooler -> add();
            if($z){
                $this ->success('添加商品成功', U('Cooler/showlist'));
            } else {
                $this ->error('添加商品失败', U('Cooler/showlist'));
            }
        }else {
        }
        $this -> display();
    }

    function upd($cooler_id){
        //查询被修改商品的信息并传递给模板展示
        $cooler = D("Cooler");

        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            $cooler -> create();
            $rst = $cooler -> save();
            if($rst){
               $this->success('修改成功!',U('showlist'));
            } else {
                $this->error('修改失败!',U('showlist'));
            }
        } else {
            $info = $cooler->find($cooler_id); //一维数组
            $this -> assign('info', $info);
            $this -> display();
        }
    }
    
    //删除方法
    function del($cooler_id){

        $cooler = D("Cooler");
        if(!empty($_GET)){

            $rst = $cooler -> where("id = $cooler_id")->delete();
            if($rst){
                $this->success('删除成功!',U('showlist'));
            }
            else{
                $this->error('删除失败!',U('showlist'));
            }
        }
    }


    function detail(){


    }

}

