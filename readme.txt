/* 
Theme Name: All AJAX
Theme URI: http://themeclubhouse.digwp.com/
Description: Theoretical test of AJAXing a theme
Author: Chris Coyier
Author URI: http://chriscoyier.net/
Version: 2.0
License: Book purchase required.
License URI: http://digwp.com/book/
Tags: black, white, right-sidebar, fixed-width
*/

Questions? Send 'em to sales@digwp.com


Changelog:

v2.0 [ 2012 September 30 ]
	
	- cleaned up code, markup, etc.
	- added missing "ajax-loader.gif"
	- updated to jQuery 1.7.2
	- added licensing, version, tags, info to style.css
	- updated enqueue-script function
	- added "<p><?php the_tags(); ?></p>" to single.php
	- added "$content_width" variable in functions.php
	- replaced "<?" with "<?php" in functions.php
	- added "<?php wp_link_pages(); ?>" to single.php
	- changed "get_option(home)" to "home_url()" in header.php
	- added "readme.txt" to theme directory
	- added style for ".recentcomments" widget
	- added support for oEmbed media embedding
	- changed "get_settings()" to "get_option()" in header.php and functions.php
	- removed get settings code from footer (redundant)
	- changed "bloginfo(url)" to "echo home_url()" in footer.php
	- swapped hard-coded comment form with "comment_form()" in comments.php
	- replaced hard-coded URL in searchform.php with dynamic one
	- changed "automatic_feed_links()" to "add_theme_support('automatic-feed-links')" in functions.php
	- changed "bloginfo('template_directory')" to "echo get_template_directory_uri()" 3x in footer.php
	- appended ".replace(/ /g,'+')" to search function to fix searches for multiple terms (whitespace)
	- added class to paged-comment links in comments.php
	- new screenshot.png for v2
