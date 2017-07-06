$(document).ready( function() {
    var loader ='<img id="loader-img" alt="" src="icon.gif" width="100" height="100" />';
    $('#chat_thread').html('getting data'+'</br>'+loader).load("get_data.php");
    $("#chat_send").click( function() {

	$.ajax({
	    url:$('#chat_form').attr("action"),
	    method:"post",
	    data:$('#chat_form').serialize(),
	    success: function(data) {
		$("#chat_line").val( "" );
		$('#chat_thread').html('sending data'+'</br>'+ loader)
		$("#chat_thread").load( "get_data.php" );
	    }
	})
    });
    setInterval(function(){
	$("#chat_thread").load( "get_data.php" );
    }, 10000 )
    
})
