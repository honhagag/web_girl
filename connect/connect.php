<?php
include_once 'config.php';
$config = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$config)
{
 	die("BẢO TRÌ");   
}
else
{
	mysqli_set_charset($config,'utf8mb4');
}
function _query($sql) {
	GLOBAL $config;
	return mysqli_query($config,$sql);
}
function _fetch($sql) {
	return mysqli_fetch_array(_query($sql));
}
function isset_sql($txt) {
	GLOBAL $config;
	return mysqli_real_escape_string($config,$txt);
}
function _insert($table,$input,$output) {
	return "INSERT INTO $table($input) VALUES($output)";
}
function _select($select,$from,$where) {
	return "SELECT $select FROM $from WHERE $where";
}
function _update($tabname,$input_output,$where) {
	return "UPDATE $tabname SET $input_output WHERE $where";
}