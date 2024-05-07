<?php
require_once 'database.php';

if ($db_induction)
{
	$query = "SELECT * FROM `Employees(Shamov)`";
	$result_query = mysqli_query($db_induction, $query);
}

if(isset($_POST['query_button1']))
{
	if ($db_induction)
	{
		$query1 = "SELECT Surname, Name, Patronymic, Phone_Number, Salary FROM `Employees(Shamov)`";
		$result_query1 = mysqli_query($db_induction, $query1);
		$is_out1 = true;
	}
}
else
{
	$is_out1 = false;
}

if(isset($_POST['query_button2'] ) )
{
	if ($db_induction)
	{
		$query2 = "SELECT Surname, Name, Patronymic, Adress FROM `Employees(Shamov)` ORDER BY Adress";
		$result_query2 = mysqli_query($db_induction, $query2);
		$is_out2 = true;
	}
}
else
{
	$is_out2 = false;
}

if(isset($_POST['query_button3'] ) )
{
	if ($db_induction)
	{
		$query3 = "SELECT Surname, Name, Patronymic, Work_Time FROM `Employees(Shamov)` WHERE Work_Time > 4";
		$result_query3 = mysqli_query($db_induction, $query3);
		$is_out3 = true;
	}
}
else
{
	$is_out3 = false;
}
?>