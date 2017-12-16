<?php
namespace app\companyadmin\controller;

use think\Controller;
use think\Db;

class Cprofile extends Common
{

    public function getCprofile()
    {
        Db::name("cprofile")->where("cid", $this->companyid)->find();
    }

    public function editCprofile()
    {}
}