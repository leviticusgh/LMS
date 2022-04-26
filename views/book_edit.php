<?php include '../session.php'; ?>
<?php

require '../database.php';

$b_id = $_GET['id'];

if (isset ($_POST['update']) ) {

    $book_title = htmlspecialchars($_POST['book_title']);
    $author = htmlspecialchars($_POST['author']);
    $publisher = htmlspecialchars($_POST['publisher']);
    $description = htmlspecialchars($_POST['description']);

    $target = "../uploads/images/". basename($_FILES['image_file']['name']);
    $target_file = "../uploads/books/". basename($_FILES['document_file']['name']);
                    
    $image_file = $_FILES['image_file']['name'];
    $image_tmp = $_FILES['image_file']['tmp_name'];
    $image_error = $_FILES['image_file']['error'];
    $image_type = $_FILES['image_file']['type'];
    $extensions = array("png", "jpg", "jpeg");

    $document_file = $_FILES['document_file']['name'];
    $file_tmp = $_FILES['document_file']['tmp_name'];
    $file_error = $_FILES['document_file']['error'];
    $file_type = $_FILES['document_file']['type'];
    $book_extensions = array("pdf");

    if($extensions == false){

        echo '<script>alert("File Selection is Invalid");</script>';
        echo '<script>window.location="../views/book_edit.php";</script>';

    } elseif($book_extensions == false){

        echo '<script>alert("File Selection is Invalid");</script>';
        echo '<script>window.location="../views/book_edit.php";</script>';

    } else {

        $q1 = "SELECT * FROM books WHERE b_id = $b_id";
        $stmt = $db->prepare($q1);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $query = "UPDATE books SET userid =:userid, book_title =:book_title,  author =:author, publisher =:publisher, description =:description, image_file =:image_file, document_file =:document_file WHERE b_id =:b_id";
        $stmt = $db->prepare($query);
        $row = $stmt->execute([':b_id' => $b_id, ':userid' => $userid, ':book_title' => $book_title, ':author' => $author, ':publisher' => $publisher, ':description' => $description, ':image_file' => $image_file, ':document_file' => $document_file ]);
        
        if ($row == true){

            if(move_uploaded_file($image_tmp, $target) AND move_uploaded_file($file_tmp, $target_file)){

                echo '<script>window.location="../views/book.php";</script>';
            }else{
                echo '<script>alert("Error Updating Details");</script>';
                echo '<script>window.location="../views/book_edit.php";</script>';
            }
        }
        else{
            echo '<script>alert("Error Fetching Data");</script>';
            echo '<script>window.location="../views/book_edit.php";</script>';
        }
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head><?php include 'header.php'; ?></head>

<body id="page-top">

<?php include 'navbar.php'; ?>

    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <div id="content-wrapper" style="background: rgb(5, 16, 17);">

            <div class="container-fluid">

                <ol class="breadcrumb" id="breadcrumb" style="background: rgb(26, 76, 79);">
                    <li class="breadcrumb-item">
                        <a style="color: rgb(211, 209, 207);" href="../views/" id="breadhead">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" style="color: rgb(163, 163, 163);">Books</li>
                </ol>

                <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">

                <?php

                    include '../database.php';

                    if (isset($_GET['id'])) {


                    $b_id = $_GET['id'];
                    
                    $q1 = "SELECT * FROM books WHERE b_id = $b_id";
                    $stmt = $db->prepare($q1);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                }
                ?>

                <form method="POST" role="form" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $row['id']; ?>">
                    <div class="card-header img-thumbnail" style="height: 200px; background: rgb(16, 29, 36);">
                    <img height="180px" src="../uploads/images/<?php echo $row["image_file"] ?>" class="card-img-top" />
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                        <strong>Book Title : </strong><input class="form-control" type="text" name="book_title" value="<?php echo $row["book_title"] ?>">
                        <p></p>
                        <strong>Author : </strong><input class="form-control" type="text" name="author" value="<?php echo $row["author"] ?>">
                        <p></p>
                        <strong>Publisher : </strong><input class="form-control" type="text" name="publisher" value="<?php echo $row["publisher"] ?>">
                        <p></p>
                        <strong>Description : </strong><textarea name="description" cols="61" rows="3"><?php echo $row["description"] ?></textarea>
                        <p></p>
                        <strong>Image Cover : </strong><a class="form-control btn-disabled" style="overflow: hidden;" name="image"><?php echo $row["image_file"] ?></a>
                        <input class="form-control" type="file" name="image_file" >
                        <p></p>
                        <strong>File : </strong><a class="form-control btn-disabled" style="overflow: hidden;" name="document"><?php echo $row["document_file"] ?></a>
                        <input class="form-control" type="file" name="document_file" >
                    </div>
                </div>
                <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                    <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update" class="btn btn-success text-white" style="width: 100%;"><i class="fa fa-fw fa-save"></i> Update</button></span>
                </div>
                </form>
                </div>

                <!-- END EDIT -->
      
            </div>

            <?php include 'footer.php'; ?>

        </div>

    </div>

    <?php include 'script.php'; ?>

    <?php include 'modal.php'; ?>
    
</body>

</html>