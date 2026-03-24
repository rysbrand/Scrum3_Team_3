<?php
require_once '../API_3/class_lib/db_connect.php';
require_once 'CRUD.php';

$db = new DB_Access();
$connect = $db->connectTo();

if (isset($_POST['createUser'])) {
    createUser();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
</head>
<body>
    <h2>Create User</h2>

    <form method="POST" action="">
        <input type="hidden" name="user_id" >

        <label>First Name:</label><br>
        <input type="text" name="first_name"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="last_name"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br><br>

        <label>Role:</label><br>
        <input type="text" name="role"><br><br>

        <input type="submit" name="createUser" value="Create User">
    </form>
</body>
</html>