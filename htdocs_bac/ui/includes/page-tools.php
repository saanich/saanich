<div id="pageTools">
  <span class="dateLastMod">
  <?php
  // File last modified date
  $filename = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']; // Get file path
  $filename = preg_replace('/\?.*/', '', $filename); // Remove query string(s)
  $uri = '/business/development/'; // exclude this URI path from adding date last modified

  if (substr($filename, -1) == "/") $filename = $filename . "index.html"; // Add 'index.html' if needed
  if (file_exists($filename) and substr($_SERVER['REQUEST_URI'], 0, strlen($uri)) != $uri) {
	  echo "Last modified: " . date ("F d".", "."Y", filemtime($filename));  // Print date last modified on page
  }
  
  ?>
  </span>
</div>