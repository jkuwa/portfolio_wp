
<div class="p-skill__icon">
  <?php if ( $icon1 = get_field("skill_icon01") ): ?>
    <img src="<?php echo esc_url($icon1); ?>" aria-hidden="true" class="c-icon--01">
  <?php endif; ?>
  
  <?php if ( $icon2 = get_field("skill_icon02") ): ?>
    <img src="<?php echo esc_url($icon2); ?>" aria-hidden="true" class="c-icon--02">
  <?php endif; ?>
</div>

<section class="p-skill__desc">
  <h3><?php the_title(); ?></h3>
  <p><?php the_content(); ?></p>
</section>