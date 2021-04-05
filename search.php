<?php get_header(); ?>
<main class="search">
  <div class="container">
    <h1 class="search-title">Результаты поиска по запросу:</h1>
    <div class="main-grid">
      <div class="digest-wrapper">
        <section class="digest">
          <ul class="digest-list">
            <?php while ( have_posts() ){ the_post(); ?>
                  <li class="digest-item">
                    <a href="<?php the_permalink(); ?>" class="digest-link">
                      <article class="digest-card">
                        <div class="digest-image-column">
                          <img src="
                          <?php
                            if( has_post_thumbnail() ) {
                              echo get_the_post_thumbnail_url();
                            }
                            else {
                              echo get_template_directory_uri().'/assets/images/img-default.png"';
                            }
                          ?>" alt="<?php the_title(); ?>" />
                        </div>
                        <div class="digest-text-column">
                          <?php
                            $category = get_the_category();
                            if( $category ) {
                              printf(
                                '<span class="category-name category-name--%s">%s</span>',
                                $category[0] -> slug,
                                $category[0] -> name
                              );
                            }
                          ?>
                          <h3 class="digest-title">
                            <?php echo mb_strimwidth( get_the_title(), 0, 70, ' ...'); ?>
                          </h3>
                          <p class="digest-text">
                            <?php echo wp_trim_words( get_the_content(), 25, '...' ); ?>
                          </p>
                          <footer class="digest-footer">
                            <div class="footer-info">
                              <span class="article-date"><?php the_time('j F'); ?></span>
                              <span class="article-comments">
                                <svg class="icon" width="15" height="15">
                                  <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#comment' ?>">
                                  </use>
                                </svg>
                                <?php comments_number('0', '1', '%'); ?></span>
                                <span class="article-likes">
                                <svg class="icon" width="15" height="15">
                                  <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#heart' ?>">
                                  </use>
                                </svg>
                                <?php comments_number('0', '1', '%'); ?></span>
                            </div>
                          </footer>
                        </div>
                      </article>
                    </a>
                  </li>
            <?php } ?>
            <?php if ( ! have_posts() ){ ?>
            Записей нет.
            <?php } ?>
          </ul>
        </section>
        <?php
        $prev = '<svg class="icon" width="15" height="7">
            <use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#left-arrow"></use>
          </svg>' . __('Back');
        $next = __('Next') . '<svg class="icon" width="15" height="7">
            <use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#arrow"></use>
          </svg>';
        $args = array(
          'prev_text' => $prev,
          'next_text' => $next
        );
        the_posts_pagination( $args)?>
      </div>
      <!-- Подключаем сайдбар -->
      <?php get_sidebar('search'); ?>

    </div>
  </div>
</main>
<?php get_footer(); ?>
