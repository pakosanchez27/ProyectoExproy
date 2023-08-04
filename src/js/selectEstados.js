// Variables
const OptionEstado = document.querySelector('#estado');
const ciudad = document.querySelector('#ciudad');

// Evento para cargar los estados y municipios
// Llenar el Select Estados
fetch('../../Json/estados.json')
  .then(Response => Response.json())
  .then(Data => {
    Object.keys(Data).forEach(estado => {
      const optionElement = document.createElement('option');
      optionElement.textContent = estado;
      optionElement.value = estado;
      OptionEstado.appendChild(optionElement);
    });

    OptionEstado.addEventListener('change', function (e) {
      ciudad.value = '';

      const EstadoSeleccionado = e.target.value;

      llenarMunicipios(Data, EstadoSeleccionado);
    });
  })
  .catch(error => {
    console.error("Error al cargar los datos", error);
  });

function llenarMunicipios(Data, EstadoSeleccionado) {
  Object.values(Data[EstadoSeleccionado]).forEach(municipio => {
    const optionElement2 = document.createElement('option');
    optionElement2.textContent = municipio;
    optionElement2.value = municipio;
    ciudad.appendChild(optionElement2);
  });
}