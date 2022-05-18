<?php $savoye_redux_demo = get_option('redux_demo');?> 

    <!-- Footer -->
    <footer class="main-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-30">
                    <div class="item abot">
                        <div class="logo mb-15"> 
                            <a href="<?php echo esc_url(home_url('/')); ?>"> 
                                <?php if(isset($savoye_redux_demo['footer_logo_light']['url']) && $savoye_redux_demo['footer_logo_light']['url'] != ''){ ?>
                                <img src="<?php echo esc_url($savoye_redux_demo['footer_logo_light']['url']); ?>" alt="">
                                <?php }else{ ?>
                                <img src="<?php echo get_template_directory_uri();?>/img/logo-light.png" alt="">
                                <?php } ?> 
                            </a>
                        </div>
                        <?php if(isset($savoye_redux_demo['footer_text']) && $savoye_redux_demo['footer_text'] != ''){ ?>
                        <p><?php echo esc_attr__($savoye_redux_demo['footer_text']); ?></p>
                        <?php }else{ ?>
                        <p><?php echo esc_html__('Welcome to our Savoye Architecture agency. Viverra tristique justo in duis vitae diam neque niva.'); ?></p>
                        <?php } ?>
                        <div class="social-icon"> 
                            <?php if(isset($savoye_redux_demo['facebook']) && $savoye_redux_demo['facebook'] != ''){ ?>
                            <a href="<?php echo esc_attr__($savoye_redux_demo['facebook']); ?>"><i class="ti-facebook"></i></a> 
                            <?php } ?>

                            <?php if(isset($savoye_redux_demo['twitter']) && $savoye_redux_demo['twitter'] != ''){ ?>
                            <a href="<?php echo esc_attr__($savoye_redux_demo['twitter']); ?>"><i class="ti-twitter"></i></a>
                            <?php } ?>

                            <?php if(isset($savoye_redux_demo['instagram']) && $savoye_redux_demo['instagram'] != ''){ ?>
                            <a href="<?php echo esc_attr__($savoye_redux_demo['instagram']); ?>"><i class="ti-instagram"></i></a> 
                            <?php } ?>


                            <?php if(isset($savoye_redux_demo['pinterest']) && $savoye_redux_demo['pinterest'] != ''){ ?>
                            <a href="<?php echo esc_attr__($savoye_redux_demo['pinterest']); ?>"><i class="ti-pinterest"></i></a> 
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-1 mb-30">
                    <div class="item usful-links">
                        <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-1' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item fotcont">
                        <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="text-left">
                            <?php if(isset($savoye_redux_demo['footer_description']) && $savoye_redux_demo['footer_description'] != ''){ ?>
                            <p><?php echo esc_attr__($savoye_redux_demo['footer_description']); ?></p>
                            <?php }else{ ?>
                            <p><?php echo esc_html__('© 2022, SAVOYE. All right reserved.'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-right-left">
                            <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-4' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>