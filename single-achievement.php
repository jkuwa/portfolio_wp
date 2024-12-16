<?php get_header(); ?>

  <main class="l-main">
    <div class="c-wrapper--achievement">
      
    <?php if ( have_posts() ):
      while ( have_posts() ):
        the_post(); ?>

      <!-- ACHIEVEMENT DETAIL -->
      <section <?php post_class('p-achievement'); ?>>
        <h1><?php the_title(); ?></h1>
        <div class="p-achievement__head">

        <?php if ( get_field('site_summary') ): ?>
          <dl>
          <?php if ( get_field("release_date") ): ?>
            <div>              
              <dt>release date：</dt>
              <dd><?php the_field('release_date'); ?></dd>              
            </div>
          <?php endif; ?>

          <?php if ( get_field('creation_date') ): ?>
            <div>              
              <dt>creation date：</dt>
              <dd><?php the_field('creation_date'); ?></dd>              
            </div>
          <?php endif; ?>

          <?php if ( get_field('site_url') ): ?>
            <div>
              <dt>URL：</dt>
              <dd><a href="<?php the_field('site_url'); ?>" aria-label="<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"><?php the_field('site_url'); ?></a></dd>
            </div>
          <?php endif; ?>
          <?php if ( get_field('basic_authentication') ) : ?>
            <div class="p-achievement__note">
              <p>※アクセス制限をかけています。</p>
              <dl>
                <div>
                  <dt>ユーザー名：</dt>
                  <dd><?php the_field('user_name'); ?></dd>
                </div>
                <div>
                  <dt>パスワード：</dt>
                  <dd><?php the_field('pass'); ?></dd>
                </div>
              </dl>
            </div>
          <?php endif; ?>

          <?php if ( get_field('github_coding') || get_field('github_wp') ): ?>
            <div>
              <dt>GitHub：</dt>
              <?php if ( get_field('github_coding') ): ?>
              <dd><a href="<?php the_field('github_coding'); ?>" aria-label="GitHubリポジトリ（コーディング）">coding</a></dd>
              <?php endif;
              if ( get_field('github_wp') ): ?>
              <dd><a href="<?php the_field('github_wp'); ?>" aria-label="GitHubリポジトリ（WordPress化）">WordPress</a></dd>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          </dl>
        <?php endif; ?>

        <?php if ( $siteImg = get_field('site_image') ): ?>
          <figure>
            <img src="<?php echo esc_url( $siteImg['url'] ); ?>" alt="<?php echo esc_attr( $siteImg['alt'] ); ?>">
          </figure>
        <?php endif; ?>
        </div>

        <div class="p-achievement__body">
          <div class="p-achievement__body--data">
          <?php if ( get_field('credits') ): ?>
            <section class="p-detail -credits">
              <h2>credits</h2>
              <dl>

              <?php for ($i = 1; $i <= 5; $i++):
                $name = get_field("creator_name0{$i}");
                if ( empty($name) ) {
                  break;
                }
              ?>

                <div>
                  <dt><?php the_field("creator_title0{$i}"); ?>：</dt>
                  <dd><?php the_field("creator_name0{$i}"); ?></dd>
                </div>

              <?php endfor; ?>
              </dl>
            </section>
          <?php endif; ?>

            <div>
            <?php if ( get_field('production_time') ): ?>
              <section class="p-detail">
                <h2>制作期間</h2>
                <dl>

                <?php for ($i = 1; $i <= 3; $i++):
                  $production = get_field("production0{$i}");
                  if ( empty($production) ) {
                    break;
                  }
                ?>

                  <div>
                    <dt><?php the_field("production0{$i}"); ?>：</dt>
                    <dd><?php the_field("production0{$i}_time"); ?></dd>
                  </div>
                  
                <?php endfor; ?>

                </dl>
              </section>
            <?php endif; ?>

            <?php if ( get_field('tool') ): ?>
              <section class="p-detail">
                <h2>使用ツール</h2>
                <ul>

                <?php for ($i = 1; $i <= 10; $i++):
                  $tool = get_field("tool_{$i}");
                  if ( empty($tool) ) {
                    break;
                  }
                ?>

                  <li><?php the_field("tool_{$i}"); ?></li>
                
                <?php endfor; ?>

                </ul>
              </section>
            <?php endif; ?>

            <?php if ( get_field('language') ): ?>
              <section class="p-detail">
                <h2>使用スキル</h2>
                <ul>

                <?php for ($i = 1; $i <= 10; $i++):
                  $language = get_field("language_{$i}");
                  if ( empty($language) ) {
                    break;
                  }
                ?>

                  <li><?php the_field("language_{$i}"); ?></li>

                <?php endfor; ?>

                </ul>
              </section>
            <?php endif; ?>

            </div>
          </div>

          <div class="p-achievement__body--text">
            <?php the_content(); ?>
          </div>

          <a href="<?php the_field('site_url'); ?>" class="c-button--link c-shadow p-achievement__body--btn js-btn" aria-label="<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">visit site</a>
        </div>
      </section>

      <?php endwhile;
    else: ?>
      <p>表示する実績詳細がありません。</p>
    <?php endif; ?>

    </div>

    <?php
      $args = array(
        'post_type' => 'achievement',
        'posts_per_page' => -1,
      );
      $works_query = new WP_Query( $args );

      if ($works_query -> have_posts()):
    ?>

    <!-- ARCHIVE -->
    <section class="p-archive u-archiveSec">
      <div class="p-secTitle js-target">
        <div class="p-secTitle__star">
          <div class="c-star -left u-archiveSec__star"></div>
          <h2><span>all works</span>すべての実績</h2>
          <div class="c-star -right  u-archiveSec__star"></div>
        </div>
      </div>

      <div class="c-wrapper--achievement u-archiveSec__wrapper">
        <ul class="c-outline--works">

        <?php
          while ($works_query -> have_posts()):
            $works_query -> the_post();
        ?>
          <li <?php post_class(); ?>>
            <?php get_template_part('template/loop', 'work'); ?>
          </li>
        <?php endwhile; ?>

        </ul>
  
        <div class="p-archive__man js-target">
          <span class="c-checkman__arm"></span>
          <span class="c-checkman"></span>
        </div>

      </div>
    </section>

    <?php endif; ?>
  </main>

  <?php get_footer(); ?>