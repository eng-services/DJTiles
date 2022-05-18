<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

  <?php if ( have_comments() ) : ?>
      <div class="col-md-7 mr-8">
        <?php wp_list_comments('callback=savoye_theme_comment'); ?> 
      </div>
          <!-- START PAGINATION -->
      <?php
          if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
      <div class="pagination_area">
           <nav>
                <ul class="pagination">
                     <li> <?php paginate_comments_links( 
                    array(
                    'prev_text' => wp_specialchars_decode(esc_html__( '<i class="fa fa-angle-left"></i>', 'savoye' ),ENT_QUOTES),
                    'next_text' => wp_specialchars_decode(esc_html__( '<i class="fa fa-angle-right"></i>', 'savoye' ),ENT_QUOTES),
                    ));  ?>
                      </li>
                </ul>
           </nav>
      </div>
    <?php endif; ?>
    <!-- END PAGINATION --> 
  <?php endif; ?>    
  <div class="col-md-4">               
    <?php
      if ( is_singular() ) wp_enqueue_script( "comment-reply" );
          $aria_req = ( $req ? " aria-required='true'" : '' );
          $comment_args = array(
                  'id_form' => '',        
                  'class_form' => 'comment-form',                         
                  'title_reply'=> esc_html__( 'Leave a comment', 'savoye' ),
                  'fields' => apply_filters( 'comment_form_default_fields', array(
                      'author' =>   '  <div class="row"><div class="col-md-12">
                                        <input type="text" name="author" placeholder="'.esc_attr__('Full Name *', 'savoye').' " required="required" data-error="Name is required.">
                                      </div>',
                      'email' =>    ' <div class="col-md-12">
                                        <input type="email" name="email" placeholder="'.esc_attr__('Email Address *', 'savoye').'" required="required" data-error="Email is required.">
                                      </div></div>',

                  ) ),   
                  'comment_field' => '<div class="row"><div class="col-md-12">
                                        <textarea name="comment" id="message" cols="40" rows="4" '.$aria_req.' placeholder="'.esc_attr__('Write a comment...', 'savoye').'" required="required" data-error="Please,leave us a message."></textarea>
                                      </div></div>',                
                  'label_submit' => esc_html__( 'Post a comment', 'savoye' ),
                  'comment_notes_before' => '',
                  'comment_notes_after' => '',               
          )
    ?>

    <?php if ( comments_open() ) : ?>
      <?php comment_form($comment_args); ?>
    <?php endif; ?> 
  </div>