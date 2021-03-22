<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package universal-example
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

//  Создаем свою функцию вывода каждого коммента
function universal_theme_comment( $comment, $args, $depth ) {
  // Проверяем, в каком теге у нас родитель (ol, ul, div)
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
// Какие классы вешаем на каждый комментарий
	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>
  <div class="comment-author-avatar">
    <?php
    if ( $args['avatar_size'] != 0 ) {
      echo get_avatar( $comment, $args['avatar_size'] );
    }
    ?>
  </div>
  <!-- /.author-avatar -->
	<div class="comment-content">
	  <div class="comment-author vcard">
	    <?php
	  	printf(
	  		__( '<cite class="comment-author-name">%s</cite>' ),
	  		get_comment_author_link()
	  	);
	  	?>
	      <span class="comment-meta commentmetadata">
	        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
	          <?php
	          printf(
	            __( '%1$s, %2$s' ),
	            get_comment_date('F jS'),
	            get_comment_time()
	          ); ?>
	        </a>

	        <?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
	      </span>
	  </div>
    <?php if ( $comment->comment_approved == '0' ) { ?>
      <em class="comment-awaiting-moderation">
        <?php _e( 'Your comment is awaiting moderation.' ); ?>
      </em><br/>
    <?php } ?>

    <?php comment_text(); ?>

    <div class="comment-reply">
      <svg class="icon" width="15" height="15">
        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
      </svg>

      <?php
      comment_reply_link(
        array_merge(
          $args,
          array(
            'add_below' => $add_below,
            'depth'     => $depth,
            'max_depth' => $args['max_depth']
          )
        )
      ); ?>
    </div>
	</div>
	<!-- /.comment-content -->


	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
}
if ( post_password_required() ) {
	return;
}
?>

<div class="container">
  <div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
      ?>
      <div class="comments-header">
        <h2 class="comments-title">
          <?php echo 'Комментарии <span class="comments-count">' . get_comments_number() . '</span>' ?>
        </h2><!-- .comments-title -->
        <a href="" class="comments-add-button">
          <svg class="icon" width="18" height="18">
            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#pencil"></use>
          </svg>
          Добавить комментарий</a>
      </div>
      <!-- /.comments-header -->
      <?php the_comments_navigation(); ?>
      <!-- Выводим список комментариев -->
      <ol class="comment-list">
        <?php
        // выводим каждый отдельный комментарий
        wp_list_comments(
          array(
            'style'      => 'ol',
            'short_ping' => true,
            'avatar_size' => 75,
            'callback' => 'universal_theme_comment',
            'login_text' => 'Зарегистрируйтесь, если хотите прокомментировать'
          )
        );
        ?>
      </ol><!-- .comment-list -->
      <?php
      the_comments_navigation();
      // If comments are closed and there are comments, let's leave a little note, shall we?
      if ( ! comments_open() ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'universal-example' ); ?></p>
        <?php
      endif;
    endif; // Check for have_comments().
    comment_form();
    ?>
  </div><!-- #comments -->
</div>
