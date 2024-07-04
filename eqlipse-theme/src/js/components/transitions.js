import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
gsap.registerPlugin(ScrollTrigger);
import Splitting from "splitting";

Splitting();
const fx1Titles = [...document.querySelectorAll('.content__title[data-splitting][data-effect1]')];
const fx2Titles = [...document.querySelectorAll('.content__title[data-splitting][data-effect2]')];
const fx3Images = [...document.querySelectorAll('.image-grid-image:first-of-type')];
const fx4Images = [...document.querySelectorAll('.image-grid-image:last-of-type')];

// Preload images
const preloadFonts = (id) => {
  return new Promise((resolve) => {
    WebFont.load({
      typekit: {
        id: id
      },
      active: resolve
    });
  });
};

export {
  preloadFonts
};
const screenWidth = window.innerWidth;

const scroll = () => {

  fx1Titles.forEach(title => {

    gsap.fromTo(title.querySelectorAll('.char'), {
      'will-change': 'opacity',
      opacity: 0.1
    },
      {
        ease: 'none',
        opacity: 1,
        stagger: 0.1,
        scrollTrigger: {
          trigger: title,
          start: 'top bottom-=10%',
          end: 'center top+=80%',
          scrub: true,
        }
      });
  });

  fx2Titles.forEach(title => {

    gsap.fromTo(title.querySelectorAll('.word'), {
      'will-change': 'opacity',
      opacity: 0.1
    },
      {
        ease: 'none',
        opacity: 1,
        stagger: 0.1,
        scrollTrigger: {
          trigger: title,
          start: 'top bottom-=10%',
          end: 'center top+=70%',
          scrub: true,
        }
      });
  });

  fx3Images.forEach(image => {
    if (screenWidth >= 992) {
      gsap.fromTo(image, {
        translateY: -100
      },
      {
        ease: 'none',
        translateY: 100,
        stagger: 0.1,
        scrollTrigger: {
          trigger: image,
          start: 'top bottom-=60%',
          end: 'center top+=40%',
          scrub: true,
        }
      });
    }
  });

  fx4Images.forEach(image => {
    let startValue, endValue;

    // Set values based on screen width
    if (screenWidth <= 480) { // Phones
      startValue = 'top bottom-=30%';
      endValue = 'center top-=0%';
    } else if (screenWidth <= 768) { // Tablets
      startValue = 'top bottom-=50%';
      endValue = 'center top+=30%';
    } else { // Large screens
      startValue = 'top bottom-=60%';
      endValue = 'center top-=150%';
    }
    if (screenWidth < 992) {
      gsap.fromTo(image, {
        translateX: 0
      },
      {
        ease: 'none',
        translateX: screenWidth * 1.5,
        stagger: 0.1,
        scrollTrigger: {
          trigger: image,
          start: startValue,
          end: endValue,
          scrub: true,
        }
      });
    } else {
      gsap.fromTo(image, {
        translateY: 300
      },
      {
        ease: 'none',
        translateY: -450,
        stagger: 0.1,
        scrollTrigger: {
          trigger: image,
          start: startValue,
          end: endValue,
          scrub: true,
        }
      });
    }
  });
}
scroll();
