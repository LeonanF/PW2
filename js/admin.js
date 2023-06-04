let solicitacoes = document.querySelectorAll('.solicitacao');
let arrow = document.querySelector('.arrow');

solicitacoes.forEach(solicitacao => {
    solicitacao.addEventListener('click', () => {
        let camposSolicit = solicitacao.querySelector('.fieldsSolicit');
        let solicitStyle = window.getComputedStyle(camposSolicit).getPropertyValue('display');

        if (solicitStyle === 'none') {
            camposSolicit.style.display = 'flex';
            arrow.style.transform = 'rotate(180deg)'
        } else {
            camposSolicit.style.display = 'none';
            arrow.style.transform = 'rotate(0)'
        }
    });
});