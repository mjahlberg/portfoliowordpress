<?php 
/**
 * Footer template - this file content is displayed on every page after the main content.
 */
?>
</div>
<?php
global $pexeto_page;
$show_footer = (isset($pexeto_page['show_footer']) && $pexeto_page['show_footer']==false) ? false : true;
if($show_footer){
?>
<footer id="footer" class="center">
	<?php if(pexeto_option('show_scroll_btn')){ ?>
	<div class="scroll-to-top"><span></span></div>
	<?php } ?>

	<?php if(pexeto_option('show_ca')){ 
		$ca_use_po = pexeto_option('ca_use_po');
		$ca_title = $ca_use_po ? __( 'Call to action section title', 'pexeto' ) : pexeto_option('ca_title');
		$ca_desc = $ca_use_po ? __( 'Call to action section description', 'pexeto' ) : pexeto_option('ca_desc');
		$ca_btn_text = $ca_use_po ? __( 'Call to action button text', 'pexeto' ) : pexeto_option('ca_btn_text');

		//PRINT THE CALL TO ACTION SECTION
		?>

	<div id="footer-cta">
        <div class="subscribe">
            <h1 style="padding-bottom: 60px; text-align: center">Sign Up for Exclusive Updates</h1>
            <div class="section-boxed">
               <form style="margin: auto" action="http://mobilefirstmail.createsend.com/t/d/s/tkjkuu/" method="post">

                       <input type="email" placeholder="your email address" id="fieldEmail" name="cm-tkjkuu-tkjkuu" required>
                       <input type="submit" value="SUBSCRIBE">

               </form>
            </div>
        </div>
		<div class="section-boxed" style="text-align: center;margin-top: 75px;">
              <span class="social-icons">
                    <a href="http://instagram.com/charlottemckinney" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.facebook.com/thecharlottemckinney" target="_blank"> <i  class="fa fa-facebook"></i></a>
                     <a href="https://www.youtube.com/watch?v=4WTA_8waxTo" target="_blank"> <i class="fa fa-youtube"></i></a>
                    <a href="https://twitter.com/char_mck" target="_blank"><i  class="fa fa-twitter"></i></a>
              </span>
        </div>
	</div>
	<?php } 

//PRINT THE FOOTER COLUMNS
$footer_layout = pexeto_option("footer_layout");
$sidebar_numbers = array("one", "two", "three", "four");
$column_num = intval($footer_layout);
if($footer_layout!="no-footer"){ ?>
	<div class="cols-wrapper footer-widgets section-boxed cols-<?php echo $column_num; ?>">
	<?php
	if($column_num>0){
		for($i=1; $i<=$column_num; $i++){
			$number = $sidebar_numbers[$i-1]; 
			$add_class = $i==$column_num ? ' nomargin':'';
			?><div class="col<?php echo $add_class; ?>"><?php
			dynamic_sidebar("footer-".$number);
			?></div><?php
		}
	}
	?>
	</div>
	<?php
}
?>
<div class="footer-bottom">
	<div class="section-boxed">
<span class="copyrights">
	<?php if(pexeto_option('footer_copyright')=='custom'){
		echo pexeto_option('footer_copyright_text');
	}else{ ?>
		&copy; <?php echo __( 'Copyright', 'pexeto' ).' ';
		bloginfo('name'); 
	}
?>
</span>
<div class="footer-nav">
<?php wp_nav_menu(array('theme_location' => 'pexeto_footer_menu', 'fallback_cb'=>'pexeto_no_footer_menu', 'depth'=>1)); ?>
</div>

<?php locate_template( array( 'includes/social-icons.php' ), true, false ); ?>

</div>
</div>
</footer> <!-- end #footer-->
<?php } //end if show footer
 ?>
</div> <!-- end #main-container -->
</div><!-- /st-content-inner -->
</div><!-- /st-content -->
</div><!-- /st-pusher -->
</div><!-- /st-container -->
<!-- FOOTER ENDS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/sidebarEffects.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.js"></script>


<!-- BigVideo Dependencies -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/video.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<!-- BigVideo -->
<script src="<?php echo get_template_directory_uri(); ?>/js/bigvideo.js"></script>



<script>
    if (Modernizr.touch) {
       //alert('Touch Screen');
    } else {
        //alert('no Touch');
       // $.stellar({
         //   horizontalScrolling:false
       // });
    }
    "use strict";
    $(function() {
        $(".youtube").each(function() {
            // Based on the YouTube ID, we can easily find the thumbnail image
            $(this).css('background-image', 'url(<?php echo get_template_directory_uri(); ?>/images/vid_bg.png)');
            //$(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');

            // Overlay the Play icon to make it look like a video player
            $(this).append($('<div/>', {'class': 'play'}));

            $(document).delegate('#'+this.id, 'click', function() {
                // Create an iFrame with autoplay set to true
                var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
                if ($(this).data('params')) iframe_url+='&'+$(this).data('params');

                // The height and width of the iFrame should be the same as parent
                var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })

                // Replace the YouTube thumbnail with YouTube HTML5 Player
                $(this).replaceWith(iframe);
            });
        });
    });
</script>
<?php 
wp_footer(); 
?>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-57469737-2', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>