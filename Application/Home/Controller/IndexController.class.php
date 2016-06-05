<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        $info_cooler = M('info_cooler')->order('id DESC')->select();
       // dump($info_cooler);die;

        $this->info_cooler = $info_cooler;
        $this->display('index');
    }


    public  function map(){
        $this->display();
    }


}