<?php

 class Online extends User{

    public static function setUserOnline($id){
        $query = "INSERT INTO online (id_user,statut_connection,date_time_connection) VALUES (?,1,NOW())";
        $result = Connection::connect()->prepare($query);
        $returnValue = $result->execute([$id]);
        if($returnValue == true){
            return true;
        }else {
            return false;
        }
    }

    public static function setUserOffline($id){
        $query = "UPDATE online SET statut_connection = 0, date_time_deconnection = NOW() WHERE id_user = ? AND date_time_deconnection is null ";
        $result = Connection::connect()->prepare($query);
        // $returnValue =
         $result->execute([$id]);
        // if($returnValue == true){
        //     return true;
        // }else { 
        //     return false;
        // }
    }

    public static function getInfoUserOnline($id){
        $query = "SELECT * FROM online WHERE id_user = ? ";
        $result = Connection::connect()->prepare($query);
        $result->execute([$id]);
        $userInfo = $result->fetch(PDO::FETCH_OBJ);
        return $userInfo;
    }
}