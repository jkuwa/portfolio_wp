<?php get_header(); ?>

  <main class="l-main">

    <!-- FIRST VIEW -->
    <div class="p-fv">
      <div class="p-fv__title js-title">
        <span>corder</span>
        <h1><?php bloginfo('name'); ?><br><?php bloginfo('description'); ?></h1>
      </div>
      <div class="p-img__wrapper">
        <div class="p-fv__img">
          <div class="c-space js-space"></div>
          <div class="c-number -fv01 js-number"></div>
          <div class="c-planet js-planet"></div>
          <div class="c-rocketBoy js-boy"></div>
        </div>
      </div>
    </div>

    <!-- ABOUT SECTION -->
    <section id="about" class="c-section p-about">
      <div class="p-secTitle js-target">
        <div class="c-number -sec02"></div>
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span>about</span>私について</h2>
          <span class="c-star -right"></span>
        </div>
      </div>

      <div class="c-wrapper p-about__body">
        <div class="p-about__img">
          <svg viewBox="0 0 382 525" xmlns="http://www.w3.org/2000/svg" class="c-shadow--pink">
            <defs>
              <clipPath id="about_mask">
                <path d="M20.5559 127.5C20.5559 60.4943 91.6814 1 185.181 1C269.557 1 346.799 44.5 355.681 113.5C364.564 182.5 327.5 185 334 227.5C337.553 250.73 398.676 300.5 375.681 402C360.438 469.283 274.498 521.502 197.557 524.5C120.557 527.5 12.4368 471.718 3.55635 386C-7.9434 275 48.0567 260.006 48.0567 227.5C48.0567 194.994 20.5559 194.506 20.5559 127.5Z" />
              </clipPath>
            </defs>
            <image href="images/about.jpg" width="100%" height="100%" clip-path="url(#about_mask)"></image>
          </svg>
          <div class="c-outline--single p-about__sns"><a href="#" class="c-icon__x -about">X</a></div>
          <div class="c-rocket"></div>
        </div>
        <div class="p-about__text">
          <p><span>こんにちは。</span><br>フリーランスのコーダーとして活動している千葉県在住のくわです。</p>
          <p>約７年薬剤師としてドラッグストアに勤務していましたが、没頭できるくらい楽しく仕事がしたい！と思い転職を決意。<br>デザインをそのままにはもちろんのこと、伝えたい思いが全ての方に正しく伝わるように心がけています。</p>
          <p>日々の学習や活動の記録を <a href="#">BuildUp</a> で管理しています。</p>
          <div class="c-planet--green"></div>
        </div>
      </div>
    </section>

    <!-- SKILLS SECTION -->
    <section id="skills" class="c-section p-skills js-skills">
      <div class="p-secTitle js-target">
        <div class="c-number -sec03"></div>
        <div class="p-secTitle__star">
          <div class="c-star -left"></div>
          <h2><span>skills</span>できること</h2>
          <div class="c-star -right"></div>
        </div>
      </div>

      <ul class="c-wrapper p-skills__list js-grid">
        <li class="p-skill">
          <div class="p-skill__icon">
            <div class="c-icon__html"><!-- "html5" --></div>
          </div>
          <section class="p-skill__desc">
            <h3>HTML</h3>
            <p>正しいHTMLマークアップと WAI-ARIA を活用し、アクセシブルなサイトの構築に努めています。</p>
          </section>
        </li>

        <li class="p-skill">
          <div class="p-skill__icon">
            <div class="c-icon__css"><!-- "css3-alt" --></div> 
            <div class="c-icon__sass"><!-- "sass-brands-solid" --></div>
          </div>
          <section class="p-skill__desc">
            <h3>CSS / Sass</h3>
            <p>CSS設計にはFLOCSSを取り入れ、保守性が高く、理解しやすいコードを心がけています。またアニメーションやレスポンシブデザインの実装についてはサイトのイメージやバランスを崩さないようこだわりを持って作っています。</p>
          </section>
        </li>

        <li class="p-skill">
          <div class="p-skill__icon">
            <div class="c-icon__js"><!-- "js" --></div>
            <div class="c-icon__jquery"></div>
          </div>
          <section class="p-skill__desc">
            <h3>JavaScript / jQuery</h3>
            <p>ハンバーガーメニューやパララックス効果、アコーディオンUIなどの実装経験があります。さらに、アクセシビリティの向上を図るため、キーボード操作対応の実装も可能です。</p>
          </section>
        </li>

        <li class="p-skill">
          <div class="p-skill__icon">
            <div class="c-icon__wp"><!-- "wordpress-brands-solid" --></div>
          </div>
          <section class="p-skill__desc">
            <h3>WordPress</h3>
            <p>オリジナルテーマの作成により、自由度の高いサイト制作を実現しています。クライアント様のニーズに応じて、どの程度カスタマイズが必要かを十分にヒアリングし、その要件に合わせたWordPressテーマの開発を心がけています。</p>
          </section>
        </li>

        <li class="p-skill">
          <div class="p-skill__icon">
            <div class="c-icon__git"><!-- "git-alt--brands-solid" --></div>
            <div class="c-icon__github -skill"><!-- "github-brands-solid" --></div>
          </div>
          <section class="p-skill__desc">
            <h3>Git / GitHub</h3>
            <p>GitHubを利用してソースコードのバージョン管理を行っており、チームでの開発経験もあります。</p>
          </section>
        </li>
      </ul>

      <!--"html5""css3-alt""sass-brands-solid""js""wordpress-brands-solid""git-alt--brands-solid""github-brands-solid"!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. Licensed under CC BY 4.0 - https://creativecommons.org/licenses/by/4.0/-->
    </section>

    <!-- WORKS SECTION -->
    <section id="works" class="c-section p-works js-works">
      <div class="p-secTitle js-target">
        <div class="c-number -sec04"></div>
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span>works</span>実績紹介</h2>
          <span class="c-star -right"></span>
        </div>
      </div>

      <div class="c-wrapper--works">
        <ul class="c-outline--works p-works__list">
          <li>
            <a href="achievement.html">
              <article class="p-workInfo">
                <h3>2024.7<br>prompt website</h3>
                <figure class="c-shadow">
                  <img src="images/works_prompt.png" alt="茶色の背景の落ち着いた雰囲気のwebサイト">
                </figure>
              </article>
            </a>
          </li>
          <li>
            <a href="#">
              <article class="p-workInfo">
                <h3>2024.7<br>prompt website</h3>
                <figure class="c-shadow">
                  <img src="images/works_prompt.png">
                </figure>
              </article>
            </a>
          </li>
          <li>
            <a href="#">
              <article class="p-workInfo">
                <h3>2024.7<br>prompt website</h3>
                <figure class="c-shadow">
                  <img src="images/works_prompt.png">
                </figure>
              </article>
            </a>
          </li>
          <li>
            <a href="#">
              <article class="p-workInfo">
                <h3>2024.7<br>prompt website</h3>
                <figure class="c-shadow">
                  <img src="images/works_prompt.png">
                </figure>
              </article>
            </a>
          </li>
        </ul>
      </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="c-section p-contactSec js-contact">
      <div class="p-secTitle js-target">
        <div class="c-number -go"></div>
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span>contact me</span>お問い合わせ</h2>
          <span class="c-star -right"></span>
        </div>
      </div>

      <div class="p-contactSec__desc">
        <p>ご検討いただきありがとうございます。<br>どんなことでもお気軽にご相談ください。</p>
        <a href="contact.html" class="c-button--link c-shadow js-btn">contact</a>
        <span class="c-alien--contact"></span>
      </div>

      <div class="p-ufo js-ufo">
        <div class="c-light"></div>
        <div class="c-ufo"></div>
      </div>
    </section>
  </main>

  <?php get_footer(); ?>