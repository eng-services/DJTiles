<?php
     $savoye_redux_demo = get_option('redux_demo');
     get_header('light'); 
?>
<!-- Banner Title -->
<?php if(isset($savoye_redux_demo['blog_banner_image']['url']) && $savoye_redux_demo['blog_banner_image']['url'] != ''){?>
<div class="ready banner-padding bg-img" data-overlay-dark="0" data-background="<?php echo esc_url($savoye_redux_demo['blog_banner_image']['url']); ?>">
<?php }else{?> 
<div class="ready banner-padding bg-img" data-overlay-dark="0" data-background="<?php echo get_template_directory_uri();?>/images/banner.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="title animate-box" data-animate-effect="fadeInUp"> 
                        <h1>
                          <?php if(isset($savoye_redux_demo['blog_title'])){?>
                          <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['blog_title']));?>
                          <?php }else{?>
                          <?php echo esc_html__( 'Blog', 'savoye' );}?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Content & Sidebar -->
<section id="blog" class="savoye-blog-section blog-page section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInUp">
                <div class="row">
                    <?php  $args = array(    
                            'paged' => $paged,
                            'post_type' => 'post',
                    );
                    $wp_query = new WP_Query($args);
                    while (have_posts()): the_post(); ?>
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-img img-grayscale">
                                <a href="<?php the_permalink(); ?>"> <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt=""> </a>
                            </div>
                            <div class="post-cont"> 
                              <div class="tag"><?php echo get_the_tag_list('<span>','</span> , <span>','</span>'); ?></div>
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
                              <div class="info"><?php the_time(get_option( 'date_format' ));?></div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- Pagination -->
                        <?php savoye_pagination();?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                <div class="blog-sidebar row">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    get_footer('light');
?>