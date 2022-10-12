<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
session_destroy();
header("location:../../index.php");
?>