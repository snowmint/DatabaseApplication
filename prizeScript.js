$().ready(function() {
	$("#flip1").click(function () {
		console.log("click1");
	    $flipper = $("#flipper1");

	    $("#flip2").unbind('click');
	    $("#flip3").unbind('click');
	    
	    $flipper.addClass("flipped");
        $("#reset").show();
	});
	$("#flip2").click(function () {
		console.log("click2");
	    $flipper = $("#flipper2");

	    $("#flip3").unbind('click');
	    $("#flip1").unbind('click');
	    
	    $flipper.addClass("flipped");
        $("#reset").show();
	});
	$("#flip3").click(function () {
		console.log("click3");
	    $flipper = $("#flipper3");

	    $("#flip2").unbind('click');
	    $("#flip1").unbind('click');
	    
	    $flipper.addClass("flipped");
        $("#reset").show();
	});
    $("#reset").click(function () {
		history.go(0);
	});
});

