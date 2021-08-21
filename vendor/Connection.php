<?php

class Connection {
    public static function Connect(){
      
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $connection = new PDO('mysql:host=localhost;dbname=ajax_php;charset=utf8', 'root', '',$options);
            return $connection;
        } catch (Exception $e) {
            die("Connection error: ".$e->getMessage());
        }
    }
}
