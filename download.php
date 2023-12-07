<?php
    include "db.php";
    $conn = connectDB();

    $idx = $_GET["idx"];
    $sql = "select * from bbs where idx='$idx' ";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $file = $data["file"];
    $fname = $data["fname"];

    $file_real = $file;

    $file = "upload/$file_real";
    $file_size = filesize($file);
    $file_dest = urlencode($fname);

    header("content-type:application/octet-stream; charset=utf-8;");
    header("content-length:" . $file_size);
    header("content-disposition:attachment; filename=". $file_dest);
    header("content-description:PHP Generated Data");
    header("Pragma:no-cache");
    header("Expires:0");

    if(is_file("$file"))
    {
        $fp = fopen("$file", "r");

        if(!fpassthru($fp))
            close($fp);
    }
?>