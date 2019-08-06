<?php

namespace egber\Press\fields;
 use Carbon\Carbon;

class Date {

    
    public static function  execute($fecha){
        return Carbon::parse($fecha);
    }



}