<?php

namespace frontend\services;

class codeService{
    // 验证码个数$number
    protected $number;
    // 验证码类型$codeType
    protected $codeType;
    // 验证码图像宽度$width
    protected $width;
    // 验证码$height
    protected $height;
    // 验证码字符串$code
    protected $code;
    // 图像资源$image
    protected $image;

    public function __construct($number=4,$codeType=0,$height=50,$width=100){
        //初始化自己的成员属性
        $this->number=$number;
        $this->codeType=$codeType;
        $this->width = $width;
        $this->height= $height;

        //生成验证码函数
        $this->code = $this ->createCode();

    }
    public function __get($name){
        if ($name == 'code'){
            return $this->code;
        }
        return false;
    }
    /*获取验证码*/
    public function getCode() {
        return $this->code;
    }
    /*图像资源销毁*/
    public function __destruct(){
        imagedestroy($this->image);
    }
    protected function createCode(){
        //通过你的验证码类型生成验证码
        switch ($this->codeType){
            case 0: //纯数字
                $code = $this->getNumberCode();
                break;
            case 1: //纯字母的
                $code = $this->getCharCode();
                break;
            case 2: //数字和字母混合
                $code = $this->getNumCharCode();
                break;
            default:
                die('不支持此类验证码类型');
        }
        return $code;
    }
    protected function getNumberCode(){
        $str = join('', range(0, 9));
        return substr(str_shuffle($str),0, $this->number);
    }
    protected function getCharCode(){
        $str = join('', range('a', 'z'));
        $str = $str.strtoupper($str);
        return substr(str_shuffle($str),0,$this->number);
    }
    protected function getNumCharCode(){
        $numstr = join('',range(0, 9));
        $str =join('', range('a', 'z'));
        $str =$numstr.$str.strtoupper($str);
        return substr(str_shuffle($str), 0,$this->number);
    }
    protected function createImage(){
        $this->image = imagecreatetruecolor($this->width,
            $this->height);
    }
    protected function fillBack(){
        imagefill($this->image, 0, 0, $this->lightColor());
    }
    /*浅色*/
    protected function lightColor(){
        return imagecolorallocate($this->image, mt_rand(133,255), mt_rand(133,255), mt_rand(133,255));
    }
    /*深色*/
    protected function darkColor(){
        return imagecolorallocate($this->image, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));
    }
    protected function drawChar(){
        $width = ceil($this->width / $this->number);
        for ($i=0; $i< $this->number;$i++){
            $x = mt_rand($i*$width+5, ($i+1)*$width-10);
            $y = mt_rand(0, $this->height -15);
            imagechar($this->image, 5, $x, $y, $this->code[$i], $this->darkColor());
        }
    }
    protected function drawLine(){
        for ($i=0;$i<5;$i++) {
            imageline($this->image,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$this->darkColor());
        }
    }
    protected function drawDisturb(){
        for ($i=0;$i<150;$i++){
            $x=mt_rand(0, $this->width);
            $y=mt_rand(0, $this->height);
            imagesetpixel($this->image, $x, $y, $this->lightColor());
        }
    }
    protected function show(){
        header('Content-Type:image/png');
        imagepng($this->image);
    }
    public function outImage(){
//     创建画布
        $this->createImage();
//     填充背景色
        $this->fillBack();
//     将验证码字符串花到画布上
        $this->drawChar();
//     添加干扰元素
        $this->drawDisturb();
//     添加线条
        $this->drawLine();
//     输出并显示
        $this->show();
    }

}


//class codeService {
//
//    public $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
//    public $code;//验证码
//    public $codelen = 4;//验证码长度
//    public $width = 130;//宽度
//    public $height = 50;//高度
//    public $img;//图形资源句柄
//    public $font;//指定的字体
//    public $fontsize = 20;//指定字体大小
//    public $fontcolor;//指定字体颜色
////构造方法初始化
//    public function __construct() {
//        $this->font = '/css/elephant.ttf';//注意字体路径要写对，否则显示不了图片
//    }
////生成随机码
//    public function createCode() {
//        $_len = strlen($this->charset)-1;
//        for ($i=0;$i<$this->codelen;$i++) {
//            $this->code .= $this->charset[mt_rand(0,$_len)];
//        }
//    }
////生成背景
//    public function createBg() {
//        $this->img = imagecreatetruecolor($this->width, $this->height);
//        $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
//        imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
//    }
////生成文字
//    public function createFont() {
//        $_x = $this->width / $this->codelen;
//        for ($i=0;$i<$this->codelen;$i++) {
//            $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
//            imagettftext($this->img,$this->font,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
//        }
//    }
////生成线条、雪花
//    public function createLine() {
////线条
//        for ($i=0;$i<6;$i++) {
//            $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
//            imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
//        }
////雪花
//        for ($i=0;$i<100;$i++) {
//            $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
//            imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
//        }
//    }
////输出
//    public function outPut() {
//        header('Content-type:image/png');
//        imagepng($this->img);
//        imagedestroy($this->img);
//    }
////对外生成
//    public function doimg() {
//        $this->createBg();
//        $this->createCode();
////        echo $this->code;die;
////        $this->createLine();
//        $this->createFont();
//        $this->outPut();
//    }
////获取验证码
//    public function getCode() {
//        return strtolower($this->code);
//    }
//}