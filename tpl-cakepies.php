<?php
/**
Template Name: Cakes & Pies Template
 */

get_header(); ?>


		<div id="primary" class="content-area">
				<div class="aligncenter"><h2><?php the_field('menu_hours'); ?></h2>
				<h3><div class="fell"><?php the_field('cakepieinstructions'); ?></div></h3><br>
				
				<div id="content" class="site-content" role="main">
				
					<div id="colleft">
					<?php
					$selmenu = get_field('sel_menu');
					get_template_part( $selmenu );
					?>	
					<div class="woocommerce"><a href="http://howlingzoe.com/ft16/cart/" class="button wc-forward">Process Order</a></div>
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