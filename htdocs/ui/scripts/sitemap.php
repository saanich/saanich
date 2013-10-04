<?php 

  $file = $_SERVER['DOCUMENT_ROOT'].'/navigation/'.$_GET["f"];

  if (file_exists($file)) {
    echo str_replace('href="../', 'href="/', file_get_contents($file));
  }
  
?>