<?php require 'Connection.php';


class User {

    public static function createUser(String $pseudo,String $email,String $password):bool
    {
        $query = "INSERT INTO user (pseudo,email,password) VALUES (?,?,?)";
        $result = Connection::connect()->prepare($query);
        $returnValue = $result->execute([$pseudo,$email,$password]);
        if($returnValue == true){
            return true;
        }else {
            return false;
        }
    }

    public  static function authUser($pseudo,$password){
        $query = "SELECT * FROM user WHERE pseudo = ? AND password = ?";
        $result = Connection::connect()->prepare($query);
        $result->execute([$pseudo,$password]);
        $userInfo = $result->fetch(PDO::FETCH_OBJ);
        return $userInfo;
    }

    public static function fetchUsers(){
        $query = "SELECT * FROM user ";
        $result = Connection::connect()->prepare($query);
        $result->execute();
        $userInfo = $result->fetchAll(PDO::FETCH_OBJ);
        return $userInfo;
    }

    public static function fetchUsersExclusingOne($id){
        $query = "SELECT * FROM user WHERE id !=?";
        $result = Connection::connect()->prepare($query);
        $result->execute([$id]);
        $userInfo = $result->fetchAll(PDO::FETCH_OBJ);
        return $userInfo;
    }


}