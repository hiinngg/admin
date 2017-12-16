<?php
namespace  app\companyadmin\controller;


use think\Db;

class Team extends Common{
    
    
    private  $count;
    
    /**  
    *添加团队定制
    * 
    * @access public 
    * @return 1
    */  
    public  function addTeam(){
        if($this->request->isAjax()){
            $post=$this->request->post();
            $data=[
                'cid'=>$this->companyid,
                'result'=>$post['data']['detail'],
                'desc'=>$post['data']['desc'],
                'createtime'=>date("Y-m-d H:i:s"),
                'status'=>1
            ];
            if(!Db::name("team")->insert($data)>0){
                return "保存失败，请重试";
            }
            return 1;
        
        }
        return $this->fetch("editTeam");
        
    }
    
    
    
    /**
     * 状态变更（发布、撤销发布）
     *
     * @access public
     * @param mixed $arg1 参数一的说明
     * @param mixed $arg2 参数二的说明
     * @param mixed $mixed 这是一个混合类型
     * @return array 返回类型
     */
    public function statusChange(){
        $post = $this->request->post();
        if(Db::name('team')->where("teamid",$post['teamid'])->update(['status'=>$post['status']])){
            return 1;
        }else{
            return 0;
        }
    }
    
    
    
    /**
     * 团队定制需求删除
     *
     * @access public
     * @param mixed $arg1 参数一的说明
     * @param mixed $arg2 参数二的说明
     * @param mixed $mixed 这是一个混合类型
     * @return array 返回类型
     */
    public function  teamDel(){
        $post = $this->request->post();
        if(Db::name('team')->where("teamid",$post['teamid'])->delete()){
            return 1;
        }else{
            return 0;
        }
    }
    
    
    /**
     * 编辑团队定制需求
     *
     * @access public
     * taid
     * @return
     */
    public  function teamEdit($teamid){
         
        if($this->request->isAjax()){
            //执行更新操作
            $post = $this->request->post();
            $data = [
                'result'=>$post['data']['detail'],
                'desc'=>$post['data']['desc'],
            ];
            if ( Db::name("team")->where("teamid",$post['teamid'])->update($data) < 0) {
                return "保存失败，请重试";
            }
            return 1;
        }
        $res=Db::name("team")->where("teamid",$teamid)->find();
        $this->assign("data",$res);
        return $this->fetch("editTeam");
    }
    
    /**  
    * 团队需求列表
    * 
    * @access public 
    * @param mixed $arg1 参数一的说明 
    * @param mixed $arg2 参数二的说明 
    * @param mixed $mixed 这是一个混合类型 
    * @return array 返回类型
    */  
    public function teamList($page="", $limit="")
    {
    
        if($this->request->isAjax()){
    
            if (! isset($count)) {
                $this->count = Db::name("team")->where([
                    'cid' => $this->companyid
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
    
            $res =  Db::name("team")->where([
                'cid' => $this->companyid
            ])
            ->page($page, $limit)
            ->field("teamid,createtime,status")
            ->order("createtime desc")
            ->select();
    
            return ['code'=>0,'msg'=>"","count"=>$this->count,'data'=>$res];
        }
        return $this->fetch();
         
    }
    
}