<?php

function menu($file) {

  $f = $_SERVER['DOCUMENT_ROOT'].'/navigation/'.$file;
  
  if(file_exists($f)){
  
	$DOM = new DOMDocument;
	$DOM->loadHTML(str_replace('href="../', 'href="/', file_get_contents($f)));
	 
	$xpath = new DOMXPath($DOM);
	$entries = $xpath->query('//body/ul/li/a');
  
	echo '<ul>';
	foreach ($entries as $entry) {
	  echo "<li><a href=\"{$entry->getAttribute('href')}\">{$entry->nodeValue}</a></li>";
	}
	echo '</ul>';

  }
}
  
?>