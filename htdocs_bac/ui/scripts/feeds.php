<?php
	//include external function
	include('time-ago.php');
	
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
	
	//get category
	$xpath = new DOMXPath($rss);
	$cat = str_replace ('|','" or category="',$_GET["cat"]);
	if (strlen($_GET["cat"])>0) $query = '//item[category="'.$cat.'"]';
	else $query = '//item';

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
	
	//Sort array by date (descending)
	function date_sort($a, $b) {
		return strtotime($b['date']) - strtotime($a['date']);
	}
	usort($feed, 'date_sort');
	
	//Set description character limit and trim
	if ($_GET["c"] > 0) $characters = $_GET["c"];
	else $characters = 100;	
	  function charTrim($t,$c){
		$trimmed = substr($t,0,$c);
		if (strlen($t) > $c) $trimmed = preg_replace('/\s+\S*$/',"&hellip;",$trimmed);
		return $trimmed;
	  }
	
	//Get starting item (default=0)
	$x=0;
	if ($_GET["start"] > 0) $x = $_GET["start"];

	//Set number of items
	if ($_GET["n"] > 0) $limit = $_GET["n"];
	else $limit = count($feed);
	$limit = $limit + $x;

	//Get format of posts
	$format = $_GET["f"];

	//remove following domains to create root relative links
	$domains = array("http://saanich.ca", "http://www.saanich.ca", "http://webstageext", "http://10.10.10.45", "http://64.114.18.161");

	//Echo results
	if ($limit>count($feed)) $limit=count($feed); //check to see if there are enough posts for set limit
	if ($limit<>0) {
	  for($x;$x<$limit;$x++) {
		  $title = htmlspecialchars($feed[$x]['title']);
		  $link = str_replace($domains, "", $feed[$x]['link']);
		  $description = charTrim(strip_tags($feed[$x]['desc']),$characters);
		  $date = date('M d, Y', strtotime($feed[$x]['date']));
		  $ago = ago(strtotime($feed[$x]['date']));
		  
		  switch ($format)
		  {
		  case 1:
			echo '<p class="rssLinks"><a class="feedLink" href="'.$link.'">'.$title.'</a></p>';
			break;
			
		  case 2:
			echo '<p class="rssLinks">';
			echo '<a class="feedLink" href="'.$link.'">'.$title.'</a>';
			echo '<br/><span class="date">'.$date.'</span></p>';
			break;
			
		  case 3:
			echo '<p class="rssLinks">';
			echo '<a class="feedLink" href="'.$link.'">'.$title.'</a>';
			echo '<br/><span class="date">'.$date.'</span>';
			echo ' &mdash; '.$description.'</p>';
			
			echo '<div class="share"><span class="addthis_toolbox addthis_default_style">';
			
			echo '  <a class="addthis_button_google_plusone"';
			echo '   g:plusone:annotation="none"';
			echo '   addthis:url="'.$link.'"';
			echo '   addthis:title="'.$title.'"';
			echo '   addthis:description="'.$description.'"></a>';
			
			echo '  <a class="addthis_button_facebook"';
			echo '   addthis:url="'.$link.'"';
			echo '   addthis:title="'.$title.'"';
			echo '   addthis:description="'.$description.'"></a>';
			
			echo '  <a class="addthis_button_twitter"';
			echo '   addthis:url="'.$link.'"';
			echo '   addthis:title="'.$title.'"';
			echo '   addthis:description="'.$description.'"></a>';
			
			echo '  <a class="addthis_button_compact"';
			echo '   addthis:url="'.$link.'"';
			echo '   addthis:title="'.$title.'"';
			echo '   addthis:description="'.$description.'"></a>';
			
			echo '</span></div>';
			break;
			
		  case 4:
			echo '<tr><td>'.$date.'</td>';
			echo '<td><a class="feedLink" href="'.$link.'">'.$title.'</a></td></tr>';
			break;
			
		  default:
			echo '<p class="rssLinks">';
			echo '<a class="feedLink" href="'.$link.'">'.$title.'</a>';
			echo '<br/><span class="date">Posted '.$ago.'</span>';
			echo ' &mdash; '.$description.'</p>';
		  } 			  
	  }
	}
	else echo "<p>Sorry, this feed has no entries at this time.</p>";
  }
  catch(Exception $e){
	echo $e->getMessage();
  }
?>