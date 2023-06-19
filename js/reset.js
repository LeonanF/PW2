const menuBtn = document.querySelector('.menu')
const menuClose = document.querySelector('.fechar-menu')
const nav = document.querySelector('nav')

menuBtn.addEventListener('click',()=>{
  nav.style.display = 'flex'
})

menuClose.addEventListener('click', ()=>{
  nav.style.display = 'none'
})
