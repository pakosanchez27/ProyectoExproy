describe('Formulario de registro de empresa', () => {
  beforeEach(() => {
    cy.visit('http://192.168.100.5:5501/Empresa/formEmpresa.html');
  });

  it('Llena y envía el formulario', () => {
    // Llena los campos de la sección "Datos de la empresa"
    cy.get('.registroEmpresa__formulario')
      .find('.empresa')
      .within(() => {
        cy.get('input[name="empresa"]').type('Nombre de la Empresa');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.descripcion')
      .within(() => {
        cy.get('textarea[name="descripcion"]').type('Descripción de la empresa');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.url')
      .within(() => {
        cy.get('input[name="url"]').type('www.empresa.com');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.direccion')
      .within(() => {
        cy.get('input[name="direccion"]').type('Calle y número');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.estado')
      .within(() => {
        cy.get('select[name="estado"]').select('Ciudad de Mexico');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.postal')
      .within(() => {
        cy.get('input[name="postal"]').type('123456');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.ciudad')
      .within(() => {
        cy.get('select[name="ciudad"]').select('Benito Juarez');
      });

    // Llena los campos de la sección "Datos del reclutador"
    cy.get('.registroEmpresa__formulario')
      .find('.nombre')
      .within(() => {
        cy.get('input[name="nombre"]').type('Tu Nombre');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.apellido')
      .within(() => {
        cy.get('input[name="apellido"]').type('Tus Apellidos');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.genero')
      .within(() => {
        cy.get('select[name="genero"]').select('Hombre');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.telefono')
      .within(() => {
        cy.get('input[name="telefono"]').type('1234567890');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.fechaNacimiento')
      .within(() => {
        cy.get('input[name="nacimiento"]').type('2000-01-01');
      });

    cy.get('.registroEmpresa__formulario')
      .find('.cargo')
      .within(() => {
        cy.get('input[name="cargo"]').type('Cargo en la empresa');
      });

    // Envía el formulario
    cy.get('.registroEmpresa__formulario').submit();
  });
});