<?php
session_unset();
session_destroy();
echo '<script>setTimeout("window.location=\'index.php?quanly=login\'",1000);</script>';
?>
<center>
    <p></p>
<h1>Đang đăng xuất xin đợi 1 lát</h1>
</center>