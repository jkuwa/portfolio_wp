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
      <ul class="c-outline--navList p-nav__list">
        <li><a href="index.html" class="js-link" aria-label="home">home</a></li>
        <li><a href="#about" class="js-link" aria-label="about">about</a></li>
        <li><a href="#skills" class="js-link" aria-label="skills">skills</a></li>
        <li><a href="#works" class="js-link" aria-label="works">works</a></li>
        <li class="p-nav__contact"><a href="#contact" class="js-link"  aria-label="contact">contact</a></li>
      </ul>

      <ul class="c-outline--navSns p-nav__sns">
        <li><a href="#"><span class="c-icon__x -nav">X</span></a></li>
        <li><a href="#"><span class="c-icon__github -nav">GitHub</span></a></li>
      </ul>
      <div class="p-focusTrap js-focusTrap" tabindex="0"></div>
    </nav>

    <a href="#contact" class="c-button--circle p-contactBtn"><div class="p-contactBtn__alien"><span class="c-alien--header"></span></div>contact</a>
  </header>