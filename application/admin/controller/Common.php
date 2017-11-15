<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

/**
 *
 * @author Administrator
 *         父级控制器
 */
class Common extends Controller
{

    public function _initialize()
    {
        if (Session::has("admin")) {
            return $this->redirect('index/login');
        }
    }
}