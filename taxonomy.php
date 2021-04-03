<?php get_header()?>
<main class="category">
  <div class="container">
    <h1 class="category-title">
      <?php single_term_title() ?>
    </h1>
    <ul class="post-list">
      <?php while ( have_posts() ){ the_post(); ?>
        <li class="post-item">
          <a href="<?php the_permalink() ?>" class="post-link">
            <div class="post-card">
              <img src="<?php
                if( has_post_thumbnail() ) {
                  echo get_the_post_thumbnail_url();
                }
                else {
                  echo get_template_directory_uri().'/assets/images/img-default.png"';
                } ?>" alt="<?php the_title()?>" class="post-card-thumb">
              <div class="post-card-text">
                <h2 class="post-card-title">
                  <?php the_title()?>
                </h2>
              </div>
              <!-- /.post-card-text -->
            </div>
          </a>
        </li>
        <!-- /.card -->
      <?php } ?>
      <?php if ( ! have_posts() ){ ?>
        Записей нет.
      <?php } ?>
      </ul>
    <!-- /.post-list -->
    <?php
    $prev = '<svg class="icon" width="15" height="7">
        <use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#left-arrow"></use>
      </svg> Назад';
    $next = 'Вперед <svg class="icon" width="15" height="7">
        <use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#arrow"></use>
      </svg>';
    $args = array(
      'prev_text' => $prev,
      'next_text' => $next
    );
    the_posts_pagination( $args);
    ?>
  </div>
</main>
<!-- /.container -->
<?php get_footer()?>
