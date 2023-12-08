<?php
    $sql = "select * from logs order by idx desc limit 50";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    // 순서, ip, work, flag, 비고
    ?>
    <div class="row">
        <div class="col-1 colLine">순서</div>
        <div class="col-2 colLine">IP</div>
        <div class="col-3 colLine">Time</div>
        <div class="col colLine">Work</div>
        <div class="col-1 colLine">flag</div>
        <div class="col-2 colLine">비고</div>
    </div>
    <?php

    while($data)
    {
        ?>
        <div class="row">
            <div class="col-1 colLine"><?php echo $data["idx"]?></div>
            <div class="col-2 colLine"><?php echo $data["ip"]?></div>
            <div class="col-3 colLine"><?php echo $data["time"]?></div>
            <div class="col colLine"><?php echo $data["work"]?></div>
            <div class="col-1 colLine">flag</div>
            <div class="col-2 colLine">비고</div>
        </div>
        <?php
        $data = mysqli_fetch_array($result);
    }
?>