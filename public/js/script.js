$('#card1').hover(function() {
		$('#label1').toggle();
		$('#progress1').toggle();
	});
	$('#card2').hover(function() {
		$('#label2').toggle();
		$('#progress2').toggle();
	});
	
	$('#first').mouseenter(function() {
	  $(this).hide();
		$('#second').show();
	});

	$('#second').mouseleave(function() {
	  $(this).hide();
		$('#first').show();
	});
	$('#third').mouseenter(function() {
	  $(this).hide();
		$('#forth').show();
	});

	$('#forth').mouseleave(function() {
	  $(this).hide();
		$('#third').show();
	});
	$('.next').on('click', function() {
		$('#signin').removeClass('active');
		$('#signup').addClass('active');
		$('#signin-tab').removeClass('active');
		$('#signup-tab').addClass('active');
	});