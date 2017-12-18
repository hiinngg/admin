<?php
namespace app\admin\controller;

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
        $this->assign("adminuser", Session::get("adminuser"));
        return $this->fetch();
    }

    public function login()
    {
        if ($this->request->isAjax()) {
            
            $post = $this->request->post();
            if (Db::name("admin")->where([
                'adminuser' => $post['data']['username'],
                'adminpass' => md5($post['data']['password'])
            ])->find()) {
                Session::set("adminuser", $post['data']['username']);
                return 1;
            } else {
                return "用户名或密码不正确";
            }
        }
        
        return $this->fetch();
    }

    public function logout()
    {
        Session::delete("adminuser");
       return $this->fetch("login");
    }
}