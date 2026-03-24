<?php
require_once 'db_connect.php';

public function create() {
    if($_POST) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$contact = $_POST['contact'];

	$sql = "INSERT INTO members (fname, lname, contact, age, active) VALUES ('$fname', '$lname', '$contact', '$age', 1)";
	if($connect->query($sql) === TRUE) {
		echo "<p>New Record Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
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
		echo "<a href='../index.php'><button type='button'>Back</button></a>";
	} else {
		echo "Error updating record : " . $connect->error;
	}

	$connect->close();
}
}
?>