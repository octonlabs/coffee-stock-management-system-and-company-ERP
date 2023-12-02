<?php
include 'core/connection.php';
session_destroy();
echo "<script>window.location='index.php'</script>";

?>