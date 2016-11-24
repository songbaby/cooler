<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class StockController extends AdminController {
    //商品列表展示

    
        function autoupdate()
        {


        {//update province


             $where = " city =\"\" and district = \"\"   ";
            $cate = M('nation')->order('id')->where($where)->select();

            p("updating");
            foreach ($cate as $k => $v) {

                $str = $v['province'];

                $where1 = "address like \"%";
                $where1 .= $str;
                $where1 .= "%\"";
                $stock = M('stock')->where($where1)->select();

                p($str . ":" . $stock);

                foreach ($stock as $key => $val) {
                    p("address " . $val['address']);
                   // p("city " . $val['city']);

                    $User = M("stock"); // 实例化User对象
                    $User->province = $v['id'];
                    $User->where('code=' . $val['code'])->save(); // 根据条件更新记录
                }
            }

        }


        {//update city


            $where = " city !=\"\" and district = \"\"   ";
            $cate = M('nation')->order('id')->where($where)->select();

            p("updating");
            foreach ($cate as $k => $v) {

                $str = $v['province'].$v['city'];

                $where1 = "address like \"%";
                $where1 .= $str;
                $where1 .= "%\"";
                $stock = M('stock')->where($where1)->select();

                p($str . ":" . $stock);

                foreach ($stock as $key => $val) {
                    p("address " . $val['address']);
                  //  p("city " . $val['city'] ." , id ".$v['id']);

                    $User = M("stock"); // 实例化User对象
                    $User->city = $v['id'];
                    $User->where('code=' . $val['code'])->save(); // 根据条件更新记录
                }
            }
        }
    }





    function autoupdateLatLng(){

        {

            $this->cate = M('stock')->order('code')->select();
            $this->allstr = json_encode($this->cate);
            $this->display();
        }


    }

//process ajax
    public function autoupdateLatLngProccess($code ,$lat,$lng){
        $where = "code = ".$code;

        $data['lat'] = $lat;
        $data['lng'] = $lng;
        M("stock")->where($where)->save($data); // 根据条件更新记录

        $this->ajaxReturn($code." success :".$lat." ".$lng, 'json');
    }




}

