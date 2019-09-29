<?php
include(dirname(__FILE__).'/../conexion.php'); 
class Sentencias{
	public static function insertar($sql){
		$rs = mysqli_query(Conectar::conexion(),$sql);
		if($rs){
			echo 'Insertado exitoso';
		}else{
			echo 'Imposible insertar';
		}
	}
	public static function eliminar($sql){
		$rs = mysqli_query(Conectar::conexion(),$sql);
		if($rs){
			echo 'Eliminado exitoso';
		}else{
			echo 'Imposible eliminar';
		}
	}
	public static function actualizar($sql){
		$rs = mysqli_query(Conectar::conexion(),$sql);
		if($rs){
			echo 'Actualizado exitoso';
		}else{
			echo 'Imposible actualizar';
		}	
	}
	public static function mostrar($sql){
		$rs = mysqli_query(Conectar::conexion(),$sql);
		return $rs;
	}
}