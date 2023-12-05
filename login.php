<?php
    session_save_path("sess");
    session_start();
    
    include "db.php";

    $conn = connectDB();

    $id = $_POST["id"];
    $pass = $_POST["pass"];

    if($id== "test" and $pass == "1234")
    {
        $_SESSION["id"] = $id;
        $_SESSION["name"] = "테스트사용자";
        echo "
        <script>
            alert('반갑습니다.');
            location.href='main.php';
        </script>
        ";
    }else
    {
        echo "
        <script>
            alert('아이디와 비번을 확인하세요.');
            location.href='main.php';
        </script>
        ";
    }

?>