<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginDto extends CI_Model {
	private $idlogin;
	private $login;
	private $nomeusuario;
	private $email;
	private $senha;
	private $idempresa;
	private $datacadastro;
	private $status;

	public function __construct ($idlogin = null, $login = null, $nomeusuario = null, $email = null, $senha = null, $idempresa = null, $datacadastro = null, $status = null) {
		$this->setIdlogin($idlogin);
		$this->setLogin($login);
		$this->setNomeusuario($nomeusuario);
		$this->setEmail($email);
		$this->setSenha($senha);
		$this->setIdempresa($idempresa);
		$this->setDatacadastro($datacadastro);
		$this->setStatus($status);
	}

	public function __destruct () {
	}

	public function __toString () {
		return $this->idlogin;
	}
	public function getIdlogin () {
		return $this->idlogin;
	}
	public function setIdlogin ($idlogin) {
		$this->idlogin = $idlogin;
	}
	public function getLogin () {
		return $this->login;
	}
	public function setLogin ($login) {
		$this->login = $login;
	}
	public function getNomeusuario () {
		return $this->nomeusuario;
	}
	public function setNomeusuario ($nomeusuario) {
		$this->nomeusuario = $nomeusuario;
	}
	public function getEmail () {
		return $this->email;
	}
	public function setEmail ($email) {
		$this->email = $email;
	}
	public function getSenha () {
		return $this->senha;
	}
	public function setSenha ($senha) {
		$this->senha = $senha;
	}
	public function getIdempresa () {
		return $this->idempresa;
	}
	public function setIdempresa ($idempresa) {
		$this->idempresa = $idempresa;
	}
	public function getDatacadastro () {
		return $this->datacadastro;
	}
	public function setDatacadastro ($datacadastro) {
		$this->datacadastro = $datacadastro;
	}
	public function getStatus () {
		return $this->status;
	}
	public function setStatus ($status) {
		$this->status = $status;
	}
}
?>