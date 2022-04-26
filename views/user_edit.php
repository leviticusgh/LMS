<?php include '../session.php'; ?>
<?php

require '../database.php';

$id = $_GET['id'];

if (isset ($_POST['update']) ) {

    $firstname = htmlspecialchars($_POST['firstname']);
    $surname = htmlspecialchars($_POST['surname']);
    $id_number = htmlspecialchars($_POST['id_number']);
    
    $query = "UPDATE users SET firstname =:firstname, surname =:surname, id_number =:id_number, WHERE u_id =:u_id";
    $stmt = $db->prepare($query);
    $row = $stmt->execute([':u_id' => $id, ':firstname' => $firstname, ':surname' => $surname, ':id_number' => $id_number]);
        
        if ($row == true){

            echo '<script>window.location="../views/user.php";</script>';
            }else{
                echo '<script>alert("Error Updating Details");</script>';
                echo '<script>window.location="../views/user_edit.php";</script>';
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
                    <li class="breadcrumb-item active" style="color: rgb(163, 163, 163);">Users</li>
                </ol>

                <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">

                <?php

                    include '../database.php';

                    if (isset($_GET['id'])) {


                    $id = $_GET['id'];
                    
                    $q1 = "SELECT * FROM users WHERE u_id = $id";
                    $stmt = $db->prepare($q1);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                }
                ?>

                <form method="POST" role="form" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $row['u_id']; ?>">
                    <div class="card-body">
                        <div class="card-title">
                        <strong>Firstname : </strong><input class="form-control" type="text" name="firstname" value="<?php echo $row["firstname"] ?>">
                        <p></p>
                        <strong>Surname : </strong><input class="form-control" type="text" name="surname" value="<?php echo $row["surname"] ?>">
                        <p></p>
                        <strong>Id Number : </strong><input class="form-control" type="text" name="id_number" value="<?php echo $row["id_number"] ?>">
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