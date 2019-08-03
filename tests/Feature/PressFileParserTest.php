<?php

namespace egber\Press\Tests;

use Orchestra\Testbench\TestCase;
use egber\Press\PressFileParser;

class PressFileParserTest extends TestCase 
{

    public function test_pressfile_load_1(){

        $pressdata = (new PressFileParser( __DIR__.'/../blog/firstArticule.md' ));

        $result = $pressdata->resume();

        $this->assertStringContainsString( "titulo = Mi Primer Programa", $result[1]);
        $this->assertStringContainsString( "Descripcion = Probando funcionalidad de MarkDown ", $result[1]);
        $this->assertStringContainsString( "Cuando inicie en el desarrollo de esta practica", $result[2]);
    }

    public function test_pressfile_head_2(){

        $pressdata = (new PressFileParser( __DIR__.'/../blog/firstArticule.md' ));
        $result = $pressdata->resume();

        $this->assertEquals("Mi Primer Programa", $result['titulo'] );
        $this->assertEquals("Probando funcionalidad de MarkDown", $result['Descripcion'] ); 
        $this->assertStringContainsString("desarrollo de esta practica", $result['body'] );
        
    }

}