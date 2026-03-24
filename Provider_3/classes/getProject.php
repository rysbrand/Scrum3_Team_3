<?php
require_once '../API_3/class_lib/db_connect.php';

$db = new DB_Access();
$result = $db->displayRecords("projects");
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
            <h2>Projects</h2>
        </div>

        <table>
            <tr>
                <th>Project Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>

            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<td>" . $data['project_name'] . "</td>";
                    echo "<td>" . $data['category'] . "</td>";
                    echo "<td>" . $data['status'] . "</td>";
                    echo "<td>" . $data['due_date'] . "</td>";
                    // echo "<td>
                    //         <a href='update.php?id=" . $data['id'] . "'>Update</a> |
                    //         <a href='delete.php?id=" . $data['id'] . "'>Delete</a>
                    //       </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No projects found.</td></tr>";
            }
            ?>
        </table>

        <br>
        <a href="Scrum3_Team_3/Client_3/index.html">Back</a>
    </div>
</body>
</html>

<?php
$db->closeConnection();
?>