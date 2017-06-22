$(document).ready( function() {
    $("#hoho").click( function() {
	var message = $("#huhu").val();

	$.ajax({
	    method: "post",
	    url: "test.php",
	    data: { new_msg:message }
	})
	    .done(function(data) {
		$("#msg").html(data);

	    })
	
    });
});
