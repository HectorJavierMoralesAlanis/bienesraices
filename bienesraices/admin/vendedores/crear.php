<?php
    //Base de datos

    require '../../includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Crear Vendedor</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <form class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="nombre">Nombre del vendedor:</label>
                <input type="text" id="nombre" placeholder="Nombre">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" placeholder="Apellido">

                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" placeholder="Telefono">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion"></textarea>
            </fieldset>
            <input type="sumbit" value="Crear Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>