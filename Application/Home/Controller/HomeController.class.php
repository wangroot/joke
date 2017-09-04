<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller 
{
   public function index()
   {
    $sql="SELECT * FROM t_jokes as t JOIN jokes as j ON t.jok_id=j.jok_id";
    $list=M()->query($sql);
    //$list=$model->select();
    $this->assign('list',$list);
    $this->display();
   }
   //点赞
   public function zan()
   {

      $data['id']=isset($_POST['id'])?intval(trim($_POST['id'])):0;
      $obj = M("t_jokes");
      if(!isset($_COOKIE[$_POST['id']+10000])&&$obj->where(['id'=>$data['id']])->setInc('zan')){
      $cookiename = $_POST['id']+10000;
      setcookie($cookiename,40,time()+60*60,'/'); 
      $data['info'] = "ok";
      $data['status'] = 1;
      $this->ajaxReturn($data);
      exit();
      }else{
      $data['info'] = "fail";
      $data['status'] = 0;
      $this->ajaxReturn($data);
      exit();
      }

   }
}
