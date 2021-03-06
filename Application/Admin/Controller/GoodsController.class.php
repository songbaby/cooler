<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class GoodsController extends AdminController {
    //商品列表展示


    function showlist(){
        $goods = D("Goods");
        
        //1. 获得当前记录总条数
        $total = $goods -> count();
        $per = 7;
        //2. 实例化分页类对象
        $page = new \Component\Page($total, $per); //autoload
        //3. 拼装sql语句获得每页信息
        $sql = "select * from c_goods ".$page->limit;
        $info = $goods -> query($sql);
        //4. 获得页码列表
        $pagelist = $page -> fpage();
        
        $this -> assign('info', $info);
        $this -> assign('pagelist', $pagelist);
        $this -> display();
    }
    

    function add(){
        $goods = D("Goods");
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
                $z = $upload -> uploadOne($_FILES['goods_img']);
                if(!$z){
                    show_bug($upload->getError()); //获得上传附件产生的错误信息
                }else {
                    //拼装图片的路径名
                    $bigimg = $z['savepath'].$z['savename'];
                    $_POST['goods_big_img'] = $bigimg;
                    
                    //把已经上传好的图片制作缩略图Image.class.php
                    $image = new \Think\Image();
                    //open();打开图像资源，通过路径名找到图像
                    $srcimg = $upload->rootPath.$bigimg;
                    $image -> open($srcimg);
                    $image -> thumb(150,150);  //按照比例缩小
                    $smallimg = $z['savepath']."small_".$z['savename'];
                    $image -> save($upload->rootPath.$smallimg);
                    $_POST['goods_small_img'] = $smallimg;
                }
            }
            
            $goods -> create(); //收集post表单数据
            $z = $goods -> add();
            if($z){
                //$this ->success('添加商品成功', U('Goods/showlist'));
                echo "success";
            } else {
                //$this ->error('添加商品失败', U('Goods/showlist'));
                echo "error";
            }
        }else {
        }
        $this -> display();
    }

    function upd($goods_id){
        //查询被修改商品的信息并传递给模板展示
        $goods = D("Goods");
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            $goods -> create();
            $rst = $goods -> save();
            if($rst){
                $this->success('修改成功!',U('showlist'));
            } else {
                $this->error('修改失败!',U('showlist'));
            }
        } else {
            $info = $goods->find($goods_id); //一维数组
            $this -> assign('info', $info);
            $this -> display();
        }
    }
    
    //删除方法
    function del($goods_id){

        $goods = D("Goods");
        if(!empty($_GET)){

            $rst = $goods -> where("goods_id = $goods_id")->delete();
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

