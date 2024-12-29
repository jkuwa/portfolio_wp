<a href="<?php the_permalink(); ?>">
  <article class="p-workInfo">
    <h3>
      <?php if ( get_field("release_date") ):
        the_field('release_date'); ?><br>
      <?php elseif ( get_field("creation_date") ):
        the_field('creation_date'); ?><br>
      <?php endif;
        the_title(); ?>
    </h3>
    <figure class="c-shadow">
      <?php the_post_thumbnail('medium'); ?>
    </figure>
  </article>
</a>