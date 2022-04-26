<?php include 'database.php'; ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="BOOTSTRAP/dist/css/bootstrap.min.css" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>


<div class="container" style="margin-top: 10px;">

<div class="text-center" style="top: 0; left: 0; right: 0; position: fixed; margin-top: 50px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:rgb(131, 175, 170)"><h3>LIBRARY MANAGEMENT SYSTEM</h3></div>

<section>

    <form method="post" action="index_query.php">

        <div class="header text-center" style="color: rgb(131, 175, 170);">
            <i class="fab fa-gg fa-2x"> ADMIN LOGIN </i>
        </div>

        <div class="form-group" style="margin-top: 50px">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>

        <div class="form-group" style="margin-top: 5px;">
            <input type="password" class="form-control" name="password" placeholder="Password " maxlength="15" required>
        </div>

        <input class="form-control btn btn-info" id="submit" type="submit" name="login" value="Login">

        <div class="text-center text-white" style="margin-top: 15px;">New? <a class="text-info" href="#signup" data-target="#signup" data-toggle="modal"> SignUp </a></div>

    </form>

</section>

</div>
    
    <!-- SIGNUP FORM -->

<div class="modal fade" id="signup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">ADMIN SIGNUP</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="index_query.php" role="form">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password " required>
                            </div>
                        </div>
                               
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-info" id="signup" name="signup" value="Save" />
                    </div>
                </div>
            </form>
        </div>

</div>

</div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="JQuery/jquery/dist/jquery-3.3.1.min.js"></script>
    <script src="BOOTSTRAP/dist/js/bootstrap.min.js"></script>

</body>

</html>