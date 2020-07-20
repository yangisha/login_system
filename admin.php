<?php

    session_start();

    if(!$_SESSION['logged_in']) 
        header('Location: login.php');
    
    $username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome <?php echo $username;?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>