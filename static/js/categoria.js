/**
 * Esta función se activa al hacer clic en el botón con la clase "addCategoria".
 * Recoge los valores del formulario y los envía al servidor para su procesamiento.
 *
 * @param {object} e El evento de clic.
 */
$(".addCategoria").click(function (e) {
  /* Recoge los valores del formulario */
  let cat_nom = $(".cat_nom").val(); 
  let cat_obs = $(".cat_obs").val(); 

  /* Valida que los campos no estén vacíos */
  if (cat_nom !== "" && cat_obs !== "") {
    let datos = {
      cat_nom: cat_nom, 
      cat_obs: cat_obs, 
    };

    /* Realiza una solicitud AJAX al servidor para insertar la nueva categoría */
    $.ajax({
      url: "/controller/categoria.php?op=Insert", 
      type: "POST", 
      data: datos, 
      dataType: "json", 
    });

  } else {
    /* Muestra un error si algún campo está vacío */
    $(".respuesta").text('Se ha producido un error');
  }
});
