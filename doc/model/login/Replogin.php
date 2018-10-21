<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RepLogin extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('login/logindto');
	}

	public function __destruct() {
	}

	public function getAll($limit = null, $offset = null, $where = null, $like = null, $order_by = null, $group_by = null, $selectColumns = null) {
		$arrLogin = array();
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
		$query = $this->db->get ('login');
		foreach($query->result_array() as $row ) {
			array_walk($row, 'decDb');
			$arrLogin[] = new LoginDto(
				@$row['idlogin'],
				@$row['login'],
				@$row['nomeusuario'],
				@$row['email'],
				@$row['senha'],
				@$row['idempresa'],
				@$row['datacadastro'],
				@$row['status']
			);
		}
		$query->free_result();
		return $arrLogin;
	}

	public function getWhere($where = null, $limit = null, $offset = null) {
		return $this->getAll($limit, $offset, $where);
	}

	public function getLike($like = null, $limit = null, $offset = null) {
		return $this->getAll($limit, $offset, null, $like);
	}

	public function getId($id = null) {
		$arrObj = $this->getAll(1, null, array('idlogin' => $id));
		if(isset($arrObj[0])) {
			return $arrObj[0];
		} else {
			return false;
		}
	}

	public function salvar(LoginDto $obj) {
		$arrDados = array(
			'login' => $obj->getLogin(),
			'nomeusuario' => $obj->getNomeusuario(),
			'email' => $obj->getEmail(),
			'senha' => $obj->getSenha(),
			'idempresa' => $obj->getIdempresa(),
			'datacadastro' => $obj->getDatacadastro(),
			'status' => $obj->getStatus()
		);
		array_walk_ci($arrDados);
		if ($obj->getIdlogin() === NULL) { 
			$ret = $this->db->insert('login', $arrDados);
			$obj->setIdlogin($this->db->insert_id());
			return $obj;
		} else {
			$ret = $this->db->update('login', $arrDados, array('idlogin' => $obj->getIdlogin()));
		}
		if ($ret == true) {		 
			return true;
		}
	}

	public function excluir(LoginDto $obj) {
		$retUpd = $this->db->delete('login',array('idlogin' => $obj->getIdlogin()));
		if ($retUpd == true) {
			return true;
		}
	}

}
?>