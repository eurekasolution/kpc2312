<?php
/*
    session_save_path("sess");
    session_start();
    
    include "db.php";

    $conn = connectDB();
*/
    $id = $_POST["kpc_id"];
    $pass = $_POST["kpc_pass"];

    $id = str_replace("--", "", $id);
    $id = str_replace(" ", "", $id);
    $id = str_replace("'", "", $id);

    $sql = "select * from users where id='$id' and pass='$pass'";
                                        // abcd' or 2>1 -- 
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    
    if($data)
    {
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $data["name"];
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