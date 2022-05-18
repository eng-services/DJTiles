<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
    $savoye_redux_demo = get_option('redux_demo');
    get_header(); 
?> 
<!-- Header Banner -->
<?php if(isset($savoye_redux_demo['404_image']['url']) && $savoye_redux_demo['404_image']['url'] != ''){?>
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?php echo esc_url($savoye_redux_demo['404_image']['url']); ?>">
<?php }else{?> 
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?php echo get_template_directory_uri();?>/img/slider/1.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-90">
                <h1>
                  <?php if(isset($savoye_redux_demo['404_title'])){?>
                  <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['404_title']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'Page Not Found!', 'savoye' );
                  }
                  ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- hr -->
<hr class="line-vr-section">
<!-- Not found 404 -->
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center"> 
                <?php if(isset($savoye_redux_demo['404_image_2']['url']) && $savoye_redux_demo['404_image_2']['url'] != ''){?>
                <img src="<?php echo esc_url($savoye_redux_demo['404_image_2']['url']); ?>" class="mb-30" alt="">
                <?php }else{?> 
                <img src="<?php echo get_template_directory_uri();?>/img/404-image.png" class="mb-30" alt="">
                <?php } ?>
                <h2><?php if(isset($savoye_redux_demo['404_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['404_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Sorry we can not find that page!', 'savoye' );
                    }
                    ?></h2>
                <p><?php if(isset($savoye_redux_demo['404_description'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['404_description']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'The page you are looking for was moved, removed, renamed or never existed.', 'savoye' );
                    }
                    ?>
                </p>
                <div class="error-form">
                    <form>
                        <div class="form-group clearfix">
                            <input type="search" name="s" id="s" value="" placeholder="Search here" required="">
                            <button type="submit" class="theme-btn"><span class="ti-search"></span></button>
                        </div>
                    </form>
                </div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn mt-30 text-center"><span><i class="ti-arrow-left"></i> 
                <?php if(isset($savoye_redux_demo['404_button'])){?>
                <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['404_button']));?>
                <?php }else{?>
                <?php echo esc_html__( 'Back To Home', 'savoye' );
                }
                ?>
                </span></a>
            </div>
        </div>
    </div>
</div>
<!-- hr -->
<hr class="line-vr-section">
<!-- Top Footer Banner -->
<div class="topbanner-footer">
    <div class="section-padding banner-img valign bg-img bg-fixed" data-overlay-light="4" data-background="<?php echo get_template_directory_uri();?>/img/slider/1.jpg">
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
                    <p class="mb-30">Monday - Friday: 8am - 6pm<br>Saturday - Sunday: 9am - 3pm</p>
                </div>
                <div class="col-md-4">
                    <h6>Email</h6>
                    <h5 class="mb-30">info@architecture.com</h5>
                    <p class="mb-30">24 King St, Charleston<br>SC 29401 USA</p>
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
  get_footer();
?> 