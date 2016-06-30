function roll() {
    var val = $("body").find("select, input").serialize();
    $.post('roll.php',val,function(result) 	{
		$(".main").html(result);
    });
}

function suggest() {
    var val = $("body").find("select, input").serialize();
    $.post('suggestion.php',val,function(result) 	{
		$(".main2").html(result);
    });
}