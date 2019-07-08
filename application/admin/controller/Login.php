<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use Request;
use Db;
use think\facade\Session; 
use gmars\rbac\Rbac;
class Login extends Controller
{

    public function login()
    {
    	return $this->fetch();
    }
    public function loginAction()
    {
     $code=Request::post('code');
     $name=Request::post('name');
     $password=Request::post('password');
     $captcha= new captcha();
     if(!$captcha->check($code)){
        $arr=['code'=>'1','status'=>'error','message'=>'验证码错误'];
             $json=json_encode($arr);
             echo $json;die;
     }else{
        $where=['user_name'=>$name,'password'=>md5($password)];
        $res=Db::table('user')->where($where)->find();
        if(empty($res)){
            $arr=['code'=>'2','status'=>'error','message'=>'账号或密码错误'];
                 $json=json_encode($arr);
                 echo $json;die;
        }else{
            
            $rbac = new Rbac();
            $rbac->cachePermission($res['id']);
            Session::set('name',$name);
            $arr=['code'=>'0','status'=>'ok','message'=>'登入成功'];
                 $json=json_encode($arr);
                 echo $json;die;
        }
     }

    }
    public function loginOut()
    {
        Session::clear();
        $this->redirect('login/login');
        
    }
}
