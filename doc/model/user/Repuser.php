<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RepUser extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('user/userdto');
	}

	public function __destruct() {
	}

	public function getAll($limit = null, $offset = null, $where = null, $like = null, $order_by = null, $group_by = null, $selectColumns = null) {
		$arrUser = array();
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
		$query = $this->db->get ('user');
		foreach($query->result_array() as $row ) {
			array_walk($row, 'decDb');
			$arrUser[] = new UserDto(
				@$row['id'],
				@$row['first_name'],
				@$row['last_name'],
				@$row['email'],
				@$row['mobile'],
				@$row['password'],
				@$row['country'],
				@$row['created_at'],
				@$row['status'],
				@$row['role'],
				@$row['idempresa']
			);
		}
		$query->free_result();
		return $arrUser;
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

	public function salvar(UserDto $obj) {
		$arrDados = array(
			'first_name' => $obj->getFirst_name(),
			'last_name' => $obj->getLast_name(),
			'email' => $obj->getEmail(),
			'mobile' => $obj->getMobile(),
			'password' => $obj->getPassword(),
			'country' => $obj->getCountry(),
			'created_at' => $obj->getCreated_at(),
			'status' => $obj->getStatus(),
			'role' => $obj->getRole(),
			'idempresa' => $obj->getIdempresa()
		);
		array_walk_ci($arrDados);
		if ($obj->getId() === NULL) { 
			$ret = $this->db->insert('user', $arrDados);
			$obj->setId($this->db->insert_id());
			return $obj;
		} else {
			$ret = $this->db->update('user', $arrDados, array('id' => $obj->getId()));
		}
		if ($ret == true) {		 
			return true;
		}
	}

	public function excluir(UserDto $obj) {
		$retUpd = $this->db->delete('user',array('id' => $obj->getId()));
		if ($retUpd == true) {
			return true;
		}
	}

}
?>