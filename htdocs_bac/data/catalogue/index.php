<!DOCTYPE html>
<html lang="en-ca"><!-- InstanceBegin template="/Templates/t-default.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" --><title>Open Data Catalogue </title><!-- InstanceEndEditable -->
<!--#include virtual="/ui/includes/head.php" -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<!-- InstanceParam name="More Info Box" type="boolean" value="false" -->
<!-- InstanceParam name="Photo Banner" type="boolean" value="false" -->
</head>
<body id="tServices">
<!--#include virtual="/ui/includes/header.php" -->
  <div id="page">
    <div id="breadcrumb">
<!--#include virtual="/ui/includes/breadcrumb.php" --><!-- InstanceBeginEditable name="Breadcrumb" --><!-- InstanceEndEditable -->
    </div>
    <div id="nav-local">
<!--#include virtual="/ui/scripts/local-nav.php" -->
	</div>
    <div id="content">
      <h1><!--#include virtual="/ui/includes/headline.php" --></h1>
      <div class="false" id="pic"><!-- InstanceBeginEditable name="Photo Banner 590-810px X 130px" --><!-- InstanceEndEditable --></div>   
      <div id="summary"><!-- InstanceBeginEditable name="Page Summary" -->
        <p>Information provided on this page is subject to the Saanich <a href="/data/licence.html">Open Data Catalogue Licence</a>.      </p>
      <!-- InstanceEndEditable --></div>
      <div class="false" id="more-info">
        <h2><!-- InstanceBeginEditable name="More Info Title" --><!-- InstanceEndEditable --></h2>
        <!-- InstanceBeginEditable name="More Info Links" --><!-- InstanceEndEditable -->
      </div>
      <!-- InstanceBeginEditable name="Content" -->
      <table width="100%">
        <tr valign="top">
          <th rowspan="2" nowrap scope="col">Information (Dataset name)</th>
          <th colspan="5" class="align-centre" scope="col">Format</th>
        </tr>
        <tr valign="top">
          <th scope="col">CSV</th>
          <th scope="col">DWG</th>
          <th scope="col">KML</th>
          <th scope="col">SHP</th>
          <th scope="col">Other</th>
        </tr>
        <tr valign="top">
          <td><strong>Active Living Guide</strong><br>
            Recreation program information from <a href="https://recreation.saanich.ca/reconline/Start/Start.asp">RecOnline</a><br>
            Date created: <?php echo date ("F d, Y", filemtime('reconline.csv'));?></td>
          <td><a href="/data/catalogue/reconline.csv">CSV</a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="top">
          <td><strong>Business Licences</strong><br>
            Business licenses issued by Saanich<br>
            Date created: <?php echo date ("F d, Y", filemtime('biz-licence.csv'));?></td>
          <td><a href="biz-licence.csv">CSV</a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="top">
          <td><strong>Events Calendar</strong><br>
          Events and Advisories on the District of Saanich Calendar<br>
          Date created: Live Feed</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="http://saanich.ca/calendar/rss/">RSS</a><br>
            <a href="webcal://saanich.ca/calendar/link/ical.php">iCal</a></td>
        </tr>
        <tr valign="top">
          <td><strong>Garbage Schedules<br>
          </strong>Garbage pick-up days by area<br>
Date created: <?php echo date ("F d, Y", filemtime('garbage.csv'));?></td>
          <td><a href="/data/catalogue/garbage.csv">CSV</a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="top">
          <td><strong>Jobs Feed<br>
          </strong>List of Employment Opportunities<br>
Date created: <?php echo date ("F d, Y", filemtime($_SERVER['DOCUMENT_ROOT'].'/ui/feeds/employment.rss'));?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="http://www.saanich.ca/webapp/rss/RssFeeder?file=employment">RSS</a></td>
        </tr>
        <tr valign="top">
          <td><strong>News Feed<br>
            </strong>News, public notices and engagement<br>
            Date created: <?php echo date ("F d, Y", filemtime($_SERVER['DOCUMENT_ROOT'].'/ui/feeds/whatsNew.rss'));?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="http://saanich.ca/webapp/rss/RssFeeder?file=whatsnew">RSS</a></td>
        </tr>
        <tr valign="top">
          <td><strong>Property  Assessment<br>
          </strong>Assessment values for properties located in Saanich<br>
Date created: <?php echo date ("F d, Y", filemtime('land-assessment.csv'));?></td>
          <td><a href="/data/catalogue/land-assessment.csv">CSV</a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="top">
          <td><strong>Property Info<br>
          </strong>Data such as address, building area and legal description for properties located in Saanich<br>
Date created: <?php echo date ("F d, Y", filemtime('property-info.csv'));?></td>
          <td><a href="/data/catalogue/property-info.csv">CSV</a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <!-- InstanceEndEditable -->
    </div>
<!--#include virtual="/ui/includes/page-tools.php" -->
  </div>
<!--#include virtual="/ui/includes/footer.php" -->
</body>
<!-- InstanceEnd --></html>