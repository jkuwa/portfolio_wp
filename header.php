<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="c-cover js-cover"></div>

  <!-- HEADER -->
  <header class="l-header">
    <button class="c-button--circle p-hamburgerBtn js-hamburgerBtn" type="button" aria-expanded="false" aria-controls="nav"><span class="p-hamburgerBtn__bar js-menu">メニューを開く</span></button>

    <nav id="nav" class="l-nav p-nav js-nav" tabindex="0">

      <!-- MAIN MENU -->
      <?php wp_nav_menu( array(
        'theme_location' => 'main_menu',
        'menu_class' => 'c-outline--navList p-nav__list',
        'walker' => new Custom_Globalnav_Walker(),
      )); ?>

      <!-- SNS MENU -->
      <?php 
        $x_url = get_theme_mod('my_portfolio_x_url');
        $facebook_url = get_theme_mod('my_portfolio_facebook_url');
        $instagram_url = get_theme_mod('my_portfolio_instagram_url');
        $github_url = get_theme_mod('my_portfolio_github_url');
      ?>

      <ul class="c-outline--navSns p-nav__sns">
        <?php if ($x_url): ?>
          <li>
            <a href="<?php echo esc_url($x_url); ?>" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-x-twitter" aria-hidden="true"></i><span>X</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($facebook_url): ?>
          <li>
            <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-facebook" aria-hidden="true"></i><span>Facebook</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($instagram_url): ?>
          <li>
            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-instagram" aria-hidden="true"></i><span>Instagram</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($github_url): ?>
          <li>
            <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-github" aria-hidden="true"></i><span>GitHub</span>
            </a>
          </li>
        <?php endif; ?>

      </ul>
      <div class="p-focusTrap js-focusTrap" tabindex="0"></div>
    </nav>

    <a href="#contact" class="c-button--circle p-contactBtn"><div class="p-contactBtn__alien"><span class="c-alien--header"></span></div>contact</a>
  </header>