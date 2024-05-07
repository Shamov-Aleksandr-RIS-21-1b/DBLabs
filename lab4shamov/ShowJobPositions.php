<table name="Positions" align="center">
	<thead>
		<tr>
			<th>Код должности</th>
			<th>Должность</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
<?php
	echo '<tbody>';
	while($row = mysqli_fetch_array($select_query2))
	{ 
    	echo '<tr>';
    	echo '<td>' . $row['Code'] . '</td>';
    	echo '<td>' . $row['Position'] . '</td>';
    	?>
    	<td>
	    	<form method="POST">
	    		<input type="hidden" name="jobpos_code" value=<?=$row['Code']?>>
	    		<button name="update_jobpos">Изменить</button>
	    	</form>
    	</td>
    	<td>
	    	<form method="POST">
	    		<input type="hidden" name="jobpos_code" value=<?=$row['Code']?>>
	    		<button name="delete_jobpos">Удалить</button>
	    	</form>
	    </td>
    	<?php
    	echo '</tr>';
  	}
	echo '</tbody>';
?>
</table>