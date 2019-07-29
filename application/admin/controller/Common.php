<?php
namespace app\admin\controller;
use Redis;
use think\Controller;
use think\facade\Session;
use gmars\rbac\Rbac;
use Request;


class Common extends Controller
{

  public function __construct()
  {
        $redis = new Redis();
        $redis->connect('127.0.0.1',6379);
 
        // incr() 对指定的key的值加1
        // decr()对指定的key的值减1
        // incrBy() 将第二个参数的值加到key的值上
        // decrBy() 将第二个参数的值加到key的值上
        // incrByFloat() 自增一个浮点类型的值
        
        echo $redis->incr('shenzhen')."<br/>";//1
        echo $redis->incr('shenzhen')."<br/>";//2
        echo $redis->incrBy('shenzhen',6)."<br/>";//8
        echo $redis->decr('shenzhen')."<br/>";//7
        echo $redis->decr('shenzhen')."<br/>";//6
        echo $redis->decrBY('shenzhen',3)."<br>"; //3
        echo $redis->incrByFloat('shenzhen',0.88);//3.88
   parent:: __construct();
   $name=Session::get('name');
   if (empty($name)) { 
    $this->redirect('login/login');
  }else{
   $this->assign('name',$name);
 }
           //验证是否有权限
          $module=Request::module();           //当前模块名称
          $class = Request::controller();     //当前控制器名称
          $action=Request::action();       //当前操作名称
          $arr_class=['Permission','Permissioncate','Role','User','Brand'];
          $arr_action=['show','delete','addaction','updateaction'];
          // in_array() 函数搜索数组中是否存在指定的值。
          if (in_array($class, $arr_class)) {
            if (in_array($action, $arr_action)) {
              $str="$module/$class/$action";
                $str=strtolower($str);     //全部转为小写
                $rbac = new Rbac();
                $bool=$rbac->can($str); //用户请求时进行验证
                if (!$bool) {
                 header("content-Type:application/json");
                 $arr=['code'=>'10001','status'=>'error','data'=>'没有权限'];
                 echo json_encode($arr);
                 die;
               }
             }
           }
         }


         public function commonToken()
         {
          $token = $this->request->token('__token__', 'sha1');
          $arr=['token'=>$token];
          echo json_encode($arr);
              // $this->assign('token', $token);
              // return $this->fetch();
        }

    }
