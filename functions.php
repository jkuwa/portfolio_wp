<?php
  // テーマサポート
  add_theme_support('title-tag');

  // タイトル区切り文字変更
  function my_portfolio_title_separator($separator) {
    $separator = '';
    return $separator;
  }
  add_filter('document_title_separator', 'my_portfolio_title_separator');
  