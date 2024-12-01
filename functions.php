<?php
  // テーマサポート
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  
  // タイトル変更
  function my_portfolio_title($title) {
    $post_title = single_post_title('', false);
    $site_title = get_bloginfo('name', 'display');
    $description = get_bloginfo('description', 'display');

    if ( is_front_page() && is_home() ) {
      $title = "$site_title $description";
    } elseif ( is_singular() ) {
      $title = "$post_title | $site_title $description";
    }
    return $title;
  }
  add_filter('pre_get_document_title', 'my_portfolio_title');
  

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


  // メニュー登録
  function my_portfolio_menu() {
    register_nav_menus( array(
      'main_menu' => 'Main Menu',
      'footer_menu' => 'Footer Menu',
    ));
  }
  add_action('after_setup_theme', 'my_portfolio_menu');
  
  // メニュー項目に aria-label を追加
  class Custom_Globalnav_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
      $class = !empty($data_object -> classes) ? implode(' ', array_filter($data_object -> classes)) : '';
      $aria_label = !empty($data_object -> title) ? esc_attr($data_object -> title) : '';

      $output .= '<li class="' . esc_attr($class) . '">';
      $output .= '<a href="' . esc_url($data_object -> url) . '"aria-label"' . $aria_label. '">';
      $output .= esc_html($data_object -> title);
      $output .= '</a>';
    }  
  }


  // テーマカスタマイザー追加
  function my_portfolio_customize_register($wp_customize) {

    // SNS設定
    $wp_customize -> add_section('social_media_settings', array(
      'title' => 'SNSアカウント設定',
      'priority' => 160,
      'description' => 'SNSアカウントをお持ちの場合は以下に入力してください。',
    ));

    $sns = array(
      'x' => 'X URL',
      'facebook' => 'Facebook URL',
      'instagram' => 'Instagram URL',
      'github' => 'GitHub URL',
    );

    foreach ($sns as $key => $label) {
      $wp_customize -> add_setting("my_portfolio_{$key}_url", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize -> add_control("my_portfolio_{$key}_url", array(
        'label' => $label,
        'section' => 'social_media_settings',
        'type' => 'url',
      ));
    }

    // フロントページ設定
    $wp_customize -> add_section('front_page_settings', array(
      'title' => 'フロントページ設定',
      'priority' => 180,
    ));

    // about
    $wp_customize -> add_setting('about_sec', array(
      'default' => '',
      'sanitize_callback' => 'absint',
    ));

    $wp_customize -> add_control('about_sec', array(
      'label' => 'about',
      'section' => 'front_page_settings',
      'description' => '「about」セクションに表示する固定ページを選択してください。',
      'type' => 'dropdown-pages',
    ));

    // contact
    $wp_customize -> add_setting('contact_sec', array(
      'default' => '',
      'sanitize_callback' => 'absint',
    ));

    $wp_customize -> add_control('contact_sec', array(
      'label' => 'contact',
      'section' => 'front_page_settings',
      'description' => '「contact me」セクションに表示する固定ページを選択してください。',
      'type' => 'dropdown-pages',
    ));
  }
  add_action('customize_register', 'my_portfolio_customize_register');


  // --------- コンタクトフォーム ---------
  function my_portfolio_wpcf7_autop() {
    return false;
  }
  add_filter('wpcf7_autop_or_not', 'my_portfolio_wpcf7_autop');
