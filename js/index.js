let slider = document.querySelector('.slider')
let setaEsquerda = document.querySelector('.seta-esquerda i')
let setaDireita= document.querySelector('.seta-direita i')

let moveSlider = 0

setaEsquerda.addEventListener('click', ()=> {
    moveSlider += 100;
    slider.style.marginLeft = moveSlider + 'vw'
})

setaDireita.addEventListener('click', ()=> {
    moveSlider -= 100;
    slider.style.marginLeft = moveSlider + 'vw'
})