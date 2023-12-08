<script>
    function setCookie(name, value, expiredays)
    {
        console.log("name = " + name + ", value = " + value + ", ex = " + expiredays);

        var todayDate = new Date();
        todayDate.setDate(todayDate().getDate() + expiredays);
        document.cookie = name + "=" + value + ";path=/; expires=" + todayDate.toGMTString() + ";";

    }


    function checkError()
    {
        var old = document.getElementById('kpc_id');
        //alert(old.value);
        var old2 = document.loginForm.id;
        var objId = document.querySelector("#kpc_id");
        let idValue = $('#kpc_id').val();
        //alert('id value = '  + idValue);

        var regexp = /^[a-zA-Z0-9]{4,10}$/;
        if(!regexp.test(idValue))
        {
            alert('아이디는 영어 대소문자와 숫자로 4~10글자 이내입니다.');
            objId.focus();
            return false;
        }

        // cookie를 이용해서 체크박스가 체크된 경우에 저장하기
        let kpc_test = document.getElementById('kpc_id').value;
        let kpc_id = document.querySelector("#kpc_id").value;  // ES5
        let kpc_pass = $('#kpc_pass').val(); // jQuery

        let saveid = $('#saveid').is(':checked');
        let savepass = $('savepass').is(':checked');

        console.log("kpc_id = " + kpc_id);
        console.log("kpc_pass = " + kpc_pass);
        console.log("saveid = " + saveid);
        console.log("savepass = " + savepass);

        if(saveid == true)
        {
            // 쿠키저장
            setCookie('kpc_id', kpc_id, 31);
        }else
        {
            setCookie('kpc_id', kpc_id, 0);
        }

        if(savepass == true)
        {
            // 쿠키저장
            setCookie('kpc_pass', kpc_pass, 31);
        }else
        {
            setCookie('kpc_pass', kpc_pass, 0);
        }

        return false;
    }
</script>

<form name="loginForm" method="post" action="main.php?cmd=login" onSubmit="return checkError()">
    <div class="row">
        <div class="col-3 colLine">
            ID
        </div>
        <div class="col-1 colLine">
            <input type="checkbox" name="saveid" id="saveid">
        </div>

        <div class="col colLine">
            <input type="text" name="kpc_id" id="kpc_id" class="form-control" placeholder="ID">
        </div>
    </div>

    <div class="row">
        <div class="col-3 colLine">
            비번
        </div>
        <div class="col-1 colLine">
            <input type="checkbox" name="savepass" id="savepass">
        </div>
        <div class="col colLine">
            <input type="password" name="kpc_pass" id="kpc_pass" class="form-control" placeholder="password">
        </div>
    </div>

    <div class="row">
        <div class="col colLine">
            <button type="submit" class="btn btn-primary">로그인</button>
        </div>
    </div>


</form>