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
      </div>
      <!-- /.contaier -->
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
