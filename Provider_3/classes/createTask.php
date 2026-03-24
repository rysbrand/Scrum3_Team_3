<?php
require_once '../API_3/class_lib/db_connect.php';
require_once 'CRUD.php';

$db = new DB_Access();
$connect = $db->connectTo();

if (isset($_POST['createTask'])) {
    createTask();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
</head>
<body>
    <h2>Create Task</h2>

    <form method="POST" action="">
        <input type="hidden" name="task_id" >

        <label>Associate Project ID:</label><br>
        <input type="text" name="project_id"><br><br>
        
        <label>Associate User ID:</label><br>
        <input type="text" name="assigned_user_id"><br><br>
        
        <label>Task Title:</label><br>
        <input type="text" name="title"><br><br>

        <label>Task Description:</label><br>
        <input type="text" name="description"><br><br>

        <label>Task Status:</label><br>
        <input type="text" name="status"><br><br>

        <label>Task Priority:</label><br>
        <input type="text" name="priority"><br><br>

        <label>Task Due Date:</label><br>
        <input type="text" name="due_date"><br><br>

        <input type="submit" name="createTask" value="Create Task">
    </form>
</body>
</html>