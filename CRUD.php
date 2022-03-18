<?php
/*
returns:
    1 => success
    2 => file not found
    3 => empty args
    4 => item not found
*/
function Create($fname,$line,$sequence=false){
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
function Update($fname,$term,$index,$rep){
    if(!file_exists($fname)){
        return 2;
    }
    if($term == "" || $index == "" || $rep == ""){

    }
}