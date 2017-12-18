<?php
namespace app\companyadmin\controller;

use think\Controller;
use think\Session;

/**
 *
 * @author Administrator
 *         父级控制器
 */
class Common extends Controller
{

    public $companyid;

    public function _initialize()
    {
        $detect = new \Mobile_Detect();
        if ($detect->isMobile()) {}
        
        if (! Session::has("cid")) {
            return $this->redirect('index/login');
        }else{
        $this->companyid=Session::get("cid");
        }
    }
}