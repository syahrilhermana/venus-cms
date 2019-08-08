<?php

/**
 * Mod for CI_Model
 *
 * @package     Models
 * @subpackage  CI_Model
 * @category    Core
 * @author      Syahril Hermana
 * @link        http://bogcamp.com
 */

class BC_Models extends CI_Model
{
    protected $ci;
    protected $table;
    protected $primaryKey = 'id';
    protected $softDelete = false;
    private $lastId;

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }

    

    /**
     * @param array $columns
     * @param bool $limit
     * @param bool $offset
     * @return mixed
     */
    public function all($columns = array('*'), $limit = false, $offset = false)
    {
        $columns = is_array($columns) ? $columns : func_get_args();

        $this->db->select($columns)
            ->form($this->table);

        if($limit && $offset) $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    /**
     * @param $columns
     * @return mixed
     */
    public function find($columns)
    {
        $this->db->select('*')
            ->form($this->table);

        if(isset($columns)) {
            foreach ($columns as $key => $value) :
                $this->db->where($key, $value);
            endforeach;
        }

        return $this->db->get()->result();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function findOne($value)
    {
        $this->db->from($this->table)
            ->where($this->primaryKey, $value);

        return $this->db->get()->row();
    }

    /**
     * @param $dataSet
     * @return int
     */
    public function save($dataSet)
    {
        $primary = (is_object($dataSet)) ? $dataSet->id : $dataSet[$this->primaryKey];

        if(!isset($primary)) {
            $this->db->trans_start();
            $this->db->insert($this->table, $dataSet);
            $this->lastId = $this->db->insert_id();
            $this->db->trans_complete();

            if($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                return $this->lastId;
            } else {
                $this->db->trans_rollback();
                return 0;
            }
        } else {
            $value = $primary;
            if(is_object($dataSet)) {
                unset($dataSet->id);
            } else {
                unset($dataSet[$this->primaryKey]);
            }

            $this->db->trans_start();
                $this->db->where($this->primaryKey, $value)
                    ->update($this->table, $dataSet);
            $this->db->trans_complete();

            if($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                return $value;
            } else {
                $this->db->trans_rollback();
                return 0;
            }
        }
    }

    /**
     * @param $value
     * @return bool
     */
    public function delete($value)
    {
        $this->db->trans_start();
        $this->db->where($this->primaryKey, $value)
            ->delete($this->table);
        $this->db->trans_complete();

        if($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            return true;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function count()
    {
        $this->ci->db->from($this->table);
        return $this->ci->db->count_all_results();
    }
}