<?php
namespace egber\Press;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class PressFileParser {

    protected $filename;
    protected $data;
    protected $raw_data;
    
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->splitFile();
        $this->getHeadBody();
        $this->procces();
    }


    public function resume(){
        return $this->data;
    }
    
    public function getRawData(){
        return $this->raw_data;
    }

    public function splitFile(){
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s', 
            File::exists($this->filename)?File::get($this->filename):$this->filename, 
                $this->raw_data);
    }



    public function getHeadBody(){
        foreach (explode("\n",trim($this->raw_data[1])) as $string) {
            preg_match('/(.*)=(.*)/', $string, $data_array);
            $this->data[trim($data_array[1])] = trim($data_array[2]);
        }
        $this->data['body'] = trim($this->raw_data[2]);
    }


    public function procces(){
        $extra = [];
        foreach ($this->data as $field => $value) {           
              $class =  'egber\\Press\\fields\\'.title_case($field);
                if(class_exists($class) && method_exists($class, 'execute')){
                    $this->data[$field] = $class::execute($value);
                }else{
                    $extra[$field] = $value;
                }
        }
        $this->data['extra'] = json_encode($extra);
 
    }




}
