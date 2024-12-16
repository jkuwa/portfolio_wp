<?php
  /*
    Template Name: contactページ
  */
?>


<?php get_header(); ?>

  <main class="l-main">

  <?php if ( have_posts() ):
      while ( have_posts() ):
        the_post(); ?>

    <section <?php post_class('p-contact'); ?>>
      <div class="p-secTitle js-target">
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h1><span>contact</span>お問い合わせ</h1>
          <span class="c-star -right"></span>
        </div>
      </div>

      <p class="p-contact__text">どんなことでもお気軽に<br>ご相談、ご質問ください。</p>
      
      <div class="p-contact__body">
        <div class="c-alien03 -form"></div>
        <div class="c-wrapper p-contact__input">
          <div class="c-wrapper--contact">

              <?php the_content(); ?>

          </div>
        </div>
      </div>
    </section>

    <?php endwhile;
    else: ?>
      <p>表示する投稿がありません。</p>
    <?php endif; ?>

  </main>

  <?php get_footer(); ?>