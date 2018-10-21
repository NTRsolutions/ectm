<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CategoryDto extends CI_Model {
	private $id;
	private $name;
	private $title;
	private $parent_id;
	private $status;
	private $created_at;

	public function __construct ($id = null, $name = null, $title = null, $parent_id = null, $status = null, $created_at = null) {
		$this->setId($id);
		$this->setName($name);
		$this->setTitle($title);
		$this->setParent_id($parent_id);
		$this->setStatus($status);
		$this->setCreated_at($created_at);
	}

	public function __destruct () {
	}

	public function __toString () {
		return $this->id;
	}
	public function getId () {
		return $this->id;
	}
	public function setId ($id) {
		$this->id = $id;
	}
	public function getName () {
		return $this->name;
	}
	public function setName ($name) {
		$this->name = $name;
	}
	public function getTitle () {
		return $this->title;
	}
	public function setTitle ($title) {
		$this->title = $title;
	}
	public function getParent_id () {
		return $this->parent_id;
	}
	public function setParent_id ($parent_id) {
		$this->parent_id = $parent_id;
	}
	public function getStatus () {
		return $this->status;
	}
	public function setStatus ($status) {
		$this->status = $status;
	}
	public function getCreated_at () {
		return $this->created_at;
	}
	public function setCreated_at ($created_at) {
		$this->created_at = $created_at;
	}
}
?>