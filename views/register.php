<!-- START MODALS -->

<!-- BOOKS -->

<?php

require '../database.php'; require '../session.php';

$id = $_SESSION['id'];

if (isset($_POST["add_book"])) {

    $book_title = htmlspecialchars($_POST['book_title']);
    $author = htmlspecialchars($_POST['author']);
    $publisher = htmlspecialchars($_POST['publisher']);
    $description = htmlspecialchars($_POST['description']);

    $target = "../uploads/images/". basename($_FILES['image_file']['name']);
    $target_file = "../uploads/books/". basename($_FILES['document_file']['name']);

    $image = $_FILES['image_file']['name'];
    $image_tmp = $_FILES['image_file']['tmp_name'];
    $image_error = $_FILES['image_file']['error'];
    $image_type = $_FILES['image_file']['type'];
    $extensions = array("png", "jpg", "jpeg");

    $file = $_FILES['document_file']['name'];
    $file_tmp = $_FILES['document_file']['tmp_name'];
    $file_error = $_FILES['document_file']['error'];
    $file_type = $_FILES['document_file']['type'];
    $book_extensions = array("pdf");

    $query = "SELECT * FROM books WHERE document_file = '$file' AND image_file = '$image' AND book_title =  '$book_title'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row_image = $row['image_file'];
    $row_file = $row['document_file'];

    $str_compare_image = strcoll($row_image, $image);
    $str_compare_file = strcoll($row_file, $file);
    
    if($extensions === false){

        echo '<script>alert("File Selection is Invalid");</script>';
        echo '<script>window.location="../views/book.php";</script>';

    } elseif($book_extensions === false){

        echo '<script>alert("File Selection is Invalid");</script>';
        echo '<script>window.location="../views/book.php";</script>';

    }
    elseif ($str_compare_image == true && $str_compare_file == true){
            $query = "INSERT INTO books(userid, book_title, author, publisher, description, image_file, document_file) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $values = array($id, $book_title, $author, $publisher, $description, $image, $file);
            $stmt = $db->prepare($query);
            $row = $stmt->execute($values);

            if ($row == true){

                if(move_uploaded_file($image_tmp, $target) && move_uploaded_file($file_tmp, $target_file)){
                    
                    echo '<script>alert("Book Inserted Successfully");</script>';
                    echo '<script>window.location="../views/book.php";</script>';
                }else{
                    echo '<script>alert("Error Inserting Details");</script>';
                    echo '<script>window.location="../views/book.php";</script>';
                }
            }
            else{
                echo '<script>alert("Error Inserting Details");</script>';
                echo '<script>window.location="../views/book.php";</script>';
            }
    }
    else {
        
        echo '<script>alert("Failed To Insert Books");</script>';
        echo '<script>window.location="../views/book.php";</script>';
    }
}
?>

<!-- END BOOKS -->

<!-- BORROW -->

<?php

include '../database.php';

if (isset($_POST["add_borrow"])) {

    $book_id = htmlspecialchars($_POST['book_id']);
    $userid = htmlspecialchars($_POST['userid']);
    $date_borrow = htmlspecialchars($_POST['date_borrow']);
    $date_submit = htmlspecialchars($_POST['date_submit']);
    
    $query = "SELECT * FROM borrow WHERE book_id = '$book_id' AND user_id  = '$userid' AND date_borrow = '$date_borrow' AND date_submit = '$date_submit'";
    $values = array($book_id, $userid, $date_borrow, $date_submit);
    $stmt = $db->prepare($query);
    $row = $stmt->execute($values);
    
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<script>alert("Duplicate Entry of Data");</script>';
            echo '<script>window.location="borrow.php";</script>';
        } else {

        $query = "INSERT INTO borrow(book_id, user_id, date_borrow, date_submit) VALUES(?, ?, ?, ?)";
        $values = array($book_id, $userid, $date_borrow, $date_submit);
        $stmt = $db->prepare($query);
        $row = $stmt->execute($values);

        if ($row == true) {
            echo '<script>alert("Data Entry Successful");</script>';
            echo '<script>window.location="borrow.php";</script>';
        } else {
            echo '<script>alert("Data Entry Failed");</script>';
            echo '<script>window.location="borrow.php";</script>';
        }
    }
}

?>

<!-- END BORROW -->

<!-- USER -->

<?php

include '../database.php';

if (isset($_POST["add_user"])) {

    $firstname = htmlspecialchars($_POST['firstname']);
    $surname = htmlspecialchars($_POST['surname']);
    $id_number = htmlspecialchars($_POST['id_number']);
    
    $query = "SELECT * FROM users WHERE id_number = '$id_number'";
    $values = array($id_number);
    $stmt = $db->prepare($query);
    $row = $stmt->execute($values);
    
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<script>alert("Duplicate Entry of Data");</script>';
            echo '<script>window.location="user.php";</script>';
        } else {

        $query = "INSERT INTO users(firstname, surname, id_number) VALUES(?, ?, ?)";
        $values = array($firstname, $surname, $id_number);
        $stmt = $db->prepare($query);
        $row = $stmt->execute($values);

        if ($row == true) {
            echo '<script>alert("Data Entry Successful");</script>';
            echo '<script>window.location="user.php";</script>';
        } else {
            echo '<script>alert("Data Entry Failed");</script>';
            echo '<script>window.location="user.php";</script>';
        }
    }
}

?>

<!-- END USER -->

<!-- END MODALS -->