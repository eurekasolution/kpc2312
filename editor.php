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

        <script>
            function setCommand(command)
            {
                var editor = document.querySelector("#editor");
                var content = document.querySelector("#content");

                document.execCommand(command);
                content.innerHTML = editor.innerHTML;
            }

            function setHtml()
            {
                var editor = document.querySelector("#editor");
                var content = document.querySelector("#content");

                //document.execCommand(command);
                content.innerHTML = editor.innerHTML;
            }
        </script>

        <div class="row">
            <div class="col colLine">
                <button type="button" class="btn btn-secondary btn-sm" onClick="setCommand('bold')">
                    <span class="material-icons">format_bold</span>
                </button> 
                <button type="button" class="btn btn-secondary btn-sm" onClick="setCommand('underline')">
                    <span class="material-icons">format_underline</span>
                </button> 
                <button type="button" class="btn btn-secondary btn-sm" onClick="setCommand('italic')">
                    <span class="material-icons">format_italic</span>
                </button> 
            </div>
        </div>
        <div class="row">
            <div class="col colLine">
                <div id="editor" contenteditable="true" style="width:100%; height:250px;" onKeyUp=setHtml() onChange=setHtml()>Editor</div>
            </div>
        </div>
        <div class="row">
            <div class="col colLine">
                <textarea id="content" name="content" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col colLine text-center">
                <button type="submit" class="btn btn-primary btn-sm">등록</button> 
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs'">목록</button>
            </div>
        </div>
        </form>