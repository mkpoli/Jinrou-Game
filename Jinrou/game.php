<?php
// TODO: Fix after refresh, self name showing?
// ???
// error_reporting(E_ALL^E_NOTICE);
require 'lib/utils.php';
$name = "";
if (array_key_exists("username", $_POST) and ($_POST["username"] != "")) {
	Register($_POST["username"]);
	$name = $_POST["username"];
} else {
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>摸索吧！人狼游戏 v1.0</title>
		<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<script type="text/javascript" src="js/game.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
	</head>
	<body id="gamepage">
		<video autoplay poster="css/images/gameback.jpg" id="bgvid">
			<source src="video/start.mp4">
		</video>
		<script type="text/javascript">
		$("#bgvid").bind("ended", function() {
			$("#bgvid").hide();
			$("#w").show();
		});
		</script>
		<!-- 主要 -->
		<div id="w" style="display:none;">
			<div id="content" class="center">
				<h1>摸索吧！人狼游戏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v1.0</h1>
				<p>你好，「<?php echo $name;?>」，欢迎来到「摸索吧！人狼游戏」，<br />
				此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
				<p id="time">第01日</p>
				<p id="daynight">现在是白天</p>
				<div id="avatars">
					<div id="tesa">
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar1" alt="avartar" src="css/images/01.jpg" /></div><p class="tag" id="tag1"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar2" alt="avartar" src="css/images/02.jpg" /></div><p class="tag" id="tag2"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar3" alt="avartar" src="css/images/03.jpg" /></div><p class="tag" id="tag3"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar4" alt="avartar" src="css/images/04.jpg" /></div><p class="tag" id="tag4"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar5" alt="avartar" src="css/images/05.jpg" /></div><p class="tag" id="tag5"></p></div>
					</div>
					<div id="puru">
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar6" alt="avartar" src="css/images/06.jpg" /></div><p class="tag" id="tag6"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar7" alt="avartar" src="css/images/07.jpg" /></div><p class="tag" id="tag7"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar8" alt="avartar" src="css/images/08.jpg" /></div><p class="tag" id="tag8"></p></div>
						<div class="nametag"><div class="adiv"><img class="avatar" id="avatar9" alt="avartar" src="css/images/09.jpg" /></div><p class="tag" id="tag9"></p></div>
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
			</div>
			</div>
	</body>
</html>