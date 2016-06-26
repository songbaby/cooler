<?php
namespace Home\Controller;
use Think\Controller;
use Component\Category;
class CoolerController extends Controller {

    public $cate=array();
    public function  __initialize(){




    }
    public function index(){

       // $this->display('test2');die;

      //  $info_cooler = M('info_cooler')->order('id DESC')->select();
       // dump($info_cooler);die;

       // $this->info_cooler = $info_cooler;

        $GLOBALS['map_list']=0;
        $this->display('index');

die;
    }

    public function getcooler($cid){

        $this->cate = M('cate')->order('id')->select();
        $this->cate = Category::unLimitedForLevel($this->cate);
        $cids = Category::getChildsId_WithSelf($this->cate,$cid);

        $where = array( 'cid' => array('IN',$cids));
        $cooler = M('cooler')->where($where)->select();


        $this->ajaxReturn($cooler,'json');



    }




    public function showlist($cid){


        $townid = $_GET['t'];
        $countyid = $_GET['co'];
        $cityid = $_GET['ci'];
        $provinceid = $_GET['p'];

        $this->display("showlist");

    }

    public function showmap($cid){

        $townid = $_GET['t'];
        $countyid = $_GET['co'];
        $cityid = $_GET['ci'];
        $provinceid = $_GET['p'];



        $this->display("showmap");
    }




}