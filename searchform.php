<?php
 /**
 * WordPress Template searchform.php 
 *
 *
 * @package WP UnFramework
 * @subpackage Templates
 */
?>
<form role="search" action="<?php echo esc_url( home_url('/') ); ?>" id="searchform" method="get">
     <label for="s" class="screen-reader-text">Search for:</label>
     <input type="search" id="s" name="s" value="" placeholder="Search <?php  bloginfo( 'name' ); ?>"/>
     <input type="submit" value="Search" id="searchsubmit" class="button" />
</form>
