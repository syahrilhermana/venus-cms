<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('menuTypeText')){
    function menuTypeText($status)
    {
        $status = strtoupper($status);

        switch ($status) {
            case 'URL':
                return 'Hyperlink';
                break;
            case 'STC':
                return 'Static Page';
                break;
            case 'CST':
                return 'Custom Page';
                break;
            default:
                return 'Unknown';
        }
    }
}

if(!function_exists('statusTypeText')){
    function statusTypeText($status)
    {
        $status = strtoupper($status);

        switch ($status) {
            case 'A':
                return 'Active';
                break;
            case 'S':
                return 'Suspend';
                break;
            case 'B':
                return 'Banned';
                break;
            case 'N':
                return 'Non-Active';
                break;
            default:
                return 'Unknown';
        }
    }
}

if(!function_exists('categoryText')){
    function categoryText($id)
    {
        $ci =& get_instance();
        $ci->load->database();

        $ci->db->select('category_name');
        $ci->db->from('tbl_category');
        $ci->db->where('category_id', $id);
        $return = $ci->db->get()->row();

        return $return->category_name;
    }
}

if(!function_exists('totalSubscriber')){
    function totalSubscriber()
    {
        $ci =& get_instance();
        $ci->load->database();

        $ci->db->from('tbl_subscriber');
        $return = $ci->db->count_all_results();

        return number_format($return);
    }
}