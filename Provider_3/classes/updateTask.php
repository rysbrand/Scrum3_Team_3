<?php
require_once '../API_3/class_lib/db_connect.php';
require_once 'CRUD.php';

$db = new DB_Access();
$connect = $db->connectTo();

if (isset($_POST['updateTask'])) {
    updateTask();
    exit();
}

if (isset($_GET['task_id'])) {
    $id = $_GET['task_id'];
    $sql = "SELECT * FROM tasks WHERE task_id = $id";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
} else {
    die("No task ID provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Task</title>
</head>
<body>
    <h2>Update Task</h2>

    <form method="POST" action="">
        <input type="hidden" name="task_id" value="<?php echo $data['task_id']; ?>">

        <label>Task Title:</label><br>
        <input type="text" name="title" value="<?php echo $data['title']; ?>"><br><br>

        <label>Task Description:</label><br>
        <input type="text" name="description" value="<?php echo $data['description']; ?>"><br><br>

        <label>Task Status:</label><br>
        <input type="text" name="status" value="<?php echo $data['status']; ?>"><br><br>

        <label>Task Priority:</label><br>
        <input type="text" name="priority" value="<?php echo $data['priority']; ?>"><br><br>

        <label>Task Due Date:</label><br>
        <input type="text" name="due_date" value="<?php echo $data['due_date']; ?>"><br><br>

        <input type="submit" name="updateTask" value="Update Task">
    </form>
</body>
</html>