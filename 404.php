<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package hana
 * @since hana 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( '', 'hana' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'You appear lost. No problem- here are some suggestions.', 'hana' ); ?></p>
					
Feel like some fried chicken? Come on in, <a href="http://screendoorrestaurant.com/">we're probably serving some.</a><br>
Maybe you should <a href="http://screendoorrestaurant.com/screen-door-cake-and-pie-order-form/">just order a pie for pickup</a>. Any day is a good day for pie. <br>
Still have a question? <a href="http://screendoorrestaurant.com/contact/">Shoot us a note</a> and we'll get back to you. <br> 
Still feeling aimless? Try a search.<br> 
<?php get_search_form(); ?>
			
</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>