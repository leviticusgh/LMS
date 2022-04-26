<?php

include 'database.php';

session_start();

$id = $_SESSION['id'];

session_destroy();
header('location:../LMS/');