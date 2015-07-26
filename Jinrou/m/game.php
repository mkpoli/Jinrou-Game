<?php
// error_reporting(E_ALL^E_NOTICE);
require_once ('..\utils.php');
// require 'interval.php';
$name = "";
// if (isset($_POST['username']) and ($_POST["username"] != "") and (preg_match('/^[A-Za-z0-9\u2E80-\u9FFF]+$/', $_POST["username"]))) {
if (isset($_POST['username']) and (!preg_match('/^[^\s\'"]$/', $_POST["username"]))) {
	$name = $_POST["username"];
	Register($_POST["username"]);
} else {
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>摸索吧！人狼游戏</title>
		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../js/jquery.leanModal.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="../css/style.css" />
	</head>
	<body id="gamepage">
		<!-- 主要 -->
		<div id="w">
			<div id="content" class="center">
				<h1>摸索吧！人狼游戏</h1>
				<p>你好，「<span id="currentname"><?php echo $name;?></span>」，欢迎来到「摸索吧！人狼游戏」，<br />
				此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
				<p id="time">第01日</p>
				<p id="daynight">现在是白天</p>
				<div id="avatars">
					<div id="tesa">
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar1" alt="avatar" src="../css/images/01.jpg" /></div><p class="tag" id="tag1"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar2" alt="avatar" src="../css/images/02.jpg" /></div><p class="tag" id="tag2"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar3" alt="avatar" src="../css/images/03.jpg" /></div><p class="tag" id="tag3"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar4" alt="avatar" src="../css/images/04.jpg" /></div><p class="tag" id="tag4"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar5" alt="avatar" src="../css/images/05.jpg" /></div><p class="tag" id="tag5"></p></div>
					</div>
					<div id="puru">
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar6" alt="avatar" src="../css/images/06.jpg" /></div><p class="tag" id="tag6"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar7" alt="avatar" src="../css/images/07.jpg" /></div><p class="tag" id="tag7"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar8" alt="avatar" src="../css/images/08.jpg" /></div><p class="tag" id="tag8"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar9" alt="avatar" src="../css/images/09.jpg" /></div><p class="tag" id="tag9"></p></div>
						<div class="nametag" id="tomomi"><div class="adiv"><img class="avatar" id="avatar10" alt="avatar" src="../css/images/10.jpg" /></div><p class="tag" id="tag10"></p></div>
					</div>

				</div>
				<!-- Timer -->
				<p id="time-left" style="display:none;">公开讨论时间剩余<span id="clock">04:00</span></p>
				<p id="time-up" style="display:none;">公开讨论时间到，请投票放逐</p>
				<!-- Result -->
				<p class="result" id="nokill" style="display:none;">今夜狼人似乎无暇外顾</p>
				<p class="result" id="killed" style="display:none;">今夜XXX惨遭毒手</p>
				<p class="result" id="protected" style="display:none;">今夜XXX受到剑道部部员的保护。免遭毒手</p>
				<div class="center">
					<div class="level-even">
						<a href="#" class="flatbtn level-even" id="special">特殊</a>
					</div>
					<div class="level-even">
						<a href="#" class="flatbtn level-even" id="vote">投票</a>
					</div>
				</div>
				<div class="version">版本 v<?php echo VERSION ?></div>
			</div>
			</div>
			<script type="text/javascript" src="../js/gamem.js"></script>
	</body>
</html>