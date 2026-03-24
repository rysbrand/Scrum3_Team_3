<?php
require_once './../API_3/class_lib/db_connect.php';

$db = new Db_Access();

function createUser() {
    if($_POST) {
	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];
	$email = $_POST['email'];
	$role = $_POST['role'];


	$sql = "INSERT INTO users (fname, lname, email, role) VALUES ('$first_name', '$last_name', '$email', '$role')";
	}
}

function createTask() {

    if($_POST) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
    $due_date = $_POST['due'];

	$sql = "INSERT INTO tasks (title, description, status, priority, due_date) VALUES ('$title', '$description', '$status', '$priority', '$due_date')";
}
}



function createProject()
{
    if ($_POST) {
        $category = $_POST['category'];
        $status = $_POST['status'];
        $due_date = $_POST['due'];

        $db = new DB_Access();
        $connect = $db->connectTo();

        $sql = "INSERT INTO projects (category, status, due_date)
                VALUES ('$category', '$status', '$due_date')";

        if ($connect->query($sql) === TRUE) {
            echo "<p>New project successfully created</p>";
            echo "<a href='../Testers/index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error: " . $sql . " " . $connect->error;
        }

        $connect->close();
    }
}



function delete() {
    if($_POST) {
	$id = $_POST['id'];
    $column_name = $_POST['table_name']; // Make sure this is not the plural version
    $column_id_name = $column_name . '_id'; // For the where clause
    $column_FROM = $column . 's'; // For the from clause
    $sql = "DELETE FROM {$column_FROM} WHERE {$column_id_name} = {$id}"; // I have no idea if this works test pls
	//$sql = "DELETE FROM users WHERE id = {$id}";
	if($connect->query($sql) === TRUE) {
		echo "<p>Project Successfully removed!!</p>";
		echo "<a href='../Testers/index.php'><button type='button'>Back</button></a>";
	} else {
		echo "Error updating record : " . $connect->error;
	}

	$connect->close();
}
}

function updateUser() {
    if($_POST) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE users SET first_name = '$fname', last_name = '$lname', email = '$email', role = '$role' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../Testers/index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
}
?>