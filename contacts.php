<?php
/*
Template Name: Страница контакты
Template Post Type: page
*/

get_header();
?>
<main class="contacts">
  <div class="container">
    <?php the_title('<h1 class="contacts-heading">', '</h1>', true); ?>
    <div class="contacts-wrapper">
      <div class="contacts-left">
        <h2 class="contacts-title">Через форму обратной связи</h2>
        <form action="#" method="post" class="contacts-form">
          <input name="contact_name" type="text" class="contacts-input" placeholder="Ваше имя" required>
          <input name="contact_email" type="email" class="contacts-input" placeholder="Ваш email" required>
          <textarea name="contact_comment" id="contacts-text" class="contacts-textarea" placeholder="Ваш вопрос" required></textarea>
          <button type="submit" class="button">
            Отправить
            <svg class="icon" width="19" height="16">
              <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#arrow' ?>"></use>
            </svg>
          </button>
        </form>

        <?php the_content()?>
      </div>
      <div class="contacts-right">
        <h2 class="contacts-title">Или по этим контактам</h2>
        <a href="<?php the_field('email') ?>"><?php the_field('email') ?></a>
        <address><?php the_field('address') ?></address>
        <a href="tel:<?php the_field('phone') ?>"><?php the_field('phone') ?></a>
      </div>
    </div>
  </div>
  <!-- /.container -->
</main>
<!-- /.contacts -->
<?php
get_footer();
