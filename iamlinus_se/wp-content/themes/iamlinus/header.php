<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/1">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="http://www.iamlinus.se/wp-content/themes/iamlinus/1140.css" type="text/css" media="screen" />
	
	<!-- Your styles -->
	<link rel="stylesheet" href="http://www.iamlinus.se/wp-content/themes/iamlinus/style.css" type="text/css" media="screen" />
	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>

	
<link rel="shortcut icon" href="" type="image/vnd.microsoft.icon" />
<link rel="icon" href="" type="image/gif" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
  <body>
<div id="header">
 	<div id="logo">
		<div id="h1"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></div>
		<div id="h2" class="description"><?php bloginfo('description'); ?></div>
		</div>
<!-- Meny	<ul>
		<li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>" title="Home">Home</a></li>
		<?php wp_list_pages('title_li=&depth=1');?>
	</ul> -->
</div>