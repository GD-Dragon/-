<?php
namespace app\admin\controller;
use Request;
use Db;
class Goodscate extends Common
{

        public function list()
      {
          return $this->fetch();
      }

 
    	private function getTree($array,$pid =0,$level =0){
    		// static $list = [];
    		echo "<ul id=ui>";
    		foreach ($array as $key => $value) {
    			if ($value['pid'] ==$pid) {
    				$value['name'] =$value['name'];
    				$m_id=$value['id'];
    				echo "<li value='$m_id'>".$value['name']."<a style='text-decoration:none' class= ml-5' onclick='del(".$value['id'].")' title='删除'><i class='Hui-iconfont'>&#xe6e2;</i></a></li>";
    				$this->getTree($array,$value['id'],$level+1);
    				}
    			   
    			}
    		// return $list;
          echo "</ul>";
    	}
       public function show()
    { 
      $arr=Db::query("select * from goods_category");
      $this->getTree($arr);
    } 

    public function addAction()
    {
      $name=Request::post('name');
      $pid=Request::post('pid');
      $arr=Db::query("select id from goods_category where name='$name'");
      if(!empty($arr)){
        $json=['code'=>'1','status'=>'error','data'=>'名称不能重复'];
        return json($json);
      }else{
        $data=['name'=>$name,'pid'=>$pid];
        $id=Db::name('goods_category')->insertGetId($data);
        $json=['code'=>'0','status'=>'ok','data'=>$id];
        return json($json);
      }
    }
    
    public function del()
    {
      $data=Request::post();
      $get=Request::param();
      $id=$get['id'];
      $arr=Db::query("delete from goods_category where id=$id");
      $this->del_action($id);
        $json=['code'=>'0','status'=>'ok','data'=>'删除成功'];
        return json($json);
    }
     function del_action($id)
    {
      $arr=Db::query("select *from goods_category where pid=$id");
      if(empty($arr)){
      }else{
        foreach ($arr as $key => $value) {
          $id=$value['id'];
          Db::query("delete from goods_category where id=$id");
          $this->del_action($value['$id']);
        }
      }
    }
}