let formTitle = document.querySelector('.title-aut')
let formButton = document.querySelector('.botao-enviar')
let form = document.querySelector('form')
let btnRev = document.querySelector('.btn-revert')
let btnLogin = document.querySelector('.btn-revert-2')
let msgAutent = document.querySelector('.autent-msg')
let onLogin = false


btnRev.addEventListener('click', ()=>{

    if(msgAutent)
    msgAutent.remove()

if(!onLogin){
    formTitle.innerHTML = 'Login Administrador'
    formButton.value = 'Login'
    form.action = 'form_login.php'
    onLogin = true
    btnRev.innerHTML = 'Não possui cadastro?'
}
 else{
        formTitle.innerHTML = 'Cadastrar Administrador'
        formButton.value = 'Cadastrar'
        form.action = 'cadastro.php'
        onLogin = false
        btnRev.innerHTML = 'Já possui cadastro?'
}})

btnLogin.addEventListener('click', ()=>{
    if(msgAutent)
    msgAutent.remove()
    
    formTitle.innerHTML = 'Login Administrador'
    formButton.value = 'Login'
    form.action = 'form_login.php'
    onLogin = true
    btnRev.innerHTML = 'Não possui cadastro?'
})