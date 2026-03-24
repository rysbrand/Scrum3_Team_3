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
        <a href="createProject.php">
            <button type="button">Create Project</button>
        </a>

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
            echo "<tr>";
            echo "<td>" . $data['project_name'] . "</td>";
            echo "<td>" . $data['category'] . "</td>";
            echo "<td>" . $data['status'] . "</td>";
            echo "<td>" . $data['due_date'] . "</td>";
            echo "<td>";
            ?>
            <!-- DO NOT TEST DELETE OR UPDATE BUTTON YET -->
                <form action="updateProject.php" method="GET" style="display:inline;">
                    <input type="hidden" name="project_id" value="<?php echo $data['project_id']; ?>">
                    <input type="hidden" name="column_name" value="project">
                    <input type="submit" value="Update">
                </form> 
                <form action="../API_3/delete.php" method="POST" style="display:inline;"> <!--I changed the route as it was wrong for delete.php -->
                    <input type="hidden" name="id" value="<?php echo $data['project_id']; ?>"> 
                    <input type="hidden" name="column_name" value="project">
                    <input type="submit" value="Delete">
                </form>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No projects found.</td></tr>";
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