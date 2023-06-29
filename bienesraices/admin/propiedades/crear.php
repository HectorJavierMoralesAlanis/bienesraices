<?php
    // Base de datos
    include ('./../../aux2.php');
    $dao2 = new DAO();
    $consulta2 = "SELECT * FROM vendedores";
    $user_access = $dao2->ejecutarConsulta($consulta2);

    if (isset($_POST['titulo'], $_POST['precio'], $_POST['imagen'], $_POST['descripcion'], $_POST['habitaciones'], $_POST['wc'], $_POST['estacionamiento'], $_POST['vendedor'])) {
        $dao = new DAO();
        $fecha = date('Y-m-d H:i:s');
        $consulta = "INSERT INTO Propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) " .
            "VALUES (:titulo, :precio, :imagen, :descripcion, :habitaciones, :wc, :estacionamiento, :fecha, :id_vendedores)";

        $parametros = array(
            "titulo" => $_POST['titulo'],
            "precio" => $_POST['precio'],
            "imagen" => addslashes(file_get_contents($_FILES['imagen']['tmp_name'])),
            "descripcion" => $_POST['descripcion'],
            "habitaciones" => $_POST['habitaciones'],
            "wc" => $_POST['wc'],
            "estacionamiento" => $_POST['estacionamiento'],
            "fecha" => $fecha,
            "id_vendedores" => $_POST['vendedor'],
        );

        $resultados = $dao->insertarConsulta($consulta, $parametros);

        if ($resultados >= 0) {
            header("Location: ../../admin/index.php");
            exit();
        } else {
            echo "error";
        }
    }

    require '../../includes/funciones.php';
    incluirTemplates('header');
?>