<?php include '../session.php'; ?>
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

                <div class="card mb-3" style="border-color: rgb(5, 16, 17);">
                    <div class="card-header " style="color: white; background: rgb(17, 50, 52);">                        
                    <i class="fas fa-fw fa-users"></i>
                        Users View Table
                    </div>
                    <div class="card-body" style="background: rgb(16, 29, 36); color: white;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-hover" style="border-color: rgb(5, 16, 17); " id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>                                        
                                        
                                        <th width="25%">Firstname</th>
                                        <th width="25%">Surname</th>
                                        <th width="10%">Id Number</th>
                                        <th width="10%">Edit</th>
                                        <th width="10%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    require '../database.php';
                                    
                                    $query = "SELECT * FROM users";
                                    $stmt = $db->prepare($query);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<tr>
                                                <td>' . $row['firstname'] . '</td>
                                                <td>' . $row['surname'] . '</td>
                                                <td>' . $row['id_number'] . '</td>
                                                <td><span class="text-center text-white"><a href="user_edit.php?id=' . $row['u_id'] . '"name="edit" class="btn btn-success text-white"><i class="fa fa-fw fa-edit"></i></a></span></td>
                                                <td><span class="text-center text-white"><a href="user_delete.php?id=' . $row['u_id'] . '"name="delete" class="btn btn-danger text-white"><i class="fa fa-fw fa-trash"></i></a></span></td>
                                            </tr>';
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer small" style="background: rgb(17, 50, 52); color: rgb(211, 209, 207);">Updated</div>
                </div> 
                 <!-- END CARD -->
      
            </div>

            <?php include 'footer.php'; ?>

        </div>

    </div>

    <?php include 'script.php'; ?>

    <?php include 'modal.php'; ?>
    
</body>

</html>