$(document).ready(function() {
	window.setInterval("update()", 3000);
});
$(window).bind('beforeunload', function() {
	alert(currentPlayer());
	// deleteData($("#currentname").text());
	return "真的想退出游戏么？";
});

var alldata;
// $.ajaxSetup({async:false});
// $.post("ajax.php", { "alldata" : "alldata" }, function(data) {
// 	// alert(JSON.stringify(data));
// 	alldata = eval('(' + data + ')');
// 	return true;
// });

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

function freshName() {
	// alert(alldata[0]);
	for (var i = 0; i < 10; i++) {
		$('#tag' + (i + 1)).html(((i >= alldata[0].length) ? "<span class=\"outline\">[ 离线 ]</span>" : alldata[0][i]));
	}
}	

function update() {
	$.post("ajax.php", { "alldata" : "alldata", "current" : currentPlayer() }, function(data) {
		// alert(JSON.stringify(data));
		alldata = eval('(' + data + ')');
		return true;
	});
	// alert(alldata[0][2]);
	if (alldata[0].length >= 10) {
		$('#tomomi').show();
	} else {
		$('#tomomi').hide();
	}
	freshName();
	resetColor();
}

function deleteData(name) {
	$.post("ajax.php", { "exit" : name });
}

function currentPlayer() {
	return $("#currentname").text();
}
// var count;
