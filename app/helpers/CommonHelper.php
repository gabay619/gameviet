<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 12/17/2014
 * Time: 9:05 AM
 */

class CommonHelper {

    public static function vietnameseToASCII($sample){
        $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
            "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
        ,"ế","ệ","ể","ễ",
            "ì","í","ị","ỉ","ĩ",
            "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
        ,"ờ","ớ","ợ","ở","ỡ",
            "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
            "ỳ","ý","ỵ","ỷ","ỹ",
            "đ",
            "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
        ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
            "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
            "Ì","Í","Ị","Ỉ","Ĩ",
            "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
        ,"Ờ","Ớ","Ợ","Ở","Ỡ",
            "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
            "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
            "Đ", " ", "\\" ,"/", "!","@","#","$","%","^","&","*","(",")","_","+","~","`",":",";","'",'"',"<",">",",",".","?","|");
        $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
        ,"a","a","a","a","a","a",
            "e","e","e","e","e","e","e","e","e","e","e",
            "i","i","i","i","i",
            "o","o","o","o","o","o","o","o","o","o","o","o"
        ,"o","o","o","o","o",
            "u","u","u","u","u","u","u","u","u","u","u",
            "y","y","y","y","y",
            "d",
            "A","A","A","A","A","A","A","A","A","A","A","A"
        ,"A","A","A","A","A",
            "E","E","E","E","E","E","E","E","E","E","E",
            "I","I","I","I","I",
            "O","O","O","O","O","O","O","O","O","O","O","O"
        ,"O","O","O","O","O",
            "U","U","U","U","U","U","U","U","U","U","U",
            "Y","Y","Y","Y","Y",
            "D", "-", "-" ,"-", "-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-");
        return strtolower(str_replace($marTViet,$marKoDau,$sample));
    }

    public static function getCategoryForCombo($rows){

        $result = array();
        foreach ($rows as $item) {
            if($item->level == 1){
                array_push($result, $item);
                foreach($rows as $child_item){
                    if($child_item->level == 2 && $child_item->parent_id == $item->id){
                        $child_item->name = '-'.$child_item->name;
                        array_push($result, $child_item);
                    }
                }
            }

//            if(count($right)>0){
//                while ($right[count($right)-1]->rgt<$item->rgt) {
//                    array_pop($right);
//                }
//            }
//            foreach ($right as $rightItem) {
//                $item->name = "-".$item->name;
//            }
//            array_push($result, $item);
//
//            array_push($right,$item);
        }
        return $result;
    }

    public static function cleanString($string) {
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }


}