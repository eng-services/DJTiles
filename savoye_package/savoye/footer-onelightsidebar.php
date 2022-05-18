<?php $savoye_redux_demo = get_option('redux_demo');?> 

    <!-- Footer -->
    <footer class="main-footer dark">
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="text-left">
                            <?php if(isset($savoye_redux_demo['footer_description']) && $savoye_redux_demo['footer_description'] != ''){ ?>
                            <p><?php echo esc_attr__($savoye_redux_demo['footer_description']); ?></p>
                            <?php }else{ ?>
                            <p><?php echo esc_html__('© 2022, SAVOYE. All right reserved.'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
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
    </div>
    <?php wp_footer(); ?>
</body>
</html>