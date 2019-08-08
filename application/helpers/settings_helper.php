<?php

//$ci =& get_instance();
//$ci->load->database();

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