<?php
/**
Template Name: homepage
 */

get_header(); ?>
<div id="mobheader">
<?php the_field('mobheader'); ?>
</div>
<div id="mobmain" style="background-image: url('<?php the_field('mobimg'); ?>');">
<div class="mobbanner">
<img class="aligncenter" src="http://screendoorrestaurant.com/wp-content/uploads/2016/06/logohome.png" alt="logohome" width="75%" height="auto">
</div>
</div>
<div id="mobdesc">
<?php the_field('mobdesc'); ?>
</div>
<div id="mobfooter">
<?php dynamic_sidebar( 'mobhomewid' ); ?>
</div>

<div id="homeannouncement">
<img class="aligncenter" src="http://screendoorrestaurant.com/wp-content/uploads/2016/06/logohome.png" alt="logohome" width="657" height="207" />
</div>
		<h4 id="setpage"><?php the_field('homesetpage'); ?><br>↓ Hours & Details ↓</h4>
		<div id="mainbelow">
		<div id="primary" class="content-area">
		<div class="info">
		<?php the_field('homedesc'); ?>
<?php include ('sidebar-homepageabout.php'); 
		?>	</div>

<?php get_footer(); ?>	
</div> <!-- mainbelow -->
</div><!-- primary -->