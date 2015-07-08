<?php
require 'lib/utils.php';

function deletefile($filename) {
    if (!unlink($filename)) {
        console_err("Error deleting $filename");
    } else {
        console_log("Deleted $filename");
    }
}

function isEnabled_ajax($num) {
	return isEnabled($num - 1);
}

if (isset($_POST['action'])) {
    // deletefile($listfile);
    clearData();
}
if (isset($_POST['num'])) {
	echo (isEnabled_ajax($_POST['num']) ? 1 : 0);
}
?>