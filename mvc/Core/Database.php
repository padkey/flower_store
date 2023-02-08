<?php
class Database{
    const username ="root";
    const password='';
    const host='localhost';
    const database='flower_store';

    private $connect;
    public function connect(){
        $connect = mysqli_connect(self::host,self::username,self::password,self::database);
        mysqli_set_charset($connect,"utf8");
        if(mysqli_connect_errno()==0){
            return $connect;
        }
        return false;
    }

}