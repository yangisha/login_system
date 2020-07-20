<?php

    require_once 'database.php';

    session_start(); //session start

    function login($username, $password) {
        $database = new Database();
        $parameters = [
            'username' => $username,
            'password' => $password
        ];        
        $sql = "select * from users where username = :username "
            . "and password = md5(:password)";
        $rows = $database->fetchAll($sql, $parameters);
        return count($rows) > 0;
    }

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username != NULL && $password != NULL)  {
            if(login($username, $password)) {
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true; 
                header('Location: admin.php');
            } else {
                $error_message = "Incorrect username or password";
            }
        } else {
            $error_message = "Input username & password.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login_form">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label>
                username: <input type="text" name="username">
            </label>
            <label>
                password: <input type="password" name="password">
            </label>
            <input type="submit" name="login">
        </form>
    </div>

    <?php if(isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>

</body>
</html>