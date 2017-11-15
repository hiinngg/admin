<?php
namespace app\admin\controller;

/**
 * @author Administrator
 * 文章管理（新闻、案例）
 */
class Article extends Common
{

    public function articleList($page="",$limit="")
    {
      if($this->request->isAjax()){
          $res= json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}")) ;
          return json($res);
      }
        return $this->fetch();
    }

}