<?php
namespace app\admin\controller;
use Request;
use Db;
class Attrcategory extends Common
{
	   public function list()
      {
         
          return $this->fetch();
      }
       public function show()
    { 
      $arr=Db::query("select * from attr_category");
      $json=$json=['code'=>'0','status'=>'ok','data'=>$arr];
      return json($json);
    }  
   	   public function addAction()
   	{	
   		$validate = new \app\admin\validate\Attrcategory;
   		$data=Request::post();
        unset($data['__token__']);
        $arr=Db::name('attr_category')->insertGetId($data);
        if (empty($arr)) {
         $json=['code'=>'0','status'=>'ok','data'=>$arr];
         return json($json);
        }else{
          $json=['code'=>'1','status'=>'error','data'=>'名字不能重复'];
          return json($json);
          die;
        }
   	}
   	 public function delete()
   	 { 
   	 	$data = Request::post();
	    Db::table('attr_category')->where('id',$data['id'])->delete();
        $arr=['code'=>'0','staus'=>'ok', 'data'=>'删除成功'];
        $json = json_encode($arr);
        echo $json;
   	 }
      	public function updateAction()
    {
    	$data = Request::post();
    	 unset($data['__token__']);
    	$name=$data['name'];
        $arr=Db::query("select * from attr_category where name='$name'");
        if (empty($arr)) {
          $arr=Db::table('attr_category')->update($data);
          $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }else{
           $arr=['code'=>'1','status'=>'error','data'=>'名字已经存在'];
           return json($arr);
         }
      } 	 
}