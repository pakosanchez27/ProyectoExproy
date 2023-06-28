// variables

const perfilMobile = document.querySelector('#perfilMobile');
const perfilDesktop = document.querySelector('#perfilDesktop');
const perfilDesplegable__mobile = document.querySelector('#perfilDesplegable__mobile');
const perfilDesplegable__desktop = document.querySelector('#perfilDesplegable__desktop');
//eventos

document.addEventListener('DOMContentLoaded', () => {

    perfilMobile.addEventListener('click', mostrarDesplegable);
    perfilDesktop.addEventListener('click', mostrarDesplegableD);


});


function mostrarDesplegable(e){
    e.preventDefault();

    if (perfilDesplegable__mobile.classList.contains('ocultar')){
        perfilDesplegable__mobile.classList.remove('ocultar');
        perfilDesplegable__mobile.classList.add('mostrarMenu');
    }else{
        perfilDesplegable__mobile.classList.remove('mostrarMenu');
        perfilDesplegable__mobile.classList.add('ocultar');
    }

}
function mostrarDesplegableD(e){
    e.preventDefault();
    if (perfilDesplegable__desktop.classList.contains('ocultar')){
        perfilDesplegable__desktop.classList.remove('ocultar');
        perfilDesplegable__desktop.classList.add('mostrarMenu');
    }else{
        perfilDesplegable__desktop.classList.remove('mostrarMenu');
        perfilDesplegable__desktop.classList.add('ocultar');
    }
}