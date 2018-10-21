<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RepItems extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('items/itemsdto');
	}

	public function __destruct() {
	}

	public function getAll($limit = null, $offset = null, $where = null, $like = null, $order_by = null, $group_by = null, $selectColumns = null) {
		$arrItems = array();
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
		$query = $this->db->get ('items');
		foreach($query->result_array() as $row ) {
			array_walk($row, 'decDb');
			$arrItems[] = new ItemsDto(
				@$row['id'],
				@$row['title'],
				@$row['summary'],
				@$row['image'],
				@$row['thumb'],
				@$row['category_id'],
				@$row['description'],
				@$row['status'],
				@$row['created_at']
			);
		}
		$query->free_result();
		return $arrItems;
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

	public function salvar(ItemsDto $obj) {
		$arrDados = array(
			'title' => $obj->getTitle(),
			'summary' => $obj->getSummary(),
			'image' => $obj->getImage(),
			'thumb' => $obj->getThumb(),
			'category_id' => $obj->getCategory_id(),
			'description' => $obj->getDescription(),
			'status' => $obj->getStatus(),
			'created_at' => $obj->getCreated_at()
		);
		array_walk_ci($arrDados);
		if ($obj->getId() === NULL) { 
			$ret = $this->db->insert('items', $arrDados);
			$obj->setId($this->db->insert_id());
			return $obj;
		} else {
			$ret = $this->db->update('items', $arrDados, array('id' => $obj->getId()));
		}
		if ($ret == true) {		 
			return true;
		}
	}

	public function excluir(ItemsDto $obj) {
		$retUpd = $this->db->delete('items',array('id' => $obj->getId()));
		if ($retUpd == true) {
			return true;
		}
	}

}
?>