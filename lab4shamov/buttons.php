<form method="POST" align="center">
<?php
	if (!$select_query2)
		{
		?>
			<button name="create_button">
			<h5>Создать таблицу</h5>
			</button>
		<?php
		}
		else
		{
		?>
			<button name="add_button">
			<h5>Добавить запись</h5>
			</button>

			&nbsp;&nbsp;

			<button name="truncate_button">
			<h5>Очистить таблицу</h5>
			</button>

			&nbsp;&nbsp;

			<button name="rename_button">
			<h5>Переименовать таблицу</h5>
			</button>

			&nbsp;&nbsp;

			<button name="drop_button">
			<h5>Удалить таблицу</h5>
			</button>

			&nbsp;&nbsp;

			</form>
			<br>
			<center>
				<a href="ShowInnerJoinResult.php" target="_blank">
					<button name="join_button">
					<h5>INNER JOIN</h5>
					</button>
				</a>
			</center>
			<form method="POST" align="center">
			<?php
		}
?>
</form>