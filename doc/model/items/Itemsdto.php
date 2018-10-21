<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ItemsDto extends CI_Model {
	private $id;
	private $title;
	private $summary;
	private $image;
	private $thumb;
	private $category_id;
	private $description;
	private $status;
	private $created_at;

	public function __construct ($id = null, $title = null, $summary = null, $image = null, $thumb = null, $category_id = null, $description = null, $status = null, $created_at = null) {
		$this->setId($id);
		$this->setTitle($title);
		$this->setSummary($summary);
		$this->setImage($image);
		$this->setThumb($thumb);
		$this->setCategory_id($category_id);
		$this->setDescription($description);
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
	public function getTitle () {
		return $this->title;
	}
	public function setTitle ($title) {
		$this->title = $title;
	}
	public function getSummary () {
		return $this->summary;
	}
	public function setSummary ($summary) {
		$this->summary = $summary;
	}
	public function getImage () {
		return $this->image;
	}
	public function setImage ($image) {
		$this->image = $image;
	}
	public function getThumb () {
		return $this->thumb;
	}
	public function setThumb ($thumb) {
		$this->thumb = $thumb;
	}
	public function getCategory_id () {
		return $this->category_id;
	}
	public function setCategory_id ($category_id) {
		$this->category_id = $category_id;
	}
	public function getDescription () {
		return $this->description;
	}
	public function setDescription ($description) {
		$this->description = $description;
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