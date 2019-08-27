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

        $this->ci->db->select($columns);

        if($limit && $offset) $this->ci->db->limit($limit, $offset);

        return $this->ci->db->get($this->table)->result();
    }

    /**
     * @param $columns
     * @return mixed
     */
    public function find($columns)
    {
        $this->ci->db->select('*');

        if(isset($columns)) {
            foreach ($columns as $key => $value) :
                $this->ci->db->where($key, $value);
            endforeach;
        }

        return $this->ci->db->get($this->table)->result();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function findOne($value)
    {
        $this->ci->db->from($this->table)
            ->where($this->primaryKey, $value);

        return $this->ci->db->get()->row();
    }

    /**
     * @param $dataSet
     * @return int
     */
    public function save($dataSet)
    {
        $primary = (is_object($dataSet)) ? $dataSet->id : $dataSet[$this->primaryKey];

        if(!isset($primary)) {
            $this->ci->db->trans_start();
            $this->ci->db->insert($this->table, $dataSet);
            $this->lastId = $this->ci->db->insert_id();
            $this->ci->db->trans_complete();

            if($this->ci->db->trans_status() === TRUE) {
                $this->ci->db->trans_commit();
                return $this->lastId;
            } else {
                $this->ci->db->trans_rollback();
                return 0;
            }
        } else {
            $value = $primary;
            if(is_object($dataSet)) {
                unset($dataSet->id);
            } else {
                unset($dataSet[$this->primaryKey]);
            }

            $this->ci->db->trans_start();
                $this->ci->db->where($this->primaryKey, $value)
                    ->update($this->table, $dataSet);
            $this->ci->db->trans_complete();

            if($this->ci->db->trans_status() === TRUE) {
                $this->ci->db->trans_commit();
                return $value;
            } else {
                $this->ci->db->trans_rollback();
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
        if($this->softDelete)
            $this->soft($value);
        else
            $this->permanent($value);
    }

    public function permanent($value)
    {
        $this->ci->db->trans_start();
        $this->ci->db->where($this->primaryKey, $value)
            ->delete($this->table);
        $this->ci->db->trans_complete();

        if($this->ci->db->trans_status() === TRUE) {
            $this->ci->db->trans_commit();
            return true;
        } else {
            $this->ci->db->trans_rollback();
            return false;
        }
    }

    /**
     * @param $value
     * @return int
     */
    public function soft($value)
    {
        $this->ci->db->trans_start();
        $this->ci->db->where($this->primaryKey, $value)
            ->update($this->table, array("deleted_at", "now()"));
        $this->ci->db->trans_complete();

        if($this->ci->db->trans_status() === TRUE) {
            $this->ci->db->trans_commit();
            return $value;
        } else {
            $this->ci->db->trans_rollback();
            return 0;
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