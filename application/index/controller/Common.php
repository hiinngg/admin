<?php
namespace  app\index\controller;

use think\Controller;

class Common extends Controller{
    
    public function _initialize(){
        
       $this->assign('nav',strtolower($this->request->controller()) );
       $this->view->engine->layout("layout");
    }
    
    
}