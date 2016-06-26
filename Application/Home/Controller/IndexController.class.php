<?php
namespace Home\Controller;
use Think\Controller;
use Component\Category;
class IndexController extends Controller {




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



    function select(){

        $data = array(
            'username'=>I('username'),
            'content'=>I('content'),
            'time'=>time(),
        );

        $this->ajaxReturn($data,'json');
      //  $this->ajaxReturn(array('status'=>0),'json');
        /*
        if($id = M('wish')->data($data)->add()) {
            $data['id']=$id;
            $data['username'] =  replace_phiz($data['username']);
            $data['content'] =  replace_phiz($data['content']);
            $data['time']=123
            $data['status']=1;
            $this->ajaxReturn($data,'json');

        }else{

            $this->ajaxReturn(array('status'=>0),'json');
        }
       */
        echo("fffffff");
p($_POST);
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


    public function getcate(){
        //   IF(!IS_AJAX) _404('页面不存在');

        $cate = M('cate')->order('sort')->select();
        $cate = Category::unLimitedForLevel($cate);
        $res = Category::getChilds2($cate,$_POST['pid']);

        $this->ajaxReturn($res,'json');


    }


        public  function map(){
        $this->display();
    }


    public function test(){

     $this->display("test");

    }


    public function handle_test(){

        dump($_POST);

    }
}