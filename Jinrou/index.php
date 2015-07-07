<?php require 'lib/utils.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>摸索吧！人狼游戏 v1.0</title>
		<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="css\style.css">
	</head>
	<body>
		<!-- 主要 -->
		<div id="w">
			<div id="content">
				<h1>摸索吧！人狼游戏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v1.0</h1>
				<p>欢迎来到「摸索吧！人狼游戏」，此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
				<center>
					<tr>
						<td class="level-even">
							<a href="#rulevideo" class="flatbtn level-even" id="rulesview" rel="rulesview">规则详览</a>
						</td>
						<td class="level-even">
							<a href="#loginmodal" class="flatbtn level-even" id="gamestart" rel="gamestart">开始游戏</a>
						</td>
						<td class="verti-even">
							<?php print_players(); ?>
						</td>
					</tr>
				</center>	
			</div>
		</div>
		<!-- 登录窗口 -->
		<div id="loginmodal" style="display:none;">
			<h1>玩家登录</h1>
			<form id="loginform" name="loginform" method="post" action="game.php">
	  			<label for="username">玩家名:</label>
	  			<input type="text" name="username" id="username" class="txtfield" tabindex="1">
	  			<div id="unusable" style="display:none; color:red;">※此名称不可用，请尝试更换</div>
	  			<!-- TODO: Select Icon -->
	  			<div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="登录" tabindex="3"></div>
			</form>
  		</div>
  		<!-- 规则窗口 -->
  		<div id="rulevideo" style="display:none;text-align:center">
			<h1>规则详览</h1>
			<div id="thevideo">
				<object type="application/x-shockwave-flash" data="video/player.swf" width="1280" height="720">
	 				<param name="movie" value="video/player.swf" />
	 				<param name="FlashVars" value="flv=rules.flv" />
				</object>
			</object>
			</div>
			<input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu closemodal" value="关闭" tabindex="3">
  		</div>
		<script type="text/javascript">
			function StandardPost(url,args) 
			{
				var form = $("<form method='post'></form>");
				form.attr({"action":url});
				for (arg in args)
				{
					var input = $("<input type='hidden'>");
					input.attr({"name":arg});
					input.val(args[arg]);
					form.append(input);
				}
				form.submit();
			}
			$('#loginform').submit(function(e) {


			});
  			$("#loginbtn").click(function() {
  				var input = $("#username").val();
				var x = false;
				<?php
				if ($contents === array()) {
					echo "x = false;";
				} else {
					foreach($contents as $value) {
						echo "x = (x || input ===\"$value\");\n";
					}
				}
				?>
				if (x || input==="" || !input.match(/^[A-Za-z0-9\u2E80-\u9FFF]+$/)) {
					// can't use
					$("#unusable").show();
					return false;
				} else {
					// can use
					$("#unusable").hide();
					return true;
				}
  			});

  			$('a[rel*=gamestart]').leanModal({ top: 110, overlay: 0.45 });
  			$('a[rel*=rulesview]').leanModal({ top: 50, overlay: 0.45, closeButton: ".closemodal" });

		</script>

	</body>
</html>
