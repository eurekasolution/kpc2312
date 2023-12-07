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
                    <div class="col-6 colLine">
                        <a href='main.php?cmd=bbs&mode=show&idx=<?php echo $data["idx"] ?>'><?php echo $data["title"] ?></a>
                    </div>
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
        echo "글내용보기<br>";
        if(isset($_GET["idx"]))
            $idx = $_GET["idx"];
        else
        {
            echo "
            <script>
                alert('필수정보가 없습니다.');
                location.href='main.php?cmd=bbs';
            </script>
            ";
        }

        $sql = "select * from bbs where idx='$idx' ";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);

        if($data)
        {
            ?>
            <div class="row">
                <div class="col-2 colLine">제목</div>
                <div class="col colLine">
                    <?php echo $data["title"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-2 colLine">작성자</div>
                <div class="col colLine">
                    <?php echo $data["name"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-2 colLine">작성일</div>
                <div class="col colLine">
                    <?php echo $data["time"]?>
                </div>
            </div>

            <?php
        }else
        {
            echo "
            <script>
                alert('삭제된 게시글입니다.');
                location.href='main.php?cmd=bbs';
            </script>
            ";
        }
    }

    if($mode == "doWrite")
    {
        $title = $_POST["title"];
        $name = $_POST["name"];
        $content = $_POST["content"];

        $sql = "insert into bbs (title, name, content, time) values 
                                ('$title', '$name', '$content', now())";
        $result = mysqli_query($conn, $sql);

        if($result)
            $msg = "글쓰기 성공";
        else
            $msg = "글쓰기 실패";

        echo"
        <script>
            alert('$msg');
            location.href='main.php?cmd=bbs';
        </script>
        ";

    }
    if($mode == "write")
    {
        echo "글쓰기<br>";
        // 제목 : 작성자, 내용,
        // 등록, 목록
        ?>
        <form method="post" action="main.php?cmd=bbs&mode=doWrite">
        <div class="row">
            <div class="col-2 colLine">제목</div>
            <div class="col colLine">
                <input type="text" name="title" class="form-control" placeholder="제목을 입력하세요.">
            </div>
        </div>
        <div class="row">
            <div class="col-2 colLine">작성자</div>
            <div class="col colLine">
                <input type="text" name="name" class="form-control" placeholder="실명을 입력하세요.">
            </div>
        </div>
        <div class="row">
            <div class="col colLine">
                <textarea name="content" class="form-control" rows="10"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col colLine text-center">
                <button type="submit" class="btn btn-primary btn-sm">등록</button> 
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs'">목록</button>
            </div>
        </div>
        </form>
        <?php
    }
?>