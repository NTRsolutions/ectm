<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EmpresaaeroDto extends CI_Model {
	private $idempresa;
	private $cnpj;
	private $nomeempresa;
	private $endoperacional;
	private $cidade;
	private $bairro;
	private $taxiaereo;
	private $chetanumero;
	private $oficinamnt;
	private $chenumero;
	private $ddd;
	private $telefone;
	private $telefone1;
	private $razaosocial;
	private $responsavelnome;
	private $observacoes;

	public function __construct ($idempresa = null, $cnpj = null, $nomeempresa = null, $endoperacional = null, $cidade = null, $bairro = null, $taxiaereo = null, $chetanumero = null, $oficinamnt = null, $chenumero = null, $ddd = null, $telefone = null, $telefone1 = null, $razaosocial = null, $responsavelnome = null, $observacoes = null) {
		$this->setIdempresa($idempresa);
		$this->setCnpj($cnpj);
		$this->setNomeempresa($nomeempresa);
		$this->setEndoperacional($endoperacional);
		$this->setCidade($cidade);
		$this->setBairro($bairro);
		$this->setTaxiaereo($taxiaereo);
		$this->setChetanumero($chetanumero);
		$this->setOficinamnt($oficinamnt);
		$this->setChenumero($chenumero);
		$this->setDdd($ddd);
		$this->setTelefone($telefone);
		$this->setTelefone1($telefone1);
		$this->setRazaosocial($razaosocial);
		$this->setResponsavelnome($responsavelnome);
		$this->setObservacoes($observacoes);
	}

	public function __destruct () {
	}

	public function __toString () {
		return $this->idempresa;
	}
	public function getIdempresa () {
		return $this->idempresa;
	}
	public function setIdempresa ($idempresa) {
		$this->idempresa = $idempresa;
	}
	public function getCnpj () {
		return $this->cnpj;
	}
	public function setCnpj ($cnpj) {
		$this->cnpj = $cnpj;
	}
	public function getNomeempresa () {
		return $this->nomeempresa;
	}
	public function setNomeempresa ($nomeempresa) {
		$this->nomeempresa = $nomeempresa;
	}
	public function getEndoperacional () {
		return $this->endoperacional;
	}
	public function setEndoperacional ($endoperacional) {
		$this->endoperacional = $endoperacional;
	}
	public function getCidade () {
		return $this->cidade;
	}
	public function setCidade ($cidade) {
		$this->cidade = $cidade;
	}
	public function getBairro () {
		return $this->bairro;
	}
	public function setBairro ($bairro) {
		$this->bairro = $bairro;
	}
	public function getTaxiaereo () {
		return $this->taxiaereo;
	}
	public function setTaxiaereo ($taxiaereo) {
		$this->taxiaereo = $taxiaereo;
	}
	public function getChetanumero () {
		return $this->chetanumero;
	}
	public function setChetanumero ($chetanumero) {
		$this->chetanumero = $chetanumero;
	}
	public function getOficinamnt () {
		return $this->oficinamnt;
	}
	public function setOficinamnt ($oficinamnt) {
		$this->oficinamnt = $oficinamnt;
	}
	public function getChenumero () {
		return $this->chenumero;
	}
	public function setChenumero ($chenumero) {
		$this->chenumero = $chenumero;
	}
	public function getDdd () {
		return $this->ddd;
	}
	public function setDdd ($ddd) {
		$this->ddd = $ddd;
	}
	public function getTelefone () {
		return $this->telefone;
	}
	public function setTelefone ($telefone) {
		$this->telefone = $telefone;
	}
	public function getTelefone1 () {
		return $this->telefone1;
	}
	public function setTelefone1 ($telefone1) {
		$this->telefone1 = $telefone1;
	}
	public function getRazaosocial () {
		return $this->razaosocial;
	}
	public function setRazaosocial ($razaosocial) {
		$this->razaosocial = $razaosocial;
	}
	public function getResponsavelnome () {
		return $this->responsavelnome;
	}
	public function setResponsavelnome ($responsavelnome) {
		$this->responsavelnome = $responsavelnome;
	}
	public function getObservacoes () {
		return $this->observacoes;
	}
	public function setObservacoes ($observacoes) {
		$this->observacoes = $observacoes;
	}
}
?>