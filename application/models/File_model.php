<?php

/**
 * Description of Posts.
 *
 * @author anb
 */
class File_model  extends CI_Model {

    protected $_name = 'files';

    /**
     *
     * @param Integer $id
     * @return Array data Element.
     */
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

    // Insert Image Into Database.
    public function insert($data)
	{
        $this->db->insert($this->_name, $data);
        return $this->db->insert_id();
    }

    // Delete Image From Database.
    public function delete($img)
	{
        $this->db->where('image_path', $img);
        $this->db->delete($this->_name);
    }


}
