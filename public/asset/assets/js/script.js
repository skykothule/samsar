//     $('#card1').hover(function() {
// 		$('#label1').toggle();
// 		$('#progress1').toggle();
// 	});
// 	$('#card2').hover(function() {
// 		$('#label2').toggle();
// 		$('#progress2').toggle();
// 	});
	
// 	$('#first').mouseenter(function() {
// 	  $(this).hide();
// 		$('#second').show();
// 	});

// 	$('#second').mouseleave(function() {
// 	  $(this).hide();
// 		$('#first').show();
// 	});
// 	$('#third').mouseenter(function() {
// 	  $(this).hide();
// 		$('#forth').show();
// 	});

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
	
$(document).on('click', '.number-spinner button', function () {    
	var btn = $(this),
		oldValue = btn.closest('.number-spinner').find('input').val().trim(),
		newVal = 0;
	
	if (btn.attr('data-dir') == 'up') {
		newVal = parseInt(oldValue) + 1;
	} else {
		if (oldValue > 1) {
			newVal = parseInt(oldValue) - 1;
		} else {
			newVal = 1;
		}
	}
	btn.closest('.number-spinner').find('input').val(newVal);
});

(function(){
      var words = [
          'is not a <span class = "text-danger text-uppercase"> Strategy </span>',
          'is like a  <span class = "text-warning text-uppercase"> DREAM </span>',
          'where we <span class = "text-success text-uppercase">  BELIEVE </span>',
                    
          ], i = 0;
      setInterval(function(){
          $('#changingword').fadeOut(function(){
              $(this).html(words[i=(i+1)%words.length]).fadeIn();
          });
      }, 4000);
        
  })();
  

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
	var startDate = new Date();
var fechaFin = new Date();
var FromEndDate = new Date();
var ToEndDate = new Date();




$('.from').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
}).on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to').datepicker('setStartDate', startDate);
    }); 
