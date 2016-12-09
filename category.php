<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hana
 * @since hana 1.0
 */

get_header(); ?>

		<section id="primary" class="content-area">
			<div id="content" class="entry-content" role="main">

			<?php single_cat_title(); ?><?php echo category_description( $category_id ); ?> 

<!-- Start the Loop. -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <!-- Display the Title as a link to the Post's permalink. -->

 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>


 <!-- Display the Post's content in a div box. -->

 <div class="entry">
   <?php the_content(); ?>
 </div>

 <!-- Stop The Loop (but note the "else:" - see next line). -->

 <?php endwhile; else: ?>


 <!-- The very first "if" tested to see if there were any Posts to -->
 <!-- display.  This "else" part tells what do if there weren't any. -->
 <p>Sorry, no posts matched your criteria.</p>


 <!-- REALLY stop The Loop. -->
 <?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>