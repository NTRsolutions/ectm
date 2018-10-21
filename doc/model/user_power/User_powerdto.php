<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_powerDto extends CI_Model {
	private $id;
	private $name;
	private $power_id;

	public function __construct ($id = null, $name = null, $power_id = null) {
		$this->setId($id);
		$this->setName($name);
		$this->setPower_id($power_id);
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
	public function getPower_id () {
		return $this->power_id;
	}
	public function setPower_id ($power_id) {
		$this->power_id = $power_id;
	}
}
?>