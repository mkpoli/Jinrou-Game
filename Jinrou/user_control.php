<?php
require_once ('config.php');
// Connection
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	die('Failed connecting to data server: ' . mysqli_connect_error());
	exit();
}
mysqli_set_charset($link, "utf8");

// Register a player
function registerData($name)
{
	global $link;
	$x = mysqli_query($link, "INSERT INTO players (Name, Status, TTL) VALUES ('$name', 1," . newTTL() . ")");
	// print_r($x);
	return $x;
}

// function isEnabled($id) {
// 	// mysqli_select_db("playerdata");
// 	$result = mysqli_query($linkm "SELECT * FROM");
// }

function getPlayerList()
{
	global $link;
	// mysqli_select_db("playerdata");
	$selected = mysqli_query($link, "SELECT * FROM players");
	$column = array();
	while ($row = mysqli_fetch_row($selected)) {
		// print_r($row);
    	$column[] = $row[1];
    }
    // print_r($column);
	return $column;
}

// getEnableList
function getEnableList()
{
	global $link;
	$selected = mysqli_query($link, "SELECT * FROM players");
	$column = array();
	while($row = mysqli_fetch_row($selected)){
    	$column[] = $row[2];
    }
    // print_r($column);
	return $column;
}

// Clear all data
function clearData()
{
	global $link;
	return mysqli_query($link, "truncate table players");
}

function deletePlayer($name)
{
	global $link;
	return mysqli_query($link, "DELETE FROM players WHERE Name='$name'");
}

function getTTLList()
{
	global $link;
	$selected = mysqli_query($link, "SELECT * FROM players");
	$column = array();
	while($row = mysqli_fetch_row($selected)){
    	$column[] = $row[3];
    }
    // print_r($column);
	return $column;
}

function freshTTL($name)
{
	global $link;
	return mysqli_query($link, "UPDATE players SET TTL = " . newTTL() . " WHERE Name='$name'");
}

function newTTL()
{
	return time() + INTERVAL;
}

function doCheck()
{
	global $link;
	$now = time();
	return mysqli_query($link, "DELETE FROM players WHERE $now>TTL");
}
?>