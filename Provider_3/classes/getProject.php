<?php
require_once 'db_connect.php';

if (isset($_GET['project_id'])) {
    $id = $_GET['project_id'];

    $sql = "SELECT * FROM projects";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "No records found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects View</title>
    <style type="text/css">
        .wrapper {
            width: 650px;
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
                <td><?php echo $data['project_name']; ?></td>
            </tr>
            <tr>
                <th>Project Category</th>
                <td><?php echo $data['category']; ?></td>
            </tr>
            <tr>
                <th>Project Status</th>
                <td><?php echo $data['status']; ?></td>
            </tr>
            <tr>
                <th>Project Due Date</th>
                <td><?php echo $data['due_date']; ?></td>
            </tr>
            <tr>
                <th>Action</th>
                <td>
                    <a href="update.php?id=<?php echo $data['id']; ?>">Update Project</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
                    <a href="Scrum3_Team_3/Client_3/index.html">Back</a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php
$connect->close();
?>