<?php if (post_password_required()) return; $comment_class =  ( !class_exists('OvaFramework') ) ? 'comment_default' : ''; ?>
        
<div class="content_comments <?php echo esc_attr( $comment_class ); ?>">
    <div id="comments" class="comments clearfix">

        <?php if(have_comments()){ ?>
            <div>
                <h4 class="number-comments second_font"> 
                    <?php comments_number( esc_html__('0 Comments', 'hozing'), esc_html__( '1 Comment', 'hozing' ), esc_html__( '% Comments', 'hozing' ) ); ?>
                </h4>
            </div>

        <?php } ?>

        <?php if (have_comments()) { ?>
            <ul class="commentlists">
                <?php wp_list_comments('callback=hozing_theme_comment'); ?>
            </ul>
            <?php
            // Are there comments to navigate through?

            if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <footer class="navigation comment-navigation" role="navigation">
                    <div class="nav_comment_text"><?php esc_html_e( 'Comment navigation', 'hozing' ); ?></div>
                    <div class="previous"><?php previous_comments_link(__('&larr; Older Comments', 'hozing')); ?></div>
                    <div class="next right"><?php next_comments_link(__('Newer Comments &rarr;', 'hozing')); ?></div>
                </footer><!-- .comment-navigation -->
            <?php endif; // Check for comment navigation ?>

            <?php if (!comments_open() && get_comments_number()) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hozing' ); ?></p>
            <?php endif; ?>
            
        <?php } ?>

        <?php

        $aria_req = ($req ? " aria-required='true'" : '');
        $comment_args = array(
            'title_reply' => wp_kses('<h4 class="title-comment second_font">' . esc_html__( 'Leave a Reply', 'hozing' ) . '</h4>', true),
            'fields' => apply_filters('comment_form_default_fields', array(
                'author' => '<div class="item-field-comment"><input type="text" name="author" value="' . esc_attr($commenter['comment_author']) . '"   placeholder="'. esc_attr__('Name','hozing') .'" /><i class="far fa-credit-card"></i></div>',
                'email' => '<div class="item-field-comment"><input type="text" name="email" value="' . esc_attr($commenter['comment_author_email']) . '"  placeholder="'. esc_attr__('Email','hozing') .'" /><i class="far fa-envelope"></i></div>',
                'phone' => '<div class="item-field-comment"><input type="text" name="url" value="' . esc_url($commenter['comment_author_url']) . '"  placeholder="'. esc_attr__('Phone','hozing') .'" /><i class="fas fa-phone"></i></div>',            
                
            )),
            'comment_field' => '<div class="item-field-comment"><textarea name="comment" placeholder="'.esc_attr__('Your Comment ...','hozing').'"></textarea><i class="far fa-sticky-note textarea"></i></div>',
            'label_submit' => esc_html__('Submit Comment','hozing'),
            'comment_notes_before' => '',
            'comment_notes_after' => '',
        );
        ?>

        <?php global $post; ?>
        <?php if ('open' == $post->comment_status) { ?>
            <div class="wrap_comment_form">
                <?php comment_form($comment_args); ?>        
            </div><!-- end commentform -->
        <?php } ?>

    </div><!-- end comments -->
</div>