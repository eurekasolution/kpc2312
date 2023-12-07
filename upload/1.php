<?php
    include "db.php";

    $conn = connectDB();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf8">
        <title>KPC 웹 보안</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>        

    </head>
<body>
1.php 파일입니다. <br>
<?php
    $i = 10;
    $i ++;
    echo "i = $i 입니다.<br>";

    $i = "홍길동";
    echo "i = $i"."입니다.<br>";

    for($i=1; $i<=10; $i++)
    {
        echo "$i<br>";
    }

    include "2.php";
    echo "i = $i"."입니다.<br>";

    $sql = "select * from users";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    while($data)
    {
        $idx = $data["idx"];
        $name = $data["name"];
        $id = $data["id"];
        $pass = $data["pass"];

        echo "$idx $name $id $pass <br>";
        $data = mysqli_fetch_array($result);
    }

?>
다시 HTML 영역입니다.<br>
</body>
</html>
<?php
    closeDB($conn);
?>