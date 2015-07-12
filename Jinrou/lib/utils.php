<?php
// Logging
function console_log($data) {
	if (is_array($data) || is_object($data))
	{
		echo("<script>console.log('".json_encode($data)."');</script>");
	}
	else
	{
		echo("<script>console.log('".$data."');</script>");
	}
}

function console_err($data) {
	if (is_array($data) || is_object($data))
	{
		echo("<script>console.error('".json_encode($data)."');</script>");
	}
	else
	{
		echo("<script>console.error('".$data."');</script>");
	}
}

// Main
require "user_control.php";

// Userdata
$contents = getPlayerList();
$count = count($contents);
// print_r($contents);
$enabled = getEnableList();
// print_r($enabled);

// if (!file_exists($listfile)) {
// 	console_err("List file does not exist. One will be created.");
// 	fclose(fopen($listfile, "w"));
// 	$contents = array();
// } else {
// 	$handle = fopen($listfile, "r");
// 	if ($handle) {
// 		while($text = stream_get_line($handle, 8192, "\n")) {
// 			$count++;
// 			$contents[$count] = trim($text);
// 		}
// 	}
// 	fclose($handle);
// }


function print_players() {
	global $count, $contents;
	echo '<p class="verti-even">已登录人数：';
	echo $count;
	echo "<br>	";
	for ($i = 0; $i < $count; $i++) { 
		echo $contents[$i]."<br>";
	}
	echo "</p>";
}

function print_ninzu() {
	global $count;
	echo '<p class="verti-even">已登录人数：' . $count . '</p>';
}

// Registration
function isRegistered($name) {
	global $contents; // Get name list
	return in_array($name, $contents);
}

// function Register($name) {
// 	global $listfile, $count;
// 	if (($name != "") and !isRegistered($name)) {
// 		$handle = fopen($listfile, "a");
// 		fwrite($handle, $name."\n");
// 		$enabled[++$count] = true;
// 		return true;
// 	} else {
// 		return false;
// 	}
// }

function Register($name) {
	// global $listfile, $count;
	global $count;
	if (($name != "") and !isRegistered($name)) {
		// $handle = fopen($listfile, "a");
		// fwrite($handle, $name."\n");
		// $enabled[++$count] = true;
		registerData($name);
		return true;
	} else {
		return false;
	}
}

function getName($num) {
	global $count, $contents;
	// print_r($count);
	return ($count < $num) ? '<span class="outline">[ 离线 ]</span>' : '<span>'.$contents[$num - 1].'</span>';
}
function isEnabled($num) {
	global $enabled;
	if (!in_array($num, $enabled)) {
		return false;
	}
	return $enabled[$num];
}
?>
