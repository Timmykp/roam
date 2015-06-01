<?php
include 'header.php';
session_destroy();
header('Location: login.php' );
include 'footer.php';
?>