<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hana
 * @since hana 1.0
 */

get_header(); ?>


		<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
				<?php woocommerce_content(); ?>

		</div>

<?php get_footer(); ?>	
</div><!-- primary -->
