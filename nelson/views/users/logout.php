<?php
echo '<h1>You have successfully logged out</h1>';
echo '<script>setTimeout("location.href ='.basePath().'/index.php",3000);</script>';

header(Location: basePath().'/index.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
?>
