<?php
namespace app\admin\controller;
use gmars\rbac\Rbac;
use Request;
use Db;
use Session;
class Role extends Common
{
    public function list()
    {
        $token=uniqid();
       Session::set('token',$token);
      $this->assign('token',$token);
      return $this->fetch();
    }
    public function show()
    {
      	$rbac=new Rbac();
        $arr=Db::query("select id,name,description from role");
      	$json=['code'=>'0','status'=>'ok','data'=>$arr];
        return json($json);
    } 
    public function permissionShow()
    {
      $rbac=new Rbac();
      $arr=Db::query("select p.id,p.name,p.description,p.path,p_c.name as p_c_name,p.category_id from permission as p join permission_category as p_c on p.category_id=p_c.id");
      $newarr=[];
      foreach ($arr as $key => $value) {
        $newarr[$value['p_c_name']][]=$value;
      }
      $json=['code'=>'0','status'=>'ok','data'=>$newarr];
        return json($json);
    }

    public function mypermissionShow()
    {
      $id=Request::get('id');
      $rbac=new Rbac();
      $arr=Db::query("select permission_id from role_permission where role_id='$id'");

      $json=['code'=>'0','status'=>'ok','data'=>$arr];
        return json($json);
    } 

        public function add()
    {

      return $this->fetch();
    }

    public function addAction()
    {
        $data=Request::post();
        $validate = new \app\admin\validate\Role;
        if (!$validate->check($data)){
          $arr=['code'=>'01','status'=>'error','data'=>$validate->getError()];
            return json($arr);
        }
        $rbac= new Rbac();
        $name=$data['name'];
        $description=$data['description'];
        $permission_id=$data['permission_id'];
        $getname=Db::query("select * from role where name='$name'");
        $arr=explode(',', $permission_id);
        array_shift($arr);
        $permission_id=implode(',',$arr);
        if (empty($getname)) {
          $rbac->createRole([
            'name' => $name,
            'description' => $description,
            'status' => 1
             ],$permission_id);
         $json=['code'=>'0','status'=>'ok','data'=>$arr];
         return json($json);
        }else{
          $json=['code'=>'2','status'=>'error','data'=>'名字不能重复'];
          return json($json);
        }
    }
        public function updateAction()
       {
        $data=Request::post();
        $validate = new \app\admin\validate\Role;
        if (!$validate->check($data)){
          $arr=['code'=>'01','status'=>'error','data'=>$validate->getError()];
            return json($arr);
        }
        $rbac= new Rbac();
        // $getname=$rbac->getPermission([['name', '=', $data['name']]]);
        $name=$data['name'];
        $id=$data['id'];
        $permission_id=$data['permission_id'];
        $up_data=$data;
        unset($up_data['__token__']);
        unset($up_data['permission_id']);
        $arr=Db::query("select * from role where name='$name'");
        if (empty($arr)||!empty($arr)&&$arr[0]['id']==$data['id']){
              $arr=Db::table('role')->update($up_data);
              //删除，重新入库
              $arr=Db::query("delete from role_permission where role_id='$id'");
                $pid_arr=explode(',',$permission_id);
                array_shift($pid_arr);
                foreach ($pid_arr as $key => $value) {
                  $arr=Db::query("insert into `role_permission` (`role_id`,`permission_id`) value ('$id','$value')");
                }
                $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
          }else{
                $arr=['code'=>'1','status'=>'error','data'=>'已经重名'];
            }
                return json($arr);
          }
    public function delete()
    {
        $data=Request::post();
        $validate=new \app\admin\validate\Delete;
        if(!$validate->check($data)){
        $arr=['code'=>'1','status'=>'error','data'=>$validate->getError()];
         return json($arr);
       }
        $rbac= new Rbac();
        $rbac->delRole([$data['id']]);
        $json=['code'=>'0','status'=>'ok','data'=>'删除成功'];
        return json($json);
    }
      public function deleteMore()
    {
      $__token__=Request::post('__token__');
      $session_token=Session::get('token');
      $token=uniqid();
        Session::set('token',$token);
      if($__token__!=$session_token){
        $arr=['code'=>'1','status'=>'error','data'=>'令牌不匹配','token'=>$token];
      echo json_encode($arr);
      die;
      }
      $id=Request::post('id');
      if(empty($id)){
      $arr=['code'=>'0','status'=>'error','data'=>'不能为空','token'=>$token];
      echo json_encode($arr);
      die;
      }
      $arr=explode(',', $id);
      array_shift($arr);
      $rbac=new Rbac();
      $rbac->delRole($arr);
      $arr=['code'=>'0','status'=>'ok','data'=>'删除成功','token'=>$token];
      return json($arr);
    }

}