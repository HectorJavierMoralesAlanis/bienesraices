<?php
include_once("../../PDO/DAO.php");

$id=$_GET['id'];
$dao=new DAO();
$consulta="SELECT * FROM Propiedad WHERE id=:id";
$parametros=array("id"=>$id);
$usuarios=$dao->ejecutarConsulta($consulta,$parametros);
$dao2=new DAO();
$consulta2="DELETE FROM Propiedad WHERE id=:idU";
$parametros2=array("idU"=>$id);

$resultados=$dao2->insertarConsulta($consulta2,$parametros2);

if($resultados>=0){
    foreach($usuarios as $id => $l){
    header("Location: http://143.198.163.107/bienesraices/admin/index2.php");
    }
}else{
    echo "error";
}

?>