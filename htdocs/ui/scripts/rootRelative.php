<?php 
function rootRelative($file) {
  // load file and turn document-relative links to root-relative links
  $file = @file_get_contents($file);
  $file = str_replace('href="../', 'href="/', $file);
  $file = str_replace('src="../', 'src="/', $file);
  $file = preg_replace('#(src=")([^\/])#', 'src="/navigation/\2', $file);
  echo $file;
}

$f = $_SERVER['DOCUMENT_ROOT'].$_GET["f"];

if (file_exists($f)) {
  rootRelative($f);
}

?>