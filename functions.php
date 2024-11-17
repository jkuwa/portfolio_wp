<?php
  // テーマサポート
  add_theme_support('title-tag');
  
  // タイトル区切り文字変更
  function my_portfolio_title_separator($separator) {
    $separator = '';
    return $separator;
  }
  add_filter('document_title_separator', 'my_portfolio_title_separator');
  

  // ファイル読み込み
  function my_portfolio_script() {
    // css
    wp_enqueue_style('reset', get_theme_file_uri('/css/ress.css'));
    wp_enqueue_style('my-style', get_theme_file_uri('/css/style.css'), array('reset'));

    // font
    wp_enqueue_style('zen-maru', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap');
    wp_enqueue_style('lilita-one', 'https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');

    // JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array('jquery'));
    wp_enqueue_script('scroll-trigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'));
    wp_enqueue_script('magic-grid', 'https://unpkg.com/magic-grid/dist/magic-grid.min.js', array('scroll-trigger'));
    wp_enqueue_script('my-script', get_theme_file_uri('/js/main.js'), array('magic-grid'), false, true);
  }
  add_action('wp_enqueue_scripts', 'my_portfolio_script');