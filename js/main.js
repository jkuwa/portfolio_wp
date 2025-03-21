'use strict';

jQuery(function() {
  /* ---------- ハンバーガーメニュー ---------- */
  const menuBtn = jQuery(".js-hamburgerBtn");
  menuBtn.on('click', function() {
    jQuery(this).toggleClass('is-open');
    jQuery(".js-nav").toggleClass('is-open');
    jQuery("body").toggleClass('is-open');
    jQuery(".js-cover").toggleClass('is-open');

    if (jQuery(this).text() === 'メニューを開く') {
      jQuery(".js-menu").text('メニューを閉じる');
      menuBtn.attr('aria-expanded', 'true');
    } else {
      jQuery(".js-menu").text('メニューを開く');
      menuBtn.attr('aria-expanded', 'false');
    }
  });

  // 最後の項目の後ハンバーガーボタンに戻る
  jQuery(".js-focusTrap").on('focus', function() {
    if ( menuBtn.hasClass('is-open') ) {
    menuBtn.focus();
    }
  });

  const close = () => {
    menuBtn.removeClass('is-open').attr('aria-expanded', 'false');
    jQuery(".js-nav").removeClass('is-open');
    jQuery("body").removeClass('is-open');
    jQuery(".c-cover").removeClass('is-open');
    jQuery(".js-menu").text('メニューを開く');
  };
  
  // Escキーでメニュー閉じる
  jQuery(document).keydown( function(e) {
    if ( e.which === 27 && menuBtn.hasClass('is-open') ) {
      e.preventDefault();
      close();
    }
  });

  // メニューの外をクリックした時にも閉じる
  jQuery(".js-cover").on('click', function() {
    if ( menuBtn.hasClass('is-open') ) {
      close();
    }
  });
  
  // リサイズでメニュー閉じる
  jQuery(window).on('resize', function() {
    if ( menuBtn.hasClass('is-open') ) {
      close();
    }
  });
  
  // ページ内リンクでメニューを閉じる
  jQuery(".js-nav a").on('click', function() {
    if ( menuBtn.hasClass('is-open') ) {
      close();
    }
  });
});


{
  /* ---------- ホバーアニメーション ---------- */
  // テキストを生成
  const generateText = ( element, beforeClass, afterClass, wrapperClass) => {
    const text = element.innerHTML;
    const textBefore = `<span class="${beforeClass}">${text}</span>`;
    const textAfter = `<span class="${afterClass}">${text}</span>`;
    const newText = `<div class="${wrapperClass}">${textBefore}${textAfter}</div>`;
    element.innerHTML = newText;
  }

  // アニメーション
  const setupHoverAnimation = ( elements, options) => {
    elements.forEach( (el) => {
      const before = el.querySelector(".js-before");
      const after = el.querySelector(".js-after");

      const hover = () => {
        gsap.to( before, {
          yPercent: options.hover.yPercent,
          ease: 'bounce.out',
        });
        gsap.to( after, {
          yPercent: options.hover.yPercent,
          ease: 'bounce.out',
        });
        if (options.hover.backgroundColor) {
          gsap.to( el, {
            backgroundColor: options.hover.backgroundColor,
            duration: 0.3,
          });
        }
      }
      const leave = () => {
        gsap.to( before, {
          yPercent: 0,
          ease: 'bounce.out',
        });
        gsap.to( after, {
          yPercent: 0,
          ease: 'bounce.out',
        });
        if (options.leave) {
          gsap.to( el, {
            backgroundColor: options.leave.backgroundColor,
            duration: 0.3,
          });
        }
      };

      // matchMedia の指定があれば breakpoint 以上で実行
      if (options.matchMedia) {
        const mm = gsap.matchMedia();
        mm.add( options.matchMedia, () => {
          el.addEventListener('mouseenter', hover);
          el.addEventListener('mouseleave', leave);
    
          return() => {
            el.removeEventListener('mouseenter', hover);
            el.removeEventListener('mouseleave', leave);
          };
        });
      } else {
        // タッチデバイスを検出
        const isTouchDevice = () => {
          return "ontouchstart" in window || navigator.maxTouchPoints > 0;
        };
        if ( isTouchDevice() ) {
          el.addEventListener('touchstart', hover);
          el.addEventListener('touchend', () => {
            setTimeout(leave, 600);
          });
        } else {
          el.addEventListener('mouseenter', hover);
          el.addEventListener('mouseleave', leave);
          el.addEventListener('click', () => {
            setTimeout(leave, 600);
          });
        }
      }
    });
  };

  // ナビリンク
  const links = document.querySelectorAll(".p-nav__list li a");
  links.forEach((link) => {
    generateText( link, "p-navLink__before js-before", "p-navLink__after js-after", "p-navLink");
  });
  setupHoverAnimation( links, {
    hover: { yPercent: -100 },
    matchMedia: '(min-width: 768px)',
  });

  // ボタン
  const buttons = document.querySelectorAll(".js-btn");
  buttons.forEach( (btn) => {
    generateText( btn, "p-btn__before js-before", "p-btn__after js-after", "p-btn");
  });
  setupHoverAnimation( buttons, {
    hover: { yPercent: -170, backgroundColor: "#fff" },
    leave: { backgroundColor: "#000" },
  });
  

  /* ---------- セクションタイトル アニメーション ---------- */
  const targets = document.querySelectorAll(".js-target");

  // スクロールイベント
  targets.forEach((target) => {
    ScrollTrigger.create({
      trigger: target,
      start: "top 90%",
      toggleClass: {
        targets: target,
        className: "is-animated",
      },
      once: true,
    });
  });
}