<?php
/*
 * Template Name: Coming Soon
 * Description: A Page Template with a Page Builder design.
 */
$savoye_redux_demo = get_option('redux_demo');
    get_header('cms'); ?>
    <!-- Comming soon -->
    <div class="comming section-padding" style="background-image: url(<?php echo esc_url($savoye_redux_demo['cms_image']['url']); ?>);">
        <div class="v-middle">
            <div class="container">
                <div class="row text-center mb-30">
                    <div class="col-md-12">
                        <h6><?php if(isset($savoye_redux_demo['cms_subtitle'])){?>
                          <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['cms_subtitle']));?>
                          <?php }else{?>
                          <?php echo esc_html__( 'Under construction', 'savoye' );
                          }
                          ?></h6>

                        <h1><?php if(isset($savoye_redux_demo['cms_title'])){?>
                          <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['cms_title']));?>
                          <?php }else{?>
                          <?php echo esc_html__( 'Coming Soon!', 'savoye' );
                          }
                          ?></h1>
                    </div>
                </div>
                <div class="row text-center mb-30">
                    <div class="col-6 offset-md-2 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="days">00</h3>
                            </div>
                            <div class="item-info">
                                <h6>Days</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="hours">00</h3>
                            </div>
                            <div class="item-info">
                                <h6>Hours</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="minutes">00</h3>
                            </div>
                            <div class="item-info">
                                <h6>Minutes</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="seconds">00</h3>
                            </div>
                            <div class="item-info">
                                <h6>Seconds</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="offset-md-3 col-md-6">
                        <p><?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['cms_form_title']));?></p>
                        <?php echo do_shortcode('[contact-form-7 id="1290" title="Subscribe Form"]'); ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="go-back col-md-12">
                        <a href='<?php echo esc_url(home_url('/')); ?>'> <span><i class="ti-arrow-left" aria-hidden="true"></i></span>&nbsp;
                            <?php if(isset($savoye_redux_demo['cms_button'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['cms_button']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Back To Home', 'savoye' );
                            }
                            ?> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function countdown() {
            var now = new Date();
            var eventDate = new Date(<?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['year']));?>, <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['month']));?>, <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['day']));?>);
            var currentTiime = now.getTime();
            var eventTime = eventDate.getTime();
            var remTime = eventTime - currentTiime;
            var s = Math.floor(remTime / 1000);
            var m = Math.floor(s / 60);
            var h = Math.floor(m / 60);
            var d = Math.floor(h / 24);
            h %= 24;
            m %= 60;
            s %= 60;
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;
            document.getElementById("days").textContent = d;
            document.getElementById("days").innerText = d;
            document.getElementById("hours").textContent = h;
            document.getElementById("minutes").textContent = m;
            document.getElementById("seconds").textContent = s;
            setTimeout(countdown, 1000);
        }
        countdown();
    </script>
<?php
    get_footer('cms');
?>