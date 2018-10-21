<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function index() {

	}
	
	function showColumns() {
		echo "<pre>";

		//Adicionar um if com o ambiente de desenvolvimento
		$this->load->database();
		
		$tables = $this->db->list_tables();
		
		
		foreach ($tables as $tabela) {
			echo $tabela;
			
			$fields = $this->db->list_fields($tabela);
			
			foreach ($fields as $field) {
				echo " ".$field;
			}
			echo ";\r\n";
		}
	}

}
?>