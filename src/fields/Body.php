<?php

namespace egber\Press\fields;
use egber\Press\MarkDownParser;


class Body {

    
    public static function  execute($text){
        $prex = new MarkDownParser;
        //return MarkDownParser::instance()->parse($text);        
        return $prex->parse($text);
    }



}