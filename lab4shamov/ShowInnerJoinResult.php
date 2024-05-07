<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inner Join</title>
		<?php
		require_once 'database.php';
		include_once 'style.css';
		include 'script.php';
		?>
	</head>

	<body>
		<?php
		$inner_join = "SELECT 
			`Employees(Shamov)`.Surname, `Employees(Shamov)`.Name, `Employees(Shamov)`.Patronymic, `" . $table_name . "`.Position
			FROM `Employees(Shamov)`
			INNER JOIN `" . $table_name . "`
	    	ON `Employees(Shamov)`.PositionCode = `" . $table_name . "`.Code";
		$join_result = mysqli_query($db_induction, $inner_join);
		if ($join_result)
		{
		?>
		<table align="center">
			<thead>
				<tr>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Должность</th>
				</tr>
			</thead>

			<tbody>
				<?php
				while($row = mysqli_fetch_array($join_result))
				{ 
				    echo '<tr>';
			    	echo '<td>' . $row['Surname'] . '</td>';
			    	echo '<td>' . $row['Name'] . '</td>';
			    	echo '<td>' . $row['Patronymic'] . '</td>';
			    	echo '<td>' . $row['Position'] . '</td>';
			    	echo '</tr>';
			 	}
			 	?>
			</tbody>
		</table>
		<?php
		}
		else
		{
			show_error_message("Ошибка.");
		}
		?>
	</body>
</html>