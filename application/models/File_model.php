<?php

/**
 * Description of Posts.
 *
 * @author anb
 */
class File_model  extends CI_Model {

	protected $_name = 'files';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 *
	 * @param Integer $id
	 * @return Array data Element.
	 */
	/*
	public function get($id)
	{
		$rs = false;

		if (!empty($id)) {
			$this->db->select()->from($this->_name);
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			$response = $query->result_array();
			$rs = ($response == false) ? null : $response[0];
		}

		return $rs;
	}
	*/

	// Insert Image Into Database.
	public function insertar($data)
	{
		$result = false;
		if (is_array($data)) {
			$this->db->insert('files', $data);
			$result = $this->db->insert_id();
		}

		return $result;
	}

	// Delete Image From Database.
	public function delete($img)
	{
		$this->db->where('image_path', $img);
		$this->db->delete($this->_name);
	}


}
