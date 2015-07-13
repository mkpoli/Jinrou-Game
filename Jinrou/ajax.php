<?php
require 'utils.php';

function getPlayerData($contents, $enabled) {
	// global $contents, $enabled;
	return array($contents, $enabled);
}

function isEnabled_all_ajax($num_made) {
	return $enabled;
}

function deleteData_ajax($name) {
	return deletePlayer($name);
}

if (isset($_POST['action'])) {
    // deletefile($listfile);
    clearData();
}
// if (isset($_POST['num_made'])) {
// 	echo (isEnabled_ajax($_POST['num']) ? 1 : 0);
// }
// if (isset($_POST['num'])) {
// 	echo json_encode(isEnabled_all_ajax($_POST['num']));
// }
if (isset($_POST['alldata'])) {
	echo json_encode(getPlayerData());
}
// if (isset($_POST['current'])) {
// }
?>