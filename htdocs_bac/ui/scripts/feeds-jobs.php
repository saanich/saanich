<?php
  $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$_GET["s"]);
  $status = $_GET["status"];
  $feed = array();

  foreach ($xml->channel->item as $entry){

	if (isset($entry->enclosure)) {
		$enc_url = $entry->enclosure->attributes()->url;
		$enc_size = $entry->enclosure->attributes()->length;
	}
	else {
		$enc_url = null;
		$enc_size = null;
	}

	$item = array (
		'title' => $entry->title,
		'cat' => $entry->category,
		'desc' => $entry->description,
		'date' => $entry->pubDate,
		'enc_url' => $enc_url,
		'enc_size' => $enc_size,
		'closeDate' => $entry->guid
		);

	switch ($status){
	  case "closed" :
		if (strtotime($entry->guid) < strtotime(date('Y-m-d'))){
		  array_push($feed, $item);
		}
		break;
	  default :
		if (strtotime($entry->guid) >= strtotime(date('Y-m-d')) || $entry->guid == "Open Until Filled"){
		  array_push($feed, $item);
		}
		break;
	}
  }

  //Sort array by date (descending/ascending)
  function date_sort_d($a, $b) {
	  return strtotime($a['closeDate']) - strtotime($b['closeDate']);
  }
  function date_sort_a($a, $b) {
	  return strtotime($a['closeDate']) - strtotime($b['closeDate']);
  }

  switch ($status){
	case "closed" :
	  usort($feed, 'date_sort_a');
	  break;
	default :
	  usort($feed, 'date_sort_d');
	  break;
  }
  //remove following domains to create root relative links
  $domains = array("http://saanich.ca", "http://www.saanich.ca", "http://webstageext", "http://10.10.10.45", "http://64.114.18.161");

  if (empty($feed)){
    echo '<h2>No Current Employment Opportunities</h2>';
    echo '<p>There are no current opportunities with the District of Saanich.</p><p>Please check back or subscribe to our Employment Opportunities Feed below.</p><p>&nbsp;</p><hr/>';
  }
  else {
  for ($x=0; $x<count($feed); $x++) {
	  $title = htmlspecialchars($feed[$x]['title']);
	  $cat = $feed[$x]['cat'];
	  $description = str_replace($domains, "", $feed[$x]['desc']);
	  $pubDate = date('F d, Y', strtotime($feed[$x]['date']));
	  $enc_url = str_replace($domains, "", $feed[$x]['enc_url']);
	  $enc_size = round($feed[$x]['enc_size']/1024,0);
	  $closeDate = date('F d, Y', strtotime($feed[$x]['closeDate']));

		echo '<h2>'.$title.'</h2>';

		if ($status != 'closed' and $cat != 'No Apply') {
		  echo '<a class="button float-right" href="mailto:careers@saanich.ca?subject='.$title.'" title="Email careers@saanich.ca">Apply now by email</a>';
		}

		echo '<p><strong>Date posted:</strong> '.$pubDate.'<br/>';
		if (strtotime($closeDate) > strtotime("Jan 1, 1970")) echo '<strong>Closing date:</strong> '.$closeDate.'<br/>';
		if (!empty($enc_url)) {
		  echo '<strong>Attachment:</strong> <a href="'.$enc_url.'" target="_blank" style="text-decoration: none;" ';
		  echo 'title="Job Description for '.$title.'">';
		  echo '<span style="text-decoration: underline;">Job Description</span> <img src="/images/pdf.gif" border="0" /> ';
		  echo $enc_size.'KB</a>';
		}
		echo '</p>';

		echo $description;

		echo '<hr/>';
  }
  }
?>