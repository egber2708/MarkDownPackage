<?php

namespace egber\Press\Tests;

use egber\Press\MarkDownParser;
use Orchestra\Testbench\TestCase;


class MarkDownTest extends TestCase
{
    /**@test */
    public function test_markdown_sencillo_1(){
        $miMarkDown = new MarkDownParser;
        $this->assertEquals("<h1>Hello <em>Parsedown</em>!</h1>",  $miMarkDown->parse('#Hello _Parsedown_!'));
    }


    
}
