<?php


include '../session.php';

require '../database.php';

$id = $_GET['id'];

if (isset ($_POST['update']) ) {

    $book_id = htmlspecialchars($_POST['book_id']);
    $userid = htmlspecialchars($_POST['userid']);
    $date_borrow = htmlspecialchars($_POST['date_borrow']);
    $date_submit = htmlspecialchars($_POST['date_submit']);
    
    $query = "UPDATE borrow SET book_id =:book_id, user_id =:user_id, date_borrow =:date_borrow, date_submit =:date_submit WHERE id =:id";
    $stmt = $db->prepare($query);
    $row = $stmt->execute([':id' => $id, ':book_id' => $book_id, ':user_id' => $userid, ':date_borrow' => $date_borrow, ':date_submit' => $date_submit]);
        
        if ($row == true){

            echo '<script>window.location="../views/borrow.php";</script>';
            }else{
                echo '<script>alert("Error Updating Details");</script>';
                echo '<script>window.location="../views/borrow_edit.php";</script>';
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
                    <li class="breadcrumb-item active" style="color: rgb(163, 163, 163);">Borrow</li>
                </ol>

                <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">

                <?php

                    include '../database.php';

                    if (isset($_GET['id'])) {


                    $id = $_GET['id'];
                    
                    $q1 = "SELECT * FROM borrow INNER JOIN books ON borrow.book_id = books.b_id INNER JOIN users ON borrow.user_id = users.u_id WHERE borrow.id = $id";
                    $stmt = $db->prepare($q1);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                }
                ?>

                <form method="POST" role="form" >
                    <div class="card-body">
                        <div class="card-title">

                        <div>
                        <strong>Book : </strong><select class="form-control" name="book_id">
                            <option value="<?php echo $row["b_id"] ?>"><?php echo $row["book_title"] ?></option>
                            <option value=""> --------------------------------- </option>
                                <?php
                                    $q1 = "SELECT * FROM books";
                                    $stmt = $db->prepare($q1);
                                    $stmt->execute();
                                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $rows['b_id'] . "'>" . $rows['book_title'] . "</option>";};
                                ?>
                        </select>
                        </div>
                        <strong>Name : </strong><select class="form-control" name="userid">
                            <option value="<?php echo $row["u_id"] ?>"><?php echo $row["firstname"], $row["surname"]; ?></option>
                            <option value=""> --------------------------------- </option>
                                <?php
                                    $q1 = "SELECT * FROM users";
                                    $stmt = $db->prepare($q1);
                                    $stmt->execute();
                                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $rows['u_id'] . "'>" . $rows['firstname'] . " " . $rows['surname'] . "</option>";};
                                ?>
                        </select>
                        <strong>Date Borrow : </strong><input class="form-control" type="date" name="date_borrow" value="<?php echo $row["date_borrow"] ?>">
                        <p></p>
                        <strong>Date Submit : </strong><input class="form-control" type="date" name="date_submit" value="<?php echo $row["date_submit"] ?>">
                        <p></p>
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