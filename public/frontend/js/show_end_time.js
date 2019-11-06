$(document).ready(function(){
	if(typeof end_at == "object"){
		$(".show_end_time").remove();
		$("#content").prepend('<div class="show_end_time text-right" style="padding:15px;"></div>');
		show_end_time();
		window.setInterval(show_end_time, (1000));	
	}

});

function show_end_time(){
	var started_at = new Date(	new Date().toLocaleString('en-US', {timeZone: timezone}) );
	
	var diff = end_at.getTime() - started_at.getTime(); // this is a time in milliseconds
	var hours = Math.floor(diff / 1000 / 60 / 60);
	
	diff -= hours * 1000 * 60 * 60;
	var minutes = Math.floor(diff / 1000 / 60);
	
	diff -= minutes * 1000 * 60;
	var seconds = Math.floor(diff / 1000);
	
	// If using time pickers with 24 hours format, add the below line get exact hours
	if (hours < 0)
	   hours = hours + 24;
	
	if(seconds < 10)
		seconds = '0' + seconds;
	var html = 		'Registration code will expire in '+
			   		'<strong class="hours text-danger">'+hours+'</strong> Hours, '+
					'<strong class="minutes text-danger">'+minutes+'</strong> Minutes and '+
					'<strong class="seconds text-danger">'+seconds+'</strong> Seconds';
	
	if(hours <= 0 && minutes <= 0 && seconds <= 0){
		window.location.assign(baseURL + '/pages/videos/');	
	}
	
	$(".show_end_time").html(html);
	
}