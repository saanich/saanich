//$('html').addClass('js'); // removes flash of unstyled content

$(document).ready(function() {

/////////////////////////////////////////Run functions if window re-sized//////////////////////////////////////////////////
$(window).resize(function() {
  pageBanner();
});

/////////////////////////////////////////Append district name to page title//////////////////////////////////////////////////
title ();
function title () {
  document.title = document.title + " | District of Saanich, Victoria BC";
  //NOTE: this script should be replaced by server-side script for Search Engine Optimization
}
/////////////////////////////////////////Search box focus text//////////////////////////////////////////////////
var box=$('#searchBox');
searchBG(box);
box.focus(function() { box.removeClass("searchBackground"); });
box.blur(function() { searchBG(box); });

function searchBG (box){
  if (box.val().length>0){
    box.removeClass("searchBackground");
  }
  else{
	box.addClass("searchBackground");
  }
}

/////////////////////////////////////////Open non-html files in new window//////////////////////////////////////////////////
newWindow();
function newWindow (){
$('a[href$=".pdf"]').attr('target', '_blank');
$('a[href$=".doc"]').attr('target', '_blank');
$('a[href$=".docx"]').attr('target', '_blank');
$('a[href$=".csv"]').attr('target', '_blank');
$('a[href$=".xls"]').attr('target', '_blank');
$('a[href$=".xlsx"]').attr('target', '_blank');
$('a[href$=".ppt"]').attr('target', '_blank');
$('a[href$=".pptx"]').attr('target', '_blank');
$('a[href$=".gif"]').attr('target', '_blank');
$('a[href$=".jpg"]').attr('target', '_blank');
$('a[href$=".jpeg"]').attr('target', '_blank');
$('a[href$=".rss"]').attr('target', '_blank');
$('a[href$=".atom"]').attr('target', '_blank');
};

/////////////////////////////////////////Navigation (local & site nav)//////////////////////////////////////////////////
nav();
function nav (){
//URL & filename vars
  var url = $(location).attr('pathname');	//get the pathname
  var url2 = url.replace('index.html','');	//pathname with index.html removed (if present)
  var urlParts = url.split('/');			//put pathname into an array
  var filename = urlParts.pop();			//get filename from array

//Keyboard-friendly site nav
  $('#nav-site ul ul a').focus(function() { $(this).offsetParent("ul").css('top','auto'); }); //bring sub-menu on screen with focus
  $('#nav-site ul ul a').blur(function() { $(this).offsetParent("ul").css('top','-3000px'); }); //put sub-menu off-screen with blur

//Highlight current section in site nav
  $("#nav-site > ul > li > a").each(function(index) {
	  if($(this).attr("href").split('/')[1] == urlParts[1]) {
		  $(this).parent("li").addClass("current");
	  };
	  if($(this).attr("href").split('/')[2] == 'about') {
		  $(this).parent("li").removeClass("current");
	  };
  });

// For screen sizes less than 780 px (set in CSS by a media query)
$("#nav-site h1").click(function(){
  $(this).toggleClass('menu');
  $(this).next('ul').fadeToggle('medium');
});

//Fix up local nav
  if (filename == ''){						//add index.html if no filename
	  filename = 'index.html';
	  url = url + 'index.html';
	  }

  $("#nav-local ul ul").css('visibility','hidden'); //hide all sub-menus
  $("#nav-local ul ul").css('position','absolute');
  $("#nav-local a[href='"+url+"']").parent("li").addClass("current"); //next 3 rows of code set current item bullet
  $("#nav-local a[href='"+url2+"']").parent("li").addClass("current");
  $("#nav-local a[href='"+filename+"']").parent("li").addClass("current");
  $("#nav-local li.current").parents("li").addClass("parent"); //set all parent sub-menu bullets
  $("#nav-local li.current").parents("ul").css('visibility','visible'); //show all parent sub-menus of current item
  $("#nav-local li.current").parents("ul").css('position','static');
  $("#nav-local li.current").children("ul").css('visibility','visible'); //make current item sub-menu visible
  $("#nav-local li.current").children("ul").css('position','static');
};

/////////////////////////////////////////Misc//////////////////////////////////////////////////

// Format banner picture in content area
pageBanner();
function pageBanner(){
var banner = $('#pic.true');
var windowWidth = $(window).width();

if (banner.length > 0 && windowWidth >= 780){
	banner.prevAll('h1').addClass('banner');
	$('#content').css('margin-top', '-1px');
	}
else if (banner.length > 0 && windowWidth < 780){
	banner.prevAll('h1').removeClass('banner');
	$('#content').css('margin-top', '0');
	}
}

// Landing page make each section clickable
$('#tLanding .section a').click(function(event) { event.preventDefault(); });
$('#tLanding .section').click (function(){
  if ($(this).find('a').attr('target') == '_blank') { window.open ($(this).find('a').attr('href')); }
  else { window.location = $(this).find('a').attr('href'); }
});

// Toggle the next DOM sibling block of code with a specific class http://api.jquery.com/toggle/
  $('.slideToggle').next().css('display', 'none');
  $('span.slideToggle').parent('p').next().css('display', 'none'); // Contribute uses span tags instead of adding a class on paragraphs, so this looks at the parent.
  $('.slideToggle').click(function() {
	if (this.tagName.toUpperCase() === "SPAN") {
	  $(this).parent('p').next().slideToggle('slow', function() {
		// Animation complete.
	  });
	}
	else {
	  $(this).next().slideToggle('slow', function() {
		// Animation complete.
	  });
	}
  });

// Fire Lightbox plugin, https://github.com/krewenki/jquery-lightbox
$(".lightbox").lightbox({
	fitToScreen: true,
	imageClickClose: false
});

/////////////////////////////////////////Latest News//////////////////////////////////////////////////

// Initialize the news items (on homepage and news pages) 
initializeNews();
function initializeNews(){
// Clickable paragraphs for what's new items
$('#tHome .rssLinks a').click(function(event) { event.preventDefault(); });
$('#tHome .rssLinks').click (function(){
  if ($(this).find('a.feedLink').attr('target') == '_blank') { window.open ($(this).find('a.feedLink').attr('href')); }
  else { window.location = $(this).find('a.feedLink').attr('href'); }
});

// Gradient background hover effect
$('.rssLinks').hover (
function() {
  $(this).addClass('rssHover');
  $(this).next('.share').fadeTo(0, 1);
},
function(){
  $(this).removeClass('rssHover');
  $(this).next('.share').fadeTo(0, .5);
});

//AddThis plugin fade in/out (on homepage and news pages)
$('.share').fadeTo(0,.5);
$('.share').hover(function () {
	$(this).fadeTo(0, 1);
	},
	function () {
	$(this).fadeTo(0,.5);
	}
  );
}

//////////////////////////////AJAX More news/////////////////////////////////////////
ajaxNews('#tHome #morenews', '#tHome #news', '/ui/feeds/whatsNew.rss', 'news|notice', '80', '10', '');
ajaxNews('#tHome #moreengagement', '#tHome #engagement', '/ui/feeds/whatsNew.rss', 'engagement', '80', '10', '');
ajaxNews('#content #morenews', '#content #news', '/ui/feeds/whatsNew.rss', 'news', '1000', '10', '3');
ajaxNews('#content #moreengagement', '#content #engagement', '/ui/feeds/whatsNew.rss', 'engagement', '1000', '10', '3');
var script = '//s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fbe970d153126dd';

function ajaxNews (nlink, target, feed, category, number, limit, format) {
  $(nlink).append('<p class="link">Load more items</p>');
  $(nlink).click(function() {
  var x = $(target + ' p.rssLinks').length;
	$.get('/ui/scripts/feeds.php', { s: feed, c: number, cat: category, n: limit, start: x, f: format }, function(data){
		$(target).append(data);
		newWindow();
		if(data.length == 0){
		  $(nlink + ' p').replaceWith('<p>No more items to load</p>');
		  $(nlink).delay(600).fadeOut("slow");
		};
		if (window.addthis){ window.addthis = null; } //Re-initialize AddThis script
		$.getScript(script);
		initializeNews(); //Re-style new items
	  });
	});
};

//////////END ACTIONS///////////
});
