<?php
namespace  app\index\controller;


/**
 * @author ljq
 *  职学院
 */
class Course extends Common{
    
    public  function  courseList(){
        
         return $this->fetch();
    }
    public function courseDetail(){
           
      return $this->fetch();
        
    }
    
    
}