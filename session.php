<?php

session_start();

include 'database.php';

$userid = $_SESSION['id'];
$user = $_SESSION['username'];

if (!isset($_SESSION['username'])) {

    echo '<script>window.location="/LMS/";</script>';
} else {

    $session_id = $_SESSION['id'];
    $session_username = $_SESSION['username'];
    $query = "SELECT * FROM admin WHERE id =:id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $userid]);
    $data = $stmt->fetch();
    $userid = $_SESSION['id'];
    $user = $_SESSION['username'];
}
