<?php
define('DB_HOST', "127.0.0.1");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "Lab4(Shamov)");
$db_induction = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($db_induction)
{
	$get_names_query = 
		"SELECT table_name 
		FROM information_schema.tables
		WHERE table_schema = 'Lab4(Shamov)'";
	$query_result = mysqli_query($db_induction, $get_names_query);
	$fetch_result = mysqli_fetch_array($query_result);
	$fetch_result = mysqli_fetch_array($query_result);
	$table_name = $fetch_result['TABLE_NAME'];
	if (!$table_name)
	{
		$table_name = "JobPositions(Shamov)";
	}
	$select_query1 = mysqli_query($db_induction, "SELECT * FROM `Employees(Shamov)`");
	$select_query2 = mysqli_query($db_induction, "SELECT * FROM `" . $table_name . "`");
}
?>