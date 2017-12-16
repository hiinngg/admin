<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*
 *
 * curl
 */
function httpGet($url)
{
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);
    
    $res = curl_exec($curl);
    curl_close($curl);
    
    return $res;
}

function transOneImage($path, $tgpath, $width = "640", $height = "")
{
    if (! strstr($path, "temp")) {
        return $path;
    }
    $tgpathArr = explode("/", $tgpath);
    if ($tgpathArr[count($tgpathArr) - 1] == "") {
        unset($tgpathArr[count($tgpathArr) - 1]);
        $tgpathArr = implode("/", $tgpathArr);
    }
    
    $temp_arr = explode("/", $path);
    $fileName = $temp_arr[count($temp_arr) - 1];
    
    $newimg = $tgpath . "/" . $fileName;
    
    $image = \think\Image::open("." . $path);
    
    $image->thumb($width, $height == "" ? $image->height() : $height)
        ->save("." . $newimg);
    return $newimg;
}

function delDir($path){
    $dir = ".".$path;
    if (is_dir($dir)) {
        $dh = opendir($dir);
        while ($file = readdir($dh)) {
            if ($file != "." && $file != "..") {
                $fullpath = $dir . "/" . $file;
                if (!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
        closedir($dh);
        // 删除当前文件夹：
        if (!rmdir($dir)) {
            exit();
            throw new \Exception("删除文件失败");
        }
    }
}




