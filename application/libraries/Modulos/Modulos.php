<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulos {
		
		private $CI;
		
		public function __construct(){
			$this->CI =& get_instance();
        }

		private function getSQL($nombre_modulo){
			$id_laboratorio = $this->getIdLaboratorio();

			$sql = "SELECT 
							ml.enabled 
					FROM 
							modulos m
					INNER JOIN modulos_laboratorio ml on m.id = ml.id_modulo
					WHERE 
							m.nombre = '$nombre_modulo'";
					/*
					AND
							ml.id_laboratorio = $id_laboratorio";
					*/                        
			return $sql;
		}

		private function getIdLaboratorio(){
			//TODO-LIMON: Obtener el id del laboratorio;
			return;
		}

		public function check($nombre_modulo){
			$result = $this->CI->db->query($this->getSQL($nombre_modulo))->row();
			if( empty($result) || ! isset($result->enabled)){
				return false;
			}
			return $result->enabled;
        }
}