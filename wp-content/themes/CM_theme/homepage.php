<?php
/**
 * Template Name: Homepage
 */
get_header();


if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        // $page_content = pexeto_a

        //get all the page meta data (settings) needed (function located in unctions/meta.php)
        $pexeto_page=pexeto_get_post_meta( $post->ID, array( 'slider', 'header_display', 'sidebar' ) );

        $pexeto_page['layout'] = 'full';
        $pexeto_full = new stdClass();

        //include the before content template
        locate_template( array( 'includes/html-before-content_homepage.php' ), true, true );

        //display the page content

        $pexeto_full->content = '<div class="custom-page-content" >'.pexeto_filter_home_content(get_the_content()).'</div>';
        $pexeto_full->content = do_shortcode($pexeto_full->content );
        echo $pexeto_full->content;

        wp_link_pages();

        $pexeto_full->share_btns = pexeto_get_share_btns_html( $post->ID, 'page' );
        $pexeto_full->box_section = ( pexeto_option( 'page_comments' ) && $pexeto_full->share_btns);

        if($pexeto_full->box_section){
            //open a boxed section
            ?><div class="section-boxed"><?php
        }

        //print sharing
        echo $pexeto_full->share_btns;

        if ( pexeto_option( 'page_comments' ) ) {
            //include the comments template
            comments_template();
        }

        if($pexeto_full->box_section){
            ?></div><?php
        }

    }
}

//include the after content template
locate_template( array( 'includes/html-after-content-home.php' ), true, true );

get_footer();
?>
<style>


    .header-wrapper {
        background: transparent !important;
    }
    .full-bg-image {
        display: none !important;
    }

</style>
<!-- Demo -->
<script>


    $(function() {
        //Modernizr function
        var opts = {
            controls: false,
            doLoop: true
        }

        var BV = new $.BigVideo(opts, {useFlashForFirefox:false});
        BV.init();

        if (Modernizr.touch) {
            BV.show( '<?php echo get_template_directory_uri(); ?>/images/top_bg.jpg');
        } else {
            BV.show('<?php echo get_template_directory_uri(); ?>/vids/cm_video.mp4', {ambient:true});
        }
    });
</script>
