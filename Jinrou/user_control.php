<?php
// TODO: Chinese & Japenese Supporting
$link = mysqli_connect("localhost", "root", "", "playerdata");
if (mysqli_connect_errno()) {
	die('Failed connecting to data server: ' . mysqli_connect_error());
	exit();
}
mysqli_set_charset($link, "utf8");
// mysqli_query($link, "set names utf8");
// mysqli_close($link);

function isEmpty() {

	return false;
}

// function creatNewTable() {
// 	$x = mysqli_query("CREATE DATABASE playerdata");
// 	mysqli_select_db("playerdata");
// 	$x = $x and mysqli_query("CREATE TABLE players
// 		(
// 			Id int NOT NULL AUTO_INCREMENT,
// 			PRIMARY KEY(Id),
// 			Name varchar(25),
// 			Status bit
// 		)");
// 	return $x;
// }

function registerData($name) {
	global $link;
	$x = mysqli_query($link, "INSERT INTO players (Name, Status) VALUES ('$name', 1)");
	print_r($x);
	return $x;
}

// function isEnabled($id) {
// 	// mysqli_select_db("playerdata");
// 	$result = mysqli_query($linkm "SELECT * FROM");
// }

function getPlayerList() {
	global $link;
	// mysqli_select_db("playerdata");
	$selected = mysqli_query($link, "SELECT * FROM players");
	$column = array();
	while($row = mysqli_fetch_row($selected)){
		// print_r($row);
    	$column[] = $row[1];
    }
    // print_r($column);
	return $column;
}

function getEnableList() {
	global $link;
	$selected = mysqli_query($link, "SELECT * FROM players");
	$column = array();
	while($row = mysqli_fetch_row($selected)){
    	$column[] = $row[2];
    }
    // print_r($column);
	return $column;
}

function clearData() {
	global $link;
	return mysqli_query($link, "truncate table players");
}
?>