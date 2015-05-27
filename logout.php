<?php
include 'header.php'
session_destroy();
header('Location: /' );
include 'footer.php';