<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="c-cover js-cover"></div>

  <!-- HEADER -->
  <header class="l-header">
    <button class="c-button--circle p-hamburgerBtn js-hamburgerBtn" type="button" aria-expanded="false" aria-controls="nav"><span class="p-hamburgerBtn__bar js-menu">メニューを開く</span></button>

    <nav id="nav" class="l-nav p-nav js-nav" tabindex="0">

      <!-- MAIN MENU -->
      <?php wp_nav_menu( array(
        'theme_location' => 'main_menu',
        'menu_class' => 'p-nav__list',
        'walker' => new Custom_Globalnav_Walker(),
      )); ?>

      <ul class="c-outline--navSns p-nav__sns">
        <li><a href="#"><span class="c-icon__x -nav">X</span></a></li>
        <li><a href="#"><span class="c-icon__github -nav">GitHub</span></a></li>
      </ul>
      <div class="p-focusTrap js-focusTrap" tabindex="0"></div>
    </nav>

    <a href="#contact" class="c-button--circle p-contactBtn"><div class="p-contactBtn__alien"><span class="c-alien--header"></span></div>contact</a>
  </header>