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
                    <li class="breadcrumb-item active" style="color: rgb(163, 163, 163);">Overview</li>
                </ol>
                <div class="row">
                    <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background: rgb(16, 29, 36);">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-book"></i>
                                </div>
                                <div class="mr-5">Books</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="book.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background: rgb(16, 29, 36);">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-address-card"></i>
                                </div>
                                <div class="mr-5">Borrow</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="borrow.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background: rgb(16, 29, 36);">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-users"></i>
                                </div>
                                <div class="mr-5">Users</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="user.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

    <?php include 'footer.php'; ?>

        </div>

    </div>


    <?php include 'script.php'; ?>

    <?php include 'modal.php'; ?>
    
</body>

</html>