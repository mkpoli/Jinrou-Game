/**
 * Initialize
 * Set update() (ajax) updateClient() (client).
 * Close the video and open the main.
 * Set click event for selecting.
 */
$(document).ready(function() {
	window.setInterval("update()", 3000);
	window.setInterval("updateClient()", 100);
	for (var i = 0; i < 10; i++) {
		$("#avatar" + (i + 1)).bind("click", function() {
			setSelecting($(this).attr("id").charAt(6));
		});
	}
});

/**
 * Bind beforeunload event for preventing exit.
 */
$(window).bind('beforeunload', function() {
	return "真的想退出游戏么，" + currentPlayer() + "？";
});

/**
 * Change the value of selecting[]
 */
function setSelecting(t) {
	var num = parseInt(t);
	selecting[num] = !selecting[num];
}

/**
 * This variable is a container for data.
 * alldata[0] (Array) is for players' names.
 * alldata[1] (Array) is for players' status.
 */
var alldata;

/**
 * Check if selected
 */
var selecting = [false, false, false, false, false, false, false, false, false, false];

/**
 * Reset Color if someone is die or offline.
 */
function resetColor() {
	for (var i = 0; i < 10; i++) {
		// console.log("isEnable: " + (isEnable(i) == true));
		if (!alldata[1][i]) {
			// console.log("It's disabled.");
			$("#avatar" + (i + 1)).attr("class", "avatar gray");
		} else {
			$("#avatar" + (i + 1)).attr("class", "avatar");
		}
	}
}

/**
 * Reset name.
 */
function freshName() {
	// alert(alldata[0]);
	for (var i = 0; i < 10; i++) {
		$('#tag' + (i + 1)).html(((i >= alldata[0].length) ? "<span class=\"outline\">[ 离线 ]</span>" : alldata[0][i]));
	}
}	

/**
 * Update by ajax.
 */
function update() {
	$.post("../ajax.php", { "alldata" : "alldata", "current" : currentPlayer() }, function(data) {
		// alert(JSON.stringify(data));
		alldata = eval('(' + data + ')');
		return true;
	});
	try {
		if (alldata[0].length >= 10) {
			$('#tomomi').show();
		} else {
			$('#tomomi').hide();
		}
		freshName();
		resetColor();
	} catch (error) {
		// 放置play
	}
	// alert(alldata[0][2]);
};

/**
 * Update of client.
 */
function updateClient() {
	for (var i = 0; i < alldata[1].length; i++) {
		// console.log("alldata[1][" + i + "] : " + alldata[1][i]);
		if (selecting[i]) {
			$("#avatar" + (i + 1)).attr("class", "avatar selected");
		} else {
			$("#avatar" + (i + 1)).attr("class", "avatar");
		}
	}
}

function deleteData(name) {
	$.post("../ajax.php", { "exit" : name });
}

function currentPlayer() {
	return $("#currentname").text();
}

function getDeadLine() {
	var deadline;
	$.post("../ajax.php", { "deadline" : "deadline"}, function(data) {
		deadline = data;
	});
}

// TODO: Change result.
function changeResult(kekka) {
	$("#xx").show();
}
