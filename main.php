<?php
    session_save_path("sess");
    session_start();

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
<?php
  // $ip = $_SERVER["REMOTE_ADDR"];
  $ip1 = rand(1, 254);
  $ip2 = rand(1, 254);
  $ip3 = rand(1, 254);
  $ip4 = rand(1, 254);

  $ip = "$ip1.$ip2.$ip3.$ip4";

  $q = $_SERVER["QUERY_STRING"];
  //echo "q = $q<br>";

  if(isset($_SESSION["name"]))
    $sessName = $_SESSION["name"];
  else
    $sessName = "";

  $sql = "insert into logs (ip, name, work, time) 
            values('$ip', '$sessName', '$q', now()) ";
  $result = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="row">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="main.php">
                <span class="material-icons text-white">home</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="main.php" role="button" data-bs-toggle="dropdown"><span class="text-white">NonSecure</span></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="main.php?cmd=printLogin">Login</a></li>
                  <li><a class="dropdown-item" href="main.php?cmd=fake">Fake Data</a></li>
                  <li><a class="dropdown-item" href="main.php?cmd=shell">Web Shell</a></li>
                  <li><a class="dropdown-item" href="main.php?cmd=crawling">Crawling</a></li>
                  <li><a class="dropdown-item" href="main.php?cmd=info">Info</a></li>
                  <li><a class="dropdown-item" href="main.php?cmd=ftp">FTP</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Secure</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Link</a></li>
                  <li><a class="dropdown-item" href="#">Another link</a></li>
                  <li><a class="dropdown-item" href="#">A third link</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>


    </div>


    <div class="row">
        <div class="col colLine text-end">
            <?php
                if(isset($_SESSION["id"]))
                {
                    echo $_SESSION["name"] . "님" . "<button type='button' class='btn btn-primary btn-sm' onClick=\"location.href='main.php?cmd=logout'\">로그아웃</button>";
                }else
                {
                    echo "<button type='button' class='btn btn-primary btn-sm' onClick=\"location.href='main.php?cmd=printLogin'\">로그인</button>";
                }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <?php
        if(isset($_GET["cmd"]) and $_GET["cmd"])
        {
            $cmd = $_GET["cmd"];
            include "$cmd.php";
        }else
        {
            include "init.php";
        }
    ?>
</div>
</body>
</html>
<?php
    closeDB($conn);
?>