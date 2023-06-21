// Variables
const campoSkills = document.querySelector('#skills');

//eventos
eventListeners();
function eventListeners() {
    campoSkills.addEventListener('input', saberValor);

}
//funciones
function saberValor(e){
    console.log(e.target.value);
    const valor = e.target.value;
    extraerValor(valor)
}

function extraerValor(valor){
    valor = 'hola';
}