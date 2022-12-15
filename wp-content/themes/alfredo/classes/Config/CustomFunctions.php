<?php
namespace Alfredo\Config;

class CustomFunctions
{

    public function __construct()
    {
    }

    public function getField(String $name, Int $id)
    {
        return get_field($name, $id, true);
    }

}
