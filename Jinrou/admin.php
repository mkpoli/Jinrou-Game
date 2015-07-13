<?php require 'utils.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>摸索吧！人狼游戏 v1.0</title>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" media="all" href="css\style.css">
	</head>
	<body>
		<!-- 主要 -->
		<div id="w">
			<div id="content">
				<h1>摸索吧！人狼游戏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;控制台</h1>
				<p class="center">欢迎来到「摸索吧！人狼游戏」，此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
				<div class="center">
					<div class="level-even">
						<a href="#" class="flatbtn level-even" id="newgame">新的游戏</a>
					</div>
					<div class="verti-even">
						<?php print_players(); ?>
					</div>
				</div>
    		</div>
  		</div>
		<script type="text/javascript">
  			$('#newgame').click(function() {
				$.post('ajax.php', { 'action' : 'clear' }, function(response) {});
				location.reload(true);
  			});
  			function refresh() {
  				location.reload(true);
  			}
  			setTimeout("refresh()", 3000);
		</script>
	</body>
</html>
