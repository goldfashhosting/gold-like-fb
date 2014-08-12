<?php
/*
Plugin Name: Gold Like FB
Plugin URL: https://goldfash.com:443/plugins
Description: A Required Sync Plugin by GoldFash
Version: 0.1
Author: GoldFash Design
Author URI:        https://goldfash.com:443/
Contributors:      raceanf
Text Domain:       gold-like-fb
Domain Path:       /languages
GitHub Plugin URI: https://github.com/goldfashhosting/gold-like-fb
GitHub Branch:     master
*/


$fb_opt_name = "like_fb_show";
$gp_opt_name = "like_gplus_show";



/*************Plugin Functions****************/
function get_the_like_button($url){
 $iframe = "<iframe src=\"//www.facebook.com/plugins/like.php?href={$url}&amp;send=false&amp;layout=box_count&amp;width=0&amp;show_faces=false&amp;font=lucida+grande&amp;colorscheme=light&amp;action=like&amp;height=0&amp;appId=520110058111439\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:50px; height:70px;\" allowTransparency=\"true\"></iframe>";
return $iframe;	
}

function get_the_plus_button($size="tall"){
    $plus_code = "
<div class=\"g-plusone\" data-size=\"{$size}\"></div>
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>";
    return $plus_code;
}

function like_fb($content)  {
       global $fb_opt_name,$gp_opt_name;
	//retrieve post id
	$post_id =  get_the_ID();
	//retrieve post url
	$url = get_permalink($post_id);
	//encode the url
	$url = urlencode($url);
	//add like button at the beginning of the content
	
        $plugin_content = "<div style='float:left;margin-left:17px;'>";
        
        $nl = FALSE;
        if(get_option($fb_opt_name)){
            $plugin_content .= get_the_like_button($url);
            $nl = TRUE;
        }

        if(get_option($gp_opt_name)){
            if($nl){
                $plugin_content .= "<br />";
            }
            $plugin_content .= get_the_plus_button();
        }
        $plugin_content .= "</div>";
        
        
        $content = $plugin_content.$content;
        
    return $content;
}
/***************Plugin Functions****************/

/****** Admin Functions *********/

function like_fb_menu() {
	add_options_page( 'GoldFB Like Plugin Options', 'GoldFB Like', 'manage_options', 'GoldFB_Likes-fb-option', 'like_fb_plugin_options' );
}

function like_fb_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include __DIR__."/options.php";
}

/************End Admin Functions**************/

add_filter('the_content', 'like_fb'); 

add_action( 'admin_menu', 'like_fb_menu' );
