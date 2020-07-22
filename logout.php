<?php
   session_start();
   $_SESSION = [];
   session_unset();
   session_destroy();
   echo "<p align='center'>Anda telah logout!</p>";
   echo "<meta http-equiv='refresh' content='2; url=index.php'>";
?>