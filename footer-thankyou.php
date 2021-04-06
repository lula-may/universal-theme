    <footer class="footer">
      <div class="container">
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
              'echo'            => true
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
          <span class="footer-copyright"><?php echo date('Y') . ' &copy; ' . get_bloginfo( 'name' ) ?></span>
        </div>
        <!-- /.footer-text-wrapper -->
      </div>
      <!-- /.container -->
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
