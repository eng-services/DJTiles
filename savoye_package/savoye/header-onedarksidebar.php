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
    <body id="post-<?php the_ID(); ?>" <?php post_class(' dark sidebar '); ?>>

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
    <!-- Sidebar Section -->
    <a href="#" class="js-savoye-nav-toggle savoye-nav-toggle"><i></i></a>
    <aside id="savoye-aside">
        <!-- Logo -->
        <div class="savoye-logo">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"> 
                <?php if(isset($savoye_redux_demo['logo_sidebar']['url']) && $savoye_redux_demo['logo_sidebar']['url'] != ''){ ?>
                    <img src="<?php echo esc_url($savoye_redux_demo['logo_sidebar']['url']); ?>" class="logo-img" alt="">
                <?php }else{ ?>
                    <img src="<?php echo get_template_directory_uri();?>/img/sidebar/logo.png" class="logo-img" alt="">
                <?php } ?>

                <?php if(isset($savoye_redux_demo['logo_text']) && $savoye_redux_demo['logo_text'] != ''){ ?>
                <h2><?php echo esc_attr__($savoye_redux_demo['logo_text']); ?></h2>
                <?php }else{ ?>
                <h2><?php echo esc_html__('Savoye'); ?></h2>
                <?php } ?>
            </a>
        </div>
        <!-- Menu -->
        <nav class="navbar savoye-main-menu">
            <?php 
              wp_nav_menu( 
              array( 
                    'theme_location' => 'onedarksidebar',
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
                    'items_wrap'      => '<ul class="navbar-nav  %2$s">%3$s</ul>',
                    'depth'           => 0,        
                )
            ); ?>
        </nav>     
    </aside>
    <!-- Main -->
    <div id="savoye-main">