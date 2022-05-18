<?php
/*
 * Template Name: Blog Light Sidebar Style 2
 * Description: A Page Template with a Page Builder design.
 */
     $savoye_redux_demo = get_option('redux_demo');
     get_header('lightsidebar'); 
?>
<!-- Header Banner -->
<?php if(isset($savoye_redux_demo['blog_banner_image']['url']) && $savoye_redux_demo['blog_banner_image']['url'] != ''){?>
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?php echo esc_url($savoye_redux_demo['blog_banner_image']['url']); ?>">
<?php }else{ ?>
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?php echo get_template_directory_uri();?>/img/slider/1.jpg">
<?php }?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-90">
                <h1>
                  <?php if(isset($savoye_redux_demo['blog_title'])){?>
                  <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['blog_title']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'Latest News', 'savoye' );}?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- hr -->
<hr class="line-vr-section">
<!-- Blog 2 -->
<div class="savoye-blog2 section-padding">
    <div class="container">
        <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <?php  $args = array(    
                            'paged' => $paged,
                            'post_type' => 'post',
                            'post__in' => array(339,341,342,345,7,11,13,15),
                        );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post(); ?>
                        <div class="col-md-12">
                            <div class="item">
                                <div class="post-img">
                                    <a href="<?php the_permalink(); ?>"> <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt=""> </a>
                                </div>
                                <div class="post-cont"> 
                                    <a href="#">
                                        <?php 
                                            // Show all category for post
                                            $i = 1; foreach((get_the_category()) as $category) { 
                                            if ($i == 1){echo ''; }else {echo ' , ';}
                                                echo '<span class="tag" title="'.$category->category_nicename . '" >'.$category->category_nicename . ' '.'</span>'; 
                                                $i++;
                                        } ?>
                                    </a> <i>|</i> 
                                    <span class="date"><?php the_time(get_option( 'date_format' ));?></span>
                                    <h5>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h5>
                                    <p><?php if(isset($savoye_redux_demo['blog_excerpt'])){?>
                                    <?php echo esc_attr(savoye_excerpt($savoye_redux_demo['blog_excerpt'])); ?>
                                    <?php }else{?>
                                    <?php echo esc_attr(savoye_excerpt(40)); 
                                    }
                                    ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 text-center animate-box mb-30" data-animate-effect="fadeInUp">
                            <?php savoye_pagination();?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar row">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
   
    </div>
</div>
<?php
    get_footer('lightsidebar');
?>