<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package hana
 * @since hana 1.0
 */
?>
<div id="mobfooter">
<?php dynamic_sidebar( 'mobhomewid' ); ?>
</div>
<div id="sdfooter">
<div class="footer1">
<?php dynamic_sidebar( 'sitewide_footer_left' ); ?>
</div>
<div class="footer2">
<?php dynamic_sidebar( 'sitewide_footer_middle' ); ?>
</div>
<div class="footer3">
<?php dynamic_sidebar( 'sitewide_footer_right' ); ?>
</div>
</div><!-- .container --></div></div>
<!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>