<?php
namespace app\admin\controller;
use Request;
use Db;
class Brand extends Common
{

        public function list()
      {
          return $this->fetch();
      }

       public function show()
    { 
      $arr=Db::query("select * from brand");
      $json=$json=['code'=>'0','status'=>'ok','data'=>$arr];
      return json($json);
    }  

     public function addAction()
    {	
        
        $name=Request::post('name');
        $description=Request::post('description');
        $arr=Db::query("select id from brand where name='$name'");
        if (!empty($arr)) {
          $json=['code'=>'0','status'=>'ok','data'=>'名字不能重复'];
          return json($arr);
        }
        $logo=request()->file('logo');
        if($logo){
          $info = $logo->validate(['size'=>1024*1024,'ext'=>'jpg,png,gif'])->move('./uploads');
          if($info){
            $path=str_replace("\\","/",$info->getSaveName());
            Db::query("insert into brand (`name`,`description`,`logo`)values ('$name','$description','$path')");
            $json=['code'=>'0','status'=>'ok','data'=>'添加成功'];
            return json($json);
          }else{
               echo $file->getError();
             }
        }else{
          $json=['code'=>'1','status'=>'error','data'=>'文件不能为空'];
          return json($json);
          }
        }

    	public function delete()
    {
		$data = Request::post();
	    Db::table('brand')->where('id',$data['id'])->delete();
        $arr=['code'=>'0','staus'=>'ok', 'data'=>'删除成功'];
        $json = json_encode($arr);
        echo $json;
    }
    	public function datadel()
    {
        $data= Request::post();
        $id = $data['id'];
        if (empty($id)) {
            $arr = ['code'=>'1','status'=>'error','data'=>'未选择任何对象'];
            $json = json_encode($arr);
            echo $json;
            die; 
        }else{
            Db::table('brand')->where('id','in',$id)->delete();
            $arr=['code'=>'0','staus'=>'ok', 'data'=>'删除成功'];
            $json = json_encode($arr);
            echo $json;
        }
    }
    	public function updateAction()
    {
    	$data = Request::post();
    	$name=$data['name'];
        $description=$data['description'];
        $arr=Db::query("select * from brand where name='$name' or description='$description'");
        if (empty($arr)) {
          $arr=Db::table('brand')->update($data);
          $arr=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }else{
          foreach ($arr as $key => $value) { 
            if ($value['id']!=$data['id']) {
                $arr=['code'=>'2','status'=>'error','data'=>'name或者description已经存在'];
                return json($arr);
            }
         }
          $arr=Db::table('brand')->update($data);
          $arr=['code'=>'1','status'=>'ok','data'=>'修改成功'];
            return json($arr);
        }
      }
      public function up_logo()
      {
        $data= Request::post();
        $id=$data['id'];
        $newfile= request()->file('logo');
        $arr=Db::query("select * from brand where id='$id");
        $img=$arr[0]['logo'];
        unlink("./uploads/".$img);
        $info = $newfile->validate(['size'=>1024*1024,'ext'=>'jpg,png,gif'])->move('./uploads');
        if($info){
            $path=str_replace("\\","/",$info->getSaveName());
            $arr=Db::query("update  brand set logo='$path where id='$id'");
            $json=['code'=>'0','status'=>'ok','data'=>'修改成功'];
            return json($json);
          }else{
           $json=['code'=>'1','status'=>'ok','data'=>'修改失败'];
            return json($json); 
          }
      }
}	