<?php
    function getDirs($path)
    {
        $dirHandler = opendir($path);
        while( ($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                $files[] = $filename;
            }
        }
        return $files;
    }

    function getFiles($path)
    {
        $dirHandler = opendir($path);
        while( ($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                
            }else
            {
                $files[] = $filename;
            }
        }
        return $files;
    }

    function readFileSecure($path)
    {
        if(!$handler = fopen($path, 'r'))
        {
            return "File Open Error!!!";
        }

        $fileContent = file_get_contents($path, true);
        return $fileContent;
    }

    $sess_path = "sess_path";

    if(isset($_POST["fname"]) and isset($_POST["fdata"]) )
    {
        $fname = $_POST["fname"];
        $fdata = $_POST["fdata"];

        $pathFile = $_SESSION[$sess_path] . "/" . $fname;
        if(file_exists($pathFile))
        {
            unlink($pathFile);
        }

        if( !$handler = fopen($pathFile, 'w'))
        {
            echo "File Open Error !!!<br>";
        }

        if(fwrite($handler, $fdata) == false)
        {
            echo "File Write Error !!!<br>";
            
        }

        echo "
        <script>
            alert('파일 생성 완료 : $fname ');
            location.href='main.php?cmd=ftp';
        </script>
        ";        
    }


    

    if(!isset($_SESSION[$sess_path]) or $_SESSION[$sess_path] == "")
    {
        $_SESSION[$sess_path] = "./";
    }

    if(isset($_GET["pdir"]))
    {
        $_SESSION[$sess_path] = $_GET["pdir"];
    }
?>

<div class="row">
    <div class="col-3 colLine">
        디렉토리<br>
        <table class="table">
        <?php
            $dirs = getDirs($_SESSION[$sess_path]);
            $cnt = 0;

            while(isset($dirs[$cnt]))
            {
                $nextDir = $_SESSION[$sess_path] . "/" . $dirs[$cnt];
                echo "
                <tr>
                    <td><a href='main.php?cmd=ftp&pdir=$nextDir'>$dirs[$cnt]</a></td>
                </tr>
                ";
                $cnt ++;
            }
        ?>
        </table>
    </div>
    <div class="col colLine">
        파일목록<br>
        <table class="table">
        <?php
            $files = getFiles($_SESSION[$sess_path]);
            $cnt = 0;

            while(isset($files[$cnt]))
            {
                //$nextDir = $_SESSION[$sess_path] . "/" . $dirs[$cnt];
                echo "
                <tr>
                    <td><a href='main.php?cmd=ftp&pfile=$files[$cnt]'>$files[$cnt]</a></td>
                </tr>
                ";
                $cnt ++;
            }
        ?>

        </table>
    </div>
</div>
<?php
    if(isset($_GET["pfile"]))
        $fileContent = readFileSecure($_SESSION[$sess_path]. "/" . $_GET["pfile"]);
    else
        $fileContent = "";
?>
<form method="post" action="main.php?cmd=ftp">
<div class="row">
    <div class="col colLine">
        <textarea class="form-control" rows="10" name="fdata"><?php echo $fileContent?></textarea>
    </div>
</div>
<div class="row">
    <div class="col-3 colLine">파일명</div>
    <div class="col colLine">
        <input type="text" name="fname" class="form-control" placeholder="파일명입력">
    </div>
    <div class="col-2 colLine">
        <button type="submit" class="btn btn-primary btn-sm form-control">등록</button>
    </div>
</div>
</form>
<br><br>