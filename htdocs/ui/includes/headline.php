<?php 
  //load file
  function loadFile($file){
	if(file_exists($file)<>1){
	  throw new Exception("District of Saanich, Victoria BC");
	}
	return true;
  }
  try{
		
  $filename = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']; // Get file path
  $filename = preg_replace('/\?.*/', '', $filename); // Remove query string(s)
  if (substr($filename, -1) == "/") $filename = $filename . "index.html"; // Add 'index.html' if needed

  loadFile($filename);
  libxml_use_internal_errors(true);   // enable user error handling
  $doc = new DomDocument;
  $doc->validateOnParse = true;

  if (!$doc->loadHTMLFile($filename)) {
	  foreach (libxml_get_errors() as $error) {
		  // handle errors here
	  }
  
	  libxml_clear_errors();
  }

  $tags = $doc->getElementsByTagName('title'); //Load the title tag
  
  $tagsArray = array ();
  foreach ($tags as $tag) {
	  array_push($tagsArray, $tag->nodeValue);
	  }
  
  echo $tagsArray[0]; //Return the Title tag contents

}
  catch(Exception $e){
	echo $e->getMessage();
  }
  
?>