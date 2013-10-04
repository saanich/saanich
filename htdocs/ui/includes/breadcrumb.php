<?php 
$urlArray = (explode("/",$_SERVER['REQUEST_URI'])); //Put the URI into an array
$section = $urlArray[1]; //Get the current section (top-level folder name)

if (strlen($section) == 0) echo '<a href="/">Home</a>';
else {
  switch ($section) {
	case "living":
	  $sectionName = "Living in Saanich";
	  break;
	case "services":
	  $sectionName = "Municipal Services";
	  break;
	case "sep":
	  $sectionName = "Saanich Emergency Program";
	  break;
	case "parkrec":
	  $sectionName = "Parks and Recreation";
	  break;
	case "business":
	  $sectionName = "Doing Business";
	  break;
	case "discover":
	  $sectionName = "Discover Saanich";
	  break;
	case "student":
	  $sectionName = "Student";
	  break;
	case "newemp":
	  $sectionName = "Employee Orientation";
	  break;
	default:
	  $sectionName = "";
	}
  echo '<a href="/">Home</a> > <a href="/'.$section.'/">'.$sectionName.'</a> ';
}
?>