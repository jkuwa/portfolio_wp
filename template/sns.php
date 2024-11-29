<?php 
  $x_url = get_theme_mod('my_portfolio_x_url');
  $facebook_url = get_theme_mod('my_portfolio_facebook_url');
  $instagram_url = get_theme_mod('my_portfolio_instagram_url');
  $github_url = get_theme_mod('my_portfolio_github_url');
?>

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