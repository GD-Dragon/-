<?php
namespace app\admin\controller;
use Request;
use Db;
use Session;
class Goods extends Common
{
 
      public function list()
      {
        return $this->fetch();
      }
        public function show()
        {   
          $arr=Db::query("select goods.id,goods.name,goods.description,goods.price,goods.online_status,goods_category.name as g_c_name,brand.name as brand_name from goods left join goods_category on goods_category.id=goods.goodscate_id left join brand on brand.id=goods.brand_id");
          $json=['code'=>'0','status'=>'ok','data'=>$arr];
          return json($json);
          
        }
         


        public function showCate(){
          $arr=Db::query("select * from goods_category");
          $this->getTree($arr);
        }


        private function getTree($array,$pid =0,$level =0){
        foreach ($array as $key => $value) {
          if ($value['pid'] ==$pid) {
            $flg=str_repeat('|--', $level);
            $value['name']=$flg.$value['name'];
            $name=$value['name'];
            $id=$value['id'];
            echo "<option value='$id'>$name</option>";
            $list[]=$value;
            unset($array[$key]);
            $this->getTree($array,$value['id'],$level+1);
            }
             
          }
      }


        public function add()
        {

          return $this->fetch();
        }


          public function addAction()
        {   
            $data=Request::post();
            unset($data['__token__']);
          $id=Db::name('goods')->insertGetId($data);
          $json=['code'=>'0','status'=>'ok','data'=>'添加成功'];
          return json($json); 
        
        }

        
         public function updateAction()
        {   
          $data=Request::post();
          $name=$data['name'];
          $arr=Db::query("select * from goods_category where name='$name'");
          if (empty($arr)) {
                    $where=['name'=>$data['name']];
              $arr=Db::name('goods_category')->where('id',$data['id'])->update($where);
            $json=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($json);
          }else{
            $json=['code'=>'1','status'=>'error','data'=>'产品类型不能重复'];
            return json($json);
          }
          
          
        }

            public function delete()
        {   
            $data=Request::post();
            $id=$data['id'];
          $arr1=Db::query("select * from goods where id='$id'");
          Db::query("delete from goods where id='$id'");
            $this->del($id);
            $json=['code'=>'0','status'=>'ok','data'=>'删除成功'];
            echo json_encode($json);   
        }

        function del($id){
            $arr=Db::query("select * from goods where pid='$id'");
            if (!empty($arr)) {
                foreach ($arr as $key => $value) {
                    $id1=$value['id'];
                    $arr=Db::query("delete from goods where id=$id1");
                    $this->del($value['id']);
                   
                }
            }
        }
}