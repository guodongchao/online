<?php

namespace App\Http\Controllers\admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VcodeController extends Controller
{
    //生成验证码
    public function showCode(Request $request,$sid){
        session_id($sid);
        session_start();
        $str="2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY";
        $b=substr(str_shuffle($str),rand(4,20),4);
        $rand = $b ;
        $_SESSION = [
            'rand'  =>  $b
        ];
        // Set the content-type
        header('Content-Type: image/png');
        // Create the image
        $im = imagecreatetruecolor(120, 50);
        // Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 399, 50, $white);
        // The text to draw
        //$text = $rand;
        // Replace path by your own font path
        $font = '/usr/local/fonts/CAMBRIA.TTF';
        // Add some shadow to the text
        //imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
        $len = strlen($rand);
        $i = 0;
        while($i<$len){
            // Add the text
            if(is_numeric($rand[$i])){
                imagettftext($im, 20, rand(-20,20), 20*$i, 40, $black, $font, $rand[$i]);
            }else{
                imagettftext($im, 20, 0 , 20*$i, 40, $black, $font, $rand[$i]);
            }
            $i++;
        }
        // Using imagepng() results in clearer text compared with imagejpeg()
        imagepng($im);
        imagedestroy($im);
        exit;
    }
    public function codeCheck(){
        $sid = $_POST['sid'];
        $code = $_POST['code'];
        session_id($sid);
        session_start();
        $count = $_SESSION['rand'];
        if($count!=$code){
            $response = [
                'status'    =>  400,
                'msg'       =>  'please try again',
            ];
        }else{
            $response = [
                'status'    =>  1000,
                'msg'       =>  'ok'
            ];
        }
        return $response;
    }
}
