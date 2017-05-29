<?php
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files":[
//			"app/function/function.php"
// ]
// Chayj cmd : composer dumpautoload

function stripUnicode($str){
        if(!$str) return false ;
        $unicode = array(
            'a'=>'á|à|ả|ạ|ã|ă|ắ|ẳ|ằ|ặ|â|ầ|ấ|ậ|ẩ|ẫ|ẵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ẩ|Ấ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|ẻ|ẹ|è|ê|ế|ể|ề|ễ|ệ|ẽ',
            'E'=>'É|Ẻ|È|Ẽ|Ẹ|Ê|Ế|Ề|Ễ|Ể|Ệ',
            'i'=>'í|ì|ĩ|ỉ|ị|',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ở|ỡ|ợ|ờ',
            'O'=>'Ó|Ọ|Õ|Ỏ|Ô|Ố|Ổ|Ỗ|Ộ|Ơ|Ớ|Ợ|Ờ|Ỡ|Ơ|Ồ',
            'u'=>'ú|ù|ũ|ụ|ư|ứ|ừ|ữ|ự',
            'y'=>'ý|ỳ|ỹ|ỵ|ỷ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            # code...
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str ;
    }
    function changeTitle($str){
        $str = trim($str);
        if($str == "") return "";
        $str = str_replace('"', '', $str);
        $str = str_replace("'", '', $str);
        $str = stripUnicode($str);
        $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
        $str = str_replace(' ', '-', $str);
        return $str ;
    }