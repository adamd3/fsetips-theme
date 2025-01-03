import '../css/index.css';

// Mobile Navigation
document.addEventListener('DOMContentLoaded', function () {
  console.log('Mobile menu script loaded'); // Debugging
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const mobileNav = document.querySelector('.mobile-nav');
  const mobileNavTrigger = document.querySelector('.mobile-nav-trigger');

  if (mobileMenuToggle && mobileNav) {
    mobileMenuToggle.addEventListener('click', function () {
      console.log('Menu button clicked');
      mobileNav.classList.toggle('is-active');
      mobileNavTrigger.classList.toggle('is-active');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function (event) {
      const isClickInside =
        mobileNav.contains(event.target) ||
        mobileMenuToggle.contains(event.target);

      if (!isClickInside && mobileNav.classList.contains('is-active')) {
        mobileNav.classList.remove('is-active');
        mobileNavTrigger.classList.remove('is-active');
      }
    });

    // Close mobile menu on window resize if we hit desktop breakpoint
    window.addEventListener('resize', function () {
      if (
        window.innerWidth >= 768 &&
        mobileNav.classList.contains('is-active')
      ) {
        mobileNav.classList.remove('is-active');
        mobileNavTrigger.classList.remove('is-active');
      }
    });
  }
});
