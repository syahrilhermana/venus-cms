<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_comment extends BC_Models
{
    protected $table = "tbl_comment";
    protected $primaryKey = "id";

    var $column_order = array(null, 'code_main', null, null);
    var $column_search = array('code_body');
    var $order = array('id' => 'asc');

    // tbl_comment
    public $id;
    public $code_body;
    public $code_main;

    function __construct()
    {
        parent::__construct();
    }

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

    function update($data) {
        $this->ci->db->where('id',1);
        $this->ci->db->update('tbl_comment',$data);
    }
    
}