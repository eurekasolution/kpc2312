<form method="post" action="main.php?cmd=fake">
    <div class="row">
        <div class="col-2 colLine">생성수</div>
        <div class="col-8 colLine">
            <input type="number" name="num" class="form-control" min="100" max="100000" value="100" step="100">
        </div>
        <div class="col colLine">
            <button type="submit" class="btn btn-primary">생성</button>
        </div>
    </div>
</form>

<?php
    if(isset($_POST["num"]))
    {
        $num = $_POST["num"];
        $name1 = "김,이,박,최,정,김,김,신,장,오,양,서,강,남궁,황보,최,오,채,구,김";
        $name2 = "길,영,양,은,현,선,은,정,동,택,경,주,미,강";
        $name3 = "하,민,균,식,애,구,미,진,주,섭,성,학,천,식,도";

        $familys = explode(",", $name1);
        $middles = explode(",", $name2);
        $lasts = explode(",", $name3);

        for($i=1; $i<=$num; $i++)
        {
            $rand1 = rand(0, count($familys) -1);
            $rand2 = rand(0, count($middles) -1);
            $rand3 = rand(0, count($lasts) -1);

            $name = $familys[$rand1] . $middles[$rand2] . $lasts[$rand3];

            echo "
            <div class='row'>
                <div class='col-2 colLine'>$i</div>
                <div class='col colLine'>$name</div>
            </div>
            ";
        }
    }
?>