<?php
	//load feed
	function loadFeed($file){
	  if(file_exists($file)<>1){
		throw new Exception("<p>Sorry, this feed is not available at this time.</p>");
	  }
	  return true;
	}
	try{
	loadFeed($_SERVER['DOCUMENT_ROOT'].$_GET["s"]);
	$rss = new DOMDocument();
	$rss->load($_SERVER['DOCUMENT_ROOT'].$_GET["s"]);
	
	$xpath = new DOMXPath($rss);
	$query = '//item';

	$entries = $xpath->query($query);
	$feed = array();
	foreach ($entries as $node) {
		$item = array (
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			'enclosure' => $node->getElementsByTagName('enclosure')->item(0)->getAttribute('url'),
			);
		array_push($feed, $item);
	}
	
	//Sort array by date (descending)
	function date_sort($a, $b) {
		return strtotime($b['date']) - strtotime($a['date']);
	}
	usort($feed, 'date_sort');
	
	//remove following domains to create root relative links
	$domains = array("http://saanich.ca", "http://www.saanich.ca", "http://webstageext", "http://10.10.10.45", "http://64.114.18.161");
	
	//Echo results
	for ($x=0; $x<count($feed); $x++) {
	  $title = htmlspecialchars($feed[$x]['title']);
	  $link = str_replace($domains, "", $feed[$x]['link']);
	  $description = $feed[$x]['desc'];
	  $enclosure = str_replace($domains, "", $feed[$x]['enclosure']);
	  
	  echo '<li><div class="featureText"><h2><a href="'.$link.'?ref=banner">'.$title.'</a></h2>';
	  echo '<p>'.$description.'</p>';
	  echo '<img src="'.$enclosure.'" alt=""/></div></li>';

	  }
	}
  catch(Exception $e){
	echo $e->getMessage();
  }
?>