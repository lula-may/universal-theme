<?php get_header(); ?>
<main class="front-page-header">
  <div class="container">
    <div class="hero">
      <div class="hero-left">
        <?php
        global $post;

        $myposts = get_posts([
          'numberposts' =>1,
          'category_name' => 'javascript, html, css, web-design'
        ]);

        if(
        $myposts ){ foreach( $myposts as $post ){
          setup_postdata($post ); ?>

        <!-- Вывода постов -->
        <img
          src="<?php the_post_thumbnail_url(); ?>"
          alt="<?php the_title(); ?>"
          class="post-thumb"
        />
        <?php $author_id = get_the_author_meta('ID'); ?>
        <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
          <img
            src="<?php echo get_avatar_url($author_id) ?>"
            alt="Автор поста"
            class="author-avatar"
          />
          <div class="author-bio">
            <span class="author-name"><?php the_author(); ?></span>
            <span class="author-rank">Должность</span>
          </div>
        </a>

        <div class="post-text">
          <?php the_category() ?>
          <h2 class="post-title"><?php the_title(); ?></h2>
          <a href="<?php echo get_the_permalink(); ?>" class="post-more"
            >Читать далее</a
          >
        </div>
        <?php
            }
          } else {
            ?>
        <p>Постов нет</p>
        <?php
          }

          wp_reset_postdata(); // Сбрасываем $post
        ?>
      </div>
      <div class="hero-right">
        <h3 class="recommend">Рекомендуем</h3>
        <ul class="posts-list">
          <?php
          global $post;

          $myposts = get_posts([
            'numberposts' => 5,
            'offset' => 1,
            'category_name' => 'javascript, html, css, web-design'
          ]);

          if( $myposts ){ foreach( $myposts as $post ){
          setup_postdata( $post ); ?>

          <!-- Вывода постов -->
          <li class="post">
            <?php the_category(); ?>
            <a class="post-permalink" href="<?php get_the_permalink(); ?>">
              <h4 class="post-title">
                <?php echo mb_strimwidth( get_the_title(), 0, 50, '...') ; ?>
              </h4>
            </a>
          </li>
          <?php
              }
            } else {
              ?>
          <p>Постов нет</p>
          <?php
            }

          wp_reset_postdata(); // Сбрасываем $post
        ?>
        </ul>
      </div>
    </div>
    <!-- /.hero -->
    <article class="articles-bar">
      <ul class="articles-bar-list">
        <?php
          global $post;

          $myposts = get_posts([
            'numberposts' =>
        4, 'category_name' => 'articles' ]); if( $myposts ){ foreach( $myposts
        as $post ){ setup_postdata( $post ); ?>
        <!-- Выводим записи -->
        <li class="articles-bar-item">
          <a
            class="articles-bar-permalink"
            href="<?php get_the_permalink(); ?>"
          >
            <h4 class="articles-bar-title">
              <?php echo wp_trim_words( get_the_title(), 5, '...' ); ; ?>
            </h4>
          </a>
          <img
            width="65"
            height="65"
            src="<?php echo get_the_post_thumbnail_url(null, 'homepage-thumb'); ?>"
            alt="<?php the_title(); ?>"
          />
        </li>
        <?php
                }
              } else {
                ?>
        <p>Постов нет</p>
        <?php
              }

            wp_reset_postdata(); // Сбрасываем $post
        ?>
      </ul>
    </article>
    <!-- /.articles-bar -->

    <div class="main-grid">
      <section class="articles">
        <h2 class="hidden">Подборка самых популярных статей</h2>
        <ul class="articles-list">
          <?php
          global $post;
          // формируем запрос в базу данных
          $query = new WP_Query( [
            'posts_per_page' => 7,
            'orderby'        => 'comment_count',
            'tag'            => 'popular'
          ] );
            // Проверяем есть ли посты
          if ( $query->have_posts() ) {
            // создаем переменную-счетчик постов
            $count = 0;
            while ( $query->have_posts() ) {
              $query->the_post();
              // Увеличиваем счетчик
              $count++;
              switch ($count) {
                // Выводим первый пост
                case '1':
                  ?>
                    <li class="articles-item articles-item--1">
                      <a href="<?php the_permalink(); ?>" class="articles-link">
                        <article class="article">
                          <div class="article-content">
                            <div class="article-left-column">
                              <span class="article-category">
                                <?php
                                  $category = get_the_category();
                                  echo $category[0]->name;?>
                                </span>
                              <h3 class="article-title">
                                <?php echo mb_strimwidth( get_the_title(), 0, 50, ' ...') ; ?>
                              </h3>
                              <p class="article-text">
                                <?php echo wp_trim_words( get_the_content(), 15, '...' ); ; ?>
                              </p>
                            </div>
                            <div class="article-right-column">
                              <img
                                src="<?php the_post_thumbnail_url(); ?>"
                                alt="<?php the_title(); ?>"
                                class="article-image"
                              />
                            </div>
                          </div>
                          <footer class="article-footer">
                            <blockquote>
                              <?php $author_id = get_the_author_meta('ID'); ?>
                              <img
                                src="<?php echo get_avatar_url($author_id) ?>"
                                alt="Автор статьи"
                                class="article-author-avatar"
                              />
                              <cite class="article-author"><?php the_author(); ?>:</cite>
                              <p class="article-author-quote">
                                <?php echo mb_strimwidth( get_the_author_meta('description'), 0, 40, ' ...') ; ?>
                              </p>
                            </blockquote>
                            <span class="article-comments">
                              <?php comments_number('0', '1', '%'); ?>
                            </span>
                          </footer>
                        </article>
                      </a>
                    </li>
                  <?php
                  break;
                case '2':
                  ?>
                    <li class="articles-item articles-item--2">
                      <a href="<?php the_permalink(); ?>" class="articles-link">
                        <article class="article">
                          <img
                            src="<?php the_post_thumbnail_url(); ?>"
                            alt="<?php the_title(); ?>"
                            class="article-image"
                          />
                          <div class="article-wrapper">
                            <span class="article-tag">
                              <?php $post_tags = get_the_tags();
                              if ( $post_tags) {
                                echo $post_tags[0]->name . ' ';
                              }
                              ?>
                            </span>
                            <span class="article-category">
                              <?php
                                $category = get_the_category();
                                echo $category[0]->name;
                              ?>
                            </span>
                            <h3 class="article-title">
                              <?php the_title(); ?>
                            </h3>
                            <footer class="article-footer">
                              <?php $author_id = get_the_author_meta('ID'); ?>
                              <img
                                src="<?php echo get_avatar_url($author_id) ?>"
                                alt="Автор статьи"
                                class="article-author-avatar"
                              />
                              <div class="footer-wrapper">
                                <cite class="article-author"><?php the_author(); ?></cite>
                                <div class="footer-info">
                                  <span class="article-date"><?php the_time('j F'); ?></span>
                                  <span class="article-comments"><?php comments_number('0', '1', '%'); ?></span>
                                  <span class="article-likes"><?php comments_number('0', '1', '%'); ?></span>
                                </div>
                              </div>
                            </footer>
                          </div>
                        </article>
                      </a>
                    </li>
                  <?php
                  break;
                case '3':
                  ?>
                    <li class="articles-item articles-item--3">
                      <a href="<?php the_permalink(); ?>" class="articles-link">
                        <article class="article">
                          <div class="article-image-wrapper">
                            <img
                              src="<?php the_post_thumbnail_url(); ?>"
                              alt="<?php the_title(); ?>"
                              class="article-image"
                            />
                          </div>
                          <h3 class="article-title"><?php the_title(); ?></h3>
                        </article>
                      </a>
                    </li>
                  <?php
                  break;
                default:
                  ?>
                    <li class="articles-item articles-item--default">
                      <a href="<?php the_permalink(); ?>" class="articles-link">
                        <article class="article">
                          <h3 class="article-title"><?php the_title(); ?></h3>
                          <p class="article-text">
                            <?php echo wp_trim_words( get_the_content(), 8, '...' ); ; ?>
                          </p>
                          <span class="article-date"><?php the_time('j F'); ?></span>
                        </article>
                      </a>
                    </li>
                  <?php
                  break;
              }
              ?>
              <?php
            }
          } else {
            ?>
              <p>Постов нет</p>
            <?php
          }
          wp_reset_postdata(); // Сбрасываем $post
          ?>
        </ul>
      </section>
      <!-- Подключаем сайдбар -->
      <?php get_sidebar(); ?>
    </div>
  </div>
  <!-- /.container -->
</main>
