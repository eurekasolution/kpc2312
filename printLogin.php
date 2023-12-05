<script>
    function checkError()
    {
        var old = document.getElementById('id');
        //alert(old.value);
        var old2 = document.loginForm.id;
        var objId = document.querySelector("#id");
        let idValue = $('#id').val();
        alert('id value = '  + idValue);

        var regexp = /^[a-zA-Z0-9]{4,10}$/;
        if(!regexp.test(idValue))
        {
            alert('아이디는 영어 대소문자와 숫자로 4~10글자 이내입니다.');
            objId.focus();
            return false;
        }
    }
</script>

<form name="loginForm" method="post" action="main.php?cmd=login" onSubmit="return checkError()">
    <div class="row">
        <div class="col-3 colLine">
            ID
        </div>
        <div class="col colLine">
            <input type="text" name="id" id="id" class="form-control" placeholder="ID">
        </div>
    </div>

    <div class="row">
        <div class="col-3 colLine">
            비번
        </div>
        <div class="col colLine">
            <input type="password" name="pass" id="pass" class="form-control" placeholder="password">
        </div>
    </div>

    <div class="row">
        <div class="col colLine">
            <button type="submit" class="btn btn-primary">로그인</button>
        </div>
    </div>


</form>