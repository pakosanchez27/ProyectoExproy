document.addEventListener("DOMContentLoaded", () => {
    const msj = document.querySelectorAll('.tarjetas');
  
    if (msj.length > 0) {
      setTimeout(() => {
        msj.forEach(element => {
          element.classList.add('fadeOut');
          setTimeout(() => {
            element.remove();
          }, 1000);
        });
      }, 2000);
    }
  });
  