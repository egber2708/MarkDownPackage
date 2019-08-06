<?php

namespace egber\Press\Tests;

use egber\Press\Test\TestCase;
use egber\Press\PressFileParser;
use Carbon\Carbon;

class PressFileParserTest extends TestCase 
{

    public function test_pressfile_load_1()
    {
        $pressdata = (new PressFileParser( __DIR__.'/../blog/firstArticule.md' ));
        $result = $pressdata->getRawData();
        $this->assertStringContainsString( "titulo = Mi Primer Programa", $result[1]);
        $this->assertStringContainsString( "Descripcion = Probando funcionalidad de MarkDown ", $result[1]);
        $this->assertStringContainsString( "Cuando inicie en el desarrollo de esta practica", $result[2]);
    }

    public function test_pressfile_head_2()
    {
        $pressdata = (new PressFileParser( __DIR__.'/../blog/firstArticule.md' ));
        $result = $pressdata->resume();
        $this->assertEquals("Mi Primer Programa", $result['titulo'] );
        $this->assertEquals("Probando funcionalidad de MarkDown", $result['Descripcion'] ); 
        $this->assertEquals("<h1>Ejemplo</h1>\n<p>Cuando inicie en el desarrollo de esta practica.</p>", $result['body'] );
        
    }

    public function test_not_file_input_3()
    {
        $pressdata = (new PressFileParser( "---\n titulo = Mi Primer Programa\n---\nEjemplo este es mi tema." ));
        $result = $pressdata->resume();
        $this->assertEquals("Mi Primer Programa", $result['titulo'] );
        $this->assertEquals("<p>Ejemplo este es mi tema.</p>", $result['body'] );
    }

    public function test_date_file_input_4()
    {
        $pressdata = (new PressFileParser( "---\n date = may 14, 2019\n---\n" ));
        $result = $pressdata->resume();
        $this->assertEquals("2019/05/14",  $result['date']->format('Y/m/d'));
        $this->assertInstanceOf( Carbon::class, $result['date']);
    }

    public function test_extra_file_input_5(){
        $pressdata = (new PressFileParser( __DIR__.'/../blog/firstArticule.md' ));
        $result = $pressdata->resume();        
        $this->assertEquals(json_encode(['author' => 'Enrique Capriles','Bio' =>'nacido en antioquia, el 20 de febrero del 2018']), $result['extra']);
    }

}