<?php
/*
 * Template Name: Multi DarkSidebar Page
 * Description: A Page Template with a Page Builder design.
 */
$savoye_redux_demo = get_option('redux_demo');
    get_header('darksidebar'); ?>
    <?php if (have_posts()){ ?>
     <?php while (have_posts()) : the_post()?>
        <?php the_content(); ?>
     <?php endwhile; ?>
    <?php }else {
       echo esc_html__( 'Page Canvas For Page Builder', 'rockex' );
    }?>
<?php
    get_footer('darksidebar');
?>