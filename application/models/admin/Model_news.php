<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends BC_Models
{
    protected $table = "tbl_news";
    protected $primaryKey = "news_id";

    var $column_order = array(null, 'news_title', null, null, null, null);
    var $column_search = array('news_title');
    var $order = array('news_id' => 'asc');

    public $news_id;
    public $news_title;
    public $news_slug;
    public $news_content;
    public $news_content_short;
    public $news_date;
    public $photo;
    public $banner;
    public $category_id;
    public $comment;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;

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

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_news'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT
                t1.news_id,
                t1.news_title,
                t1.news_content,
                t1.photo,
                t1.banner,
                t1.category_id,
                t2.category_id,
                t2.category_name
                FROM tbl_news t1
                JOIN tbl_category t2
                ON t1.category_id = t2.category_id
                ORDER BY t1.news_id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function add($data) {
        $this->db->insert('tbl_news',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('news_id',$id);
        $this->db->update('tbl_news',$data);
    }

    function delete($id)
    {
        $this->db->where('news_id',$id);
        $this->db->delete('tbl_news');
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_news WHERE news_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function get_category()
    {
        $sql = 'SELECT * FROM tbl_category ORDER BY category_name ASC';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function news_check($id)
    {
        $sql = 'SELECT * FROM tbl_news WHERE news_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
   
}