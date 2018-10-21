<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RepEmpresaaero extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('empresaaero/empresaaerodto');
	}

	public function __destruct() {
	}

	public function getAll($limit = null, $offset = null, $where = null, $like = null, $order_by = null, $group_by = null, $selectColumns = null) {
		$arrEmpresaaero = array();
		if ($limit != null) {
			$this->db->limit($limit, $offset);
		}
		if ($where != null) {
			foreach($where as $key => $value) {
				if(is_array($value)) {
					$this->db->where_in($key,$value);
				} else {
					$this->db->where($key,$value);
				}
			}
		}
		if ($like != null) {
			$this->db->like($like);
		}
		if ($order_by != null) {
			if(is_array($order_by)) {
				foreach($order_by as $key => $value) {
					$this->db->order_by($key, $value);
				}
			} else {
				$this->db->order_by($order_by);
			}
		}
		if ($group_by != null) {
			if(is_array($group_by)) {
				foreach($group_by as $key => $value) {
					$this->db->group_by($value);
				}
			} else {
				$this->db->group_by($group_by);
			}
		if($selectColumns != null) {
			$this->db->select($selectColumns);
		}
		}
		$query = $this->db->get ('empresaaero');
		foreach($query->result_array() as $row ) {
			array_walk($row, 'decDb');
			$arrEmpresaaero[] = new EmpresaaeroDto(
				@$row['idempresa'],
				@$row['cnpj'],
				@$row['nomeempresa'],
				@$row['endoperacional'],
				@$row['cidade'],
				@$row['bairro'],
				@$row['taxiaereo'],
				@$row['chetanumero'],
				@$row['oficinamnt'],
				@$row['chenumero'],
				@$row['ddd'],
				@$row['telefone'],
				@$row['telefone1'],
				@$row['razaosocial'],
				@$row['responsavelnome'],
				@$row['observacoes']
			);
		}
		$query->free_result();
		return $arrEmpresaaero;
	}

	public function getWhere($where = null, $limit = null, $offset = null) {
		return $this->getAll($limit, $offset, $where);
	}

	public function getLike($like = null, $limit = null, $offset = null) {
		return $this->getAll($limit, $offset, null, $like);
	}

	public function getId($id = null) {
		$arrObj = $this->getAll(1, null, array('idempresa' => $id));
		if(isset($arrObj[0])) {
			return $arrObj[0];
		} else {
			return false;
		}
	}

	public function salvar(EmpresaaeroDto $obj) {
		$arrDados = array(
			'cnpj' => $obj->getCnpj(),
			'nomeempresa' => $obj->getNomeempresa(),
			'endoperacional' => $obj->getEndoperacional(),
			'cidade' => $obj->getCidade(),
			'bairro' => $obj->getBairro(),
			'taxiaereo' => $obj->getTaxiaereo(),
			'chetanumero' => $obj->getChetanumero(),
			'oficinamnt' => $obj->getOficinamnt(),
			'chenumero' => $obj->getChenumero(),
			'ddd' => $obj->getDdd(),
			'telefone' => $obj->getTelefone(),
			'telefone1' => $obj->getTelefone1(),
			'razaosocial' => $obj->getRazaosocial(),
			'responsavelnome' => $obj->getResponsavelnome(),
			'observacoes' => $obj->getObservacoes()
		);
		array_walk_ci($arrDados);
		if ($obj->getIdempresa() === NULL) { 
			$ret = $this->db->insert('empresaaero', $arrDados);
			$obj->setIdempresa($this->db->insert_id());
			return $obj;
		} else {
			$ret = $this->db->update('empresaaero', $arrDados, array('idempresa' => $obj->getIdempresa()));
		}
		if ($ret == true) {		 
			return true;
		}
	}

	public function excluir(EmpresaaeroDto $obj) {
		$retUpd = $this->db->delete('empresaaero',array('idempresa' => $obj->getIdempresa()));
		if ($retUpd == true) {
			return true;
		}
	}

}
?>