<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController
 {
 	//后台首页
    public function index()
    {
    $this->display();
    }
    public function public_left()
    {
    $this->display();
    }
    public function public_header()
    {
    $this->display();
    }
    public function wenzhang_xinwen()
    {
    $model=M('jokes');
    $count=$model->count();//数据总条数
    $Page = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show= $Page->show();// 分页显示输出
    $list=$model->order('flag desc,top desc,jok_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list',$list);
    $this->assign('show',$show);
    $this->assign('count',$count);
    $this->display();
    }
}