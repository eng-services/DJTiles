<?php
/*
 * Template Name: Blog Dark Style 2
 * Description: A Page Template with a Page Builder design.
 */
     $savoye_redux_demo = get_option('redux_demo');
     get_header('dark'); 
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
                            'post__in' => array(17,118,120,122,7,11,13,15),
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
                        <div class="col-md-12 text-center animate-box" data-animate-effect="fadeInUp">
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
<!-- Top Footer Banner -->
<div class="topbanner-footer">
    <div class="section-padding banner-img valign bg-img bg-fixed" data-overlay-darkgray="1" data-background="<?php echo get_template_directory_uri();?>/img/slider/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30 text-left caption">
                    <div class="section-title">Contact Us</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h6>Phone</h6>
                    <h5 class="mb-30">+1 123-456-0606</h5>
                    <p class="mb-30">Monday - Friday: 8am - 6pm
                        <br>Saturday - Sunday: 9am - 3pm
                    </p>
                </div>
                <div class="col-md-4">
                    <h6>Email</h6>
                    <h5 class="mb-30">info@architecture.com</h5>
                    <p class="mb-30">24 King St, Charleston
                        <br>SC 29401 USA
                    </p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="vid-area">
                        <a class="play-button gallery-masonry-item-img-link d-block" data-type="iframe" data-fancybox="iframe" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.758017847153!2d-79.93420398486563!3d32.77215479154045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a1ae84ff639%3A0xe5c782f71924a526!2s24%20King%20St%2C%20Charleston%2C%20SC%2029401%2C%20USA!5e0!3m2!1sen!2str!4v1631170502143!5m2!1sen!2str">
                            <svg class="circle-fill">
                                <circle cx="43" cy="43" r="39" stroke="#272727" stroke-width="1"></circle>
                            </svg>
                            <svg class="circle-track">
                                <circle cx="43" cy="43" r="39" stroke="none" stroke-width="1" fill="none"></circle>
                            </svg> <span class="polygon"><i class="ti-location-pin"></i></span> </a>
                        <div class="cont mt-20 mb-30">
                            <h5>Our Location</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer('dark');
?>