<?php
namespace Home\Controller;
use Think\Controller;
use Component\Category;
class CoolerController extends Controller {

    public function  _initialize(){


        $this->cate = M('nation')->order('id')->select();
       // $this->cate = Category::unLimitedForLevel($this->cate);

        $this->allstr = json_encode($this->cate);
       // p($this->allstr);die;
        // $this->allstr = $this->cate;
        //p($this->cate);

    }



    public function index(){

    }


//process ajax
    public function getcooler($cid){

/*        $cids = Category::getChildsId_WithSelf($this->cate,$cid);

        $where = array( 'cid' => array('IN',$cids));
        $cooler = M('stock')->where($where)->select();
 $this->ajaxReturn($cooler,'json');
       */

     //  $where = where('code = 000001');
        $cooler = M('stock')-> where('code < 100')->select();
        $this->ajaxReturn($cooler,'json');
    }

//process ajax
    public function getStockStatistic($cid){

        $where = "pid = " . $cid;
        $statisc = M('nation')-> where($where)->select();
        $this->ajaxReturn($statisc,'json');
        p($statisc);
    }



//process ajax
    public function getStockOfCity($city){


/*
       $sql ="select * from c_stock  join c_nation on c_stock.city = c_nation.id where c_stock.city = ".$city;
        $stock = D()->query($sql);
          p($stock);die;
*/

        $where = "city = " . $city;
        $cooler = M('stock')-> where($where)->select();
      //  p($cooler);
       $this->ajaxReturn($cooler,'json');
    }
//process ajax
    public function getStockOfProvince($city){
        $where = "province = " . $city;
        $cooler = M('stock')-> where($where)->select();
        //  p($cooler);
        $this->ajaxReturn($cooler,'json');
    }
//process ajax
    public function getStockOfChina($city){

        $cooler = M('stock')->select();
        //  p($cooler);
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