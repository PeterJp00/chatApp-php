<?php

class Message{

    public static function setMessage( String $type_message, String $message){
        $type = ['success','danger','warning'];
        if(in_array($type_message,$type)){
            return '<p class="text-center alert alert-'.$type_message.'">'.$message.'</p>';
        }

    }
}