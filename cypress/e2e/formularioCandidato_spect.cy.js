describe('Prueba del formulario', () => {
    beforeEach(() => {
      cy.visit('http://localhost:3000/Candidato/candidatoForm.php?id=1') // Reemplaza '/ruta-del-formulario' con la URL real de tu formulario
    })
  
    it('Completa el formulario paso a paso', () => {
      // Vista 1
      cy.get('#nombre').type('John Doe')
      cy.get('#apellido').type('Smith')
      cy.get('#genero').select('Hombre')
      cy.get('#telefono').type('123456789')
      cy.get('#nacimiento').type('1990-01-01')
      cy.get('#postal').type('00000')
      cy.get('select[name="estado"]').select('Ciudad de Mexico');
      cy.get('select[name="ciudad"]').select('Benito Juarez');
      cy.get('#siguienteFinal').click() // Haz clic en el botón "Siguiente" de la vista 1 para pasar a la siguiente vista
  
      // Vista 2
      cy.get('#institucion').type('Universidad de ejemplo')
      cy.get('#fechaInicio').type('2010-01-01')
      cy.get('#fechaFin').type('2015-12-31')
    //   cy.get('#titulo').type('TSU: Desarrollo de Software')
      cy.get('#nivel__estudios').select('Educación Universitaria')
      cy.get('#skills').type('PHP, Java, Photoshop')
      cy.get('#idiomas').type('Inglés')
      cy.get('#nivel').select('Avanzado')
      cy.get('#siguienteFinal').click() // Haz clic en el botón "Siguiente" de la vista 2 para pasar a la siguiente vista
  
      // Vista 3
      cy.get('#empresa').type('Empresa de ejemplo')
    //   cy.get('#descripcion').type('Descripción de actividades de ejemplo')
      cy.get('#cargo').type('Cargo de ejemplo')
      cy.get('#duracion').select('3 a 5')
      cy.get('#siguienteFinal').click() // Haz clic en el botón "Siguiente" de la vista 3 para pasar a la siguiente vista
  
      // Vista 4
    //   cy.get('#fotoPerfil').attachFile('ruta-de-la-imagen') // Reemplaza 'ruta-de-la-imagen' con la ruta real de la imagen
    //   cy.get('#fotoPortada').attachFile('ruta-de-la-imagen') // Reemplaza 'ruta-de-la-imagen' con la ruta real de la imagen
      cy.get('#siguienteFinal').click() // Haz clic en el botón "Siguiente" de la vista 4 para pasar a la siguiente vista
  
      // Vista 5
      cy.get('#area').select('Seguridad informática')
      cy.get('#puesto').select('Ingeniero de seguridad')
      cy.get('#siguiente').click() // Haz clic en el botón "Siguiente" de la vista 5 para completar el formulario
  
      // A continuación, puedes agregar aserciones para verificar que se haya completado correctamente
      // Por ejemplo, podrías verificar que se haya mostrado un mensaje de éxito o redireccionamiento a una página de confirmación
      // También puedes verificar que los datos enviados coincidan con los valores ingresados en los campos del formulario
    })
  })
  