<?php
namespace app\index\controller;

use think\Db;
use think\Exception;

class Register extends Common
{

    public function companyReg()
    {
        if ($this->request->isAjax()) {
            
            $post = $this->request->post();
            $result = $this->validate([
                'name' => $post['data']['name']
            ], [
                'name' => "unique:company,name"
            ]);
            if (true !== $result) {
                return "已存在该企业名称";
            }
            
            $data = [
                'name' => trim($post['data']['name']),
                'password' => md5($post['data']['pwd']),
                'contact' => trim($post['data']['tel']),
                'status' => 0,
                'createtime' => date("Y-m-d H:i:s")
            ];
            
            if (($post['data']['fullName'] != "") && (isset($post['images']))) {
                $pics = [];
                foreach ($post['images'] as $k => $val) {
                    array_push($pics, transOneImage($val, "/image/company"));
                }
                // 成为内推企业
                $data['fullname'] = trim($post['data']['fullName']);
                $data['pics'] = json_encode($pics, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
                $data['status'] = 1;
            }
            
            if (Db::name("company")->insert($data) <= 0) {
                return "新增失败";
            }
            
            return 1;
        }
        return $this->fetch();
    }

    public function imgUpload()
    {
        $file = request()->file('image');
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'temp');
            if ($info) {
                return [
                    'code' => 0,
                    'src' => $info->getSaveName()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}