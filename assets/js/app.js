function toggleMenu() {
    var menuItens = document.getElementById("MenuItens");
    menuItens.classList.toggle("active");
}

document.addEventListener('DOMContentLoaded', function () {
  new Splide('#splide', {
      type     : 'loop',
      perPage  : 3,
      focus    : 'center',
      gap      : '1rem',
      autoplay : true,
      interval : 1700, // 1.7 segundos
      breakpoints: {
          800: {
              perPage: 1,
              gap   : '0.5rem',
          },
      },
  }).mount();
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      const offset = 32; // Ajuste o valor conforme necessário
      const bodyRect = document.body.getBoundingClientRect().top;
      const elementRect = target.getBoundingClientRect().top;
      const elementPosition = elementRect - bodyRect;
      const offsetPosition = elementPosition - offset;

      window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
      });
  });
});





  
