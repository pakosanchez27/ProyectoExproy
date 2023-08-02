describe("Prueba del formulario de empresa", () => {
    it("Rellenar el formulario y enviarlo", () => {
      cy.visit('http://localhost:3000/Empresa/principalEmpresa.php?id=2'); // Reemplaza la URL con la ruta correcta de tu formulario
      cy.get(".boton__verde").click();
      // Rellenar los campos del formulario
      cy.get("#nombreVacante").type("Diseñador Gráfico");
      cy.get("#salario").type("25000");
      cy.get("#estado").select("Ciudad de Mexico"); // Reemplaza con el valor adecuado
      cy.get("#ciudad").select("Benito Juarez"); // Reemplaza con el valor adecuado
      cy.get("#area").select("Desarrollo de software y programación"); // Reemplaza con el valor adecuado
      cy.get("#puesto").select("Desarrollador web"); // Reemplaza con el valor adecuado
      cy.get("#educacion").select("Bachillerato");
      cy.get("#tipoContrato").select("Permantente");
      cy.get("#horario").select("Tiempo completo");
      cy.get("#modoTrabajo").select("Presencia");
      cy.get("#vencimiento").type("2023-12-31");
      cy.get("#vacantesDisponibles").type("3");
      cy.get("#descripcion").type("Descripción de la vacante de Diseñador Gráfico");
  
      // Enviar el formulario
      cy.get(".boton__publicar").click();
  
      // Verificar que se haya enviado correctamente
      // Aquí puedes agregar más aserciones para verificar que el formulario fue enviado correctamente.
    });
  });
  