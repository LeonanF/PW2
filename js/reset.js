// Seleciona os elementos do DOM
const menuButton = document.querySelector('.menu');
const nav = document.querySelector('nav');
const closeMenuButton = document.querySelector('.fechar-menu');
const pageContent = document.querySelector('body');

// Função para abrir o menu
const openMenu = () => {
  nav.style.display = 'flex';
  pageContent.style.overflow = 'hidden';
  document.documentElement.style.overflow = 'hidden';
};

// Função para fechar o menu
const closeMenu = () => {
  nav.style.display = 'none';
  pageContent.style.overflow = 'hidden';
  document.documentElement.style.overflow = 'auto';
};

// Função para fechar o menu quando um link é clicado
const closeMenuOnLinkClick = () => {
  closeMenu();
};

// Adiciona os event listeners aos elementos
menuButton.addEventListener('click', openMenu);
closeMenuButton.addEventListener('click', closeMenu);

const menuLinks = document.querySelectorAll('nav ul li a');
menuLinks.forEach(link => {
  link.addEventListener('click', closeMenuOnLinkClick);
});

// Verifica o tamanho da tela ao carregar e redimensionar
const checkScreenSize = () => {
  if (window.innerWidth <= 650) {
    closeMenu();
    menuButton.style.display = 'flex';
  } else {
    nav.style.display = 'flex'
    menuButton.style.display = 'none';
    document.documentElement.style.overflow = 'auto';
  }
};

window.addEventListener('load', checkScreenSize);
window.addEventListener('resize', checkScreenSize);
