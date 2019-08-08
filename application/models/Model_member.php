<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_Model
{

    public function get_setting_data()
    {
        $query = $this->db->query("SELECT * from tbl_settings WHERE id=1");
        return $query->first_row('array');
    }

    function show() {
        $sql = "SELECT
                t.member_id,
                t.member_name,
                t.member_email,
                t.member_status,
                t.member_photo
                FROM tbl_member t
                ORDER BY t.member_id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

	function check_email($email) 
	{
        $where = array(
			'member_email' => $email
		);
		$this->db->select('*');
		$this->db->from('tbl_member');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    function check_password($email,$password)
    {
        $where = array(
            'member_email' => $email,
            'member_password' => md5($password)
        );
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function register($data)
    {
        $this->db->insert('tbl_member',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('member_id',$id);
        $this->db->update('tbl_member',$data);
    }

    function suspend($id) {
        $data = array(
            'member_status' => 'S'
        );

        $this->db->where('member_id',$id);
        $this->db->update('tbl_member',$data);
    }

    function banned($id) {
        $data = array(
            'member_status' => 'B'
        );

        $this->db->where('member_id',$id);
        $this->db->update('tbl_member',$data);
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_member WHERE member_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

}