<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>API REST</title>
</head>
<body>
    <main>
        <section class="formularios">
            <form action="" method="POST" class="formCategoria">
                <h3>Crear categoría</h3>
                <input type="text" name="cat_nom" class="cat_nom" placeholder="Nombre">
                <textarea name="cat_obs" class="cat_obs" placeholder="Observaciones" rows="5" cols="20"></textarea>
                <input type="submit" value="Agregar categoría" class="addCategoria">
                        
            </form>
            <form action="#" method="POST" class="formProducto">
                <h3>Crear producto</h3>
                <input type="text" class="prod_nom" name="prod_nom" placeholder="Nombre">
                <select name="cat_id" class="cat_id">
                    <option value="">-- Seleccionar --</option>
                </select>
                <input type="submit" value="Agregar producto" class="addProduct">
                      
            </form>
            <section class="respuesta"></section>
        </section>
    </main>
    <script src="./static/js/index.js"></script>
    <script src="./static/js/producto.js"></script>
    <script src="./static/js/categoria.js"></script>
</body>
</html>

