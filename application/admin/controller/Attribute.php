<?php
namespace app\admin\controller;
use Request;
use Db;
class Attribute extends Common
{
	   public function list()
      {
         $attrcate_id=Request::get('id');
          $this->assign('attrcate_id',$attrcate_id);
       
          return $this->fetch();
      }

        public function show()
      {
        $attrcate_id=Request::post('attrcate_id');
        $arr=Db::query("select attribute.id,attribute.name,attr_category.name as a_c_name from attribute left join attr_category on attribute.attrcate_id=attr_category.id where attribute.attrcate_id='$attrcate_id'" );
        $json=['code'=>'0','status'=>'ok','data'=>$arr];
        return json($json);
      }
        public function showCate(){
          $arr=Db::query("select * from attr_category");
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
        $arr=Db::name('attribute')->insertGetId($data);
        $json=['code'=>'0','status'=>'ok','data'=>$arr];
        return json($json);
      }
    }
     public function delete()
     { 
      $data = Request::post();
      Db::table('attribute')->where('id',$data['id'])->delete();
        $arr=['code'=>'0','staus'=>'ok', 'data'=>'删除成功'];
        $json = json_encode($arr);
        echo $json;
     }
     public function updateAction(){
        $data=Request::post();
        unset($data['__token__']);
        $name=$data['name'];
        $arr=Db::query("select * from attribute where name='$name'");
        if (empty($arr)) {
          $arr=Db::table('attribute')->update($data);
          $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }else{
          foreach ($arr as $key => $value) { 
            if ($value['id']!=$data['id']) {
                $arr=['code'=>'2','status'=>'error','data'=>'名字已经存在'];
                return json($arr);
          }
          }
          $arr=Db::table('attribute')->update($data);
          $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }
        }

}