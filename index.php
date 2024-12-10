<?php
session_start();
require("connection.php");
?>
<?php
// Redirect if the user is already logged in
if (isset($_SESSION['session_status']) && $_SESSION['session_status'] == 1) {
    echo '<script type="text/javascript">window.location="searchrecord.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
</head>
<body style="background-color:powderblue;">

    <form method="post">
        <h1 style="text-align:center;">LOG IN</h1>
        Username: <input type="text" name="username" required /><br />
        Password: <input type="password" name="password" required /><br />
        <input type="submit" name="login" value="Log In" />
        <input type="reset" value="Clear" />
        <br />

        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($username) && !empty($password)) {
                // Use prepared statements to prevent SQL injection
                $stmt = $mysqli->prepare("SELECT uid, username, password FROM users_tbl WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows == 0) {
                    echo "Invalid Username or Password";
                } else {
                    $user = $result->fetch_assoc();
                    
                    // Debug: print the UUID (optional)
                    print_r($user);
                    echo $password;
            
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['uid'] = $user['uid']; // Store the UUID in the session
                        $_SESSION['session_status'] = 1;
            
                        echo '<script type="text/javascript">
                                alert("Kenth in Successfully");
                                window.location="searchrecord.php";
                              </script>';
                        exit();
                    } else {
                        echo "Invalid Username or Password";
                    }
                }
                $stmt->close();
            } else {
                echo "Please fill in all fields.";
            }
            
            
        }
        ?>
    </form>
</body>
</html>
