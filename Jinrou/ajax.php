<?php
require 'lib/utils.php';

function deletefile($filename) {
    if (!unlink($filename)) {
        console_err("Error deleting $filename");
    } else {
        console_log("Deleted $filename");
    }
}

function getPlayerData_ajax() {
	global $contents, $enabled;
	return array($contents, $enabled);
}

function isEnabled_all_ajax($num_made) {
	return $enabled;
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
	echo json_encode(getPlayerData_ajax());
}
?>