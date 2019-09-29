<?php
class Persistencia{
	public function __constructor($json){
		setcookie("response",$json) ;		
	}
}