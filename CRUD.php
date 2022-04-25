<?php
/*
returns:
    1 => success
    2 => file not found
    3 => empty args
    4 => item not found
*/
class test{
    public $a = 0;
    public function _2(){

    }
    public static function _3(){
        return 1;
    }
    public function _1(){
        if($this->a == 1 || $this->_3()){
            $this->a;
            $this->_2();
            $this->_3();
        }
    }
}
class CRUD{
        public static $separator = '~';
        public static function Create($fname,$line,$sequence=false){
            if(!file_exists($fname)){
                return 2;
            }
            if($line == ""){
                return 3;
            }
            $file = fopen($fname,"a");//write file only
            if(!$sequence){
                fwrite($file,$line."\n");
            }else{
                $id = count(file($fname));
                fwrite($file,$id."~".$line."\n");
            }
            fclose($file);
            return 1;
        }
        /*
        public static function __call($name,$args){
            //args [0]fname [1]search [2]index [3]l
            global $separator;
            if(!file_exists($args[0])){
                return 2;
            }
            else if($args[1] == ""){
                return 3;
            }else if(count(explode($separator,$args[1]))<=$args[2]){
                return 4;
            }
            $file = fopen($args[0], "r+");
            $s = explode($separator,$args[1])[$args[2]];
            return 0;
            if($name=='Search'){
                switch(count($args)){
                    case 3:
                        for($i=0;!feof($file);$i++){
                            $line[$i] = fgets($file);
                            if( strcmp(explode($separator,$line[$i])[$args[2]],$s) == 0 ){
                                return 1;
                            }
                        }
                        break;
                    case 4:
                        for($i=0;!feof($file);$i++){
                            $line[$i] = fgets($file);
                            if( strcmp(explode($separator,$line[$i])[$args[2]],$s) == 0 ){
                                return 1;
                            }
                        }
                        break;
                }
            }
        }
        */
        public static function Search($fname,$search,$index = -1,$returnLine = false){
            if(!file_exists($fname)){
                return 2;
            }
            else if($search == ""){
                return 3;
            }else if(count(explode(CRUD::$separator, fgets(fopen($fname, 'r')) ))<=$index){
                return 4;
            }
            $file = fopen($fname, "r+");

            for($i=0;!feof($file);$i++){
                $line[$i] = fgets($file);
                if($index != -1){
                    if( strcmp(explode(CRUD::$separator,$line[$i])[$index],$search) == 0 ){
                        if($returnLine == false){
                            return 1;
                        }else{
                            return $line[$i];
                        }
                    }
                }else{
                    if( strcmp($line[$i],$search) == 0 ){
                        if($returnLine == false){
                            return 1;
                        }else{
                            return $line[$i];
                        }
                    }
                }
            }
            return 0;
        }
        public static function Update($fname, $new, $old,$index = -1){
            //cannot use $this-> inside static methods
            if(!file_exists($fname)){
                return 2;
            }
            elseif($new == "" || $index == "" || $old == ""){
                return 3;
            }
            else if(CRUD::Search($fname,$old,$index)==0){
                return 4;
            }
            $l = CRUD::Search($fname,$old,$index,true);
            $contents = file_get_contents($fname);
            if($index != -1){
                if(count(explode(CRUD::$separator, fgets(fopen($fname, 'r')) ))<=$index){
                    return 4;
                }
                $arr = explode(CRUD::$separator,$l);
                $arr[$index] = $new;
                $new = implode(CRUD::$separator,$arr);
            }
            $contents = str_replace($l, $new, $contents);
            file_put_contents($fname, $contents);
            return 1;
        }
        public static function Del($fname,$old,$index=-1){
            if(CRUD::Search($fname,$old,$index)==1){
                CRUD::Update($fname,"",$old,$index);
                return 1;
            }
            return 0;
        }
}