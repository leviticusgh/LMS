<?php include 'session.php'; include 'database.php'; ?>
<?php

if (isset($_POST["login"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"]) && empty($_POST["password"])) {
            echo '<html><div style="color: red; text-align: center;">Username / Password is Required</div></html>';
        } else if (empty($_POST["username"])) {
            echo '<html><div style="color: red; text-align: center;">Username is Required</div></html>';
        } else if (empty($_POST["password"])) {
            echo '<html><div style="color: red; text-align: center;">Password is Required</div></html>';
        } else {
            $user = htmlspecialchars($_POST['username']);
            $pass  = htmlspecialchars($_POST['password']);

            $query = "SELECT * FROM admin WHERE username = '$user'";
            $stmt = $db->prepare($query);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $pass_verify = password_verify($pass, $row['password']);
                if ($pass_verify == true) {

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    $user = $_SESSION['username'];
                    $userid = $_SESSION['id'];

                    header("location:views/");

                } else {
                    echo '<html><div style="color: red; text-align: center;">Invalid Username / Password </div></html>';
                    header("location:../");
                }
            } else {
                echo '<html><div style="color: red; text-align: center;">Invalid Username / Password </div></html>';
                header("location:../");
            }
        }
    }
}

?>

<?php

if (isset($_POST["signup"])) {

            $user = htmlspecialchars($_POST['username']);
            $password  = htmlspecialchars($_POST['password']);
            $hash = password_hash($password, PASSWORD_BCRYPT);

            $query = "SELECT * FROM admin WHERE username = '$user'";
            $values = array($user);
            $stmt = $db->prepare($query);
            $row = $stmt->execute($values);        

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                if ($user === $row['username']) {
                
                    echo '<html><div class="text-center" style="background: white; width: 100%; color: red;">Username Already Exist</div></html>';
                    echo '<script>window.location="../"</script>';
                    
                }
            }
            else { 
                 
                $query = "INSERT INTO admin(username, password) VALUES(?, ?)";
                $values = array($user, $hash);
                $stmt = $db->prepare($query);
                $row = $stmt->execute($values);
        
                if ($row == true) {
                    echo '<script>alert("Signup Successful");</script>';
                    echo '<script>window.location="../"</script>';
                } else {
                    
                    echo '<html><div class="text-center" style="background: white; width: 100%; color: red;">SignUp Failed</div></html>';
                    echo '<script>window.location="../"</script>';

                }
            }
                        
        }

?>