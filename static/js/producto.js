/**
 * Esta función se activa al hacer clic en el botón con la clase "addProduct".
 * Recoge los valores del formulario y los envía al servidor para su procesamiento.
 *
 * @param {object} e El evento de clic.
 */
$(".addProduct").click(function (e) {
  /* Recoge los valores del formulario */
  let prod_nom = $(".prod_nom").val(); 
  let cat_id = $(".cat_id").val(); 

  /* Valida que los campos no estén vacíos */
  if (prod_nom !== "" && cat_id !== "") {
      let datos = {
          prod_nom: prod_nom, 
          cat_id: cat_id, 
      };

      /* Realiza una solicitud AJAX al servidor para insertar el nuevo producto*/
      $.ajax({
          url: "/controller/producto.php?op=Insert", 
          type: "POST", 
          data: datos, 
          dataType: "json", 
      });

  } else {
      /* Muestra un error si algún campo está vacío */
      $(".respuesta").text('Se ha producido un error');
  }
});
