<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_custom_page extends CI_Model
{

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_page_custom'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT
                t.custom_page_id,
                t.custom_page_title,
                t.custom_page_content,
                t.photo,
                t.banner
                FROM tbl_page_custom t
                ORDER BY t.custom_page_id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function add($data) {
        $this->db->insert('tbl_page_custom',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('custom_page_id',$id);
        $this->db->update('tbl_page_custom',$data);
    }

    function delete($id)
    {
        $this->db->where('custom_page_id',$id);
        $this->db->delete('tbl_page_custom');
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_page_custom WHERE custom_page_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function page_check($id)
    {
        $sql = 'SELECT * FROM tbl_page_custom WHERE custom_page_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
   
}