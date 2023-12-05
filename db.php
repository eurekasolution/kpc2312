<?php
    function connectDB()
    {
        $dbName = "secure";
        $dbHost = "localhost";
        $dbUser = "secure";
        $dbPass = "1111";
        $dbPort = "3306";

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort) or die("Fail : %s\n" . $conn->error);
        return $conn;
    }

    function closeDB($conn)
    {
        $conn -> close();
    }
?>