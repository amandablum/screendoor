<?php
/**
Template Name: Regular Content Template
 */

get_header(); ?>


		<div id="primary" class="content-area">
			
				<div id="content" class="site-content" role="main">
				
					<div id="colleft">
						<h2><?php wp_title(''); ?></h2>
						<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>

						<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
					</div></div>
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