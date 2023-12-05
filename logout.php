<?php

    session_destroy();
    echo "
    <script>
        alert('안녕히 가세요.');
        location.href='main.php';
    </script>
    ";
?>