<?php get_header(); ?>

  <main class="l-main">

    <!-- FIRST VIEW -->
    <div class="p-fv">
      <div class="p-fv__title js-title">
        <span>corder</span>
        <h1><?php bloginfo('name'); ?><br><?php bloginfo('description'); ?></h1>
      </div>
      <div class="p-img__wrapper">
        <div class="p-fv__img">
          <div class="c-space js-space"></div>
          <div class="c-number -fv01 js-number"></div>
          <div class="c-planet js-planet"></div>
          <div class="c-rocketBoy js-boy"></div>
        </div>
      </div>
    </div>

    <?php
      // カスタマイザーで選択された時に表示
      $about_id = get_theme_mod('about_sec');
      $about = get_post($about_id);
      
      if ($about_id):
    ?>

      <!-- ABOUT SECTION -->
      <section id="about" class="c-section p-about">
        <div class="p-secTitle js-target">
          <div class="c-number -sec02"></div>
          <div class="p-secTitle__star">
            <span class="c-star -left"></span>
            <h2><span>about</span>私について</h2>
            <span class="c-star -right"></span>
          </div>
        </div>

        <div class="c-wrapper p-about__body">
          <div class="p-about__img">

            <svg viewBox="0 0 382 525" xmlns="http://www.w3.org/2000/svg" class="c-shadow--pink">
              <defs>
                <clipPath id="about_mask">
                  <path d="M20.5559 127.5C20.5559 60.4943 91.6814 1 185.181 1C269.557 1 346.799 44.5 355.681 113.5C364.564 182.5 327.5 185 334 227.5C337.553 250.73 398.676 300.5 375.681 402C360.438 469.283 274.498 521.502 197.557 524.5C120.557 527.5 12.4368 471.718 3.55635 386C-7.9434 275 48.0567 260.006 48.0567 227.5C48.0567 194.994 20.5559 194.506 20.5559 127.5Z" />
                </clipPath>
              </defs>

              <?php $avatar_url = get_the_post_thumbnail_url($about_id, 'full') ?:  get_theme_file_uri('/images/about_noimage.png'); ?>

              <image href="<?php echo esc_url($avatar_url); ?>" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" clip-path="url(#about_mask)"></image>

            </svg>

            <ul class="c-outline--list p-about__sns">
              <?php get_template_part('template/sns'); ?>
            </ul>

            <div class="c-rocket"></div>
          </div>

          <div class="p-about__text">
            <?php 
              if( !empty($about -> post_content) ) {
                echo wp_kses_post($about -> post_content);
              } else {
                echo '<p>自己紹介が入ります。</p>';
              }
            ?>
            <div class="c-planet--green"></div>
          </div>

        </div>
      </section>
    <?php endif; ?>


    <?php
      $args = array(
        'post_type' => 'skills',
        'posts_per_page' => -1,
        'order' => 'ASC',
      );
      $skills_query = new WP_Query( $args );

      if ($skills_query -> have_posts()):
    ?>

    <!-- SKILLS SECTION -->
    <section id="skills" class="c-section p-skills js-skills">
      <div class="p-secTitle js-target">
        <div class="c-number -sec03"></div>
        <div class="p-secTitle__star">
          <div class="c-star -left"></div>
          <h2><span>skills</span>できること</h2>
          <div class="c-star -right"></div>
        </div>
      </div>

      <ul class="c-wrapper p-skills__list js-grid">

        <?php
          while ($skills_query -> have_posts()):
            $skills_query -> the_post();
        ?>

        <li <?php post_class('p-skill'); ?>>
          <?php get_template_part('template/loop', 'skill'); ?>
        </li>

        <?php endwhile; ?>

      </ul>

      <!--"html5""css3-alt""sass-brands-solid""js""wordpress-brands-solid""git-alt--brands-solid""github-brands-solid"!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. Licensed under CC BY 4.0 - https://creativecommons.org/licenses/by/4.0/-->
    </section>

    <?php endif; ?>


    <?php
      $args = array(
        'post_type' => 'achievement',
        'posts_per_page' => 4,
      );
      $works_query = new WP_Query( $args );

      if ($works_query -> have_posts()):
    ?>

    <!-- WORKS SECTION -->
    <section id="works" class="c-section p-works js-works">
      <div class="p-secTitle js-target">
        <div class="c-number -sec04"></div>
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span>works</span>実績紹介</h2>
          <span class="c-star -right"></span>
        </div>
      </div>

      <div class="c-wrapper--works">
        <ul class="c-outline--works p-works__list">

        <?php
          while ($works_query -> have_posts()):
            $works_query -> the_post();
        ?>
          <li <?php post_class(); ?>>
            <?php get_template_part('template/loop', 'work'); ?>
          </li>
        <?php endwhile; ?>

        </ul>
      </div>
    </section>
    <?php endif; ?>

    <!-- CONTACT SECTION -->
    <section id="contact" class="c-section p-contactSec js-contact">
      <div class="p-secTitle js-target">
        <div class="c-number -go"></div>
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span>contact me</span>お問い合わせ</h2>
          <span class="c-star -right"></span>
        </div>
      </div>

      <div class="p-contactSec__desc">
        <p>ご検討いただきありがとうございます。<br>どんなことでもお気軽にご相談ください。</p>
        <a href="contact.html" class="c-button--link c-shadow js-btn">contact</a>
        <span class="c-alien--contact"></span>
      </div>

      <div class="p-ufo js-ufo">
        <div class="c-light"></div>
        <div class="c-ufo"></div>
      </div>
    </section>
  </main>

  <?php get_footer(); ?>