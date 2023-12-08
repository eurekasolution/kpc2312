<script>
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