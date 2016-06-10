<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
      //  $info_cooler = M('info_cooler')->order('id DESC')->select();
       // dump($info_cooler);die;

       // $this->info_cooler = $info_cooler;
        $this->display('index');


        //$loc_county = M('loc_county')->order('id DESC')->select();
        //dump($loc_county);


       // $loc_town = M('loc_town')->order('id DESC')->select($loc_county);
       // dump($loc_town);

       // $arr = array();
       // $arr['ddd'] = $loc_town;
       // dump($arr);

       // foreach($loc_county as $item) {
            //dump($item['pid']);
       // }
    }


    function select(){

        if( !empty($_GET['town']) and !empty($_GET['county']) ){//显示冷库信息
            $cooler = M('info_cooler')->where("town ='%s' and county = '%s'",$_GET['town'] ,$_GET['county'])->order('id DESC')->select();
            $this->cooler = json_encode($cooler);

            $loc_town = M('loc_town')->where("pid =%d",$_GET['county'] )->order('id DESC')->select();
            //dump($loc_town);
            $this->loc_town = $loc_town;

        }
        else  if(empty($_GET['town']) and !empty($_GET['county'])){//显示town标签

            $cooler = M('info_cooler')->where("town ='%s' and county = '%s'",$_GET['town'] ,$_GET['county'])->order('id DESC')->select();
            $this->cooler = json_encode($cooler);

            $loc_town = M('loc_town')->where("pid =%d",$_GET['county'] )->order('id DESC')->select();
            //dump($loc_town);
            $this->loc_town = $loc_town;
        }


        $this->display('index');
    }


    public  function map(){
        $this->display();
    }
}