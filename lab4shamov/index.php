<!DOCTYPE html>
<?php
require_once 'database.php';
if ($db_induction)
{
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Лаба БД №4</title>
		<?php
		include_once 'style.css';
		include 'script.php';
		?>
	</head>

	<body>
		<?php
		include 'ShowEmployees.php';
		if ($select_query2)
		{
			echo '<p align="center">' . $table_name . '</p>';
		}
		include 'buttons.php';
		?>
		<br>
		<?php
		if ($select_query2)
		{
			include 'ShowJobPositions.php';
		}
		?>
	</body>
</html>
<?php
}
else
{
	include 'ShowErrorConnection.php';
}

if ($db_induction)
{
	mysqli_close($db_induction);
}
?>