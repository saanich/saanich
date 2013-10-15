    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="Edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

<?php //Use PHP minifier for live site scripts and stylesheets. Adobe Contribute can't handle minified stylesheets.
  if ($_SERVER['SERVER_NAME']=="webstageext" or $_SERVER['SERVER_NAME']=="10.10.10.45") {
  echo '<link rel="stylesheet" href="http://webstageext/ui/styles/responsive/screen.css" type="text/css" media="screen">'; //Use absolute URL for Contribute
  echo '<link rel="stylesheet" href="/ui/styles/responsive/contribute.css" type="text/css" media="screen">';
  echo '<link rel="stylesheet" href="/ui/scripts/lightbox/css/lightbox.css" type="text/css" media="screen" />';
  echo '<!--[if lt IE 9]><link rel="stylesheet" href="/ui/styles/responsive/ie.css" type="text/css" media="screen"><![endif]-->';
  echo '<link rel="stylesheet" href="/ui/styles/responsive/print.css" type="text/css" media="print">';
  echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>';
  echo '<script type="text/javascript" src="/ui/scripts/actions.js"></script>';
  echo '<script type="text/javascript" src="/ui/scripts/lightbox/jquery.lightbox.js"></script>';
  }

  else {
  echo '<link rel="stylesheet" href="/min/index.php?f=ui/styles/responsive/screen.css,ui/styles/responsive/contribute.css,ui/scripts/lightbox/css/lightbox.css" type="text/css" media="screen">';
  echo '<!--[if lt IE 9]><link rel="stylesheet" href="/min/index.php?f=ui/styles/responsive/ie.css" type="text/css" media="screen"><![endif]-->';
  echo '<link rel="stylesheet" href="/min/index.php?f=ui/styles/responsive/print.css" type="text/css" media="print">';
  echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>';
  echo '<script type="text/javascript" src="/min/index.php?f=ui/scripts/actions.js,ui/scripts/lightbox/jquery.lightbox.js"></script>';
  }
?>
    <!-- 57 x 57 Android and iPhone 3 icon -->
    <link rel="apple-touch-icon" media="screen and (resolution: 163dpi)" href="/ui/images/icon57.png" />
    <!-- 114 x 114 iPhone 4 icon -->
    <link rel="apple-touch-icon" media="screen and (resolution: 326dpi)" href="/ui/images/icon114.png" />
    <!-- 57 x 57 Nokia icon -->
    <link rel="shortcut icon" href="/ui/images/icon57.png" />

	<script>
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({
		    pageLanguage: 'en',
		    gaTrack: true,
		    gaId: '<?php if ($_SERVER['SERVER_NAME']=="saanich.ca" or $_SERVER['SERVER_NAME']=="www.saanich.ca"){echo 'UA-5676961-1';} ?>'
		    //layout: google.translate.TranslateElement.InlineLayout.SIMPLE  //removed because no longer works in Firefox 13
		  }, 'google_translate_element');
		}
	</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script type="text/javascript">
        var _gaq = _gaq || [];
		var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
			_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
            _gaq.push(['_setAccount', '<?php if ($_SERVER['SERVER_NAME']=="saanich.ca" or $_SERVER['SERVER_NAME']=="www.saanich.ca"){echo 'UA-5676961-1';} ?>']);
            _gaq.push(['_trackPageview']);
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
    </script>

<?php //Styles for Macromedia Contribute. The Contribute editor does not apply the javascript which removes these styles for Web Browsers
if ($_SERVER['SERVER_NAME']=="webstageext" or $_SERVER['SERVER_NAME']=="10.10.10.45"){
  echo '<style id="contribute">#nav-local, header, footer { display: none; } #content { margin-left: 7px; }</style>';
  echo '<script type="text/javascript">$(document).ready(function() { $("#contribute").remove(); });</script>';
} ?>