<?php

namespace egber\Press;
use Parsedown;

class MarkDownParser{

    public function parse($string){
        return  Parsedown::instance()->text($string);
    }
    
}