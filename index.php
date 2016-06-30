<?php require_once('config.php');
//require_once('functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>War of Saints</title>
    <meta charset="utf-8"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="main.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="main.js"></script>
</head>
<body>
	
<h1 class="center">Darker Souls</h1>
<p class="center">So you thought it was hard before? Think again.</p>
<p class="center">
<select id='' name='mod'>
	<option value='1'>Casual (5)</option>
	<option value='2'>Standard (8)</option>
	<option value='3'>Experienced (13)</option>
	<option value='4'>Master (19)</option>
	<option value='5'>Hacker (26)</option>
</select>
</p>
<p class='center'>
	<input type='checkbox' name='weapon'>Roll weapon
	<input type='checkbox' name='class'>Roll class
	<input type='checkbox' name='level'>Roll max level
<p class='center'>
<input type="submit" value="Randomize" onclick='roll();'></p>
<p class="center">
<div class="main center">
	
</div>
<p class='center'>
	<input type='text' class='suggest' value='' placeholder='Think something should be worth more points? Let me know!' name='message'>
	<input type='submit' onclick='suggest();'>
	<div class='center main2'>
	</div>
</p>
	
</body>
</html>