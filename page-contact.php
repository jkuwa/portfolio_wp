<?php get_header(); ?>

  <main class="l-main">
    <section class="p-contact">
      <div class="p-secTitle js-target">
        <div class="p-secTitle__star">
          <span class="c-star -left"></span>
          <h2><span>contact</span>お問い合わせ</h2>
          <span class="c-star -right"></span>
        </div>
      </div>

      <p class="p-contact__text">どんなことでもお気軽に<br>ご相談、ご質問ください。</p>
      
      <div class="p-contact__body">
        <div class="c-alien03 -form"></div>
        <div class="c-wrapper p-contact__input">
          <div class="c-wrapper--contact">
            <p>下記の項目を入力いただき、お問い合わせください。<br><span>以下「任意」の項目以外はすべて必須項目です。</span></p>
  
            <form class="p-form">
              <ul>
                <li>
                  <label for="name">お名前</label>
                  <input id="name" type="text" name="name" placeholder="山田 太郎">
                </li>
                <li>
                  <label for="kana">お名前（カタカナ）<br><span>※任意</span></label>
                  <input id="kana" type="text" name="kana" placeholder="ヤマダ タロウ">
                </li>
                <li>
                  <label for="email">メールアドレス</label>
                  <input id="email" type="email" name="email" placeholder="example@example.com">
                </li>
                <li>
                  <label for="inquiry">ご相談内容</label>
                  <textarea id="inquiry" name="inquiry"></textarea>
                </li>
              </ul>
              <button class="c-button--link c-shadow js-btn">送信する</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php get_footer(); ?>