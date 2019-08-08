<?php

function load_class_extended()
{
    spl_autoload_register('load_extended');
}

function load_extended($class)
{
    if(is_readable(APPPATH . 'core/' . $class . '.php'))
    {
        require_once (APPPATH . 'core/' . $class . '.php');
    }
}