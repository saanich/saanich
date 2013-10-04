<?php
	$file = $_GET["f"];
	$format = $_GET["t"];
	$rss = new DOMDocument();
	$rss->load($file);
	
	//get category
	$xpath = new DOMXPath($rss);
	$query = '/*/channel/item[not(description=preceding-sibling::item/description)]';

	$entries = $xpath->query($query);
	
	$feed = array();
	foreach ($entries as $node) {
		$item = array (
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}

  $x = $xpath->query('/*/channel/title');
  if ($x->item(0)->nodeValue == 'Unavailable Feed') {
    echo '<p>There are no entries at this time.</p>';
  }
  
  else {
	echo '<div class="events">';
	echo '<p id="eventtools"><a href="http://saanich.ca/calendar/">Saanich Events Calendar</a> | <a class="rss" href="'.$file.'">RSS</a></p>';
	for ($x=0; $x<count($feed); $x++) {
		$title = strip_tags(substr($feed[$x]['title'], 13));
		$titlePrev = strip_tags(substr($feed[$x-1]['title'], 13));
		$link = strip_tags($feed[$x]['link']);
		$desc = strip_tags($feed[$x]['desc']);
		$desc2 = strip_tags($feed[$x]['desc'],'<p><br><strong><b><br><br/>'); //allow some formating in the description
		$date = strip_tags(date('F d, Y', strtotime($feed[$x]['date'])));
		
		switch ($format) {
			
		  case 1:
			echo '<a href="'.$link.'" class="size-larger">'.$title.'</a>';
			echo '<br><div class="description highlight-box">'.$desc2.'</div>';
		  break;
		  
  		  default:
			echo '<a href="'.$link.'">'.$title.'</a>';
			echo ' - <span class="date">'.$date.'</span>';
			echo '<br><div class="description">'.$desc.'</div>';
		}
	}
	echo '</div>';
  }
?>