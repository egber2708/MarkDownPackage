<?php

namespace egber\Press\Tests;

use egber\Press\Test\TestCase;
use egber\Press\MarkDownParser;



class MarkDownTest extends TestCase
{
    /**@test */
    public function test_markdown_sencillo_1(){
        $miMarkDown = new MarkDownParser;
        $this->assertEquals("<h1>Hello <em>Parsedown</em>!</h1>",  $miMarkDown->parse('#Hello _Parsedown_!'));
    }


    
}
