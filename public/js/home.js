  // Navbar scroll effect
//   const navbar = document.getElementById('navbar');
//   window.addEventListener('scroll', () => {
//     navbar.classList.toggle('scrolled', window.scrollY > 10);
//   });
 
  // Hamburger menu
//   const hamburger = document.getElementById('hamburger');
//   const mobileMenu = document.getElementById('mobile-menu');
//   hamburger.addEventListener('click', () => {
//     const isOpen = mobileMenu.classList.toggle('open');
//     hamburger.classList.toggle('open', isOpen);
//     hamburger.setAttribute('aria-expanded', isOpen);
//   });
//   mobileMenu.querySelectorAll('a').forEach(link => {
//     link.addEventListener('click', () => {
//       mobileMenu.classList.remove('open');
//       hamburger.classList.remove('open');
//       hamburger.setAttribute('aria-expanded', false);
//     });
//   });
 
  // Scroll-triggered animations
//   const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         entry.target.style.opacity = '1';
//         entry.target.style.transform = 'translateY(0)';
//       }
//     });
//   }, { threshold: 0.12 });
 
//   document.querySelectorAll('.feature-card, .step-card').forEach((el, i) => {
//     el.style.opacity = '0';
//     el.style.transform = 'translateY(28px)';
//     el.style.transition = `opacity 0.55s ease ${i * 0.08}s, transform 0.55s ease ${i * 0.08}s`;
//     observer.observe(el);
//   });
