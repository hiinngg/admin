<?php
namespace app\admin\controller;

use think\Request;
use app\common\controller\Editor;
use think\Db;

/**
 *
 * @author Administrator
 *         文章管理（新闻、案例）
 */
class Article extends Common
{

    protected $count;

    public function articleList($page = 1, $limit = 10)
    {  
        if (!isset($count)) {
                $this->count = Db::name("posts")->count();
                if($this->count==0){
                   $this->assign("none","none");
                }
            }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("posts")->field("title,postid,des,is_valid,created_at")
                ->order("created_at desc")
                ->page($page, $limit)
                ->select();
            if (! empty($result)) {
                return json([
                    'code' => 0,
                    'msg' => "",
                    "count" => $this->count,
                    "data" => $result
                ]);
            }
        }
        return $this->fetch();
    }

    public function editArticle()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $editor = new Editor($post['data']['content']);
            $editor->imageTrans();
            $content = $editor->getContent();
            // 执行保存
            $data = [
                'title' => $post['data']['title'],
                'des' => (! isset($post['data']['desc']) || $post['data']['desc'] == "" || $post['data']['desc'] == null) ? "" : $post['data']['desc'],
                'label_img' => (! isset($post['data']['label_img']) || $post['data']['label_img'] == "" || $post['data']['label_img'] == null) ? "" : transOneImage($post['data']['label_img']),
                'content' => $content,
                'cat_id' => 1,
                'is_valid' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]
            ;
            if (Db::name("posts")->insert($data)) {
                return 1;
            }
        }
        return $this->fetch();
    }

    public function imgUpload()
    {
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move("./temp");
            if ($info) {
                return [
                    'code' => 0,
                    'src' => $info->getSavename()
                ];
            } else {
                echo $file->getError();
            }
        }
    }
}