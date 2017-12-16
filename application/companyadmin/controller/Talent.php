<?php
namespace app\companyadmin\controller;

use think\Db;

class Talent extends Common
{

    private  $count;  //talentList  数据总数
    
    
    /**
     * 添加人才定制
     *
     * @access public
     * @return 1
     */
    public function addTalent()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $data = [
                'name' => trim($post['data']['title']),
                'cid' => $this->companyid,
                'skill' => $post['data']['skill'],
                'salary_min' => $post['data']['price_min'],
                'salary_max' => $post['data']['price_max'],
                'content' => $post['data']['desc'],
                'createtime' => date("Y-m-d H:i:s"),
                'status' => 1
            ];
            if (! Db::name("talent")->insert($data) > 0) {
                return "保存失败，请重试";
            }
            return 1;
        }
        return $this->fetch('editTalent');
    }

    /**
     * 人才定制列表（layui-table 异步数据接口）
     * 
     * @access public
     * @param mixed $page
     *            请求第几页的数据
     * @param mixed $limit
     *            每页的条数
     * @return json
     */
    public function talentList($page="", $limit="")
    {
        
        if($this->request->isAjax()){

            if (! isset($count)) {
                $this->count = Db::name("talent")->where([
                    'cid' => $this->companyid
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res =  Db::name("talent")->where([
                'cid' => $this->companyid
            ])
            ->page($page, $limit)
            ->field("taid,name,createtime,status")
            ->order("createtime desc")
            ->select();
            
            return ['code'=>0,'msg'=>"","count"=>$this->count,'data'=>$res];
        }
        return $this->fetch();
     
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
        if(Db::name('talent')->where("taid",$post['taid'])->update(['status'=>$post['status']])){
            return 1;
        }else{
            return 0;
        }  
    }
    
    
    /**  
    * 人才定制需求删除 
    * 
    * @access public 
    * @param mixed $arg1 参数一的说明 
    * @param mixed $arg2 参数二的说明 
    * @param mixed $mixed 这是一个混合类型 
    * @return array 返回类型
    */  
    public function  talentDel(){
       $post = $this->request->post(); 
       if(Db::name('talent')->where("taid",$post['taid'])->delete()){
           return 1;
       }else{
           return 0;
       }       
    }
    
    
    
    
    /**  
    * 编辑人才定制需求 
    * 
    * @access public
    * taid  
    * @return 
    */  
    public  function talentEdit($taid){
       
        if($this->request->isAjax()){
            //执行更新操作
            $post = $this->request->post();
            $data = [
                'name' => trim($post['data']['title']),
                'skill' => $post['data']['skill'],
                'salary_min' => $post['data']['price_min'],
                'salary_max' => $post['data']['price_max'],
                'content' => $post['data']['desc'],
            ];
            if ( Db::name("talent")->where("taid",$post['taid'])->update($data) < 0) {
                return "保存失败，请重试";
            }
            return 1;
        }
        $res=Db::name("talent")->where("taid",$taid)->find();
        $this->assign("data",$res);
        return $this->fetch("editTalent");
    }
    
}