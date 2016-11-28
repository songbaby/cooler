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



       $sql ="select * from c_stock  join c_nation on c_stock.city = c_nation.id where c_stock.city = ".$city;
        $stock = D()->query($sql);
        $this->ajaxReturn($stock,'json');


   /*     $where = "city = " . $city;
        $cooler = M('stock')-> where($where)->select();
      //  p($cooler);
       $this->ajaxReturn($cooler,'json');*/
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

    //从c_stock获取名称类似的股票集合，包含经纬度
    public function getStockPos(){

        //组合多个字段为一个字段，以便适应autocomplete的要求
        $sql =" SELECT lat_stock , lng_stock,address ,name ,CONCAT(NAME, ' (', CODE ,')') AS label FROM c_stock  where  spell like '%".$_GET['prefix']."%'";
        $stock = D()->query($sql);

        $sql =" SELECT lat_stock , lng_stock,address ,name ,CONCAT(NAME, ' (', CODE ,')') AS label FROM c_stock  where  code like '%".$_GET['prefix']."%'";
        $stock2 = D()->query($sql);

        $sql =" SELECT lat_stock , lng_stock,address ,name ,CONCAT(NAME, ' (', CODE ,')') AS label FROM c_stock  where  name like '%".$_GET['prefix']."%'";
        $stock3 = D()->query($sql);


        $this->ajaxReturn(array_merge ( array_merge($stock , $stock2) , $stock3),'json');


    }

    public function getStockHot($cate){

        $sql ="select * from c_stock_hot  join c_stock on c_stock.code = c_stock_hot.stock where c_stock_hot.cate = ".$cate;
        $stock = D()->query($sql);
        $this->ajaxReturn($stock,'json');
    }



    public function getStockIndusty($cate){

        $sql ="select * from c_stock_industry  join c_stock on c_stock.code = c_stock_industry.stock where c_stock_industry.cate = ".$cate;
        $stock = D()->query($sql);
        $this->ajaxReturn($stock,'json');
    }


    public function getIndusty(){


        //组合多个字段为一个字段，以便适应autocomplete的要求
        $sql =" SELECT name AS label ,id FROM c_industry  where  spell like '%".$_GET['prefix']."%'";
        $stock = D()->query($sql);

        $sql =" SELECT name AS label ,id  FROM c_industry  where  name like '%".$_GET['prefix']."%'";
        $stock3 = D()->query($sql);



        $this->ajaxReturn(array_merge($stock , $stock3) ,'json');


    }



    public function getHot(){

        //组合多个字段为一个字段，以便适应autocomplete的要求
        $sql =" SELECT name AS label ,id FROM c_hot  where  spell like '%".$_GET['prefix']."%'";
        $stock = D()->query($sql);

        $sql =" SELECT name AS label,id FROM c_hot  where  name like '%".$_GET['prefix']."%'";
        $stock3 = D()->query($sql);



        $this->ajaxReturn(array_merge($stock , $stock3) ,'json');

        }
    }