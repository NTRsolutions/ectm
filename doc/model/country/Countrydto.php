<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CountryDto extends CI_Model {
	private $id;
	private $name;
	private $status;

	public function __construct ($id = null, $name = null, $status = null) {
		$this->setId($id);
		$this->setName($name);
		$this->setStatus($status);
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
	public function getStatus () {
		return $this->status;
	}
	public function setStatus ($status) {
		$this->status = $status;
	}
}
?>