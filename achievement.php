<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/ress.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
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

  <main class="l-main">
    <div class="c-wrapper--achievement">
      
      <!-- ACHIEVEMENT DETAIL -->
      <section class="p-achievement">
        <h1>prompt website</h1>
        <div class="p-achievement__head">
          <dl>
            <div>
              <dt>launch date：</dt>
              <dd>2024.07</dd>
            </div>
            <div>
              <dt>URL：</dt>
              <dd><a href="prompt-improve.com" aria-label="プロンプのwebサイト">prompt-improve.com</a></dd>
            </div>
          </dl>
          <figure>
            <img src="images/archive_prompt.png" alt="プロンプのwebサイト">
          </figure>
        </div>

        <div class="p-achievement__body">
          <div class="p-achievement__body--data">
            <section class="p-detail -credits">
              <h2>credits</h2>
              <dl>
                <div>
                  <dt>direction/coding：</dt>
                  <dd>町野 浩太</dd>
                </div>
                <div>
                  <dt>webdesign：</dt>
                  <dd>なえ</dd>
                </div>
                <div>
                  <dt>coding/WordPress：</dt>
                  <dd>くわ じゅんな</dd>
                </div>
              </dl>
            </section>

            <div>
              <section class="p-detail">
                <h2>制作期間</h2>
                <dl>
                  <div>
                    <dt>コーディング：</dt>
                    <dd>1ヶ月半</dd>
                  </div>
                  <div>
                    <dt>WordPress：</dt>
                    <dd>2週間</dd>
                  </div>
                </dl>
              </section>

              <section class="p-detail">
                <h2>使用ツール</h2>
                <ul>
                  <li>Visual Studio Code</li>
                  <li>Figma</li>
                  <li>WordPress</li>
                  <li>FileZilla</li>
                  <li>GitHub</li>
                </ul>
              </section>

              <section class="p-detail">
                <h2>使用言語</h2>
                <ul>
                  <li>HTML</li>
                  <li>CSS</li>
                  <li>SCSS</li>
                  <li>JavaScript</li>
                  <li>PHP</li>
                </ul>
              </section>
            </div>
          </div>

          <div class="p-achievement__body--text">
            <p>プロンプ様のwebサイト制作のメインコーダーを担当させていただきました。一部のページを除いたコーディングとWordPress化を行いました。</p>
            <p>コーディングではPCのファーストビューに配置された画像がどの画面幅でも美しく表示されるよう、レスポンシブの実装に特に力を入れました。</p>
            <p>WordPress の実装では、プラグインを活用してカスタム投稿、カスタムフィールド、コンタクトフォームを組み込んでいます。導入実績ページについては、同じ構図で作成したいとのご要望に応じて、記事を作成できるように対応しました。</p>
          </div>

          <a href="#" class="c-button--link c-shadow p-achievement__body--btn js-btn">visit site</a>
        </div>
      </section>
    </div>

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
          <li>
            <a href="#" aria-labelledby="title01">
              <article class="p-workInfo">
                <h3 id="title01">2024.7<br>prompt website</h3>
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
                  <img src="images/works_prompt.png" alt="茶色の背景の落ち着いた雰囲気のwebサイト">
                </figure>
              </article>
            </a>
          </li>
          <li>
            <a href="#">
              <article class="p-workInfo">
                <h3>2024.7<br>prompt hamburger shop website</h3>
                <figure class="c-shadow">
                  <img src="images/works_prompt.png" alt="茶色の背景の落ち着いた雰囲気のwebサイト">
                </figure>
              </article>
            </a>
          </li>
          <li>
            <a href="#">
              <article class="p-workInfo">
                <h3>2024.7<br>prompt hamburger shop website</h3>
                <figure class="c-shadow">
                  <img src="images/works_prompt.png" alt="茶色の背景の落ち着いた雰囲気のwebサイト">
                </figure>
              </article>
            </a>
          </li>
        </ul>
  
        <div class="p-archive__man js-target">
          <span class="c-checkman__arm"></span>
          <span class="c-checkman"></span>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="l-footer p-footer">
    <ul class="c-outline--list p-footer_sns">
      <li><a href="#" class="c-icon__x -footer">X</a></li>
      <li><a href="#" class="c-icon__github -footer">GitHub</a></li>
    </ul>
    <small>Copyright &copy; kuwa junna All Rights Reserved.</small>
  </footer>
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- GSAP -->
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  <!-- magic grid -->
  <!-- 
    Copyright (c) 2018 Emmanuel Olaojo
    Licensed under the MIT license. 
    https://github.com/e-oj/Magic-Grid/blob/master/LICENSE
  -->
  <script src="https://unpkg.com/magic-grid/dist/magic-grid.min.js"></script>

  <script src="js/main.js"></script>
</body>
</html>