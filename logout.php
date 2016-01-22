<html>
<body style="background:#F0FFFF"></body>
</html>
<?php
 session_start();
 //print_r($_SESSION);
 session_unset();
 session_destroy();
 echo'<script> window.location="index.php"; </script> ';
?>
