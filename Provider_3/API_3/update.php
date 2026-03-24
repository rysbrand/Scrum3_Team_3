<?php
require_once '../classes/CRUD.php';



if($_POST) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE employees SET name = '$name', address = '$address', salary = '$salary' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
}

?>

<?php 

 


if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM employees WHERE id = {$id}";
    $result = $connect->query($sql);
 
    $data = $result->fetch_assoc();
 
    $connect->close(); 
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Update Employee</legend>
 
    <form action="" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" value="<?php echo $data['name'] ?>" /></td>
            </tr>     
            <tr>
                <th>Address</th>
                <td><input type="text" name="address" value="<?php echo $data['address'] ?>" /></td>
            </tr>
            <tr>
                <th>Salary</th>
                <td><input type="text" name="salary" value="<?php echo $data['salary'] ?>" /></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>


<?php
$db->closeConnection();
?>