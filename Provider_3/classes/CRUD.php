<?php
require_once '../API_3/class_lib/db_connect.php';

function createUser() {

    if($_POST) {
	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];
	$email = $_POST['email'];
	$role = $_POST['role'];

	$db = new DB_Access();
	$connect = $db->connectTo();


	$sql = "INSERT INTO users (fname, lname, email, role) VALUES ('$first_name', '$last_name', '$email', '$role')";

	if ($connect->query($sql) === TRUE) {
            echo "<p>New project successfully created</p>";
            echo "<a href='../Testers/index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error: " . $sql . " " . $connect->error;
        }

        $connect->close();
}
}

function createTask() {

    if($_POST) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$priority = $_POST['priority'];
    $due_date = $_POST['due'];

	$db = new DB_Access();
	$connect = $db->connectTo();

	$sql = "INSERT INTO tasks (title, description, status, priority, due_date) VALUES ('$title', '$description', '$status', '$priority', '$due_date')";

	if ($connect->query($sql) === TRUE) {
            echo "<p>New project successfully created</p>";
            echo "<a href='../Testers/index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error: " . $sql . " " . $connect->error;
        }

        $connect->close();
}
}



function createProject()
{
    if ($_POST) {
		$project_name = $_POST('project_name');
        $category = $_POST['category'];
        $status = $_POST['status'];
        $due_date = $_POST['due'];

        $db = new DB_Access();
        $connect = $db->connectTo();

        $sql = "INSERT INTO projects (project_name, category, status, due_date)
                VALUES ('$project_name', '$category', '$status', '$due_date')";

        if ($connect->query($sql) === TRUE) {
            echo "<p>New project successfully created</p>";
            echo "<a href='../Testers/index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error: " . $sql . " " . $connect->error;
        }

        $connect->close();
    }
}



function delete($id, $column_name) {

    $id_name = $column_name . '_id'; // For the where clause
    $table_name = $column_name . 's'; // For the from clause
    $sql = "DELETE FROM {$table_name} WHERE {$id_name} = {$id}"; // I have no idea if this works test pls

	$db = new DB_Access();
	$connect = $db->connectTo();
	if($connect->query($sql) === TRUE) {
		echo "<p>Project Successfully removed!!</p>";
		echo "<a href='../../Client_3/index.html'><button type='button'>Back</button></a>";
	} else {
		echo "Error updating record : " . $connect->error;
	}

	$connect->close();
}

function updateUser() {

    if(isset($_POST['updateUser'])) {

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
 
    $user_id = $_POST['user_id'];
	$db = new DB_Access();
	$connect = $db->connectTo();
 
    $sql = "UPDATE users SET first_name = '$fname', last_name = '$lname', email = '$email', role = '$role' WHERE user_id = {$user_id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../../Client_3/index.html'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
}

function updateTask() {
	if(isset($_POST['updateTask'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
 	$task_id = $_POST['task_id'];

	$db = new DB_Access();
	$connect = $db->connectTo();
 
    $sql = "UPDATE tasks SET title = '$title', description = '$description', status = '$status', priority = '$priority' WHERE task_id = {$task_id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../../Client_3/index.html'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
}

function updateProject(){
	if($_POST) {

    $project_name = $_POST['project_name'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];
 	$project_id = $_POST['project_id'];

	$db = new DB_Access();
	$connect = $db->connectTo();
 
    $sql = "UPDATE projects SET project_name = '$project_name', category = '$category', status = '$status', due_date = '$due_date' WHERE project_id = {$project_id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../../Client_3/index.html'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
}
?>