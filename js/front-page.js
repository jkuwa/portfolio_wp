'use strict';

{
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