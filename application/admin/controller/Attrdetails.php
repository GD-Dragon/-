<?php
namespace app\admin\controller;
use Request;
use Db;
class Attrdetails extends Common
{
     public function list()
      {
          $attr_id=Request::get('id');
          $this->assign('attr_id',$attr_id);
          return $this->fetch();
      }

        public function show()
      {
        $attr_id=Request::post('attr_id');
        $arr=Db::query("select attr_details.id,attr_details.name,attribute.name as a_b_name from attr_details join attribute on attr_details.attr_id=attribute.id where attr_details.attr_id='$attr_id'");
        $json=['code'=>'0','status'=>'ok','data'=>$arr];
        return json($json);
      }
        public function showCate(){
          $arr=Db::query("select * from attribute");
          echo  json_encode($arr);
        }

    public function addaction()
    {
     
      $data=Request::post();
      unset($data['__token__']);
      $name=$data['name'];
      if(!empty($arr)){
        $json=['code'=>'1','status'=>'error','data'=>'名称不能为空或重复'];
        return json($json);
        die;
      }else{
        $arr=Db::name('attr_details')->insertGetId($data);
        $json=['code'=>'0','status'=>'ok','data'=>$arr];
        return json($json);
      }
    }
     public function delete()
     { 
      $data = Request::post();
      Db::table('attr_details')->where('id',$data['id'])->delete();
        $arr=['code'=>'0','staus'=>'ok', 'data'=>'删除成功'];
        $json = json_encode($arr);
        echo $json;
     }
     public function updateAction(){
        $data=Request::post();
        unset($data['__token__']);
        $name=$data['name'];
        $arr=Db::query("select * from attr_details where name='$name'");
        if (empty($arr)) {
          $arr=Db::table('attr_details')->update($data);
          $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }else{
          foreach ($arr as $key => $value) { 
            if ($value['id']!=$data['id']) {
                $arr=['code'=>'2','status'=>'error','data'=>'名字已经存在'];
                return json($arr);
          }
          }
          $arr=Db::table('attr_details')->update($data);
          $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }
        }

}