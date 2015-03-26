<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(pexeto_option('seo_separator'), true, 'right'); ?></title>

<?php
//print the Facebook and Google+ meta tags to include the featured image
//of the post/page when it is shared
global $post;
if(is_singular() && isset($post)){ 
	if($post->post_type==PEXETO_PORTFOLIO_POST_TYPE){
		$image = pexeto_get_portfolio_preview_img($post->ID);
		$image = $image['img'];
	}else{
		$image = pexeto_get_featured_image_url($post->ID);
	}

	if(!empty($image)){
	?>
<!-- facebook meta tag for image -->
<meta property="og:image" content="<?php echo $image; ?>"/>
<!-- Google+ meta tag for image -->
<meta itemprop="image" content="<?php echo $image; ?>">
<?php } 
}
?>


<!-- Mobile Devices Viewport Resset-->
<?php if(pexeto_option('responsive_layout')!==false){ ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<?php } ?>
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- <meta name="viewport" content="initial-scale=1.0, user-scalable=1" /> -->
<?php if(pexeto_option('seo_keywords')){ ?>
<!-- Keywords-->
<meta name="keywords" content="<?php echo pexeto_option('seo_keywords'); ?>" />
<?php } ?>




<?php 
//remove SEO indexation and following for the selected archives pages
if(is_archive() || is_search() || is_page_template('template-portfolio-gallery.php')){
	$exclude_index_pages=pexeto_option('seo_indexation');
	if($exclude_index_pages == '') $exclude_index_pages = array();
	if((is_category() && in_array('category', $exclude_index_pages))
	|| (is_author() && in_array('author', $exclude_index_pages))
	|| (is_tag() && in_array('tag', $exclude_index_pages))
	|| (is_date() && in_array('date', $exclude_index_pages))
	|| (is_search() && in_array('search', $exclude_index_pages))
	|| (is_page_template('template-portfolio-gallery.php') && isset($_GET['cat']) && in_array('pgcategory', $exclude_index_pages))
	){ ?>
<!-- Disallow content indexation on this page to remove duplicate content problems -->
<meta name="googlebot" content="noindex,nofollow" />
<meta name="robots" content="noindex,nofollow" />
<meta name="msnbot" content="noindex,nofollow" />
	<?php }
}
?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(pexeto_option('favicon')){ ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo pexeto_option('favicon'); ?>" />
<?php } ?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->

<?php wp_head(); ?>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<!--Bigvideo CSS-->
	<link rel="stylesheet" href=<?php echo get_template_directory_uri(); ?>/css/bigvideo.css>

    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.51224.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/css/normalize.css"></script>
</head>
<body <?php body_class(); ?>>
<div id="st-container" class="st-container">
	<nav class="st-menu st-effect-4" id="menu-4">
		<h2 class="icon icon-lab">Charlotte</h2>
            <?php
            $menu_args = array(
                'theme_location' => 'pexeto_main_menu',
                'container' => false,
                'menu_class' => 'menu-ul');
            wp_nav_menu($menu_args); ?>
	</nav>
	<div class="st-pusher">
	<div class="st-content"><!-- this is the wrapper for the content -->
		<div class="st-content-inner">
<div id="main-container" >
	<div  class="page-wrapper" >
		<!--HEADER -->
		<?php 
		//get the header background options
		$pexeto_bg_data = pexeto_get_header_bg_data();
		?>
		<div class="header-wrapper" <?php echo $pexeto_bg_data['color_css']; ?>>

		<?php 
			if(!empty($pexeto_bg_data['img'])){
				//print the header background image div
				echo $pexeto_bg_data['img'];
			}
		?>
		<header id="header">
			<div class="section-boxed section-header">

			<div id="logo-container">
				<?php 
					$logo_image = pexeto_option('retina_logo_image') ? pexeto_option('retina_logo_image') : pexeto_option('logo_image');
					if(empty($logo_image)){
						$logo_image=get_template_directory_uri().'/images/logo@2x.png';
					}
				 ?>
				<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo_image; ?>" alt="<?php esc_attr(bloginfo('name')); ?>" /></a>
			</div>
	 		<nav class="navigation-container">
				<div id="menu" class="nav-menu">
				<?php
				$menu_args = array(
						'theme_location' => 'pexeto_main_menu',
						'container' => false,
						'menu_class' => 'menu-ul');
				wp_nav_menu($menu_args); ?>
				</div>

				<div class="header-buttons">
                    <div id="st-trigger-effects" class="column">
                        <button data-effect="st-effect-4">menu</span></button>
                    </div>
				</div>
			</nav> 

			<div class="clear"></div>
			<div id="navigation-line"></div>
		</div>
		</header><!-- end #header -->
