<?php
namespace Home\Controller;
use Think\Controller;
use Component\Category;
class IndexController extends Controller {

    public function  _initialize(){

        $this->cate = M('cate')->order('id')->select();
        $this->cate = Category::unLimitedForLevel($this->cate);
        $this->allstr = json_encode($this->cate);
    }

    public function index(){
        $this->display('index');
    }





}