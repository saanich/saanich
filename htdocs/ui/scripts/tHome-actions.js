$(document).ready(function() {

// Random homepage image
var pics = $('#tHome #brandImages img').toArray();
if (pics.length>0){
	var pic = pics[Math.floor(Math.random()*pics.length)];
	$('#tHome #branding').css('background-image', 'url(' + pic.src + ')');
  }

// Fire easySlider script
$('#slider').easySlider({
	auto: true,
	continuous: true,
	pause: 6000,
	numeric: true
});

//easySlider set background images
$('#slider li').each(function(){
  var bg = $(this).find('img').attr('src');
  $(this).css('background-image', 'url('+bg+')');
});

$('#slider li a').click(function(event) { event.preventDefault(); });
$('#slider li').click (function(){
  if ($(this).find('a').attr('target') == '_blank') { window.open ($(this).find('a').attr('href')); }
  else { window.location = $(this).find('a').attr('href'); }
});

maxsizer('.scroll');

function maxsizer(s) {
  $(s).each(function(){
	var h = $(this).height() + 'px';
	$(this).css('max-height' , h);
  });
}

minsizer('#sect-2','#sect-4');
minsizer('#sect-3','#sect-5');

function minsizer(a,b) {
  var x = $(a).height();
  var y = $(b).height();
  var z = Math.max(x,y) + 'px';
  $(a).css('min-height' , z);
  $(b).css('min-height' , z);
}

minsizer2('#sect-1','#col2');

function minsizer2 (a,b) {
  var x = $(a).height();
  var y = $(b).height();
  var z = Math.max(x,y) - 9 + 'px';
  $(a).css('min-height' , z);
}

/**/
//////////END ACTIONS///////////
});
