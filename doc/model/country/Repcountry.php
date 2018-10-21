<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RepCountry extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('country/countrydto');
	}

	public function __destruct() {
	}

	public function getAll($limit = null, $offset = null, $where = null, $like = null, $order_by = null, $group_by = null, $selectColumns = null) {
		$arrCountry = array();
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
		$query = $this->db->get ('country');
		foreach($query->result_array() as $row ) {
			array_walk($row, 'decDb');
			$arrCountry[] = new CountryDto(
				@$row['id'],
				@$row['name'],
				@$row['status']
			);
		}
		$query->free_result();
		return $arrCountry;
	}

	public function getWhere($where = null, $limit = null, $offset = null) {
		return $this->getAll($limit, $offset, $where);
	}

	public function getLike($like = null, $limit = null, $offset = null) {
		return $this->getAll($limit, $offset, null, $like);
	}

	public function getId($id = null) {
		$arrObj = $this->getAll(1, null, array('id' => $id));
		if(isset($arrObj[0])) {
			return $arrObj[0];
		} else {
			return false;
		}
	}

	public function salvar(CountryDto $obj) {
		$arrDados = array(
			'name' => $obj->getName(),
			'status' => $obj->getStatus()
		);
		array_walk_ci($arrDados);
		if ($obj->getId() === NULL) { 
			$ret = $this->db->insert('country', $arrDados);
			$obj->setId($this->db->insert_id());
			return $obj;
		} else {
			$ret = $this->db->update('country', $arrDados, array('id' => $obj->getId()));
		}
		if ($ret == true) {		 
			return true;
		}
	}

	public function excluir(CountryDto $obj) {
		$retUpd = $this->db->delete('country',array('id' => $obj->getId()));
		if ($retUpd == true) {
			return true;
		}
	}

}
?>