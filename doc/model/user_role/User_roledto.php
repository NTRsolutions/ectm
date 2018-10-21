<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_roleDto extends CI_Model {
	private $id;
	private $user_id;
	private $action;

	public function __construct ($id = null, $user_id = null, $action = null) {
		$this->setId($id);
		$this->setUser_id($user_id);
		$this->setAction($action);
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
	public function getUser_id () {
		return $this->user_id;
	}
	public function setUser_id ($user_id) {
		$this->user_id = $user_id;
	}
	public function getAction () {
		return $this->action;
	}
	public function setAction ($action) {
		$this->action = $action;
	}
}
?>