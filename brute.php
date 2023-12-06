<?php
    $letters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $size = strlen($letters);
    
    // abcd
    echo "size = $size<br>";
    $cnt = 0;

    for($i=0; $i< $size; $i++)
    {
        for($j=0; $j < $size; $j ++)
        {
            for($k=0; $k<$size; $k++)
            {
                for($l = 0; $l < $size; $l++)
                {
                    $cnt ++;

                    if($cnt % 10000 == 0)
                    {
                        echo "$cnt <br>";
                    }

                    $pw = $letters[$i] . $letters[$j] . $letters[$k] . $letters[$l];
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
                    }

                    if($cnt > 500000)
                        exit();
                }
            }
        }
    }
?>