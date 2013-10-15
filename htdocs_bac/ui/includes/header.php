  <div id="top"><a href="#content">Skip to main content</a></div>
  <div id="container" class="rounded">
  <div id="logo-print"><img src="/ui/styles/2012/logo-print.png" alt="" /></div>
  <header>
  <div id="header">
    <div id="logo"><a href="/" title="Go to District of Saanich homepage. "><h1><span>District of Saanich</span></h1></a>
      <div id="tagline">Populo Serviendo - <em>Serving the People</em></div>
    </div>
    <div id="tools">
      <ul>
        <li><a href="http://www.weatheroffice.gc.ca/city/pages/bc-85_metric_e.html">Weather</a></li>
        <li><a href="/living/about/organization/contact.html">Contact Us</a></li>
        <li><a href="https://secure.saanich.ca/tempestprod/mycity/secure/login.cfm">MySaanich</a></li>
      </ul>
    </div>
    <div id="search">
	  <form method="get" action="http://www.search.saanich.ca/search" name="siteSearch">
        <fieldset>
          <legend>Site search</legend>
          <label for="searchBox">Search</label>
          <input name="q" type="text" id="searchBox"/><input type="submit" name="btnG" value="Search" id="btnG"/>
          <input type="hidden" name="site" value="default_collection"/>
          <input type="hidden" name="client" value="saanich"/>
          <input type="hidden" name="proxystylesheet" value="saanich"/>
          <input type="hidden" name="output" value="xml_no_dtd"/>
          <input type="hidden" name="getfields" value="name"/>
        </fieldset>
      </form>
    </div>
    <div id="google_translate_element"></div>
    <nav>

<?php virtual('/ui/scripts/rootRelative.php') ?>

    <div id="nav-site">
      <h1>Site Navigation</h1>
      <?php virtual('/ui/scripts/sitemenu.php'); ?>
      <ul>
        <li class="dropdown"><a href="/living/">Living in Saanich</a>
          <?php menu('nav-living.shtml'); ?>
        </li>
        <li class="dropdown"><a href="/services/">Municipal Services</a>
          <?php menu('nav-services.shtml'); ?>
        </li>
        <li class="dropdown"><a href="/parkrec/">Parks and Recreation</a>
          <?php menu('nav-parksrec.shtml'); ?>
        </li>
        <li class="dropdown"><a href="/business/">Doing Business</a>
          <?php menu('nav-business.shtml'); ?>
        </li>
        <li class="dropdown"><a href="/discover/">Discover Saanich</a>
          <?php menu('nav-discover.shtml'); ?>
        </li>
        <li class="megamenu"><a href="/living/about/i-want-to/index.html">I Want To...</a>
		 <?php rootRelative('../../navigation/i-want-to.shtml'); ?>
        </li>
      </ul>
      <div class="clearfloats"></div>
    </div>
    </nav>
  <?php 
	  $home = preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']); // Check if homepage and remove query string(s)
	  if ($home=='/' or $home=='/index.html') {
	  // load quicklinks and turn document-relative links to root-relative links
	  rootRelative('../../navigation/t-home-quicklinks.shtml');
	  }
  ?>
  </div>
  </header>