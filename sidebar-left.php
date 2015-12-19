<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrapped_FTP
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'sidebar-left' ); ?>
