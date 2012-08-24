<?php

/*
Plugin Name: Vimeo for Wordpress
Plugin URI: http://downloads.wordpress.org/plugin/vimeo-for-wordpress.zip
Description: <a href="options-general.php?page=vimeoforwordpress">Set-up</a> | This is a simple plugin that adds a custom field to the bottom of your editing screen, you can add vimeo videos by selecting the video from the drop down lists or adding the URL of the vimeo video's page in the box.
Version: 1.2
Author: Colin Wren
Author URI: http://www.gimpneek.com/blog/
*/

/*

2009 Colin Wren

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/*******************************************************************************************************/

add_action('activate_vimeo-for-wordpress/vimeo-for-wordpress.php', 'vimeoforwordpress_install');





add_action('admin_init', 'post_links_add');

function post_links_add() {
add_meta_box('Vimeo for Wordpress', __('Vimeo for Wordpress', 'vimeo-for-wordpress'), 'vimeoforwordpress_write_body', 'post', 'normal');
	add_meta_box('Vimeo for Wordpress', __('Vimeo for Wordpress', 'vimeo-for-wordpress'), 'vimeoforwordpress_write_body', 'page', 'normal');
}






function vimeoforwordpress_write_body(){
?>

<script type="text/javascript">
        var vimeoUserName = '<?php echo get_option('username') ?>';
        var show_title = '<?php echo get_option('vimeo_show_title') ?>';
        var show_by_line = '<?php echo get_option('vimeo_show_by_line') ?>';
        var show_portrait = '<?php echo get_option('vimeo_show_portrait') ?>';
        var vid_colour = '<?php echo get_option('vimeo_vid_colour') ?>';
        var fullscreen = '<?php echo get_option('vimeo_fullscreen') ?>';
        var vid_height = '<?php echo get_option('vimeo_vid_height')?>';
        var vid_width = '<?php echo get_option('vimeo_vid_width') ?>';
		
		// Tell Vimeo what function to call
		var callback = 'showThumbs';
		var callback_friends = 'contactsClips';
		
		// Set up the URLs
		var url = 'http://www.vimeo.com/api/' + vimeoUserName + '/clips.json?callback=' + callback;
		var url_friends = 'http://www.vimeo.com/api/'+ vimeoUserName + '/contacts_clips.json?callback=' + callback_friends;
		
		// This function goes through the clips and puts them on the page


		function showThumbs(clips){
		var thumbs = document.getElementById('select_vid_drop');
			var dropform = document.createElement('form');
			dropform.setAttribute('name','vids');
			thumbs.appendChild(dropform);
			var dropselect = document.createElement('select');
			dropselect.setAttribute('name','vids_menu');
			dropform.appendChild(dropselect);
			
			for (var i = 0; i < clips.length; i++) {
				var dropdown = document.createElement('option');
				dropdown.setAttribute('value', clips[i].clip_id);
				dropdown.appendChild(document.createTextNode(clips[i].title));
				dropselect.appendChild(dropdown);
				}
				
				var dropbutton = document.createElement('input');
				dropbutton.setAttribute('type','button');
				dropbutton.setAttribute('value','Add Video');
				dropbutton.setAttribute('onclick','meh();');
				dropform.appendChild(dropbutton);
				
				}

				
		function contactsClips(friends_vid){
		var friend_vid = document.getElementById('select_friend_vid');
			var dropform_friend = document.createElement('form');
			dropform_friend.setAttribute('name','vids_friends');
			friend_vid.appendChild(dropform_friend);
			var dropselect_friend = document.createElement('select');
			dropselect_friend.setAttribute('name','vids_menu_friends');
			dropform_friend.appendChild(dropselect_friend);
			
			for (var i = 0; i < friends_vid.length; i++) {
				var dropdown_friend = document.createElement('option');
				dropdown_friend.setAttribute('value', friends_vid[i].clip_id);
				dropdown_friend.appendChild(document.createTextNode(friends_vid[i].title));
				dropselect_friend.appendChild(dropdown_friend);
				}
				
				var friendbutton = document.createElement('input');
				friendbutton.setAttribute('type','button');
				friendbutton.setAttribute('value','Add Video');
				friendbutton.setAttribute('onclick','meh_friends();');
				dropform_friend.appendChild(friendbutton);
				
				
				
				}
				

		
		
		var inputbox = document.getElementById('content').value;
		function meh(){
		var embed = '<!-- This is the Embed code for '
		embed += document.vids.vids_menu.options[document.vids.vids_menu.selectedIndex].text;
		embed += ' Delete all of this code to remove the video-->'
		embed += '\n'
		embed += '\n'
		embed += '<object width="'
		embed += vid_width
		embed += '" height="'
		embed += vid_height
		embed += '" type="application/x-shockwave-flash" data="http://vimeo.com/moogaloop.swf?clip_id='
		embed += document.vids.vids_menu.options[document.vids.vids_menu.selectedIndex].value;
		embed += '&amp;server=vimeo.com&amp;show_title='
		embed += show_title
		embed += '&amp;show_byline='
		embed += show_by_line
		embed += '&amp;show_portrait='
		embed += show_portrait
		embed += '&amp;color='
		embed += vid_colour
		embed += '&amp;fullscreen='
		embed += fullscreen
		embed += '" ><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='
		embed += document.vids.vids_menu.options[document.vids.vids_menu.selectedIndex].value;
		embed += '&amp;server=vimeo.com&amp;show_title='
		embed += show_title
		embed += '&amp;show_byline='
		embed += show_by_line
		embed += '&amp;show_portrait='
		embed += show_portrait
		embed += '&amp;color='
		embed += vid_colour
		embed += '&amp;fullscreen='
		embed += fullscreen
		embed += '" /></object>'
		embed += '\n'
		embed += '\n'
		embed += '<!-- The Embed code for '
		embed += document.vids.vids_menu.options[document.vids.vids_menu.selectedIndex].text;
		embed += ' Ends here-->'
		edCanvas.value += embed
		
				
		}
		
		function meh_friends(){
		var embed = '<!-- This is the Embed code for '
		embed += document.vids.vids_menu.options[document.vids.vids_menu.selectedIndex].text;
		embed += ' Delete all of this code to remove the video-->'
		embed += '\n'
		embed += '\n'
		embed += '<object width="'
		embed += vid_width
		embed += '" height="'
		embed += vid_height
		embed += '" type="application/x-shockwave-flash" data="http://vimeo.com/moogaloop.swf?clip_id='
	    embed += document.vids_friends.vids_menu_friends.options[document.vids_friends.vids_menu_friends.selectedIndex].value;
		embed += '&amp;server=vimeo.com&amp;show_title='
		embed += show_title
		embed += '&amp;show_byline='
		embed += show_by_line
		embed += '&amp;show_portrait='
		embed += show_portrait
		embed += '&amp;color='
		embed += vid_colour
		embed += '&amp;fullscreen='
		embed += fullscreen
		embed += '" ><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='
		embed += document.vids_friends.vids_menu_friends.options[document.vids_friends.vids_menu_friends.selectedIndex].value;
		embed += '&amp;server=vimeo.com&amp;show_title='
		embed += show_title
		embed += '&amp;show_byline='
		embed += show_by_line
		embed += '&amp;show_portrait='
		embed += show_portrait
		embed += '&amp;color='
		embed += vid_colour
		embed += '&amp;fullscreen='
		embed += fullscreen
		embed += '" /></object>'
		embed += '\n'
		embed += '\n'
		embed += '<!-- The Embed code for '
		embed += document.vids.vids_menu.options[document.vids.vids_menu.selectedIndex].text;
		embed += ' Ends here-->'
		
		edCanvas.value += embed
		
		
		}
		
		function meh_manual(){
		var input = document.getElementById('manual_input').value;
		var edited_input = input.match(/\d+$/)[0];
		var embed = '<!-- This is the embed code for the Vimeo video your entered into the manual entry box, please delete this code to remove the video -->'
		embed += '\n'
		embed += '\n'
		embed += '<object width="'
		embed += vid_width
		embed += '" height="'
		embed += vid_height
		embed += '" type="application/x-shockwave-flash" data="http://vimeo.com/moogaloop.swf?clip_id='
        embed += edited_input;
		embed += '&amp;server=vimeo.com&amp;show_title='
		embed += show_title
		embed += '&amp;show_byline='
		embed += show_by_line
		embed += '&amp;show_portrait='
		embed += show_portrait
		embed += '&amp;color='
		embed += vid_colour
		embed += '&amp;fullscreen='
		embed += fullscreen
		embed += '" ><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='
		embed += edited_input;
		embed += '&amp;server=vimeo.com&amp;show_title='
		embed += show_title
		embed += '&amp;show_byline='
		embed += show_by_line
		embed += '&amp;show_portrait='
		embed += show_portrait
		embed += '&amp;color='
		embed += vid_colour
		embed += '&amp;fullscreen='
		embed += fullscreen
		embed += '" /></object>'
		embed += '\n'
		embed += '\n'
		embed += '<!-- The Embed code for the Vimeo video ends here -->'
		
		edCanvas.value += embed
		
		
		}
		
		function init() {
			var js = document.createElement('script');
			js.setAttribute('type', 'text/javascript');
			js.setAttribute('src', url);
			document.getElementsByTagName('head').item(0).appendChild(js);
			var js1 = document.createElement('script');
			js1.setAttribute('type', 'text/javascript');
			js1.setAttribute('src', url_friends);
			document.getElementsByTagName('head').item(0).appendChild(js1);
		}
		
		
		window.onload = init;
</script>

	
<div id="vimeoforwordpress_boxes" class="postbox">
<div id="select_vid"><p>Choose from your videos:</p>
	<p id="select_vid_drop"></p>
	<p>Choose from your friends videos:</p>
	<p id="select_friend_vid"></p>
	<p>Or copy and paste the URL of the Vimeo page:</p>
	<p id="manual_entry"><input id="manual_input" type="text" /><input type="button" value="Add Video" onclick="meh_manual();" />
	</p>
	</div></div>
	<?php

}


function vimeoforwordpress_install()
{
if (isset($_POST['vimeo_submit'])) :
		update_option('vimeo_show_title', $_POST['vimeo_show_title']);
		update_option('vimeo_show_by_line', $_POST['vimeo_show_by_line']);
		update_option('vimeo_show_portrait', $_POST['vimeo_show_portrait']);
		update_option('vimeo_fullscreen', $_POST['vimeo_fullscreen']);
		echo '<div id="message" class="updated fade"><p>Option Saved!</p></div>';
    endif;
 if (get_option('vimeo_show_title')) {
		$show_title = ' checked="checked"';
    } else {
        $show_title = '';
    }
   
 if (get_option('vimeo_show_by_line')) {
		$show_by_line = ' checked="checked"';
    } else {
        $show_by_line = '';
    }

 if (get_option('vimeo_show_portrait')) {
		$show_portrait = ' checked="checked"';
    } else {
        $show_portrait = '';
    }

 if (get_option('vimeo_fullscreen')) {
		$show_fullscreen = ' checked="checked"';
    } else {
        $show_fullscreen = '';
    }

?>

<div class="wrap">
<h2><img src="<?php echo get_option('siteurl') . '/wp-content/plugins/vimeo-for-wordpress/logo.png' ?>" alt="vimeo for wordpress logo" /> Vimeo for Wordpress 
</h2>
<p>To work properly Vimeo for Wordpress requires your Vimeo username.</p>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Vimeo User Name</th>
<td><input type="text" name="username" value="<?php echo get_option('username'); ?>" /></td>
</tr>
 
<tr valign="top">
<th scope="row">Can't find your user name?</th>
<td>Your username is the word displayed after the slash in the URL for your user profile e.g. http://www.vimeo.com/gimpneek. In this case the user name is gimpneek</td>
</tr>

<tr valign="top">
<th scope="row">Video Option defaults</th>
<td>
Show the video's title?<input type="checkbox" name="vimeo_show_title" value="1" <?php echo $show_title ?> /><br />
Show the video owner's name? <input type="checkbox" name="vimeo_show_by_line" value="1" <?php echo $show_by_line ?> /><br />
Show the video owner's profile picture?<input type="checkbox" name="vimeo_show_portrait" value="1" <?php echo $show_portrait ?> /><br />
What colour should the video's text be? #:<input type="text" title="color" name="vimeo_vid_colour" value="<?php echo get_option('vimeo_vid_colour'); ?>">
<br />
<em>Please enter hex codes only in the format: RRGGBB</em><br />
Show the fullscreen button?<input type="checkbox" name="vimeo_fullscreen" value="1" <?php echo $show_fullscreen ?> /><br />
Player width?<input type="text" name="vimeo_vid_width" value="<?php echo get_option('vimeo_vid_width'); ?>" /><br />
Player height?<input type="text" name="vimeo_vid_height" value="<?php echo get_option('vimeo_vid_height'); ?>" /><br />
</td>
</tr>

</table>





<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="username,vimeo_show_title,vimeo_show_by_line,vimeo_show_portrait,vimeo_vid_colour,vimeo_fullscreen,vimeo_vid_width,vimeo_vid_height," />

<p class="submit">
<input type="submit" class="button-primary" name="vimeo_submit" id="vimeo_submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>




<?php
}

//$mypage = add_management_page( 'myplugin', 'myplugin', 9, __FILE__, 'myplugin_admin_page' );

 
function bot_admin_actions()
{
    $mypage = add_options_page("Vimeo for Wordpress", "Vimeo for Wordpress", 1,
"vimeoforwordpress", "vimeoforwordpress_options");
add_action( "admin_print_scripts-$mypage", 'vimeoforwordpress_admin_head' );
}
 
add_action('admin_menu', 'bot_admin_actions');


 
function vimeoforwordpress_admin_head() {

?>
<link rel='stylesheet' href='<?php echo get_option('siteurl') ?>/wp-content/plugins/vimeo-for-wordpress/colourpicker.css' type='text/css' />
<!-- flooble Color Picker header start --> 
<script language="Javascript">
// Color Picker Script from Flooble.com
// For more information, visit 
//	http://www.flooble.com/scripts/colorpicker.php
// Copyright 2003 Animus Pactum Consulting inc.
// You may use and distribute this code freely, as long as
// you keep this copyright notice and the link to flooble.com
// if you chose to remove them, you must link to the page
// listed above from every web page where you use the color
// picker code.
//---------------------------------------------------------
     var perline = 9;
     var divSet = false;
     var curId;
     var colorLevels = Array('0', '3', '6', '9', 'C', 'F');
     var colorArray = Array();
     var ie = false;
     var nocolor = 'none';
	 if (document.all) { ie = true; nocolor = ''; }
	 function getObj(id) {
		if (ie) { return document.all[id]; } 
		else {	return document.getElementById(id);	}
	 }

     function addColor(r, g, b) {
     	var red = colorLevels[r];
     	var green = colorLevels[g];
     	var blue = colorLevels[b];
     	addColorValue(red, green, blue);
     }

     function addColorValue(r, g, b) {
     	colorArray[colorArray.length] =  r + r + g + g + b + b;
     }
     
     function setColor(color) {
     	var link = getObj(curId);
     	var field = getObj(curId + 'field');
     	var picker = getObj('colorpicker');
     	field.value = color;
     	if (color == '') {
	     	link.style.background = nocolor;
	     	link.style.color = nocolor;
	     	color = nocolor;
     	} else {
	     	link.style.background = '#' + color;
	     	link.style.color = '#' + color;
	    }
     	picker.style.display = 'none';
	    eval(getObj(curId + 'field').title);
     }
        
     function setDiv() {     
     	if (!document.createElement) { return; }
        var elemDiv = document.createElement('div');
        if (typeof(elemDiv.innerHTML) != 'string') { return; }
        genColors();
        elemDiv.id = 'colorpicker';
	    elemDiv.style.position = 'absolute';
        elemDiv.style.display = 'none';
        elemDiv.style.border = '#000000 1px solid';
        elemDiv.style.background = '#FFFFFF';
        elemDiv.innerHTML = '<span style="font-family:Verdana; font-size:11px;">Pick a color: ' 
          	+ '(<a href="javascript:setColor(\'5577FF\');">Default</a>)<br>' 
        	+ getColorTable() 
        	

        document.body.appendChild(elemDiv);
        divSet = true;
     }
     
     function pickColor(id) {
     	if (!divSet) { setDiv(); }
     	var picker = getObj('colorpicker');     	
		if (id == curId && picker.style.display == 'block') {
			picker.style.display = 'none';
			return;
		}
     	curId = id;
     	var thelink = getObj(id);
     	picker.style.top = getAbsoluteOffsetTop(thelink) + 20;
     	picker.style.left = getAbsoluteOffsetLeft(thelink);     
	picker.style.display = 'block';
     }
     
     function genColors() {
        addColorValue('0','0','0');
        addColorValue('3','3','3');
        addColorValue('6','6','6');
        addColorValue('8','8','8');
        addColorValue('9','9','9');                
        addColorValue('A','A','A');
        addColorValue('C','C','C');
        addColorValue('E','E','E');
        addColorValue('F','F','F');                                
			
        for (a = 1; a < colorLevels.length; a++)
			addColor(0,0,a);
        for (a = 1; a < colorLevels.length - 1; a++)
			addColor(a,a,5);

        for (a = 1; a < colorLevels.length; a++)
			addColor(0,a,0);
        for (a = 1; a < colorLevels.length - 1; a++)
			addColor(a,5,a);
			
        for (a = 1; a < colorLevels.length; a++)
			addColor(a,0,0);
        for (a = 1; a < colorLevels.length - 1; a++)
			addColor(5,a,a);
			
			
        for (a = 1; a < colorLevels.length; a++)
			addColor(a,a,0);
        for (a = 1; a < colorLevels.length - 1; a++)
			addColor(5,5,a);
			
        for (a = 1; a < colorLevels.length; a++)
			addColor(0,a,a);
        for (a = 1; a < colorLevels.length - 1; a++)
			addColor(a,5,5);

        for (a = 1; a < colorLevels.length; a++)
			addColor(a,0,a);			
        for (a = 1; a < colorLevels.length - 1; a++)
			addColor(5,a,5);
			
       	return colorArray;
     }
     function getColorTable() {
         var colors = colorArray;
      	 var tableCode = '';
         tableCode += '<table border="0" cellspacing="1" cellpadding="1">';
         for (i = 0; i < colors.length; i++) {
              if (i % perline == 0) { tableCode += '<tr>'; }
              tableCode += '<td bgcolor="#000000"><a style="outline: 1px solid #000000; color: #' 
              	  + colors[i] + '; background: #' + colors[i] + ';font-size: 10px;" title="' 
              	  + colors[i] + '" href="javascript:setColor(\'' + colors[i] + '\');"> &nbsp;&nbsp;&nbsp;  </a></td>';
              if (i % perline == perline - 1) { tableCode += '</tr>'; }
         }
         if (i % perline != 0) { tableCode += '</tr>'; }
         tableCode += '</table>';
      	 return tableCode;
     }
     function relateColor(id, color) {
     	var link = getObj(id);
     	if (color == '') {
	     	link.style.background = nocolor;
	     	link.style.color = nocolor;
	     	color = nocolor;
     	} else {
	     	link.style.background = '#' + color;
	     	link.style.color = '#' + color;
	    }
	    eval(getObj(id + 'field').title);
     }
     function getAbsoluteOffsetTop(obj) {
     	var top = obj.offsetTop;
     	var parent = obj.offsetParent;
     	while (parent != document.body) {
     		top += parent.offsetTop;
     		parent = parent.offsetParent;
     	}
     	return top;
     }
     
     function getAbsoluteOffsetLeft(obj) {
     	var left = obj.offsetLeft;
     	var parent = obj.offsetParent;
     	while (parent != document.body) {
     		left += parent.offsetLeft;
     		parent = parent.offsetParent;
     	}
     	return left;
     }


</script>
<!-- flooble Color Picker header end -->      


<?php	
}

function vimeoforwordpress_options(){

if (isset($_POST['vimeo_submit'])) :
		update_option('vimeo_show_title', $_POST['vimeo_show_title']);
		update_option('vimeo_show_by_line', $_POST['vimeo_show_by_line']);
		update_option('vimeo_show_portrait', $_POST['vimeo_show_portrait']);
		update_option('vimeo_fullscreen', $_POST['vimeo_fullscreen']);
		echo '<div id="message" class="updated fade"><p>Option Saved!</p></div>';
    endif;
 if (get_option('vimeo_show_title')) {
		$show_title = ' checked="checked"';
    } else {
        $show_title = '';
    }
   
 if (get_option('vimeo_show_by_line')) {
		$show_by_line = ' checked="checked"';
    } else {
        $show_by_line = '';
    }

 if (get_option('vimeo_show_portrait')) {
		$show_portrait = ' checked="checked"';
    } else {
        $show_portrait = '';
    }

 if (get_option('vimeo_fullscreen')) {
		$show_fullscreen = ' checked="checked"';
    } else {
        $show_fullscreen = '';
    }

?>

<div class="wrap">
<h2><img src="<?php echo get_option('siteurl') . '/wp-content/plugins/vimeo-for-wordpress/logo.png' ?>" alt="vimeo for wordpress logo" /> Vimeo for Wordpress 
</h2>
<p>To work properly Vimeo for Wordpress requires your Vimeo username.</p>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Vimeo User Name</th>
<td><input type="text" name="username" value="<?php echo get_option('username'); ?>" /></td>
</tr>
 
<tr valign="top">
<th scope="row">Can't find your user name?</th>
<td>Your username is the word displayed after the slash in the URL for your user profile e.g. http://www.vimeo.com/gimpneek. In this case the user name is gimpneek</td>
</tr>

<tr valign="top">
<th scope="row">Video Option defaults</th>
<td>
Show the video's title?<input type="checkbox" name="vimeo_show_title" value="1" <?php echo $show_title ?> /><br />
Show the video owner's name? <input type="checkbox" name="vimeo_show_by_line" value="1" <?php echo $show_by_line ?> /><br />
Show the video owner's profile picture?<input type="checkbox" name="vimeo_show_portrait" value="1" <?php echo $show_portrait ?> /><br />
What colour should the video's text be? #:
<em style="cursor: pointer;" onclick="javascript:pickColor('pick1252534095');" id="pick1252534095">&nbsp;&nbsp;&nbsp;</em>
<input id="pick1252534095field" size="7" onChange="relateColor('pick1252534095', this.value);" title="color" name="vimeo_vid_colour" value="<?php echo get_option('vimeo_vid_colour'); ?>" />
<script language="javascript">relateColor('pick1252534095', getObj('pick1252534095field').value);</script><br />
<em>Please enter hex codes only in the format: RRGGBB</em><br />
Show the fullscreen button?<input type="checkbox" name="vimeo_fullscreen" value="1" <?php echo $show_fullscreen ?> /><br />
Player width?<input type="text" name="vimeo_vid_width" value="<?php echo get_option('vimeo_vid_width'); ?>" /><br />
Player height?<input type="text" name="vimeo_vid_height" value="<?php echo get_option('vimeo_vid_height'); ?>" /><br />
<br />
<div>
<em>Below is a visual representation of the size of your video</em>
<br />
<img src="<?php echo get_option('siteurl') . '/wp-content/plugins/vimeo-for-wordpress/vidsize.png' ?>" width="<?php echo get_option('vimeo_vid_width') ?>" height="<?php echo get_option('vimeo_vid_height') ?>" >
</div>
</td>
</tr>

</table>






<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="username,vimeo_show_title,vimeo_show_by_line,vimeo_show_portrait,vimeo_vid_colour,vimeo_fullscreen,vimeo_vid_width,vimeo_vid_height," />

<p class="submit">
<input type="submit" class="button-primary" name="vimeo_submit" id="vimeo_submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}

?>
