<?php
namespace app\admin\controller;
use Request;
use Db;
class Goodsimg extends Common
{
  public function list()
    {   
        $g_id=Request::get('id');
        $this->assign('g_id',$g_id);
      return $this->fetch();
    }
    public function show()
    { 
      $g_id=Request::post('g_id');
      $arr=Db::query("select goods_img.id,goods_img.img_big,goods_img.img_middle,goods_img.img_small,goods.id as g_id from goods_img left join goods on goods_img.goods_id=goods.id where goods_img.goods_id='$g_id'");
      $json=['code'=>'0','status'=>'ok','data'=>$arr];
      echo json_encode($json);
      
    }
    public function addAction(){

        $data=Request::post();
        $g_id=$data['g_id'];
        $files = request()->file('g_img');
        foreach ($files as $file ) {
            $info = $file->validate(['size'=>1024*1024,'ext'=>'jpg,png,gif'])->move( './uploads/goodsimg');
            if($info){
                $name=$info->getFilename();
                $data=date("Ymd");
                $path="$data/$name";
                // var_dump($path);die;
                $image= \think\Image::open("./uploads/goodsimg/$path");
                $img_big="$data/big_$name";
                $image->thumb(150,150)->save('uploads/goodsimg/'.$img_big);
                $img_middle="$data/middle_$name";
                $image->thumb(100,100)->save('uploads/goodsimg/'.$img_middle);
                $img_small="$data/small_$name";
                $image->thumb(50,50)->save('uploads/goodsimg/'.$img_small);
                $arr=Db::query("insert into goods_img (`img_big`,`img_middle`,`img_small`,`goods_id`) values ('$img_big','$img_middle','$img_small','$g_id')");
                    $json=['code'=>'0','status'=>'ok','data'=>$arr];
                    return json($json);
            }else{
                $json=['code'=>'1','status'=>'error','data'=>$file->getError()];
                return json($json);
            }
        }
    }
    public function delete(){
        $data=Request::post();
        $id=$data['id'];
        $arr=Db::query("select img_big,img_middle,img_small from goods_img where id=$id");
        // var_dump($arr);die;
        $img_big=$arr[0]['img_big'];
        $img=str_replace('big_','',$img_big);
        // var_dump($img);die;
        $img_middle=$arr[0]['img_middle'];
        $img_small=$arr[0]['img_small'];
        unlink("./uploads/goodsimg/".$img_big);
        unlink("./uploads/goodsimg/".$img_middle);
        unlink("./uploads/goodsimg/".$img_small);
        unlink("./uploads/goodsimg/".$img);
        $arr=Db::query("delete from goods_img where id=$id");


        $arr=['code'=>'0','status'=>'ok','data'=>'删除成功'];
        echo $json=json_encode($arr);
        die;
    }
}