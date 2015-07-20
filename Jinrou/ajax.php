<?php
require_once ('utils.php');
header("Content-type: text/plain; charset=UTF-8");
function getPlayerData()
{
	global $contents, $enabled;
	return array($contents, $enabled);
}

function isEnabled_all_ajax($num_made)
{
	return $enabled;
}

function deleteData_ajax($name)
{
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
	doCheck();
	echo json_encode(getPlayerData());
}
if (isset($_POST['current'])) {
	freshTTL($_POST['current']);
}
if (isset($_POST['deadline'])) {
	return $deadline;
}
?>