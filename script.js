function mensagem(){
    alert('Mensagem Enviada!')
   
}

function carrosel(){
    f1 = document.getElementById('primeiro')
    f2 = document.getElementById('segundo')
    f3 = document.getElementById('terceiro')

    if (window.innerWidth >= 992){
        f1.src = "imagens/carrosel/cesta.jpg"
    }
}