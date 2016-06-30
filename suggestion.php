<?php require_once('config.php');
$message = $db->real_escape_string($_POST['message']);
if ($_POST['message'] && $_POST['message']!='') {
	$db->query("INSERT INTO dssug (message) VALUES (\"".$message."\")");
	echo "Thank you for the suggestion!";
}
