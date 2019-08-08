<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model
{

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_menu'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT
                menu_id,
                menu_name,
                menu_type,
                menu_type_param,
                menu_parent
                FROM tbl_menu
                ORDER BY `order`, menu_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function listHierarchy()
    {
        return $this->_getParent(null, 1);
    }
    private function _getParent($parent, $level)
    {
        $returnData = array();

        if($parent == null) {
            $sql = "SELECT
                menu_id,
                menu_name,
                menu_type,
                menu_type_param,
                menu_parent
                FROM tbl_menu
                WHERE menu_parent is null
                ORDER BY `order`, menu_id ASC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT
                menu_id,
                menu_name,
                menu_type,
                menu_type_param,
                menu_parent
                FROM tbl_menu
                WHERE menu_parent=?
                ORDER BY `order`, menu_id ASC";
            $query = $this->db->query($sql, array($parent));
        }

        $menu = $query->result_array();

        foreach ($menu as $row) {
            $returnData[] = [
                'level'     => $level,
                'data'      => $row,
                'children'  => $this->_getParent($row['menu_id'], $level+1)
            ];
        }

        return $returnData;
    }


    function add($data) {
        $this->db->insert('tbl_menu',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('menu_id',$id);
        $this->db->update('tbl_menu',$data);
    }

    function delete($id)
    {
        $this->db->where('menu_id',$id);
        $this->db->delete('tbl_menu');
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_menu WHERE menu_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function menu_check($id)
    {
        $sql = 'SELECT * FROM tbl_menu WHERE menu_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
   
}