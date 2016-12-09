<?php
/**
 * Menu : vegetable specials
 *
 */
?>

<div id="content" class="menus-content" role="main">

<!-- start vegetable specials query -->
 <div class="category section">
         <ul class="menus">

                        <?php $args = array('post_type' => 'vegitems'); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
 <?php
echo "<li><div id='kmenuitem'>" ;
        the_title('<h3>','</h3>');
        echo "<span class='kitchen-entry'>" ;
the_content();
        echo get_the_term_list($post->ID, 'price', '...', ', ', ''); 
        echo "<br>" ;    
        echo "</span></li>" ;
      endwhile;
        ?>
                       

                        <?php else: ?>
                            <h1>No posts here!</h1>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                    </ul>

     </ul>
      </div></div>

<?php
    
wp_reset_query();  // Restore global post data stomped by the_post().
?>

