<?php

require_once 'database.php';
include_once 'functions.php';

$database = new Database();
$sql = 'select * from users';
$rows = $database->fetchAll($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>User List</h1> 
    <a class="button" href="user-new.php">New User</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
        </tr>
        <?php foreach($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;  
            padding: 5px;      
        }
    </style>
</body>
</html>