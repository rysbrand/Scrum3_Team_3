<?php
require_once '../API_3/class_lib/db_connect.php';

$db = new DB_Access();
$result = $db->displayRecords("users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects View</title>
    <style type="text/css">
        .wrapper {
            width: 800px;
            margin: 0 auto;
        }
        .page-header h2 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="page-header">
            <h2>Users</h2>
        </div>

        <table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['first_name'] . "</td>";
            echo "<td>" . $data['last_name'] . "</td>";
            echo "<td>" . $data['email'] . "</td>";
            echo "<td>" . $data['role'] . "</td>";
            echo "<td>";
            ?>
            <!-- DO NOT TEST DELETE BUTTON YET -->
                <form action="updateUser.php" method="GET" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
                    <input type="hidden" name="column_name" value="user">
                    <input type="submit" value="Update">
                </form>
                <form action="delete.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $data['user_id']; ?>">
                    <input type="hidden" name="column_name" value="user">
                    <input type="submit" value="Delete">
                </form>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No users found.</td></tr>";
    }
    ?>
    </table>

        <br>
        <a href="../../Client_3/index.html">Back</a>
    </div>
</body>
</html>

<?php
$db->closeConnection();
?>