<?php
 /**
 * WordPress search form template
 *
 * @package WP UnFramework
 * @subpackage searchform.php
 */
?>
<form role="search" action="<?php echo esc_url( home_url('/') ); ?>" id="searchform" method="get">
     <label for="s" class="screen-reader-text"><?php _e( 'Search for:', 'wpu' ); ?></label>
     <input type="search" id="s" name="s" value="" placeholder="<?php printf( __( 'Search: %s', 'wpu' ), get_bloginfo( 'name' ) ); ?>"/>
     <input type="submit" value="Search" id="searchsubmit" class="button" />
</form>