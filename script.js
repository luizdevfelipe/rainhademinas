function mostraMenu(){
    if (menu.style.display == 'block'){
        menu.style.display = 'none'
    } else {
        menu.style.display = 'block'
    }
}

function tamanho_tela(){
    if (window.innerWidth >= 992){
        menu.style.display = 'block'
    } else {
        menu.style.display = 'none'
    }
}

function mensagem(){
    alert('Mensagem Enviada!')
   
}