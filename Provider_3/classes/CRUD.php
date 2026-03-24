<?php
require_once 'db_connect.php';

public function createUser() {
    if($_POST) {
	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];
	$email = $_POST['email'];
	$role = $_POST['role'];

	$sql = "INSERT INTO members (fname, lname, email, role) VALUES ('$fname', '$lname', '$email', '$role')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New User Successfully Created</p>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}

	$connect->close();
}

}

public function createProject() {

}

public function createTasks() {

}

public function delete() {
    if($_POST) {
	$id = $_POST['id'];

	$sql = "DELETE FROM users WHERE id = {$id}";
	if($connect->query($sql) === TRUE) {
		echo "<p>Project Successfully removed!!</p>";
		echo "<a href='../index.php'><button type='button'>Back</button></a>";
	} else {
		echo "Error updating record : " . $connect->error;
	}

	$connect->close();
}
}

public function updateUser() {
    if($_POST) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE employees SET name = '$name', address = '$address', salary = '$salary' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
}
?>