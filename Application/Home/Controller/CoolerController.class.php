<?php
namespace Home\Controller;
use Think\Controller;
class CoolerController extends Controller {

    public function index(){

       // $this->display('test2');die;

      //  $info_cooler = M('info_cooler')->order('id DESC')->select();
       // dump($info_cooler);die;

       // $this->info_cooler = $info_cooler;

        

        $this->display('index');
die;

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

    function get_coolers($provinceid,$cityid,$countyid,$townid){

        $sql = "select * from c_info_cooler ";

        if( $provinceid != 0 || $cityid != 0 || $countyid != 0||$townid != 0){
            $sql .= " where ";
        }

        if($provinceid != 0){
            $sql .= " province = $provinceid ";
        }

        if($cityid != 0){
            if(strpos($sql,"province") == true){
                $sql .= " and city = $cityid ";
            }else{
                $sql .= " city = $cityid ";
            };
        }

        if($countyid != 0){
            if(strpos($sql,"province") == true || strpos($sql,"city") == true){
                $sql .= " and county = $countyid ";
            }else{
                $sql .= " county = $countyid ";
            }

        }
        if($townid != 0){
            if(strpos($sql,"province") == true || strpos($sql,"city") == true ||  strpos($sql,"county") == true){
                $sql .= " and town = $townid ";
            }else{
                $sql .= " town = $townid ";
            }
        }

        echo $sql;
        $minfo = D()->query($sql);

    show_bug($minfo);


    }
    function get_coolers1(){

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

    public function test(){
     $this->display("test");
    }

    public function handle_test(){
        dump($_POST);
    }


    public function showlist(){


        $townid = $_GET['t'];
        $countyid = $_GET['co'];
        $cityid = $_GET['ci'];
        $provinceid = $_GET['p'];

        $coolers = $this->get_coolers($provinceid,$cityid,$countyid,$townid);
        $this->coolers = $coolers;

        $this->display("showlist");

    }

    public function showmap(){

        $townid = $_GET['t'];
        $countyid = $_GET['co'];
        $cityid = $_GET['ci'];
        $provinceid = $_GET['p'];

        $coolers = $this->get_coolers($provinceid,$cityid,$countyid,$townid);
        $this->coolers = $coolers;

        $this->display("showmap");
    }
}