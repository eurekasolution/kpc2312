<div class="row">
    <div class="col colLine">
<?php
    echo "첫화면 구성은 다음에...<br>";

    $areas = "서울,경기,충청,전라,경상,강원,제주,인천,대전,울산,광주";
    $locals = explode(",", $areas); // area를 콤마단위로 쪼개 배열
    echo "<select class='form-control'>";

    $i = 0;
    while($locals[$i])
    {
        echo "<option value='$i'>$locals[$i]</option>";
        $i++;
    }

    echo "</select>";
?>
    </div>
</div>