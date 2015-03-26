<?php
/**
 * Prints the content after the content of the page - prints the sidebar
 * (if the post/page supports one) and closes some of the main content divs.
 */
global $pexeto_page;

if ( $pexeto_page['layout']!='grid-full' ) { ?>
</div> <!-- end main content holder (#content/#full-width) -->
<?php
}
if ( $pexeto_page['layout']!='full'&&$pexeto_page['layout']!='none'&&$pexeto_page['layout']!='grid-full' ) {?>
	<div id="sidebar" class="sidebar"><?php dynamic_sidebar( $pexeto_page['sidebar'] ); ?></div>
<?php }

?>
<div class="clear"></div>
</div>
<!-- end #content-container -->

<div  class="section-full-width section-dark bio-holder " style="height:auto;background-size: cover;background-position: center; background-image:url(<?php the_field('bio_background_image'); ?>); " class="full-bg-image" >

    <div class="section-boxed bio-frame" style="color:black;height:500px">
        <?php the_field('about_paragraph'); ?>
    </div>
</div>



