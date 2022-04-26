<?php
include 'database.php';

session_start();


$userid = $_SESSION['id'];
$user = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    
    echo '<script>window.location="../";</script>';
} else {
    
    $session_id = $_SESSION['id'];
    $session_username = $_SESSION['username'];
    $query = "SELECT * FROM admin WHERE id =:id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $userid]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $userid = $_SESSION['id'];
    $user = $_SESSION['username'];
}
