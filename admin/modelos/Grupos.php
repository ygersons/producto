<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Grupos{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($nombre,$favorito,$idusuario){
	$sql="INSERT INTO team (nombre,favorito,idusuario) VALUES ('$nombre','$favorito','$idusuario')";
	return ejecutarConsulta($sql);
}

public function editar($idgrupo,$nombre,$favorito,$idusuario){
	$sql="UPDATE team SET nombre='$nombre',favorito='$favorito',idusuario='$idusuario'  
	WHERE idgrupo='$idgrupo'";
	return ejecutarConsulta($sql);
}

public function anular($idgrupo){
	$sql="UPDATE team SET estado='Anulado' WHERE idgrupo='$idgrupo'"; 
	return ejecutarConsulta($sql);
}


//implementar un metodopara mostrar los datos de unregistro a modificar
public function mostrar($idgrupo){
	$sql="SELECT * FROM team WHERE idgrupo='$idgrupo'";
	return ejecutarConsultaSimpleFila($sql);
}
public function mostrar_grupo($idgrupo){
	$sql="SELECT idgrupo,nombre,favorito, idusuario  FROM team WHERE idgrupo='$idgrupo'";
	return ejecutarConsulta($sql);
}

public function listarDetalle($idgrupo){
	$sql="SELECT dv.idgrupo,dv.idarticulo,a.nombre,dv.cantidad,dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal, g.total_venta, g.impuesto FROM detalle_venta dv INNER JOIN articulo a ON dv.idarticulo=a.idarticulo INNER JOIN team g ON g.idgrupo=dv.idgrupo WHERE dv.idgrupo='$idgrupo'"; 
	return ejecutarConsulta($sql);
}

//listar registros
public function listar(){
	$sql="SELECT g.idgrupo,g.nombre,u.idusuario,u.nombre as usuario FROM team g  INNER JOIN usuario u ON g.idusuario=u.idusuario ORDER BY g.idgrupo DESC";
	return ejecutarConsulta($sql);
}


public function ventacabecera($idgrupo){
	$sql= "SELECT g.idgrupo, g.idcliente, p.nombre AS cliente, p.direccion, p.tipo_documento, p.num_documento, p.email, p.telefono, g.idusuario, u.nombre AS usuario, g.tipo_comprobante, g.serie_comprobante, g.num_comprobante, DATE(g.fecha_hora) AS fecha, g.impuesto, g.total_venta FROM team g INNER JOIN persona p ON g.idcliente=p.idpersona INNER JOIN usuario u ON g.idusuario=u.idusuario WHERE g.idgrupo='$idgrupo'";
	return ejecutarConsulta($sql);
}











	

}

 ?>
