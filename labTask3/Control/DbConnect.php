<?php

class db{

    function OpenConn(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "UserDB";

        $conn = new mysqli($serverName,$userName,$password,$dbName);
        return $conn;
    }
    function User($connObj, $name, $email, $userName, $password, $gender, $dob){
        $r = $connObj->query("INSERT INTO `user` (`name`, `email`, `username`, `password`, `gender`, `dob`) 
                                VALUES ('$name', '$email', '$userName', '$password', '$gender', '$dob')");
        return $r;
    }
    function CloseConn($conn){
        $conn->close();
    }
}

?>