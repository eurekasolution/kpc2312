<div class="row">
    <div class="col colLine">
        <?php

            $file1 = "a.test.jpg";
            $file2 = "README";

            $split = explode(".", $file1);
            $count = count($split);
            echo "count = $count <br>"; // 3
            //$tmp = $count -1;
            echo "ext = " . $split[$count -1] . "<br>";

            $split = explode(".", $file2);
            $count = count($split);
            echo "count = $count <br>"; // 1
            echo "ext = " . $split[$count -1] . "<br>";

            if($count == 1)
                echo "ext = NONE<br>";




            phpinfo();
        ?>
    </div>
</div>