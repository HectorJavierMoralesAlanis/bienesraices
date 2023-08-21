<?php 
// Importar la conexion
//Incluye el header
//require 'includes/app.php';
include './aux2.php';
$db = new DAO();
echo "djksfb";

// Crear un email y password
$email = "admin@gmail.com";
$password = "admin1234";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear el usuario
$consulta = "INSERT INTO usuarios (email, password) "."VALUES (':email', ':password)";

$parametros=array("email"=>"$email","password"=>"$passwordHash");

$dao->insertarConsulta($consulta,$parametros);
/*
echo "si";

// Agregarlo a la base de datos
//mysqli_query($db, $query);
*/

