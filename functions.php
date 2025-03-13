<?php
  // ---------  テーマサポート --------- 
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  

  // --------- タイトル変更 --------- 
  function my_portfolio_title($title) {
    $post_title = single_post_title('', false);
    $site_title = get_bloginfo('name', 'display');
    $description = get_bloginfo('description', 'display');

    if ( is_front_page() && is_home() ) {
      $title = "$site_title portfolio";
    } elseif ( is_singular() ) {
      $title = "$post_title | $site_title portfolio";
    }
    return $title;
  }
  add_filter('pre_get_document_title', 'my_portfolio_title');


  // --------- Critical CSS インライン化 ---------
  function my_portfolio_critical_css() {
    if ( is_front_page() || is_home() ) {
      $bg_img_url = esc_url( get_theme_file_uri('/images/fv_bg.png') );
      echo '<style>
        .p-hamburgerBtn{margin-left:auto;width:50px;position:relative;z-index:50}.p-hamburgerBtn__bar,.p-hamburgerBtn::before,.p-hamburgerBtn::after{margin:0 auto;position:absolute;right:0;left:0;width:24px;height:4px;border-radius:2px;background:#fff;top:calc(50% - 2px);font-size:0}.p-hamburgerBtn::before,.p-hamburgerBtn::after{content:"";transition:transform .3s}.p-hamburgerBtn::before{top:14px}.p-hamburgerBtn::after{top:32px}.p-fv{width:100%;min-height:100vh;background:url("' . $bg_img_url . '") top left/1125px #fcef89}
      </style>';
      ?>
      <link rel="preload" href="<?php echo esc_url( get_theme_file_uri('images/bg-fv_rocketBoy.svg') ); ?>" as="image">
      <?php
    }
  }
  add_action('wp_head', 'my_portfolio_critical_css', 5);
  

  // --------- ファイル読み込み ---------
  function my_portfolio_script() {
    // font
    wp_enqueue_style('lilita-one', 'https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');

    // フロントページでzen maru gothic の読み込みを遅らせる
    if ( is_front_page() || is_home() ) {
      wp_enqueue_style('zen-maru', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap', array(), false, 'print');
    } else {
      wp_enqueue_style('zen-maru', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap');
    }

    // css
    wp_enqueue_style('reset', get_theme_file_uri('/css/ress.css'));
    wp_enqueue_style('my-style', get_theme_file_uri('/css/style.min.css'), array('reset'));

    if ( is_front_page() || is_home() ) {  // TOPページ
      wp_enqueue_style( 'top-style', get_theme_file_uri('/css/top.min.css'), array('reset'));
      // Gutenberg用のCSSを読み込まない
      wp_deregister_style( 'wp-block-library' );
    } elseif ( is_page() ) {  // contactページ
      wp_enqueue_style( 'contact-style', get_theme_file_uri('/css/contact.min.css'), array('reset'));
    } elseif ( is_singular('achievement') ) {  // 実績ページ
      wp_enqueue_style( 'achievement-style', get_theme_file_uri('/css/achievement.min.css'), array('reset'));
    } 

    // JS
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js',array(), false, true);
    wp_enqueue_script('scroll-trigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), false, true);
    wp_enqueue_script('my-script', get_theme_file_uri('/js/main.js'), array('scroll-trigger'), false, true);

    if ( is_front_page() || is_home() ) {  // TOPページ
      wp_enqueue_script('magic-grid', 'https://unpkg.com/magic-grid/dist/magic-grid.min.js', array('gsap'), false, true);
      wp_enqueue_script( 'front-script', get_theme_file_uri('/js/front-page.js'), array('magic-grid'), false, true);
    }
  }
  add_action('wp_enqueue_scripts', 'my_portfolio_script');
  

  // --------- メニュー登録 ---------
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
      $output .= '<a href="' . esc_url($data_object -> url) . '" aria-label=' . $aria_label. '>';
      $output .= esc_html($data_object -> title);
      $output .= '</a>';
    }  
  }


  // --------- テーマカスタマイザー追加 ---------
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
  }
  add_action('customize_register', 'my_portfolio_customize_register');


  // --------- コンタクトフォーム ---------
  function my_portfolio_wpcf7_autop() {
    return false;
  }
  add_filter('wpcf7_autop_or_not', 'my_portfolio_wpcf7_autop');


  // --------- OGPタグ設定 ---------
  function my_portfolio_ogp() {
    if ( is_front_page() || is_home() || is_singular() ) {
      global $post;
      $ogp_title = '';
      $ogp_desc = '';
      $ogp_url = '';
      $ogp_img = '';
      $insert = '';
      $def_desc = 'Webサイト制作を中心に、コーディングからWordPress開発まで対応可能なフリーランスコーダー「くわじゅんな」のポートフォリオです。';

      // 記事・固定ページ
      if ( is_singular() ) {
        $ogp_title = get_the_title() . ' | ' . get_bloginfo('name', 'display') . ' portfolio';
        $ogp_desc = mb_strimwidth( get_the_excerpt(), 0, 100, '...', 'UTF-8');
        $ogp_url = get_permalink();
      // フロントページ
      } elseif ( is_front_page() || is_home() ) {
        $ogp_title = get_bloginfo('name') . ' portfolio';
        $ogp_desc = $def_desc;
        $ogp_url = home_url();
      }
    }

    // og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    // og:image
    $ogp_img = get_theme_file_uri('screenshot.png');

    // 出力するOGPタグ
    $insert .= '<meta property="og:locale" content="ja_JP">' . "\n";
    $insert .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
    $insert .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
    $insert .= '<meta property="og:description" content="' . esc_attr($ogp_desc) . '">' . "\n";
    $insert .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
    $insert .= '<meta property="og:image" content="' . esc_url($ogp_img) . '">' . "\n";
    $insert .= '<meta property="og:site_name" content="' . esc_attr($ogp_title) . '">' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
    $insert .= '<meta name="twitter:site" content="@jnkw10">' . "\n";

    echo $insert;
  }

  add_action('wp_head', 'my_portfolio_ogp');