<?php
require_once '../classes/CRUD.php';
require_once 'class_lib/db_connect.php';

if ($_POST) {
    $id = $_GET['id'] ?? $_POST['id'] ?? '';
    $column_name = $_POST['column_name'];
    $id_name = $column_name . '_id';
}
 
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $column_name = $_POST['column_name'];

    delete($id, $column_name);

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $column_name = $_GET['column_name'];
    $table_name = $column_name . 's';
    $id_name = $column_name . '_id';

    $db = new DB_Access();
	$connect = $db->connectTo();
    

	$sql = "SELECT * from {$table_name} WHERE {$id_name} = {$id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
	$db->closeConnection(); 
}
 
?>
	
<!DOCTYPE html>
<html>
<head>
   <title>Delete <?php echo $column_name?> </title>
   </head>
   <body>
   <h3>Do you really want to remove this <?php echo $column_name?>?</h3>
   <form action="" method = "post">
   <input type="hidden" name = "id" value="<?php echo $id; ?>" />
   <input type="hidden" name = "column_name" value="<?php echo $column_name?>" />
   <button type="submit" name="delete">Delete</button>
   <a href = "../classes/getProject.php"><button type="button">Back</button></a>
   </form>
   </body>
   </html>


<!-- <?php
//$db->closeConnection();
?> -->