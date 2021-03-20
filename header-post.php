<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header header-light">
  <div class="container">
    <div class="header-wrapper">
      <?php
        if( has_custom_logo() ){
          echo '<div class="logo">' . get_custom_logo() . '<a href="';
          // Проверка главная это страница или нет
          if( ! is_front_page() ){
            echo get_home_url();
          }
          echo '" class="logo-link"><span class="logo-name">' .get_bloginfo('name') . '</span></a></div>';
        } else {
          echo '<a href="';
          if( ! is_front_page() ){
            echo get_home_url();
          }
          echo '" class="logo-link"><span class="logo-name">' .get_bloginfo('name') . '</span></a>';
        }

        wp_nav_menu( [
          'theme_location'  => 'header_menu',
          'container'       => 'nav',
          'container_class' => 'header-nav',
          'menu_class'      => 'header-menu',
          'echo'            => true,
        ] );
      ?>
      <?php get_search_form(); ?>
      <a href="#" class="header-menu-toggle" aria-label="Развернуть меню">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
  </div>
</header>
