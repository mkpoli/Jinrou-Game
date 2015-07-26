<?php
require '../utils.php';
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>摸索吧！人狼游戏</title>
		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../js/jquery.leanModal.min.changed.js"></script>
		<script type="text/javascript" src="../jwplayer/jwplayer.js"></script>
		<script type="text/javascript" src="../js/jquery.base64.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" media="all" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="../css/stylem.css" />
	</head>
	<body>
		<!-- 主要 -->
		<div id="w">
			<div id="content" class="center">
				<h1>摸索吧！人狼游戏</h1>
				<p class="center">欢迎来到「摸索吧！人狼游戏」，此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
				<div class="center" id="main">
					<div class="level-even">
						<a href="#" class="flatbtn level-even" id="rulesview">规则详览</a>
					</div>
					<div class="level-even">
						<a href="#" class="flatbtn level-even" id="gamestart">开始游戏</a>
					</div>
					<div class="verti-even">
					<?php print_ninzu(); ?>
					</div>
				</div>
				<!-- 登录 -->
				<div id="login" style="display:none;">
					<h2>玩家登录</h2>
					<form id="loginform" name="loginform" method="post" action="game.php">
			  			<label for="username">玩家名:</label>
			  			<input type="text" name="username" id="username" class="txtfield" tabindex="1">
			  			<div id="unusable" style="display:none; color:red;">※此名称不可用，请尝试更换</div>
			  			<!-- TODO: Select Icon -->
			  			<div class="center">
			  				<input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="登录" tabindex="3">
			  				<input type="button" name="closebtn" class="flatbtn-blu goback" value="返回" tabindex="3">
			  			</div>
					</form>
		  		</div>
		  		<!-- 规则 -->
		  		<div id="rule" style="display:none;" class="center">
					<h2>规则详览</h2>
					<div id="jwp">Loading the player...</div>
					<input type="submit" name="closebtn" class="flatbtn-blu goback" value="返回" tabindex="3">
		  		</div>
		  		<div class="version">版本 v' . VERSION . '</div>
			</div>
		</div>
		<script type="text/javascript">
			jwplayer.key=$.base64.atob("ZEdSbkVDQnptS3BoejdGclhhVTZLclZLZmpL" + $.base64.decode("YzFCdVlrTnlhbWtyUkVFOVBRPT0="));
			var playerInstance = jwplayer("jwp");
			playerInstance.setup({
				playlist: [{
					sources: [{
						file: "../video/rules.flv"
					},{
						file: "../video/rules.webm"
					}]
				}],
				primary: "flash",
				skin: {
					name: "roundster",
					active: "#4f94cf"
				}
			});
  			$("#gamestart").click(function() {
  				$("#main").hide();
  				$("#login").show();
  			});
			$("#rulesview").click(function() {
				$("#main").hide();
				$("#rule").show();
				resizePlayer(jwplayer(), $("#jwp").parent(), 0.9, 0.5625);
			});
			$(".goback").click(function() {
				$("#rule").hide();
				$("#login").hide();
				$("#main").show();
				jwplayer().stop();
			});
  			$("#loginbtn").click(function() {
  				var input = $("#username").val();
				var x = false;
				var alldata;
				$.ajaxSetup({ async : false });
				$.post(".\ajax.php", { "alldata" : "alldata" }, function(data) {
					alldata = eval(\'(\' + data + \')\');
					return true;
				});
				for (var i = 0; i < alldata[0].length; i++) {
					x = (x || input == alldata[0][i]);
				};
				if (x || input==="" || !input.match(/^[^\s\'"]$/)) {
					// can\'t use
					$("#unusable").show();
					return false;
				} else {
					// can use
					$("#unusable").hide();
					return true;
				}
  			});
			
			function resizePlayer(player, parent, w, hoverw) {
				player.resize(parent.width() * w, parent.width() * w * hoverw);
			}
		</script>
	</body>
</html>
';
?>
