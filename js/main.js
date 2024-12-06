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
  // ナビリンク
  const links = document.querySelectorAll(".p-nav__list li a");

  // テキストを生成
  links.forEach((link) => {
    const text = link.innerHTML;
    const textBefore = '<span class="p-navLink__before js-before">' + text + '</span>';
    const textAfter = '<span class="p-navLink__after js-after">' + text + '</span>';
    const newText = '<div class=p-navLink>' + textBefore + textAfter + '</div>';
    link.innerHTML = newText;
  });

  // アニメーション
  links.forEach((link) => {
    let mm = gsap.matchMedia();
    const before = link.querySelector(".js-before");
    const after = link.querySelector(".js-after");

    const hover = () => {
      gsap.to( before, {
        yPercent: -100,
        ease: 'bounce.out',
      });
      gsap.to( after, {
        yPercent: -100,
        ease: 'bounce.out',
      });
    };
    const leave = () => {
      gsap.to( before, {
        yPercent: 0,
        ease: 'bounce.out',
      });
      gsap.to( after, {
        yPercent: 0,
        ease: 'bounce.out',
      });
    };

    // breakpoint 以上で実行
    mm.add('(min-width: 768px)', () => {
      link.addEventListener('mouseenter', hover);
      link.addEventListener('mouseleave', leave);

      return() => {
        link.removeEventListener('mouseenter', hover);
        link.removeEventListener('mouseleave', leave);
      }
    });
  });


  // ボタン
  const btns = document.querySelectorAll(".js-btn");

  // テキストを生成
  btns.forEach((btn) => {
    const text = btn.innerHTML;
    const textBefore = '<span class="p-btn__before js-before">' + text + '</span>';
    const textAfter = '<span class="p-btn__after js-after">' + text + '</span>';
    const newText = '<div class=p-btn>' + textBefore + textAfter + '</div>';
    btn.innerHTML = newText;
  });

  btns.forEach((btn) => {
    const before = btn.querySelector(".js-before");
    const after = btn.querySelector(".js-after");

    const hover = () => {
      gsap.to( btn, {
        backgroundColor: "#fff",
        duration: 0.3,
      });
      gsap.to( before, {
        yPercent: -170,
        ease: "bounce.out",
        duration: 0.4,
      });
      gsap.to( after, {
        yPercent: -170,
        ease: "bounce.out",
        duration: 0.4,
      });
    };
    const leave = () => {
      gsap.to( btn, {
        backgroundColor: "#000",
        duration: 0.3,
      });
      gsap.to( before, {
        yPercent: 0,
        ease: 'bounce.out',
        duration: 0.4,
      });
      gsap.to( after, {
        yPercent: 0,
        ease: 'bounce.out',
        duration: 0.4,
      });
    };

    // タッチデバイスを検出
    const isTouchDevice = () => {
      return "ontouchstart" in window || navigator.maxTouchPoints > 0;
    };

    if ( isTouchDevice() ) {
      btn.addEventListener('touchstart', hover);
      btn.addEventListener('touchend', () => {
        setTimeout(leave, 600);
      });
    } else {
      btn.addEventListener('mouseenter', hover);
      btn.addEventListener('mouseleave', leave);
    }
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

    tl.to( ufo, {
      left: '-20%',
    })
      .to( ufo, {
        scaleX: -1,
      })
      .to( ufo, {
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
      .to( ufo, {
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