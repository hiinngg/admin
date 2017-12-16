<?php
namespace  app\index\controller;


class Job extends Common{
    
    
    public function  JobList(){
        
        return $this->fetch();
        
    }
    
}