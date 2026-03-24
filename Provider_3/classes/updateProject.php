<?php
require_once '../API_3/class_lib/db_connect.php';
require_once 'CRUD.php';

$db = new DB_Access();
$connect = $db->connectTo();

if (isset($_POST['updateProject'])) {
    updateProject();
    exit();
}

if (isset($_GET['project_id'])) {
    $id = $_GET['project_id'];
    $sql = "SELECT * FROM projects WHERE project_id = $id";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
} else {
    die("No project ID provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Project</title>
</head>
<body>
    <h2>Update Project</h2>

    <form method="POST" action="">
        <input type="hidden" name="project_id" value="<?php echo $data['project_id']; ?>">

        <label>Project Name:</label><br>
        <input type="text" name="project_name" value="<?php echo $data['project_name']; ?>"><br><br>


        <label>Category:</label><br>
        <input type="text" name="category" value="<?php echo $data['category']; ?>"><br><br>

        <label>Project Status:</label><br>
        <input type="text" name="status" value="<?php echo $data['status']; ?>"><br><br>

        <label>Project Due Date:</label><br>
        <input type="text" name="due_date" value="<?php echo $data['due_date']; ?>"><br><br>

        <input type="submit" name="updateProject" value="Update Project">
    </form>
</body>
</html>