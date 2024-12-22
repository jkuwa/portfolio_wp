'use strict';

jQuery(function() {
  /* ---------- ハンバーガーメニュー ---------- */
  jQuery(".js-hamburgerBtn").on('click', function() {
    jQuery(this).toggleClass('is-open');
    jQuery(".js-nav").toggleClass('is-open');
    jQuery("body").toggleClass('is-open');
    jQuery(".js-cover").toggleClass('is-open');

    if (jQuery(this).text() === 'メニューを開く') {
      jQuery(".js-menu").text('メニューを閉じる');
      jQuery(".js-hamburgerBtn").attr('aria-expanded', 'true');
    } else {
      jQuery(".js-menu").text('メニューを開く');
      jQuery(".js-hamburgerBtn").attr('aria-expanded', 'false');
    }
  });

  // 最後の項目の後ハンバーガーボタンに戻る
  jQuery(".js-focusTrap").on('focus', function() {
    if ( jQuery(".js-hamburgerBtn").hasClass('is-open') ) {
    jQuery(".js-hamburgerBtn").focus();
    }
  });

  const close = () => {
    jQuery(".js-hamburgerBtn").removeClass('is-open').attr('aria-expanded', 'false');
    jQuery(".js-nav").removeClass('is-open');
    jQuery("body").removeClass('is-open');
    jQuery(".c-cover").removeClass('is-open');
    jQuery(".js-menu").text('メニューを開く');
  };
  
  // Escキーでメニュー閉じる
  jQuery(document).keydown( function(e) {
    if ( e.which === 27 && jQuery(".js-hamburgerBtn").hasClass('is-open') ) {
      e.preventDefault();
      close();
    }
  });

  // メニューの外をクリックした時にも閉じる
  jQuery(".js-cover").on('click', function() {
    if ( jQuery(".js-hamburgerBtn").hasClass('is-open') ) {
      close();
    }
  });
  
  // リサイズでメニュー閉じる
  jQuery(window).on('resize', function() {
    if ( jQuery(".js-hamburgerBtn").hasClass('is-open') ) {
      close();
    }
  });
  
  // ページ内リンクでメニューを閉じる
  jQuery(".js-nav a").on('click', function() {
    if ( jQuery(".js-hamburgerBtn").hasClass('is-open') ) {
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
        if (options.leave.backgroundColor) {
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


  /* ---------- ファーストビューアニメーション ---------- */
  const initScrollTriggerFirstView = () => {
    const tl = gsap.timeline();
    tl.to(".js-boy", {
      x: 0,
      duration: 2,
      ease: 'steps(4)',
    })
      .to(".js-title", {
      scale: 1,
      duration: 1.5,
      ease: 'elastic.out',
      })
      .to(".js-space", {
        scale: 1,
        duration: 1.5,
        ease: 'elastic.out',
      }, '<')
      .to(".js-planet", {
        scale: 1,
        duration: 1.5,
        ease: 'elastic.out',
      }, '<0.1')
      .to(".js-number", {
        opacity: 1,
        duration: 0.3,
        ease: 'none',
      }, '<0.2')
      .to(".js-number", {
        yPercent: 20,
        duration: 0.6,
        ease: 'bounce.out',
      }, '<');
  }


  /* ---------- UFOスクロールアニメーション ---------- */
  gsap.registerPlugin(ScrollTrigger);
  const ufo = document.querySelector(".js-ufo");

  // skills section
  const initScrollTriggerSkills = () => {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".js-skills",
        start: 'top 20%',
        end: 'bottom 20%',
        scrub: 1,
      }
    });

    tl.fromTo( ufo, {
      left: '100%',
    }, {
      left: '-20%',
    })
      .to( ufo, {
        scaleX: -1,
      })
      .fromTo( ufo, {
        left: '-20%',
      }, {
        left: '100%',
      })
      .to( ufo, {
        scaleX: 1,
      });
  }

  // works section
  const initScrollTriggerWorks = () => {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".js-works",
        start: 'top 20%',
        end: 'top top',
        scrub: 1,
      }
    });

    tl.add(() => {
      ufo.classList.add('is-animated');
    })
      .fromTo( ufo, {
        left: '100%',
        rotation: 0,
      }, {
        left: '80%',
        rotation: 20,
      });
  }

  // contact section
  const initScrollTriggerContact = () => {
    gsap.to( ufo, {
      position: 'absolute',
      scrollTrigger: {
        trigger: ".js-contact",
        start: 'top top',
        endTrigger: ".js-footer",
        end: 'bottom bottom',
        scrub: true,
      }
    });
  }


  /* ---------- skills section グリッドレイアウト ---------- */
  const magicGrid = new MagicGrid({
    container: ".js-grid",
    static: true,
    gutter: 35,
  });


  /* ---------- フロントページのみ実施 ---------- */
  if (this.location.pathname === '/') {
    // ファーストビューアニメーション
    initScrollTriggerFirstView();

    // UFOアニメーション
    initScrollTriggerSkills();
    initScrollTriggerWorks();
    initScrollTriggerContact();

    // skillsセクション
    magicGrid.listen();
  }
}