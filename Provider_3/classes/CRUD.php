<?php
require_once 'db_connect.php';

public function createUser() {
    if($_POST) {
	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];
	$email = $_POST['email'];
	$role = $_POST['role'];

	$sql = "INSERT INTO users (fname, lname, email, role) VALUES ('$fname', '$lname', '$email', '$role')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New User Successfully Created</p>";
		echo "<a href='../Testers/index.phpp'><button type='button'>Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}

	$connect->close();
}
}

public function createTasks() {
    if($_POST) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
    $due_date = $_POST['due']

	$sql = "INSERT INTO tasks (title, description, status, priority, due_date) VALUES ('$title', '$description', '$status', '$priority', '$due_date')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New task Successfully Created</p>";
		echo "<a href='../Testers/index.phpp'><button type='button'>Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}

	$connect->close();
}
}

public function createProjects() {
    if($_POST) {
	$category = $_POST['category'];
	$status = $_POST['status'];
	$due_date = $_POST['due'];

	$sql = "INSERT INTO projects (category, status, due_date) VALUES ('$category', '$status', '$due_date')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New project Successfully Created</p>";
		echo "<a href='../Testers/index.phpp'><button type='button'>Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}

	$connect->close();
}
}

public function delete() {
    if($_POST) {
	$id = $_POST['id'];

	$sql = "DELETE FROM users WHERE id = {$id}";
	if($connect->query($sql) === TRUE) {
		echo "<p>Project Successfully removed!!</p>";
		echo "<a href='../Testers/index.php'><button type='button'>Back</button></a>";
	} else {
		echo "Error updating record : " . $connect->error;
	}

	$connect->close();
}
}

public function updateUser() {
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