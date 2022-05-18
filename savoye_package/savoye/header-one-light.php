<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php $savoye_redux_demo = get_option('redux_demo'); ?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php if(isset($savoye_redux_demo['favicon']['url'])){ ?>
        <link rel="shortcut icon" href="<?php echo esc_url($savoye_redux_demo['favicon']['url']); ?>">
    <?php }?>
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
        ?>
    <?php }?>
    <?php wp_head(); ?>
    </head>
    <body id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">

                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"> 
                    <?php if(isset($savoye_redux_demo['logo_light']['url']) && $savoye_redux_demo['logo_light']['url'] != ''){ ?>
                    <img src="<?php echo esc_url($savoye_redux_demo['logo_light']['url']); ?>" alt="">
                    <?php }else{ ?>
                    <img src="<?php echo get_template_directory_uri();?>/img/logo-light.png" alt="">
                    <?php } ?> 
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="ti-menu"></i></span> </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php 
                  wp_nav_menu( 
                  array( 
                        'theme_location' => 'one-light',
                        'container' => '',
                        'menu_class' => '', 
                        'menu_id' => '',
                        'menu'            => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'echo'            => true,
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new savoye_wp_bootstrap_navwalker(),
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="navbar-nav ml-auto %2$s">%3$s</ul>',
                        'depth'           => 0,        
                    )
                ); ?>
            </div>
        </div>
    </nav>