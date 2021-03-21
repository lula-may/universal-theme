<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- шапка поста -->
	<header class="entry-header <?php echo get_post_type(); ?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75)), url(
    <?php
      if( has_post_thumbnail() ) {
        echo get_the_post_thumbnail_url();
      }
      else {
        echo get_template_directory_uri().'/assets/images/img-default.png';
      }
    ?>);">
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
          <!-- Ссылка на главную -->
          <a href="<?php echo get_home_url(); ?>" class="home-link">
            <svg class="icon icon-prev" width="18" height="17">
              <use xlink:href="<?php echo get_template_directory_uri();?>/assets/images/sprite.svg#home">
              </use>
            </svg>
            На главную
          </a>
          <?php
          // Выводим ссылки на предыдущий и следующий посты
                the_post_navigation(
                  array(
                    'prev_text' => '<span class="post-nav-prev">
                <svg class="icon icon-prev" width="15" height="7">
                  <use xlink:href="'. get_template_directory_uri() . '/assets/images/sprite.svg#left-arrow">
                  </use>
                </svg>
              ' . esc_html__( 'Назад ', 'universal-example' ),
                    'next_text' => '<span class="post-nav-next">' . esc_html__( 'Вперед ', 'universal-example' ) . '<svg class="icon icon-next" width="15" height="7">
                  <use xlink:href="'. get_template_directory_uri() . '/assets/images/sprite.svg#arrow">
                  </use>
                </svg>',
                  )
                );
          ?>
        </div>
        <div class="post-title-wrapper">
          <?php
          if ( is_singular() ) :
            the_title( '<h1 class="post-title">', '</h1>' );
          else :
            the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          endif;
          ?>
          <button class="post-bookmark" type="button">
            <svg class="icon" width="30" height="30">
              <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#bookmark' ?>">
              </use>
            </svg>
          </button>
        </div>
        <?php the_excerpt(); ?>
        <div class="post-header-info">
          <span class="post-header-info-item">
            <svg class="icon" width="15" height="15">
              <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#clock' ?>">
              </use>
            </svg>
            <?php the_time('j F, G:i'); ?>
          </span>
          <span class="post-header-info-item">
            <svg class="icon" width="15" height="15">
              <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#comment' ?>">
              </use>
            </svg>
            <?php comments_number('0', '1', '%'); ?>
          </span>
          <span class="post-header-info-item">
            <svg class="icon" width="15" height="15">
              <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#heart' ?>">
              </use>
            </svg>
            <?php comments_number('0', '1', '%'); ?>
          </span>
        </div>
        <div class="post-author">
          <div class="post-author-info">
            <?php $author_id = get_the_author_meta('ID'); ?>
            <img src="<?php echo get_avatar_url($author_id)?>" alt="Автор поста" class="post-author-avatar"/>
            <span class="post-author-name"><?php the_author(); ?></span>
            <span class="post-author-rank">Должность</span>
            <span class="post-author-count">
              <?php plural_form(
                count_user_posts($author_id),
                // варианты написания для количества 1, 2, 5
                array('статья', 'статьи', 'статей'));
              ?>
            </span>
          </div>
          <!-- /.post-author-info -->
          <a href="<?php echo get_author_posts_url($author_id) ?>" class="post-author-link">
            Страница автора
          </a>
        </div>
      </div>
      <!-- /.post-header-wrapper -->
    </div>
    <!-- /.container -->
	</header><!-- .entry-header -->
  <!-- Содержимое поста -->
  <div class="container">
    <div class="post-content">
      <?php
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'universal-example' ),
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
          'before' => '<div class="page-links">' . esc_html__( 'Страницы:', 'universal-example' ),
          'after'  => '</div>',
        )
      );
      ?>
    </div><!-- .post-content -->
    <!-- Подвал поста -->
    <footer class="post-footer">
      <?php
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'universal-example' ) );
			if ( $tags_list ) {
        /* translators: 1: list of tags. */
				printf( '<div class="tags-links">' . esc_html__( '%1$s', 'universal-example' ) . '</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
      // Поделиться в соцсетях
      meks_ess_share();
      ?>
    </footer>
    <!-- .entry-footer -->
  </div>
  <!-- /.container -->

  <!-- Подключаем сайдбар -->
  <?php get_sidebar('single'); ?>
</article>
