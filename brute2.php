<?php
    $letters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $size = strlen($letters);

    // main.php?cmd=brute2&cnt=1

    if(!isset($_GET["cnt"]))
        $cnt = 1;
    else
        $cnt = $_GET["cnt"];

    $first = (int)(((int)(((int) ($cnt -1) / $size) / $size))/ $size) % $size;
    $second = (int)(( (int)($cnt -1) /$size) /$size)  % $size;
    $third =  ((int)(($cnt -1) / $size)) % $size;
    $fourth = ($cnt -1) % $size; 

    $pw = $letters[$first] . $letters[$second] . $letters[$third] . $letters[$fourth];
    echo "pw = $pw <br>";

    $sql = "select * from users where pass='$pw'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    if($data)
    {
        while($data)
        {
            $id = $data["id"];
            echo "id = $id, pass = $pw<br>";
            $data = mysqli_fetch_array($result);
        }

        exit();
    }

    $cnt ++;

    $rand = rand(1, 10000);

    echo "
    <script>
        setTimeout(function(){
            location.href='main.php?cmd=brute2&cnt=$cnt';
        }, $rand);
    </script>
    ";
?>
