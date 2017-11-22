<?php
namespace app\common\controller;

use think\Controller;
use think\Image;

/**
 *
 * @author leeJq
 *         编辑器处理类
 */
class Editor extends Controller
{

    protected $pics;

    protected $content;

    protected $old_content;

    protected $del_pics;

    public function __construct($content)
    {
        $this->content = $content;
        return;
    }

    /*
     * 移动图片，将temp文件夹中相应图片移动到真实的文件夹中,并更新content
     */
    public function imageTrans()
    {
        $pattern = '/<[img|IMG].*?src=[\'|\"](\/temp\/.*?\.(jpeg|jpg|gif|bmp|bnp|png))([\'|\"].*?[\/]?>)/i';
        preg_match_all($pattern, $this->content, $res);
        $num = count($res[1]);
        if ($num > 0) {
            for ($i = 0; $i < $num; $i ++) {
                $img = $res[1][$i];
                $tmp_arr = explode('/', $img);
                $tmpimg = '.' . $img;
                $datefloder = './image/' . $tmp_arr[2];
                if (! file_exists($datefloder)) {
                    mkdir($datefloder);
                }
                
                $image = Image::open($tmpimg);
                $newimg = str_replace('/temp/', '/image/',$tmpimg);
                if (! $image->thumb(640, $image->height())
                    ->save($newimg)) {
                    throw new \think\exception("保存图片出错");
                }
            }
            $this->content = preg_replace('/(<[img|IMG].*?src=[\'|\"])(\/temp\/)(.*?\.(jpeg|jpg|gif|bmp|bnp|png)[\'|\"].*?[\/]?>)/i', "\${1}/image/\${3}", $this->content);
        }
    }

    /*
     * 比较old_content里 的所有图片，如果不存在，则删除
     *
     */
    public function imageDel()
    {
        $pattern = '/<[img|IMG].*?src=[\'|\"](\/image\/.*?\.(jpeg|jpg|gif|bmp|bnp|png))([\'|\"].*?[\/]?>)/i';
        preg_match_all($pattern, $this->old_content, $old_pics);
        preg_match_all($pattern, $this->content, $pics);
        $del_pics = array_diff($old_pics[1], $pics[1]);
        foreach ($del_pics as $val){
            if(!unlink('.'.$val)){
                throw new \think\Exception("删除图片失败");
            }
        }
    }

 

    public function setOldContent($value)
    {
        $this->old_content = $value;
    }

    public function getContent()
    {
        return $this->content;
    }
}
