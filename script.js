let nav = document.querySelectorAll('.nav-link');
const collapse = document.getElementById('navbarSupportedContent');
let active = document.getElementsByClassName('active');

for (let i = 0; i < nav.length; i++) {
  nav[i].addEventListener('click', () => {
    collapse.classList.remove('show');
  });
}
