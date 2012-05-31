<?php
/**
 * Dashboard Cleanup Functions. Removes all dashboard pages, dashboard widgets
 * and all default widgets. 
 * 
 * @since 0.1.0
 *
 * @package WP UnFramework
 * @subpackage dashboard-cleanup.php
 */
 
//Dashboard Action Hooks
// add_action( 'admin_init', 'remove_dashboard_meta' );
// add_action( 'admin_init', 'remove_post_meta' );
// add_action( 'admin_menu', 'remove_admin_menus' );
// add_action( 'admin_menu', 'remove_admin_submenus' );
// add_action('widgets_init', 'remove_default_widgets', 11);

 
 /**
  * remove_meta_box - Removes various meta_boxes from the post edit screens
  * remove_menu_page - Removes top level admin menu pages
  * remove_submenu_page - Removes sub level menu pages
  * 
  * Commented out by default. Uncomment where needed to activate
  * Using all arguments effectively removes all admin menus and meta_boxes
  * You can also filter these by user capabilities
  */
 
 
 function remove_dashboard_meta() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}

function remove_post_meta() {
	remove_meta_box( 'commentstatusdiv', 'page', 'normal' ); 
	remove_meta_box( 'commentstatusdiv', 'post', 'normal' ); 
	remove_meta_box( 'commentsdiv', 'page', 'normal' );
	remove_meta_box( 'commentsdiv', 'post', 'normal' );  
	remove_meta_box( 'authordiv', 'page', 'normal' );
	remove_meta_box( 'authordiv', 'post', 'normal' ); 
	remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
	remove_meta_box( 'trackbacksdiv', 'page', 'normal' );
	remove_meta_box( 'postcustom', 'post', 'normal' );
	remove_meta_box( 'postcustom', 'page', 'normal' );
	remove_meta_box( 'slugdiv', 'post', 'normal' );
	remove_meta_box( 'slugdiv', 'page', 'normal' );
	remove_meta_box( 'excerptdiv', 'post', 'normal' );
	remove_meta_box( 'page_choicediv', 'post', 'normal' );
	remove_meta_box( 'page_choicediv', 'sponsor_ad', 'normal' );
}

//Remove top level admin menus
function remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'link-manager.php' );
	remove_menu_page( 'tools.php' );
	remove_menu_page( 'plugins.php' );
	remove_menu_page( 'users.php' );
	remove_menu_page( 'options-general.php' );
	remove_menu_page( 'upload.php' );
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit.php?post_type=page' );
	remove_menu_page( 'themes.php' );
}


//Remove sub level admin menus
function remove_admin_submenus() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'themes.php', 'themes.php' );
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
	remove_submenu_page( 'edit.php', 'post-new.php' );
	remove_submenu_page( 'themes.php', 'nav-menus.php' );
	remove_submenu_page( 'themes.php', 'widgets.php' );
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
	remove_submenu_page( 'plugins.php', 'plugin-install.php' );
	remove_submenu_page( 'users.php', 'users.php' );
	remove_submenu_page( 'users.php', 'user-new.php' );
	remove_submenu_page( 'upload.php', 'media-new.php' );
	remove_submenu_page( 'options-general.php', 'options-writing.php' );
	remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	remove_submenu_page( 'options-general.php', 'options-reading.php' );
	remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	remove_submenu_page( 'options-general.php', 'options-media.php' );
	remove_submenu_page( 'options-general.php', 'options-privacy.php' );
	remove_submenu_page( 'options-general.php', 'options-permalinks.php' );
	remove_submenu_page( 'index.php', 'update-core.php' );
}

// Removes all default WordPress Widgets
function remove_default_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}
