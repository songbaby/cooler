<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class RegionController extends AdminController {
    //商品列表展示

    
    function autoupdateStockCount(){


        $this->display();

    }




    function autoupdateLatLng(){

        $this->cate = M('nation')->order('id')->select();
        $this->allstr = json_encode($this->cate);
       $this->display();
    }

//process ajax
    public function autoupdateLatLngProccess($id ,$lat,$lng){
        $where = "id = ".$id;

        $data['lat'] = $lat;
        $data['lng'] = $lng;
        M("nation")->where($where)->save($data); // 根据条件更新记录

        $this->ajaxReturn($id." success :".$lat." ".$lng, 'json');
    }



    function fixProvinceLatlng(){
        {
            $where = "pid = 1  and Province like \"%北京%\"";
            $data['lat'] = 39.9108420000;
            $data['lng'] = 116.4136250000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%天津%\"";
            $data['lat'] = 39.0894780000;
            $data['lng'] = 117.2071370000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%河北%\"";
            $data['lat'] = 38.0425360000;
            $data['lng'] = 114.4762240000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%山西%\"";
            $data['lat'] = 37.8800470000;
            $data['lng'] = 112.5690350000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%内蒙古%\"";
            $data['lat'] = 40.8230960000;
            $data['lng'] = 111.7718220000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%辽宁%\"";
            $data['lat'] = 41.8413170000;
            $data['lng'] = 123.4358470000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%吉林%\"";
            $data['lat'] = 43.9018640000;
            $data['lng'] = 125.3333830000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%黑龙江%\"";
            $data['lat'] = 45.7477090000;
            $data['lng'] = 126.6695030000;
            $res = M("nation")->where($where)->save($data);
        }





        {
            $where = "pid = 1  and Province like \"%上海%\"";
            $data['lat'] = 31.2363050000;
            $data['lng'] = 121.4802370000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%江苏%\"";
            $data['lat'] = 32.0667020000;
            $data['lng'] = 118.7693330000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%安徽%\"";
            $data['lat'] = 31.7402220000;
            $data['lng'] = 117.3366950000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%浙江%\"";
            $data['lat'] = 30.2732360000;
            $data['lng'] = 120.1593720000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%福建%\"";
            $data['lat'] = 26.1070270000;
            $data['lng'] = 119.3015880000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%江西%\"";
            $data['lat'] = 28.6425530000;
            $data['lng'] = 115.8226560000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%山东%\"";
            $data['lat'] = 36.6776110000;
            $data['lng'] = 117.0268100000;
            $res = M("nation")->where($where)->save($data);
        }



        {
            $where = "pid = 1  and Province like \"%河南%\"";
            $data['lat'] = 34.7720240000;
            $data['lng'] = 113.7596040000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%湖南%\"";
            $data['lat'] = 28.1182280000;
            $data['lng'] = 112.9900540000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%湖北%\"";
            $data['lat'] = 30.5527990000;
            $data['lng'] = 114.3476220000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%广东%\"";
            $data['lat'] = 23.137963000;
            $data['lng'] = 113.2726970000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%广西%\"";
            $data['lat'] = 22.8212030000;
            $data['lng'] = 108.3341450000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%海南%\"";
            $data['lat'] = 20.0248300000;
            $data['lng'] = 110.3552560000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%重庆%\"";
            $data['lat'] = 29.5691140000;
            $data['lng'] = 106.5581060000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%四川%\"";
            $data['lat'] = 30.6572200000;
            $data['lng'] = 104.0817030000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%贵州%\"";
            $data['lat'] = 26.6051220000;
            $data['lng'] = 106.7130190000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%云南%\"";
            $data['lat'] = 25.0525650000;
            $data['lng'] = 102.7167700000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%西藏%\"";
            $data['lat'] = 29.6531480000;
            $data['lng'] = 91.1240210000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%陕西%\"";
            $data['lat'] = 34.2717090000;
            $data['lng'] = 108.9608030000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%甘肃%\"";
            $data['lat'] = 36.0654790000;
            $data['lng'] = 103.8328500000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%宁夏%\"";
            $data['lat'] = 38.4768710000;
            $data['lng'] = 106.2652610000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%新疆%\"";
            $data['lat'] = 43.7994670000;
            $data['lng'] = 87.6335740000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%青海%\"";
            $data['lat'] = 36.6270270000;
            $data['lng'] = 101.7865720000;
            $res = M("nation")->where($where)->save($data);
        }
        {
            $where = "pid = 1  and Province like \"%香港%\"";
            $data['lat'] = 22.2810890000;
            $data['lng'] = 114.1719940000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%澳门%\"";
            $data['lat'] = 22.1929610000;
            $data['lng'] = 113.5494030000;
            $res = M("nation")->where($where)->save($data);
        }

        {
            $where = "pid = 1  and Province like \"%台湾%\"";
            $data['lat'] = 25.0421840000;
            $data['lng'] = 121.5248710000;
            $res = M("nation")->where($where)->save($data);
        }



    }

}

