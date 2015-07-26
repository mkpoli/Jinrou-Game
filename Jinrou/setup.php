<?php
// echo str_repeat(" ", 1024);
echo '
<!DOCTYPE html>
<html>
<head>
	<title>Setup</title>
</head>
<body>
';

// if (!ON_DEV) {
// 	error_reporting(0);
// }
require 'config.php';
echo "<p><span style=\"font-weight: bold;color: #f00;\">For safety, you must delete this file after running once.</span></p>";
echo "<p><span style=\"color: #f00;\">Before running setup, please set the database config constants starts with DB_, or it will setup as default settings. It will start in 10 seconds.</span></p><p>";
if (!ON_DEV) {
	for ($i = 9; $i > 0; $i--) { 
		ob_flush();
		flush();
		sleep(1);
		echo "$i ";
	}
	echo "</p>";
}


// Step I
echo "<p>Checking if already setup... ";
$sql = 'SELECT COUNT(*) AS `exists` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMATA.SCHEMA_NAME="' . DB_NAME . '"';
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
// $link = mysqli_connect(DB_HOST, "fhd", "ffsjdg");
// if (ON_DEV) {
// 	echo "<br />" . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
// }
// if (!$link) {
if (mysqli_connect_errno()) {
	echo "No. Connection failed. Please check if your database config is properly set. Error number : " . (ON_DEV ? mysqli_connect_errno() . " " . mysqli_connect_error() : mysqli_connect_errno()) . "</p>";
	exit();
} else {
	$query = mysqli_query($link, $sql);
	if ($query === false) {
		echo "No. Quering failed. Please check if your database config is properly set. Error number : " . (ON_DEV ? mysqli_connect_errno() . " " . mysqli_connect_error() : mysqli_connect_errno()) . "</p>";
		exit();
	} else {
		$row = $query->fetch_object();
		$dbExists = (bool) $row->exists;
		if ($dbExists) {
			echo "Yes. Database has already been created.</p><p>Exiting...</p>";
			exit();
		} else {
			echo "No</p>";
		}

	}
}
ob_flush();
flush();

// Step II
$sql = '
CREATE DATABASE ' . DB_NAME . ';
USE ' . DB_NAME . ';
--
-- Table structure for table `players`
--
DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Status` bit(1) DEFAULT NULL,
  `TTL` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
';
echo "<p>Setting up database... ";
mysqli_multi_query($link, $sql);

if (mysqli_connect_errno()) {
	echo "Failed : " + (ON_DEV ? mysqli_connect_errno() . " " . mysqli_connect_error() : mysqli_connect_errno()) + "</p> Exiting...";
} else {
	echo "OK</p>";
	exit();
}

echo '
</body>
</html>
';
mysqli_close($link);
?>

