<?php
/**
 * @author ljq
 * 普工招聘
 */
namespace app\companyadmin\controller;

use think\Db;

class Position extends Common
{

    private $count;
    private $treat=['五险一金','周末双休','员工培训','员工旅游','十三薪'];

    /**
     * 普工需求列表（layui-table 异步数据接口）
     *
     * @access public
     * @param mixed $page
     *            请求第几页的数据
     * @param mixed $limit
     *            每页的条数
     * @return json
     */
    public function positionList($page = "", $limit = "")
    {
        if ($this->request->isAjax()) {
            
            if (! isset($count)) {
                $this->count = Db::name("position")->where([
                    'cid' => $this->companyid
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res = Db::name("position")->where([
                'cid' => $this->companyid
            ])
                ->page($page, $limit)
                ->field("poid,name,createtime,status")
                ->order("createtime desc")
                ->select();
            
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }

    /**
     * 添加职位
     *
     * @access public
     * @return int
     */
    public function addPosition()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            // 执行保存
            $data = [
                'cid' => $this->companyid,
                'name' => trim($post['data']['title']),
                'number' => $post['data']['number'],
                'salary_min' => $post['data']['price_min'],
                'salary_max' => $post['data']['price_max'],
                'desc' => $post['data']['desc'],
                'is_subsidy'=>$post['data']['subsidy'],
                'treatment' => json_encode($post['data']['treat'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK),
                'createtime' => date("Y-m-d H:i:s"),
                'status' => 1
            ];
            if (Db::name("position")->insert($data) <= 0) {
                return "新增失败";
            }
            if (isset($post['image'])) {
                //检查原先的工厂图片
                $this->changePics($post['image']);
                // 保存或更新到company
                $this->savePics($post['image']);
            }
            return 1;
        }
        $position_pics=Db::name("company")->where("cid",$this->companyid)->value("position_pics");
        
        $this->assign("pics", $position_pics ?  (json_decode($position_pics, true) + [1,2,3,4,5]): [1,2,3,4,5]);
        $this->assign("treat",$this->treat);
        return $this->fetch('editposition');
    }

    /**
     * 编辑职位
     *
     * @access public
     *         #param int $poid 职位id
     * @return fetch
     */
    public function positionEdit($poid="")
    {
      if ($this->request->isAjax()) {
            $post = $this->request->post();
            // 执行保存
            $data = [
                'name' => trim($post['data']['title']),
                'number' => $post['data']['number'],
                'salary_min' => $post['data']['price_min'],
                'salary_max' => $post['data']['price_max'],
                'is_subsidy'=>$post['data']['subsidy'],
                'desc' => $post['data']['desc'],
                'treatment' => json_encode($post['data']['treat'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK),
            ];
            if (Db::name("position")->where(['cid'=>$this->companyid,'poid'=>$post['poid']])->update($data) < 0) {
                return "保存失败";
            }
            if (isset($post['image'])) {
                //检查原先的工厂图片
                $this->changePics($post['image']);
                // 保存或更新到company
                $this->savePics($post['image']);
            }
            return 1;
        }

        $res = Db::name("position")->where([
            'cid' => $this->companyid,
            'poid' => $poid
        ])->find();
        $pics = Db::name('company')->where('cid', $this->companyid)->value("position_pics");
        
        if(isset($res['treatment'])||$res['treatment']!=""){
            
          $this->assign("treat",json_decode($res['treatment'],true));
        }
        
        if ($pics) {
            $this->assign('pics', (json_decode($pics, true) + [
                1,
                2,
                3,
                4,
                5
            ]));
        }
        
        $this->assign('data', $res);
        return $this->fetch('editPosition');
    }

    /**
     * 删除用户替换掉的图片
     *
     * @access public
     * @param mixed $temp_arr
     *            临时文件夹中的图片或已转移的图片
     * @return boolean
     */
    public function changePics($temp_arr)
    {
        $pics = Db::name("company")->where("cid", $this->companyid)->value("position_pics");
        if ($pics) {
            foreach (json_decode($pics, true) as $k=>$val) {
               if(array_search($val, $temp_arr)===false){
                   unlink(".".$val);
               } 
            }
        }
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
        if(Db::name('position')->where("poid",$post['poid'])->update(['status'=>$post['status']])){
            return 1;
        }else{
            return 0;
        }
    } 
    
    /**
     * 普工需求删除
     *
     * @access public
     * @param mixed $arg1 参数一的说明
     * @param mixed $arg2 参数二的说明
     * @param mixed $mixed 这是一个混合类型
     * @return array 返回类型
     */
    public function  positionDel(){
        $post = $this->request->post();
        if(Db::name('position')->where("poid",$post['poid'])->delete()){
            return 1;
        }else{
            return 0;
        }
    }
    
    

    /**
     * 保存工厂图片到company表 ,并删除临时文件夹中图片
     *
     * @access public
     * @param mixed $temp_arr
     *            临时文件夹中的图片或已保存的图片
     * @return boolean
     */
    public function savePics($temp_arr)
    {
        $pics = [];
        foreach ($temp_arr as $val) {
            array_push($pics, transOneImage($val, "/image/company"));
        }
        
        if (! empty($pics)) {
            
            Db::name("company")->where("cid", $this->companyid)->update([
                'position_pics' => json_encode($pics, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK)
            ]);
            delDir("/temp/" . $this->companyid);
        }
        return true;
    }

    /**
     * 图片上传
     *
     * @access public
     * @param mixed $arg1
     *            参数一的说明
     * @param mixed $arg2
     *            参数二的说明
     * @param mixed $mixed
     *            这是一个混合类型
     * @return array 返回类型
     */
    public function imgUpload()
    {
        $file = request()->file('image');
        if ($file) {
            $info = $file->rule(function () {
                return md5(uniqid());
            })->move(ROOT_PATH . 'public' . DS . 'temp' . DS . $this->companyid);
            if ($info) {
                return [
                    'code' => 0,
                    'src' => "/temp" . "/" . $this->companyid . "/" . $info->getFileName()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}