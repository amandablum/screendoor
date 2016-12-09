<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hana
 * @since hana 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'hana' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hana' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'zomg- we still havent found what youre looking for', 'hana' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'zomg- we still havent found what youre looking for', 'hana' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
