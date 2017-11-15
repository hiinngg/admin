<?php
namespace app\admin\controller;

use think\Controller;

/**
 *
 * @author Administrator
 *         后台首页
 */
class Index extends Controller
{

    public function index(Common $common)
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }
}