<?php
namespace Home\Controller;
use Think\Controller;
use Component\Category;
class CoolerController extends Controller {

    public function  _initialize(){


        $this->cate = M('cate')->order('id')->select();
        $this->cate = Category::unLimitedForLevel($this->cate);
        $this->allstr = json_encode($this->cate);
    }



    public function index(){

    }


//process ajax
    public function getcooler($cid){

        $cids = Category::getChildsId_WithSelf($this->cate,$cid);
        $where = array( 'cid' => array('IN',$cids));
        $cooler = M('cooler')->where($where)->select();

        $this->ajaxReturn($cooler,'json');

    }




    public function showlist(){


        $this->display();

    }

    public function showmap(){


        $this->display();
    }


    public function detail($id){

        $info = D('Cooler')->find($id);


        $this->info = $info;
        $this->display();

    }



}