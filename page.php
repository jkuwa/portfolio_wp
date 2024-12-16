<?php get_header(); ?>

  <main class="l-main">

  <?php if ( have_posts() ):
      while ( have_posts() ):
        the_post(); ?>

    <section <?php post_class('p-contact'); ?>>
      <div class="p-secTitle js-target">
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span><?php the_title(); ?></span></h2>
          <span class="c-star -right"></span>
        </div>
      </div>
      
      <div class="p-contact__body u-page__body">
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