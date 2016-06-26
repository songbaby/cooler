<?php
/**
 * Created by PhpStorm.
 * User: song
 * Date: 2015/10/6
 * Time: 22:20
 */

class Category{

//���һά����
    Static public function unLimitedForLevel($cate ,$html='  - - - ',$pid=0,$level=0){

        $arr = array();
        foreach($cate as $v ){
            if($v['pid'] == $pid){
                $v['level'] = $level+1;
                $v['html'] = str_repeat($html,$level);
                $arr[] = $v;
                $arr = array_merge($arr,self::unLimitedForLevel($cate,$html,$v['id'],$level+1));
            }
        }

        return $arr;
    }

//��϶�ά����
    static public  function unLimitedForLayer($cate,$name='child',$pid=0){

        $arr=array();
        foreach($cate as $v){
            if($v['pid'] == $pid){//����ö���ĸ�id��ָ����id���,��ȥ�����ö���
                $v[$name] = self::unLimitedForLayer($cate ,$name,$v['id']);
                $arr[]=$v;
            }
        }

        return $arr;
    }

    //����һ���ӷ���id �������еĸ�������
    static public function getParents($cate,$id){
            $arr =array();
            foreach($cate as $v){
                if($v['id'] == $id){
                        $arr[] = $v;
                        $arr = array_merge(self::getParents($cate,$v['pid']) , $arr);
                    }
            }
            return $arr;
        }
//����һ����������id �������е��ӷ���id
    static public function getChildsId($cate,$pid){

        $arr=array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[] =  $v['id'];//$v;
                $arr = array_merge($arr , self::getChildsId($cate,$v['id']));
            }
        }

        return $arr;

    }


//����һ����������id �������е��Ӽ�����
    static public function getChilds($cate,$pid){
        $arr=array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[] =  $v;//$v['id'];
                $arr = array_merge($arr , self::getChildsId($cate,$v['id']));
            }
        }

        return $arr;

    }

    static public function getChilds2($cate,$pid){
        $arr=array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[] =  $v;
            }
        }
        return $arr;
    }

}
