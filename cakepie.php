<?php
/**
 * Menu : cakes and pies
 *
 */
?>

<div id="content" class="menus-content" role="main">

<!-- start cakepie specials query -->
 <div class="category section">
         <ul class="products">

                    
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 40
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No cakes or pies right now' );
		}
		wp_reset_postdata();
	?>
<!--/.products-->
                    </ul>

     </ul>
      </div></div>

<?php
    
wp_reset_query();  // Restore global post data stomped by the_post().
?>
