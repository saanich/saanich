<?php 
// find current section of the site or default to 'news'

  $sections = explode('/', $_SERVER['REQUEST_URI']);
  $section = $sections[1];

  switch ($section) {
    case "living":
      $section = "nav-living.shtml";
      break;
    case "services":
      $section = "nav-services.shtml";
      break;
    case "parkrec":
      $section = "nav-parksrec.shtml";
      break;
    case "business":
      $section = "nav-business.shtml";
      break;
    case "data":
      $section = "nav-data.shtml";
      break;
    case "sep":
      $section = "nav-sep.shtml";
      break;
    case "discover":
      $section = "nav-discover.shtml";
      break;
    case "student":
      $section = "nav-student.shtml";
      break;
    case "newemp":
      $section = "nav-newemp.shtml";
      break;
	default:
	  $section = "nav-news.shtml";
  }

// display the correct navigation and change any document-relative links to root-relative

  $file = $_SERVER['DOCUMENT_ROOT'].'/navigation/'.$section;
  
  if (file_exists($file)) {
    echo str_replace('href="../', 'href="/', file_get_contents($file));
  }

?>