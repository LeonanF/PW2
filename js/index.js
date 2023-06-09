// Declaração das variáveis
let slider = document.querySelector('.slider')
let setaEsquerda = document.querySelector('.seta-esquerda i')
let setaDireita = document.querySelector('.seta-direita i')
const botoes = document.querySelectorAll('.botao-slide');

let moveSlider = 0

// Cores padrão dos elementos do slider
setaEsquerda.style.color = '#ccc'
botoes[0].style.backgroundColor = '#fff'

// Muda a cor dos botões do slider
function ativaBotao(valor) {
    for(let i = 0; i < botoes.length; i++) {
        if(i == (Math.abs(valor)/100)) {
            botoes[i].style.backgroundColor = '#fff';
        } else {
            botoes[i].style.backgroundColor = '#fff0';
        }
    }
}

// Funções para mudar os slides
setaEsquerda.addEventListener('click', ()=> {
    if(moveSlider < 0) {
        moveSlider += 100;
        slider.style.marginLeft = moveSlider + 'vw'
        setaDireita.style.color = '#000'
    }

    if(moveSlider == 0) {
        setaEsquerda.style.color = '#ccc'
    }

    ativaBotao(moveSlider)
})

setaDireita.addEventListener('click', ()=> {
    if(moveSlider > -200) {
        moveSlider -= 100;
        slider.style.marginLeft = moveSlider + 'vw'
        setaEsquerda.style.color = '#000'
    } 

    if(moveSlider == -200) {
        setaDireita.style.color = '#ccc'
    }

    ativaBotao(moveSlider)
})

