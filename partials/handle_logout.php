<?php

session_start();
session_unset();
session_destroy();
echo "please wait";
header("location:../index.php");



?>