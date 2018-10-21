<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserDto extends CI_Model {
	private $id;
	private $first_name;
	private $last_name;
	private $email;
	private $mobile;
	private $password;
	private $country;
	private $created_at;
	private $status;
	private $role;
	private $idempresa;

	public function __construct ($id = null, $first_name = null, $last_name = null, $email = null, $mobile = null, $password = null, $country = null, $created_at = null, $status = null, $role = null, $idempresa = null) {
		$this->setId($id);
		$this->setFirst_name($first_name);
		$this->setLast_name($last_name);
		$this->setEmail($email);
		$this->setMobile($mobile);
		$this->setPassword($password);
		$this->setCountry($country);
		$this->setCreated_at($created_at);
		$this->setStatus($status);
		$this->setRole($role);
		$this->setIdempresa($idempresa);
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
	public function getFirst_name () {
		return $this->first_name;
	}
	public function setFirst_name ($first_name) {
		$this->first_name = $first_name;
	}
	public function getLast_name () {
		return $this->last_name;
	}
	public function setLast_name ($last_name) {
		$this->last_name = $last_name;
	}
	public function getEmail () {
		return $this->email;
	}
	public function setEmail ($email) {
		$this->email = $email;
	}
	public function getMobile () {
		return $this->mobile;
	}
	public function setMobile ($mobile) {
		$this->mobile = $mobile;
	}
	public function getPassword () {
		return $this->password;
	}
	public function setPassword ($password) {
		$this->password = $password;
	}
	public function getCountry () {
		return $this->country;
	}
	public function setCountry ($country) {
		$this->country = $country;
	}
	public function getCreated_at () {
		return $this->created_at;
	}
	public function setCreated_at ($created_at) {
		$this->created_at = $created_at;
	}
	public function getStatus () {
		return $this->status;
	}
	public function setStatus ($status) {
		$this->status = $status;
	}
	public function getRole () {
		return $this->role;
	}
	public function setRole ($role) {
		$this->role = $role;
	}
	public function getIdempresa () {
		return $this->idempresa;
	}
	public function setIdempresa ($idempresa) {
		$this->idempresa = $idempresa;
	}
}
?>