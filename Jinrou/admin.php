<?php
require 'lib/utils.php';
?>
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
				<h1>摸索吧！人狼游戏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;控制台</h1>
				<p>欢迎来到「摸索吧！人狼游戏」，此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
				<center>
					<tr>
						<td class="level-even">
							<a href="#" class="flatbtn level-even" id="newgame">新的游戏</a>
						</td>
						<td class="level-even">
							<a href="#" class="flatbtn level-even" id="gamestart">正在准备</a>
						</td>
						<td class="verti-even">
							<?php print_players(); ?>
						</td>
					</tr>
				</center>	
    		</div>
  		</div>
		<script type="text/javascript">
  			$('#newgame').click(function() {
       			var clickBtnValue = $(this).val();
				var ajaxurl = 'ajax.php',
        		data =  {'action': clickBtnValue};
				$.post(ajaxurl, data, function (response) {
				});
				location.reload(true);
  			});
		</script>
	</body>
</html>
