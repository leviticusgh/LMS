<?php

require '../database.php';

$id = $_GET['id'];

$sql = 'DELETE FROM users WHERE id=:id';
$statement = $db->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:user.php");
}