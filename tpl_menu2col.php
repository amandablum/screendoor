<?php
/**
Template Name: 2 Column Menu Template
 */

get_header(); ?>


		<div id="primary" class="content-area">
			<div id="menumenu">
				<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); 
				?>
				<h5>also: <a href="http://screendoorrestaurant.com/itemnote/vegetarian/">vegetarian options</a> <a href="http://screendoorrestaurant.com/itemnote/vegan/">vegan options</a> <a href="http://screendoorrestaurant.com/itemnote/gluten-free/">gluten free options</a></h5></div></div>

				<p></p><div class="aligncenter"><h3><?php the_field('menu_hours'); ?></h3>
				
				
				<div id="content" class="site-content" role="main">
				
					<div id="colleft">
					<?php
					$selmenu = get_field('sel_menu');
					get_template_part( $selmenu );
					?>	
					</div>
				</div>
				<div id="colright">
<?php

/*
* Loop through a repeater field
*/

if(get_field('right_side')): ?>

    <?php while(the_repeater_field('right_side')): ?>
        <img src="<?php the_sub_field('rs_img'); ?>" alt="" />
    <?php endwhile; ?>

 <?php endif;
?>
				</div>
					</div>



<?php get_footer(); ?>	
</div><!-- primary -->