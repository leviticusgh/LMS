<?php

require '../database.php';

$b_id = $_GET['id'];

$sql = 'DELETE FROM books WHERE b_id=:b_id';
$statement = $db->prepare($sql);
if ($statement->execute([':b_id' => $b_id])) {
  header("Location:book.php");
}