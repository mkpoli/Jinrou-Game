<html>
	<head>
		<title>登录</title>
		<style type="text/css">
			.pos {
				position: absolute;
				top: 35%;
				left: 35%;
				border: 1px solid;
				border-spacing: 30px;
				padding: 10px 10px 10px 10px;

				-moz-border-radius: 10px;
				-webkit-border-radius: 10px;
				-ms-border-radius: 10px;
				-khtml-border-radius: 10px;
				border-radius: 10px;

				-moz-box-shadow:0 2px 5px #cbcbcb;
				-webkit-box-shadow:0 2px 5px #cbcbcb;
				box-shadow: 2px 2px 5px 0 #cbcbcb;
			}
		</style>
	</head>
	<body>
		<div id="posdiv" style="display:block">
			<form action="game.php" method="POST">
				<table class="pos" >
					<tr>
						<td>Name: </td>
						<td><input type="text" name="name" value="" ></td>
					</tr>
<!-- 					<tr>
						<td>password:</td>
						<td><input type="password" name="pass" value=""></td>
					</tr> -->
					<tr>
						<th colspan="2"><input type="submit" name="login" value="Login" /></th>
						<!-- <td><input type="radio" name="manage" value="manage"/>manage <input type="radio" name="user" value="user"/>user</td> -->
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
