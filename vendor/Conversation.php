<?php //require 'Connection.php';

class Conversation {

    public static function setConvers($id_user_exp,	$id_user_dest,	$message){

        $query = "INSERT INTO conversation (id_user_exp, id_user_dest, message, date_conversation) VALUES (?,?,?,NOW())";
        $result = Connection::connect()->prepare($query);
        $returnValue = $result->execute([$id_user_exp,	$id_user_dest,	$message]);
        return $returnValue == true ? true : false;

    }

    public static function getConvers($id_user_exp,	$id_user_dest){

        $query = "SELECT * FROM conversation  WHERE id_user_exp = ? and id_user_dest = ? OR id_user_exp = ? and id_user_dest = ? ORDER BY date_conversation";
        $result = Connection::connect()->prepare($query);
        $result->execute([$id_user_exp,	$id_user_dest,	$id_user_dest,$id_user_exp]);
        $userInfo = $result->fetchAll(PDO::FETCH_OBJ);
        return $userInfo;

    }

    public static function isUserConvers($id){
        $query = "SELECT * FROM conversation  WHERE id_user_exp = ? OR id_user_dest = ? ";
        $result = Connection::connect()->prepare($query);
        $result->execute([$id,$id]);
        $userInfo = $result->rowCount();
         return $userInfo != 0 ? true : false;
    }
}