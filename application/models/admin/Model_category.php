<?php
defined('BASEPATH') OR exit('No direct script access allowed');

trait table{
    public $category_id;
    public $category_name;
    public $category_banner;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;

    public function __get($property)
    {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}

class Model_category extends BC_Models
{
    use table;
    protected $table = "tbl_category";
    protected $primaryKey = "id";

    var $column_order = array(null, 'category_name', null, null);
    var $column_search = array('category_name');
    var $order = array('category_id' => 'asc');

    function __construct()
    {
        parent::__construct();
    }

    private function _get_field_query()
    {
        $this->ci->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item)
        {
            if(!empty($_GET['search']['value']))
            {
                if($i===0)
                {
                    $this->ci->db->group_start();
                    $this->ci->db->like('LOWER(' . $item . ')',strtolower($_GET['search']['value']) );
                }
                else
                {
                    $this->ci->db->or_like('LOWER(' . $item . ')',strtolower($_GET['search']['value']) );
                }
                if(count($this->column_search) - 1 == $i)
                    $this->ci->db->group_end();
            }
            $i++;
        }
        if(isset($_GET['order']))
        {
            $this->ci->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->ci->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function findFiltered($limit = false, $offset = false)
    {
        $this->_get_field_query();
        if($limit) {
            return $this->ci->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->ci->db->get()->result();
        }
    }

    public function countFiltered()
    {
        $this->_get_field_query();
        return $this->ci->db->get()->num_rows();
    }

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_category'";
        $query = $this->ci->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT * FROM tbl_category ORDER BY category_id ASC";
        $query = $this->ci->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->ci->db->insert('tbl_category',$data);
        return $this->ci->db->insert_id();
    }

    function update($id,$data) {
        $this->ci->db->where('category_id',$id);
        $this->ci->db->update('tbl_category',$data);
    }

    function delete($id)
    {
        $this->ci->db->where('category_id',$id);
        $this->ci->db->delete('tbl_category');
    }

    function get_category($id)
    {
        $sql = 'SELECT * FROM tbl_category WHERE category_id=?';
        $query = $this->ci->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function category_check($id)
    {
        $sql = 'SELECT * FROM tbl_category WHERE category_id=?';
        $query = $this->ci->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function check_news($id) {
        $sql = 'SELECT * FROM tbl_news WHERE category_id=?';
        $query = $this->ci->db->query($sql,array($id));
        return $query->num_rows();
    }
   
}