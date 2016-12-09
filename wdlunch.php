<?php
/**
 * Menu : weekday_lunch
 *
 */
?>

<div id="content" class="menus-content" role="main">

<!-- start weekday lunch query -->
<?php
//get all categories then display all posts in each term
$taxonomy = 'category';//  e.g. post_tag, category
$param_type = 'category__in'; //  e.g. tag__in, category__in
$term_args=array(
'name' => 'Weekday Lunch'
);
$terms = get_terms($taxonomy,$term_args);
     if ($terms) {

    foreach($terms as $term){ //this foreach is for top level
   if($terms){
$term_args=array(
  'orderby' => 'name',
  'order' => 'ASC',
);

$termss = get_terms($taxonomy,$term_args);
  foreach( $termss as $terms ) { //this foreach is for second level
    $args=array(
      "$param_type" => array($terms->term_id),
      'post_type' => 'wdlunchitems',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
      );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {  ?>
      <div class="category section">
        <h3><?php echo ''.$terms->name; //get second level category name?></h3> 
        <h4><?php echo ''.$terms->description; //get second level category description?></h4>
        <ul class="menus">
        <?php
while ($my_query->have_posts()) : $my_query->the_post();
	    echo "<li><div id='kmenuitem'>" ;
		the_title('<h3>','</h3>');
		echo "<span class='kitchen-entry'>" ;
the_content();
        echo get_the_term_list($post->ID, 'price', '...', ', ', ''); 
         echo "</span></li>" ;
      endwhile;
        ?>
 </ul>
      </div>
<?php
    }}
  }
  }
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>


<!-- end weekday lunch query -->
<!-- #content .site-content -->