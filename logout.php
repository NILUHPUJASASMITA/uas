<?php
session_start();
session_destroy();
echo "<script type= 'text/javascript'>alert('logout out berhasil'); location.href=\"login.php\";</script>"; 
?>