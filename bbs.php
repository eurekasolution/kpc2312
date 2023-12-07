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
            <div class="col colLine">순서</div>
            <div class="col-6 colLine">제목</div>
            <div class="col colLine">작성자</div>
            <div class="col colLine">첨부</div>
            <div class="col-2 colLine">작성일</div>
        </div>

        <?php
            while($data)
            {
                $data["title"] = str_replace("<", "&lt;", $data["title"]);
                $data["title"] = str_replace(">", "&gt;", $data["title"]);
                
                if($data["file"])
                    $printFile = "<span class='material-icons'>download</span>";
                else
                    $printFile = "";

                ?>
                <div class="row">
                    <div class="col colLine"><?php echo $data["idx"] ?></div>
                    <div class="col-6 colLine">
                        <a href='main.php?cmd=bbs&mode=show&idx=<?php echo $data["idx"] ?>'><?php echo $data["title"] ?></a>
                    </div>
                    <div class="col colLine"><?php echo $data["name"] ?></div>
                    <div class="col colLine"><?php echo $printFile ?></div>                    
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
                //$data["content"] = nl2br($data["content"]);
                
                $data["content"] = str_replace("<", "&lt;", $data["content"]);
                $data["content"] = str_replace(">", "&gt;", $data["content"]);
                // cf. space : &nbsp;

                $data["content"] = preg_replace('/\n/', "<br>", $data["content"]);
            ?>

            <div class="row">
                <div class="col colLine" style="height:300px; min-height:300px;">
                    <?php echo $data["content"]?>
                </div>
            </div>

            <?php
                $pnsql = "select * from bbs order by idx desc";
                $pnresult = mysqli_query($conn, $pnsql);
                $pn = mysqli_fetch_array($pnresult);

                $prev = "";
                $next = "";
                $prevTitle = "";
                $nextTitle = "";
                $find = false;

                while($pn)
                {
                    if($pn["idx"] == $idx)
                    {
                        $find = true;
                    }else
                    {
                        if($find == true)
                        {
                            $next = $pn["idx"];
                            $nextTitle = $pn["title"];
                            break;
                        }else
                        {
                            $prev = $pn["idx"];
                            $prevTitle = $pn["title"];
                        }

                    }

                    $pn = mysqli_fetch_array($pnresult);
                }
            ?>

            <div class="row">
                <div class="col-2 colLine">첨부</div>
                <div class="col colLine">
                    <?php
                        if($data["file"])
                        {
                            $file = $data["file"];
                            echo "<a href='download.php?file=$file'>$file</a>";
                        }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col colLine text-start">
                    <?php
                        if($prevTitle)
                        {
                            echo "이전글 : <a href='main.php?cmd=bbs&mode=show&idx=$prev'>$prevTitle</a>";
                        }else
                        {
                            echo "<span class='text-secondary'>이전글</span>";
                        }
                    ?>
                </div>
                <div class="col colLine text-end">
                <?php
                        if($nextTitle)
                        {
                            echo "다음글 : <a href='main.php?cmd=bbs&mode=show&idx=$next'>$nextTitle</a>";
                        }else
                        {
                            echo "<span class='text-secondary'>다음글</span>";
                        }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col colLine text-center">
                    <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs'">목록</button>
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

        $title = str_replace("<", "&lt;", $title);
        $title = str_replace(">", "&gt;", $title);
        $title = addslashes($title);  // ' --> \'

        $name = str_replace("<", "&lt;", $name);
        $name = str_replace(">", "&gt;", $name);
        $name = addslashes($name);

        $content = str_replace("<", "&lt;", $content);
        $content = str_replace(">", "&gt;", $content);
        $content = addslashes($content);

        if(isset($_FILES["upfile"]) and strlen($_FILES["upfile"]["name"]))
        {
            $fname = $_FILES["upfile"]["name"];
            $size = $_FILES["upfile"]["size"];
            $tmp = $_FILES["upfile"]["tmp_name"];

            echo "name = $fname , size = $size , tmp = $tmp <br>";

            move_uploaded_file($_FILES["upfile"]["tmp_name"], "upload/$fname");
            chmod("upload/$fname", 0777);
            $file = $fname;
        }else
        {
            $fname = "";
            $file = "";
        }

        $sql = "insert into bbs (title, name, content, time, file, fname) values 
                                ('$title', '$name', '$content', now(), '$file', '$fname')";
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
        <form method="post" enctype="multipart/form-data" action="main.php?cmd=bbs&mode=doWrite">
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
            <div class="col-2 colLine">첨부</div>
            <div class="col colLine">
                <input type="file" name="upfile" class="form-control">
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