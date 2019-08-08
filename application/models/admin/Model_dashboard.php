<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model 
{
	public function latest_post()
	{
	    $this->db->limit(4, 0)->from('tbl_news');
	    $this->db->order_by('news_date', 'desc');
        return $this->db->get()->result();
    }
    public function latest_event()
    {
        $this->db->limit(4, 0)->from('tbl_event');
        $this->db->order_by('event_start_date', 'desc');
        $this->db->order_by('event_end_date', 'asc');
        return $this->db->get()->result();
    }
    
}