<?php
	/* fix-xml.php
	** Designed to check rss & atom feeds for links pointing to webstageext or
	** 10.10.10.45 and change them to point to saanich.ca instead
	*/

$files = array(
	'../feeds/whatsNew.rss',
	'../feeds/whatsNew.atom',
	'../feeds/features.rss',
	'../feeds/features.atom',
	'../feeds/employment.rss',
	'../feeds/employment.atom',
	'../feeds/agendas.rss',
	'../feeds/agendas.atom',
);

$domains = array("webstageext", "10.10.10.45");

foreach ($files as $file) {
	if (file_exists($file)) {
	  $contents = file_get_contents($file);
	  $contents = str_replace($domains, 'saanich.ca', $contents);
	  file_put_contents($file, $contents);
	}
}
?>