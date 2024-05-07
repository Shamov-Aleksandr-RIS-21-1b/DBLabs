<!DOCTYPE html>
<?php
require_once 'database.php';

if ($db_induction)
{
?>

<html lang="ru">
<html>
	<head>
		<meta charset="utf-8">
		<title>Лаба БД №3</title>
		<?php
			include_once 'buttonstyle.css';
			include_once 'tablestyle.css';
			require_once 'queries.php';
		?>
	</head>

	<body>

		<hr>

		<center>
			<form method="POST">
				<button name="query_button1">
					<h5>Показать работников,       </h5>
					<h5>номера телефонов и         </h5>
					<h5>заработную плату           </h5>
				</button>
				<button name="query_button2">
					<h5>Показать работников,       </h5>
					<h5>адреса                     </h5>
					<h5>(сортировка по адресу)     </h5>
				</button>
				<button name="query_button3">
					<h5>Показать работников        </h5>
					<h5>с продолжительностью       </h5>
					<h5>трудового дня более 4 часов</h5>
				</button>
			</form>
		</center>

		<hr>

		<center>
			<table>
			<?php 
			if ($is_out1)
			{
				echo '<h2>Показать работников, номера телефонов и заработную плату:</h2>';
				echo '<hr>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Фамилия</th>';
				echo '<th>Имя</th>';
				echo '<th>Отчество</th>';
				echo '<th>Номер телефона</th>';
				echo '<th>Заработная плата</th>';
				echo '</tr>';
				echo '</thead>';

				echo '<tbody>';
				while($row = mysqli_fetch_array($result_query1))
				{ 
    				echo '<tr>';
    				echo '<td>' . $row['Surname'] . '</td>';
    				echo '<td>' . $row['Name'] . '</td>';
    				echo '<td>' . $row['Patronymic'] . '</td>';
    				echo '<td>' . $row['Phone_Number'] . '</td>';
    				echo '<td>' . $row['Salary'] . '</td>';
    				echo '</tr>';
  				}
				echo '</tbody>';
			}
			else if ($is_out2)
			{
				echo '<h2>Показать работников, адреса (сортировка по адресу):</h2>';
				echo '<hr>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Фамилия</th>';
				echo '<th>Имя</th>';
				echo '<th>Отчество</th>';
				echo '<th>Адрес</th>';
				echo '</tr>';
				echo '</thead>';

				echo '<tbody>';
				while($row = mysqli_fetch_array($result_query2))
				{ 
    				echo '<tr>';
    				echo '<td>' . $row['Surname'] . '</td>';
    				echo '<td>' . $row['Name'] . '</td>';
    				echo '<td>' . $row['Patronymic'] . '</td>';
    				echo '<td>' . $row['Adress'] . '</td>';
    				echo '</tr>';
  				}
				echo '</tbody>';
			}
			else if ($is_out3)
			{
				echo '<h2>Показать работников с продолжительностью трудового дня более 4 часов:<h2>';
				echo '<hr>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Фамилия</th>';
				echo '<th>Имя</th>';
				echo '<th>Отчество</th>';
				echo '<th>Рабочее время</th>';
				echo '</tr>';
				echo '</thead>';

				echo '<tbody>';
				while($row = mysqli_fetch_array($result_query3))
				{ 
    				echo '<tr>';
    				echo '<td>' . $row['Surname'] . '</td>';
    				echo '<td>' . $row['Name'] . '</td>';
    				echo '<td>' . $row['Patronymic'] . '</td>';
    				echo '<td>' . $row['Work_Time'] . '</td>';
    				echo '</tr>';
  				}
				echo '</tbody>';
			}
			else
			{
				echo '<h2>Исходная база данных:</h2>';
				echo '<hr>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Код</th>';
				echo '<th>Фамилия</th>';
				echo '<th>Имя</th>';
				echo '<th>Отчество</th>';
				echo '<th>Номер телефона</th>';
				echo '<th>Заработная плата</th>';
				echo '<th>Адрес</th>';
				echo '<th>Рабочее время</th>';
				echo '</tr>';
				echo '</thead>';

				echo '<tbody>';
				while($row = mysqli_fetch_array($result_query))
				{ 
    				echo '<tr>';
    				echo '<td>' . $row['Code'] . '</td>';
    				echo '<td>' . $row['Surname'] . '</td>';
    				echo '<td>' . $row['Name'] . '</td>';
    				echo '<td>' . $row['Patronymic'] . '</td>';
    				echo '<td>' . $row['Phone_Number'] . '</td>';
    				echo '<td>' . $row['Salary'] . '</td>';
    				echo '<td>' . $row['Adress'] . '</td>';
    				echo '<td>' . $row['Work_Time'] . '</td>';
    				echo '</tr>';
  				}
				echo '</tbody>';
			}
			?>
		</table>
		</center>

		<hr>

	</body>
</html>

<?php
}
else
{
?>

<html lang="en">
<html>
	<head>
		<meta charset="utf-8">
		<title>Ошибка подключения</title>
	</head>

	<body>
		<center>
		<h1>Connection to DataBase Error!<h1>
		</center>
	</body>
</html>

<?php
}

mysqli_close($db_induction);
?>