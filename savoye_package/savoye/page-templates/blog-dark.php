<?php
/*
 * Template Name: Blog Dark Style 1
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
<div class="savoye-blog section-padding">
    <div class="container">
        <?php  $i =0;
            $args = array(    
                    'paged' => $paged,
                    'post_type' => 'post',
                    'post__in' => array(17,118,120,122,7,11,13,15),
            );
            $wp_query = new WP_Query($args);
        while (have_posts()): the_post();
        $i++; ?>
        <?php if($i % 2==1){ ?>
        <div class="row mb-30">
            <div class="col-md-6">
                <div class="img left">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 valign">
                <div class="content">
                    <div class="date">
                        <h1><?php the_time('j' );?></h1>
                        <h6><?php the_time('M Y' );?></h6>
                    </div>
                    <div class="cont">
                        <div class="info">
                            <h6><?php the_author_posts_link(); ?> / <a href="#0" class="tags"><?php comments_number( esc_html__('0 Comments', 'savoye'), esc_html__('1 Comment', 'savoye'), esc_html__('% Comments', 'savoye') ); ?></a></h6>
                        </div>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
                        <a href="<?php the_permalink(); ?>" class="more" data-splitting="">
                            <span><?php if(isset($savoye_redux_demo['read_more'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['read_more']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Read More ', 'savoye' );
                            }
                            ?></span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <div class="row mb-30">
            <div class="col-md-6 order2 valign animate-box" data-animate-effect="fadeInLeft">
                <div class="content">
                    <div class="date">
                        <h1><?php the_time('j' );?></h1>
                        <h6><?php the_time('M Y' );?></h6>
                    </div>
                    <div class="cont">
                        <div class="info">
                            <h6><a href="#0"><?php the_author_posts_link(); ?></a> / 
                                <?php 
                                    // Show all category for post
                                    $i = 1; foreach((get_the_category()) as $category) { 
                                    if ($i == 1){echo ''; }else {echo ' , ';}
                                        echo '<span class="tags" title="'.$category->category_nicename . '" >'.$category->category_nicename . ' '.'</span>'; 
                                        $i++;
                                } ?>
                            </h6>
                        </div>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> <a href="<?php the_permalink(); ?>" class="more" data-splitting="">
                            <span><?php if(isset($savoye_redux_demo['read_more'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($savoye_redux_demo['read_more']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Read More ', 'savoye' );
                            }
                            ?></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order1 animate-box" data-animate-effect="fadeInRight">
                <div class="img left">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt=""></a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php endwhile; ?>
        <div class="row">
            <div class="col-md-12 text-center animate-box" data-animate-effect="fadeInUp">
                <?php savoye_pagination();?>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer('dark');
?>