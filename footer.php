    <footer class="footer">
      <div class="container">
        <div class="footer-form-wrapper">
          <h3 class="footer-form-title">Подпишитесь на нашу рассылку</h3>
          <form class="footer-form" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
            <!-- Поле Email (обязательно) -->
            <input class="input footer-form-input" type="text" name="email" placeholder="Введите email" required/>
            <!-- Токен списка -->
            <!-- Получить API ID на: https://app.getresponse.com/campaign_list.html -->
            <input type="hidden" name="campaign_token" value="BH8iM" />
            <!-- Добавить подписчика в цикл на определенный день (по желанию) -->
            <!-- Страница благодарности (по желанию) -->
            <input type="hidden" name="thankyou_url" value="<?php echo home_url('thankyou') ?>"/>
            <input type="hidden" name="start_day" value="0" />
            <!-- Кнопка подписаться -->
            <button class="button footer-form-submit" type="submit">Подписаться</button>
          </form>
        </div>
        <!-- /.footer-form-wrapper -->
        <?php
        if ( ! is_active_sidebar( 'footer-sidebar' ) ) {
          return;
        }
        ?>

        <div class="footer-menu-bar">
          <?php dynamic_sidebar( 'footer-sidebar' ); ?>
        </div>
        <!-- ./footer-menu-bar -->
        <div class="footer-menu-info">
          <?php
          if( has_custom_logo() ){
          echo '<div class="logo">' . get_custom_logo() . '</div>';
        } else {
          echo '<span class="logo-name">' .get_bloginfo('name') . '</span>';
        }

            wp_nav_menu( [
              'theme_location'  => 'footer_menu',
              'container'       => 'nav',
              'container_class' => 'footer-nav-wrapper',
              'menu_class'      => 'footer-nav',
              'echo'            => true,
            ] );
            // Виджет соцсетей
          $instance = array(
            'title' => '',
            'facebook' => 'https://fb.com/',
            'twitter' => 'https://twitter.com/',
            'youtube' => 'https://youtube.com/',
            'instagram' => 'https://instagram.com/',
          );
          $args = array(
            'before_widget' => '<div class="widget_social footer-social"><div class="widget_content">',
            'after_widget' => '</div></div>'
          );
          the_widget( 'Social_Widget', $instance, $args );
        ?>

        <!-- /.footer-menu-info -->
        <?php
          if ( ! is_active_sidebar( 'footer-text-sidebar' ) ) {
            return;
          }
        ?>
        <div class="footer-text-wrapper">
          <?php dynamic_sidebar( 'footer-text-sidebar' ); ?>
          <span class="footer-copyright"><?php echo date('Y') . ' &copy; ' . get_bloginfo( 'name' ) . ' ' . get_post_meta( 98, 'email', true ) ?></span>
        </div>
        <!-- /.footer-text-wrapper -->
      </div>
      <!-- /.container -->
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
