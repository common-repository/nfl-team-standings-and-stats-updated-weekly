=== NFL Team Stats ===
Contributors: bpmee31
Donate link: http://www.ibet.ws/nfl_team_stats_page.php
Tags: nfl, sports, stats, widgets, plugins, plugin, sidebar, widget, teams, nfl stats, football, football stats, football team stats, nfl standings, football standings
Requires at least: 2.2.0
Tested up to: 3.0
Stable tag: 1.1.9

NFL Team Stats allows bloggers display an NFL team's standings within their sidebar.

== Description ==

NEW: Our very own Newsfeed has been added to the plugin - you choose whether or not to include it in your blog settings panel!

NFL Team Stats plugin can be added to any blog with a dynamic sidebar. Once installed, the blogger can choose their favorite NFL Team 
and the type of display they want (compact or large). The stats are updated each week of the NFL regular season, so that blog 
visitors can keep track of all the important NFL team standings and stats. Additionally, teams qualifying for post-season play are denoted automatically 
in each stats table with the the standard NFL *, x,y or z symbols.

Please note, this plugin is supported by text link advertising. Accordingly, bloggers will see 4 links displayed at the bottom of their 
stats table, which will remain the same once the plugin has been installed. Please do not modify these links - this is how we pay the bills. 

We have no outward 
preference where our plugin appears, as long as the website content is legal in its particular jurisdiction. For example, some <a href="http://www.sportsbetting3.com">sports betting</a> 
bloggers like to use the stats to complement NFL content on their sites, while more hard core <a href="http://www.bet-on-the-nfl.com">NFL betting</a> enthusiasts will use multiple instances 
of the stats panel across their blog to display complete team figures. This plugin is licensed under WordPress.org guidelines and <a href="http://en.wikipedia.org/wiki/GNU_General_Public_License">General Public License</a>.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `nfl-team-stats` fodler to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The Plugin will automatically install a new table on your database to store your team and display size selections.
4. Go to your Design section and select the NFL Stats widget.
5. Place the widget where you would like it to appear in your sidebar.

== Frequently Asked Questions ==

= Can I remove the advertising links? =

No, this is how we pay the bills and keep the server up. Please do not alter the links or link information in your database. If you would like to 
manually change links, please contact the plugin author for assitance.

= Will new features be added? =

Yes, we will make changes to the diplay from time to time. These changes will appear automatically on your blog.

= Why is there so much "inline" CSS displayed in my NFL Stats table? =

We decided to use inline CSS to display the stats table, in order to comply with W3C markup standards as much as possible. The only other alternative 
would be to embed a new stylesheet, however this does not meet W3C standards. Any other ideas from users are welcome!

= My sidebar (or part of my sidebar) disappeared after I installed this plugin, what happened? =

This problem arises from the coding of your WP template. In some cases, the PHP code that calls the blog's sidebar and sidebar objects 
is placed in the wrong spot on the page. In order to remedy this, visit the following link: http://cutline.tubetorial.com/forums/showthread.php?t=8596 . The fix 
takes 5 minutes or less to complete.

= Where can I use this Plugin? =

There are no restrictions on where this plugin can be used, as long as it is posted in such a way that does not violate any prevailing law in blogger's jurisdiction. 
Some people like to post on sports blogs, personal blogs, or <a href="http://www.sportsbetting3.com">sports betting</a> style websites. Websites in foreign languages are fine, too!

= What about gaming & sports pages? =

No problem, feel free to use this plugin on sites that offer legal information about sports gaming, such as <a href="http://www.bet-on-the-nfl.com">NFL betting</a> blogs. In general, your 
site must be informative in nature and not accept actual financial wagers. Therefore, gaming affiliates are welcome to use this plugin.

= What constitutes inappropriate content? =

This plugin is free to use *ALMOST* anywhere. We would prefer that the plugin be used on personal blogs, business blogs, sports blogs, and the like. Use of this plugin 
on any websites that incite hate, prejudice, violence, terrorism, or any sort intolerance for diversity is discouraged. Can I post on an <a href="http://www.jaxcasinos.com">online casinos</a> 
website? Sure. Can I post on an adult website? Sure - Keep it legal. Can I post on my school's webserver or company webserver? Sure, but check with the appropriate IT people first.

== Screenshots ==

1. Sample Screen Shot of Stats with and without optional mini news scroller `/tags/1.1.9/screenshot-1.png`<br />

2. Another Sample Screen Shot of Stats`/tags/1.1.9/screenshot-2.png`<br />

== Changelog ==

= 1.1.8 =
ALL NEW News Feed, with top headlines for NFL fans that update regularly throughout the day. The scroller is very simple: it displays 4 news items which are clickable and open a new browser page to see the actual story. You can 
activate the scroller in your Blog settings control panel for NFL-Team-Stats. Blog users should have Adobe Flash enabled browsers to see the news feed. Also, the use of a Flash feed 
means that there are no conflicts with other scripts running on your page, many of which are powered by Javascript.

= 1.1.7 =
Ad layouts, stats, and text links are now pulled from a remote server, opposed to configured within the plugin script. This will allow for dynamic updates and diminish the need for 
the user to continually upgrade to get new stats functions in their tables.
Magpie Cache folder disabled, this was throwing errors on some servers that don't allow WP the proper permissions to make folders.
RSS Stat feed is now larger but contains much less items.

= 1.1.5 =
Bug with Snoopy Class and Rss Fetch were causing a fatal error on install. This has been fixed.

= 1.1.4 =
Fixed Invalid Header Error for Autoinstall from WP Plugins

= 1.1.1 =
Completely rewrote code in better WordPress Plugin Syntax
Links Ads are accessed via Magpie RSS
Current team stats are are accessed via Magpie RSS
Cleaned up coding for display
Added ability to remove database entries on "deactivate"
Options for database are now stored on the wp_options table, not on their own separate table

= 1.0.1 =
Added auto-email customer service option during plugin activation.
Updated Readme.txt file for more information and tags.

= 1.0 =
Updated Readme.txt file for more complete information, for general release.

= 0.9 =
First Release to general public on Wordpress.org Plugins Directory. Help us work out bugs!

== Upgrade Notice ==

= 0.9 =
This version, 0.9 is the only version available at this time. Therefore, there is no update required until further notice.
