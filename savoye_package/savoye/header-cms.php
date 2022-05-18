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