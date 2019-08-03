<?php
namespace egber\Press;

use Illuminate\Support\Facades\File;

class PressFileParser {

    protected $filename;
    protected $data;
    
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->splitFile();
    }


    public function resume(){

        $this->getHead();
        return $this->data;
    }
    
    public function splitFile(){
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s', 
            File::get($this->filename), 
                $this->data);
               
    }

    public function getHead(){
    
        foreach (explode("\n",trim($this->data[1])) as $string) {
            preg_match('/(.*)=(.*)/', $string, $data_array);
            $this->data[trim($data_array[1])] = trim($data_array[2]);
        }

        $this->data['body'] = trim($this->data[2]);



    }



}
