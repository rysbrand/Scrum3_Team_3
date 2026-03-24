<?php
include('../API_3/class_lib/db_connect.php');

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


?>