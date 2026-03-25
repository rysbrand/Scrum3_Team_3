<?php
include('../API_3/class_lib/db_connect.php');

echo "<hr>";
echo "<h2>Json format of displaying all records</h2>";

$DB_Access = new DB_Access(); 

$DB_Result = $DB_Access->displayRecords("projects");
$rValue = "";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value ";
			}
		}
$data = array();
$data['tablesData'] = $rValue; //"TestValue";

print(json_encode($data));

print("<br/>");

$DB_Result = $DB_Access->displayRecords("tasks"); 
$rValue = "";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value ";
			}
		}
$data = array();
$data['tablesData'] = $rValue; //"TestValue";

print(json_encode($data));

print("<br/>");
$DB_Result = $DB_Access->displayRecords("users"); 
$rValue = "";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value ";
			}
		}
$data = array();
$data['tablesData'] = $rValue; //"TestValue";

print(json_encode($data));

print("<br/>");

echo "<hr>";
echo "<h2>All Tables Data (HTML View)</h2>";

function displayProjects($DB_Access) {
    $result = $DB_Access->displayRecords("projects");

    echo "<h3>Projects</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    // Creates the headers for the tables
    $fields = $result->fetch_fields();
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr>";

    // Creates the rows for tables
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table><br/>";
}

function displayTasks($DB_Access) {
    $result = $DB_Access->displayRecords("tasks");

    echo "<h3>Tasks</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    $fields = $result->fetch_fields();
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table><br/>";
}

function displayUsers($DB_Access) {
    $result = $DB_Access->displayRecords("users");

    echo "<h3>Users</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    $fields = $result->fetch_fields();
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table><br/>";
}

// Call functions above
displayProjects($DB_Access);
displayTasks($DB_Access);
displayUsers($DB_Access);


?>