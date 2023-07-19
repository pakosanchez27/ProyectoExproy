
    // Variables
    const OptionArea = document.querySelector('#area');
    const OptionPuesto = document.querySelector('#puesto');

   // Llenar Select áreas
fetch('../Json/puestos.json')
.then(Response => Response.json())
.then(data => {
  Object.keys(data).forEach(area => {
    const optionElement2 = document.createElement('option');
    optionElement2.textContent = area;
    optionElement2.value = area;
    OptionArea.appendChild(optionElement2);
  });

  area.addEventListener('change',(e)=>{
    const areaSelecionado = e.target.value;
    llenarPuesto(data, areaSelecionado);
  });

  console.log(data["Desarrollo de software y programación"]);
});

function llenarPuesto(data, areaSelecionado){
OptionPuesto.innerHTML = '';

Object.values(data[areaSelecionado]).forEach(puesto => {
  const optionElement2 = document.createElement('option');
  optionElement2.textContent = puesto;
  optionElement2.value = puesto;
  OptionPuesto.appendChild(optionElement2);
});
}