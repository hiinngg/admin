<?php
/**
 * @author LeeJqqq
 * 文件下载类
 */
namespace  app\common\controller;


class  Download {
   
    protected  $filePath;
    protected  $fileName;
    
    public function __construct($path){
        
        $this->filePath=$path;
        
        $array=explode("/", $path);
        $this->fileName=$array[count($array)-1];
     
        
    }
    
    public function download(){
        
        if (! file_exists (".".$this->filePath)) {
            echo "文件找不到";
            exit ();
        } else {
            //打开文件
            $file = fopen (".".$this->filePath, "r" );
            //输入文件标签
            Header ( "Content-type: application/octet-stream" );
            Header ( "Accept-Ranges: bytes" );
            Header ( "Accept-Length: " . filesize (".".$this->filePath  ) );
            Header ( "Content-Disposition: attachment; filename=" . $this->fileName );
            //输出文件内容
            //读取文件内容并直接输出到浏览器
            echo fread ( $file, filesize ( ".".$this->filePath) );
            fclose ( $file );
            exit ();
        }
        
    }
    
    
    
    
}