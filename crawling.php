<?php
    if(!isset($_GET["page"]))
        $page = 1;
    else
        $page = $_GET["page"];

    $start = ($page -1) * 10 + 1;
    // 삼성전자 네이버 뉴스
    $URL = "https://search.naver.com/search.naver?where=news&sm=tab_jum&query=%EC%82%BC%EC%84%B1%EC%A0%84%EC%9E%90";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $URL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 요청결과를 문자열로 반환
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 원격서버의 인증서 유효성검사

    $response = curl_exec($curl);
    $splitResponse = explode("news_tit", $response);
    for($i=1; $i<count($splitResponse); $i++)
    {
        $splitTitle = explode("</a>", $splitResponse[$i]);
        $splitTitle2 = explode("title=", $splitTitle[0]);
        $title = $splitTitle2[1];
        $title = strip_tags($title);
        $title = addslashes($title);

        echo "$i : $title <br>";
    }

    echo "
    <div class='row'>
        <div class='col'>
            <textarea class='form-control' rows=10>$response</textarea>
        </div>
    </div>
    ";

?>