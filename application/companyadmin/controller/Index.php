<?php
namespace app\companyadmin\controller;

use think\Controller;
use think\Db;
use think\Session;

/**
 *
 * @author Administrator
 *         后台首页
 */
class Index extends Controller
{

    public function index(Common $common)
    {
          
        $this->assign("companyname",Db::name("company")->where("cid",$common->companyid)->value("name"));
        
        return $this->fetch();
    }

    public function login()
    {
        if($this->request->isAjax()){
            $post=$this->request->post();
           $res=Db::name("company")->where(['name'=>$post['data']['name'],'password'=>md5($post['data']['password'])])->value("cid");
           if($res){
               Session::set("cid",$res);
                return 1;
           }else{
               return "用户不存在或者密码错误";
           }
        }
        return $this->fetch();
    }
    public function logout(){
        Session::delete("cid");
      return  $this->fetch("login");
    }
}