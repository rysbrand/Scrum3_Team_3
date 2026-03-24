<?php
require_once '../API_3/class_lib/db_connect.php';
require_once 'CRUD.php';

$db = new DB_Access();
$connect = $db->connectTo();

if (isset($_POST['updateUser'])) {
    updateUser();
    exit();
}

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
} else {
    die("No user ID provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>

    <form method="POST" action="">
        <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">

        <label>First Name:</label><br>
        <input type="text" name="first_name" value="<?php echo $data['first_name']; ?>"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="last_name" value="<?php echo $data['last_name']; ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $data['email']; ?>"><br><br>

        <label>Role:</label><br>
        <input type="text" name="role" value="<?php echo $data['role']; ?>"><br><br>

        <input type="submit" name="updateUser" value="Update User">
    </form>
</body>
</html>
