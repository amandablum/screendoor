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
			<div id="menumenu">
				<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); 
				?>
				<h5>also: <a href="http://screendoorrestaurant.com/itemnote/vegetarian/">vegetarian options</a> <a href="http://screendoorrestaurant.com/itemnote/vegan/">vegan options</a> <a href="http://screendoorrestaurant.com/itemnote/gluten-free/">gluten free options</a></h5></div></div>
				<div class="aligncenter"><h2>All our <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->slug; ?> Menu Items</h2>
				<h3><div class="fell">We try to accommodate as many allergies and food concerns as possible. Be sure to let your server know and we'll do our best.</div></h3>
							
				<div id="content" class="site-content" role="main">
				
					<div id="colleft">
<div class="category-section"><ul class="menus">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

    echo "<li><div id='kmenuitem'>" ;
echo "<span class='kitchen-entry'>" ;
echo the_category(">", "multiple", $post->ID);
       echo "</span>" ;
		the_title('<h3>','</h3>');
		echo "<span class='kitchen-entry'>" ;
the_content();

        echo get_the_term_list($post->ID, 'price', '...', ', ', ''); 
        echo "</span></li>" ;
      endwhile;
    endif;
    ?>
    </ul>
					</div></div></div>
				<div id="colright">
<?php

/*
* Loop through a repeater field
*/

if(get_field('right_side', 1024)): ?>

    <?php while(the_repeater_field('right_side', 1024)): ?>
        <img src="<?php the_sub_field('rs_img'); ?>" alt="" />
    <?php endwhile; ?>

 <?php endif;
?>
				</div>
			</div>



<?php get_footer(); ?>	
</div><!-- primary -->