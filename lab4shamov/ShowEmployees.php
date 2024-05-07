<p align="center">Employees(Shamov)</p>
<?php
if ($select_query2)
{
	echo '<table align="center" name="Employees">';
}
else
{
	echo '<table align="center">';
}
?>

	<thead>
		<tr>
			<th>Код</th>
			<th>Фамилия</th>
			<th>Имя</th>
			<th>Отчество</th>
			<th>Номер телефона</th>
			<th>Заработная плата</th>
			<th>Страна</th>
			<th>Рабочее время</th>
			<?php
			if ($select_query2)
			{
				echo '<th>Код должности</th>';
				echo '<th></th>';
			}
			?>
		</tr>
	</thead>
<?php
	echo '<tbody>';
	while($row = mysqli_fetch_array($select_query1))
	{ 
    	echo '<tr>';
    	echo '<td>' . $row['Code'] . '</td>';
    	echo '<td>' . $row['Surname'] . '</td>';
    	echo '<td>' . $row['Name'] . '</td>';
    	echo '<td>' . $row['Patronymic'] . '</td>';
    	echo '<td>' . $row['PhoneNumber'] . '</td>';
    	echo '<td>' . $row['Salary'] . '</td>';
    	echo '<td>' . $row['Country'] . '</td>';
    	echo '<td>' . $row['WorkTime'] . '</td>';
    	if ($select_query2)
		{
			echo '<td>' . $row['PositionCode'] . '</td>';
			?>
    		<td>
    			<form method="POST">
    				<input type="hidden" name="employee_code" value=<?=$row['Code']?>/>
    				<button name="update_employees">Изменить</button>
    			</form>
    		</td>
    		<?php
		}
    	echo '</tr>';
  	}
	echo '</tbody>';
?>
</table>
<hr>