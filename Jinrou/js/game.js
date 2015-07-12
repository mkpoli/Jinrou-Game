window.onload = interval();

function interval(){
    // window.setInterval("resetColor()", 3000);
    window.setInterval("freshData()", 3000);
}

var alldata;
$.ajaxSetup({async:false});
$.post("ajax.php", { "alldata" : "alldata" }, function(data) {
	// alert(JSON.stringify(data));
	alldata = eval('(' + data + ')');
	return true;
});

function resetColor() {
	for (var i = 0; i < 9; i++) {
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
	for (var i = 0; i < 9; i++) {
		$('#tag' + (i + 1)).html(((i >= alldata[0].length) ? "<span class=\"outline\">[ 离线 ]</span>" : alldata[0][i]));
	}
}	

function freshData() {
	$.post("ajax.php", { "alldata" : "alldata" }, function(data) {
		// alert(JSON.stringify(data));
		alldata = eval('(' + data + ')');
		return true;
	});
	// alert(alldata[0][2]);
	freshName();
	resetColor();
}


// var count;
