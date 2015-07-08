<?php
// TODO: Fix after refresh, self showing
// TODO: Fix color
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
<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>摸索吧！人狼游戏 v1.0</title>
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css\style.css">
	
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
			<p>你好，「<?php echo $name;?>」，欢迎来到「摸索吧！人狼游戏」，<br>
			此版本为内测版，可能出现一些不可预料的意外，请谅解！</p>
			<p id="time">第01日</p>
			<p id="daynight">现在是白天</p>
			<div id="avatars">
				<div id="tesa">
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar1" src="css\images\01.jpg"></div><p class="tag" id="tag1"><?php echo(getName(1));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar2" src="css\images\02.jpg"></div><p class="tag" id="tag2"><?php echo(getName(2));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar3" src="css\images\03.jpg"></div><p class="tag" id="tag3"><?php echo(getName(3));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar4" src="css\images\04.jpg"></div><p class="tag" id="tag4"><?php echo(getName(4));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar5" src="css\images\05.jpg"></div><p class="tag" id="tag5"><?php echo(getName(5));?></p></div>
				</div>
				<div id="puru">
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar6" src="css\images\06.jpg"></div><p class="tag" id="tag6"><?php echo(getName(6));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar7" src="css\images\07.jpg"></div><p class="tag" id="tag7"><?php echo(getName(7));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar8" src="css\images\08.jpg"></div><p class="tag" id="tag8"><?php echo(getName(8));?></p></div>
					<div class="nametag"><div class="adiv"><img class="avatar" id="avatar9" src="css\images\09.jpg"></div><p class="tag" id="tag9"><?php echo(getName(9));?></p></div>
				</div>

			</div>
			<script type="text/javascript">
				function isEnable(num) {
					$.post("ajax.php", { "num" : num }, function(data) {
						console.log(data);
						return (data == 0);
					});
				}

				function resetColor() {
					for (var i = 1; i <= 9; i++) {
						if (!isEnable(i)) {
							console.log("It's disabled.");
							$("#avatar" + i).attr("class", function(i, orig) {
								return orig + " gray";
							});
						}
					}
					alert('setted');
				}

				function interval(){
				    window.setInterval("resetColor()", 3000);
				}
				window.onload = interval();				
			</script>
			<!-- Timer -->
			<p id="time-left" style="display:none;">公开讨论时间剩余<span id="clock">04:00</span></p>
			<script type="text/javascript">
				var timerTime = 0,          // Time set on the interval.
				    timerInterval = 0;      // The interval for our loop.

				var def_interval = 240;

				var timerClock = $("#clock"),
				    timerInput = $('#timer-input'),
				    timerSoundsButton = $('#timer-sounds');

				// ON CHANGING TIME
				// When entering new time, the app will trim it and turn it into seconds (*60).
				timerInput.on('change', function () {
				    timerTime = def_interval;
				    localStorage.lastTimerTime = newTime;
				    timerClock.text(returnFormattedToSeconds(timerTime));
				});

				$('.timer-btn.start').on('click',function(){
				    if(timerTime>0) {
				        startTimer();
				    }
				});

				$('.timer-btn.pause').on('click', function () {
				    pauseTimer();
				});

				$('.timer-btn.reset').on('click', function () {
				    resetTimer();
				});

				// Timer sounds button

				timerSoundsButton.on('change', function () {
				    localStorage.timerSounds = this.checked;
				});

				// Clicking on the clock.

				timerClock.on('click',function(e){

				    if(timerClock.hasClass('inactive')){
				        if(timerTime>0) {
				            startTimer();
				        }
				    }
				    else{
				        pauseTimer();
				    }

				});

				function startTimer() {
				    // Prevent multiple intervals going on at the same time.
				    clearInterval(timerInterval);

				    // Every 1000ms (1 second) decrease the set time until it reaches 0.
				    timerInterval = setInterval(function () {
				        timerTime--;
				        timerClock.text(returnFormattedToSeconds(timerTime));

				        if (timerTime <= 0) {
				            if(localStorage.timerSounds == 'true'){
				                alarmSound.play();
				            }

				            timerClock.text(returnFormattedToSeconds(0));

				            $('#times-up-modal').openModal();

				            pauseTimer();
				        }
				    }, 1000);

				    timerInput.prop('disabled', true);
				    timerClock.removeClass('inactive');
				}


				function pauseTimer(){
				    clearInterval(timerInterval);

				    timerInput.prop('disabled', false);
				    timerClock.addClass('inactive');
				}

				// Reset the clock with the previous valid time.
				// Useful for setting the same alarm over and over.
				function resetTimer(){
				    pauseTimer();

				    if(Number(localStorage.lastTimerTime)){
				        timerTime = Number(localStorage.lastTimerTime) * 60;
				        timerClock.text(returnFormattedToSeconds(timerTime));
				    }
				}


				// Dismissing alarm sounds from the modal.

				$('.dismiss-alarm-sounds').on('click', function(){
				    alarmSound.pause();
				    alarmSound.currentTime = 0;

				    $('#times-up-modal').closeModal();
				});


				function returnFormattedToSeconds(time) {
				    var minutes = Math.floor(time / 60),
				        seconds = Math.round(time - minutes * 60);

				    seconds = seconds < 10 ? '0' + seconds : seconds;

				    return minutes + ":" + seconds;
				}
			</script>
			<p id="time-up" style="display:none;">公开讨论时间到，请投票放逐</p>
			<!-- Result -->
			<p class="result" id="nokill" style="display:none;">今夜狼人似乎无暇外顾</p>
			<p class="result" id="killed" style="display:none;">今夜XXX惨遭毒手</p>
			<p class="result" id="protected" style="display:none;">今夜XXX受到剑道部部员的保护。免遭毒手</p>
			<center>
				<tr>
					<td class="level-even">
						<a href="#rulevideo" class="flatbtn level-even" id="rulesview" rel="rulesview">规则详览</a>
					</td>
					<td class="level-even">
						<a href="#loginmodal" class="flatbtn level-even" id="gamestart" rel="gamestart">投票</a>
					</td>
				</tr>
			</center>	
		</div>
		</div>
</body>
</html>