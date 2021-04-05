<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- шапка поста -->
	<header class="entry-header <?php echo get_post_type(); ?>-header" style="background-image: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75));">
    <div class="container">
      <div class="post-header-wrapper">
        <div class="post-header-nav">
          <!-- Категория -->
          <?php
          foreach(get_the_category() as $category) {
            printf(
              '<a href="%s" class="category-name category-name--%s">%s</a>',
              esc_url( get_category_link( $category ) ),
              esc_html( $category -> slug ),
              esc_html( $category -> name )
            );
          }
          ?>
          <div class="video">
            <?php
              $video_link = get_field('video_link');
              if ( strpos($video_link, 'youtube') ) :
                $tmp = explode('?v=', get_field('video_link'));
                ?>
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo end ($tmp); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php
              endif;
              if ( strpos($video_link, 'vimeo') ) :
                $tmp = explode('vimeo.com/', get_field('video_link'));
                ?>
                <iframe src="https://player.vimeo.com/video/<?php echo end ($tmp); ?>" width="100%" height="450" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
              <?php
              endif;
            ?>
          </div>
        </div>
        <!-- /.post-header-nav -->
        <div class="post-title-wrapper">
          <?php
          if ( is_singular() ) :
            the_title( '<h1 class="post-title">', '</h1>' );
          else :
            the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          endif;
          ?>
        </div>
        <div class="post-header-info">
          <span class="post-header-info-item">
            <svg class="icon" width="15" height="15">
              <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#clock' ?>">
              </use>
            </svg>
            <?php the_time('j F, G:i'); ?>
          </span>
        </div>
      </div>
      <!-- /.post-header-wrapper -->
    </div>
    <!-- /.container -->
	</header><!-- .entry-header -->
  <!-- Содержимое поста -->
  <div class="container">
    <div class="lesson-content">
      <?php
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'universal' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'universal' ),
          'after'  => '</div>',
        )
      );
      ?>
    </div><!-- .post-content -->
    <!-- Подвал поста -->
    <footer class="post-footer">
      <?php
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'universal' ) );
			if ( $tags_list ) {
        /* translators: 1: list of tags. */
				printf( '<div class="tags-links">' . esc_html__( '%1$s', 'universal' ) . '</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
      // Поделиться в соцсетях
      meks_ess_share();
      ?>
    </footer>
    <!-- .entry-footer -->
  </div>
  <!-- /.container -->

  <!-- Подключаем сайдбар -->
  <!-- <?php get_sidebar('single'); ?> -->
</article>
