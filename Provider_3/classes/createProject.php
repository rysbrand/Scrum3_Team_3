<?php
require_once '../API_3/class_lib/db_connect.php';
require_once 'CRUD.php';

$db = new DB_Access();
$connect = $db->connectTo();

if (isset($_POST['createProject'])) {
    createProject();
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Project</title>
</head>
<body>
    <h2>Update Project</h2>

    <form method="POST" action="">
        <input type="hidden" name="project_id">

        <label>Project Name:</label><br>
        <input type="text" name="project_name" ><br><br>

        <label>Category:</label><br>
        <input type="text" name="category"><br><br>

        <label>Project Status:</label><br>
        <input type="text" name="status"><br><br>

        <label>Project Due Date:</label><br>
        <input type="text" name="due_date"><br><br>

        <label>User Id of Project Owner:</label><br>
        <input type="text" name="owner_user_id"><br><br>

        <input type="submit" name="createProject" value="Create Project">
    </form>
</body>
</html>