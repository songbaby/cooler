<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class StockController extends AdminController {
    //商品列表展示

    
    function autoupdate()
    {

        {


            $where = " city = \"\" ";
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
                    p("province " . $val['address']);
                    p("city " . $val['city']);

                    $User = M("stock"); // 实例化User对象
                    $User->province = $v['id'];
                    $User->where('code=' . $val['code'])->save(); // 根据条件更新记录
                }


            }
        }


        {

            $where = " city != \"\" ";
            $cate = M('nation')->order('id')->where($where)->select();

            p("updating");
            foreach ($cate as $k => $v) {

                $str = "";
                if ($v['city'] == '' && $v['district'] == '') {
                    $str = $v['province'];
                } else {
                    $str = $v['province'] . $v['city'];
                }
                $where1 = "address like \"%";
                $where1 .= $str;
                $where1 .= "%\"";
                $stock = M('stock')->where($where1)->select();

                p($str . ":" . $stock);

                foreach ($stock as $key => $val) {
                    p("province " . $val['address']);
                    p("city " . $val['city']);


                    $User = M("stock"); // 实例化User对象
                    // $User->provice = $stock[0]['province'];
                    $User->city = $v['id'];
                    // p("province ".$stock[0]['province']);
                    //  p("city ".$stock[0]['city']);
                    $User->where('code=' . $val['code'])->save(); // 根据条件更新记录
                }
            }
         }

        p("finish");



    }




}

