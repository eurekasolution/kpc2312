<?php
    if(!isset($_GET["mode"]))
        $mode = "list";
    else
        $mode = $_GET["mode"]; // list, write, show, ....

    if($mode == "list")
    {
        $sql = "select * from bbs order by idx desc";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        // 순서, 제목, 작성자, 작성일
        ?>
        <div class="row">
            <div class="col-2 colLine">순서</div>
            <div class="col-6 colLine">제목</div>
            <div class="col-2 colLine">작성자</div>
            <div class="col-2 colLine">작성일</div>
        </div>

        <?php
            while($data)
            {
                ?>
                <div class="row">
                    <div class="col-2 colLine"><?php echo $data["idx"] ?></div>
                    <div class="col-6 colLine"><?php echo $data["title"] ?></div>
                    <div class="col-2 colLine"><?php echo $data["name"] ?></div>
                    <div class="col-2 colLine"><?php echo $data["time"] ?></div>
                </div>
                <?php
                $data = mysqli_fetch_array($result);
            }
        ?>

        <div class="row">
            <div class="col-2 colLine">
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs&mode=write'">글쓰기</button>
            </div>
            <div class="col-6 colLine">1...2...3..</div>
            <div class="col colLine">검색</div>
        </div>

        
        <?php
    }
    if($mode == "show")
    {
        
    }
    if($mode == "write")
    {
        echo "글쓰기<br>";
    }
?>