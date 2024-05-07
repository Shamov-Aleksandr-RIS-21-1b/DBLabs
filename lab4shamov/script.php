<?php

function show_error_message($message)
{
?>
	<dialog open="open">
		<p><?=$message?></p>
		<form method="dialog" align="center">
   		<button>Ок</button>
		</form>
	</dialog>
<?php
}

if (isset($_POST['create_button']))
{
	$create_query = 
		"CREATE TABLE `Lab4(Shamov)`.`" . $table_name . "` 
		(
			`Code` INT UNSIGNED NOT NULL AUTO_INCREMENT,
			`Position` VARCHAR(20) NOT NULL,
			PRIMARY KEY (`Code`)
		)
		ENGINE = InnoDB";
	$alter_query = "ALTER TABLE `Employees(Shamov)` ADD `PositionCode` INT UNSIGNED NULL";
    mysqli_multi_query($db_induction, $create_query);
    mysqli_multi_query($db_induction, $alter_query);
    $table_name = "JobPositions(Shamov)";
    $select_query2 = mysqli_query($db_induction, "SELECT * FROM `" . $table_name . "`");
}

else if (isset($_POST['drop_button']))
{
?>
	<dialog open="open">
		<p align="center">Удалить таблицу <?=$table_name?></p>

		<form method="POST" align="center">
	    	<input type="submit" value="Подтвердить" name="drop_accept">
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Отменить</button>
	  	</form>
	</dialog>
<?php
}
else if (isset($_POST['drop_accept']))
{
	$drop_query = "DROP TABLE `Lab4(Shamov)`.`" . $table_name . "`";
	$alter_query = "ALTER TABLE `Employees(Shamov)` DROP `PositionCode`";
    mysqli_multi_query($db_induction, $drop_query);
    mysqli_multi_query($db_induction, $alter_query);
    $select_query2 = false;
}

else if (isset($_POST['add_button']))
{
?>
	<dialog open="open">
		<p align="center">Отправка формы</p>

		<form method="POST" align="center">
			<p>Название должности:</p>
			<p><input type="text" name="insertjobpos"></p>
	    	<input type="submit" value="Подтвердить">
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Закрыть</button>
	  	</form>
	</dialog>
<?php
}

else if (isset($_POST['insertjobpos']))
{
	$jobpos = $_POST['insertjobpos'];
	$insert_query = mysqli_multi_query($db_induction, "INSERT INTO `" . $table_name . "` 
		(`Code`, `Position`) 
		VALUES (NULL, '" . $jobpos . "')");
	if ($insert_query)
	{
		header('Location: /');
	}
	else
	{
		show_error_message("Некорректный ввод.");
	}
}

else if (isset($_POST['truncate_button']))
{
?>
	<dialog open="open">
		<p align="center">Очистить таблицу <?=$table_name?></p>

		<form method="POST" align="center">
	    	<input type="submit" value="Подтвердить" name="truncate_accept">
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Отменить</button>
	  	</form>
	</dialog>
<?php
}
else if (isset($_POST['truncate_accept']))
{
	$truncate_query = "TRUNCATE `" . $table_name . "`";
	if (mysqli_query($db_induction, $truncate_query))
	{
		$select_query2 = mysqli_query($db_induction, "SELECT * FROM `" . $table_name . "`");
		header('Location: /');
	}
	else
	{
		show_error_message("Ошибка.");
	}
}

else if (isset($_POST['update_employees']))
{
?>
	<dialog open="open">
		<p align="center">Отправка формы</p>

		<form method="POST" align="center">
			<p>Код должности:</p>
			<p><input type="number" name="update_poscode"/></p>
			<input type="hidden" name="employee_code" value=<?=$_POST['employee_code']?>/>
	    	<input type="submit" value="Подтвердить"/>
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Закрыть</button>
	  	</form>
	</dialog>
<?php
}
else if (isset($_POST['update_poscode']))
{
	$poscode = $_POST['update_poscode'];
	$employee_code = (int)$_POST['employee_code'];
	$update_query = "UPDATE `Employees(Shamov)` 
		SET PositionCode = " . $poscode . " 
		WHERE Code = " . $employee_code;
	if (mysqli_query($db_induction, $update_query))
	{
		$select_query1 = mysqli_query($db_induction, "SELECT * FROM `Employees(Shamov)`");
		header('Location: /');
	}
	else
	{
		show_error_message("Некорректный ввод.");
	}
}

else if (isset($_POST['update_jobpos']))
{
?>
	<dialog open="open">
		<p align="center">Отправка формы</p>

		<form method="POST" align="center">
			<p>Название должности:</p>
			<p><input type="text" name="update_pos"></p>
			<input type="hidden" name="jobpos_code" value=<?=$_POST['jobpos_code']?>>
	    	<input type="submit" value="Подтвердить">
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Закрыть</button>
	  	</form>
	</dialog>
<?php
}
else if (isset($_POST['update_pos']))
{
	$position = (string)$_POST['update_pos'];
	$pos_code = (int)$_POST['jobpos_code'];
	$update_query = "UPDATE `" . $table_name . "` 
		SET Position = '" . $position . "' 
		WHERE Code = " . $pos_code;
	if (mysqli_multi_query($db_induction, $update_query))
	{
		$select_query2 = mysqli_query($db_induction, "SELECT * FROM `" . $table_name . "`");
		header('Location: /');
	}
	else
	{
		show_error_message("Некорректный ввод.");
	}
}

else if (isset($_POST['delete_jobpos']))
{
?>
	<dialog open="open">
		<p align="center">Удалить запись с индексом <?=(int)$_POST['jobpos_code']?></p>

		<form method="POST" align="center">
			<input type="hidden" name="jobpos_code" value=<?=$_POST['jobpos_code']?>>
	    	<input type="submit" value="Подтвердить">
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Отменить</button>
	  	</form>
	</dialog>
<?php
}
else if (isset($_POST['jobpos_code']))
{
	$delete_query = "DELETE FROM `" . $table_name . "` 
		WHERE Code = " . (int)$_POST['jobpos_code'];
	if (mysqli_query($db_induction, $delete_query))
	{
		$select_query2 = mysqli_query($db_induction, "SELECT * FROM `" . $table_name . "`");
		header('Location: /');
	}
	else
	{
		show_error_message("Ошибка.");	
	}
}

else if (isset($_POST['rename_button']))
{
?>
	<dialog open="open">
		<p align="center">Отправка формы</p>

		<form method="POST" align="center">
			<p>Новое имя таблицы:</p>
			<p><input type="text" name="new_name"></p>
	    	<input type="submit" value="Подтвердить">
	  	</form>

	  	<br>

		<form method="dialog" align="center">
	    	<button>Закрыть</button>
	  	</form>
	</dialog>
<?php
}
else if (isset($_POST['new_name']))
{
	$new_name = $_POST['new_name'];
	$rename_query = "RENAME TABLE `Lab4(Shamov)`.`" . $table_name . "` 
		TO `Lab4(Shamov)`.`" . $new_name . "`";
	if (mysqli_query($db_induction, $rename_query))
	{
		$table_name = $new_name;
		$select_query2 = mysqli_query($db_induction, "SELECT * FROM `" . $table_name . "`");
		header('Location: /');
	}
	else
	{
		show_error_message("Ошибка");
	}
}
?>