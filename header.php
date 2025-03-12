<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Webサイト制作を中心に、コーディングからWordPress開発まで対応可能なフリーランスコーダー「くわじゅんな」のポートフォリオです。">

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
      <ul class="c-outline--navSns p-nav__sns">
        <?php get_template_part('template/sns'); ?>
      </ul>
      <div class="p-focusTrap js-focusTrap" tabindex="0"></div>
    </nav>

    <?php $contact_page = get_page_by_path('contact'); ?>
    <a href="<?php echo esc_url(get_permalink($contact_page -> ID)); ?>" class="c-button--circle p-contactBtn"><div class="p-contactBtn__alien"><span class="c-alien--header"></span></div>contact</a>
  </header>