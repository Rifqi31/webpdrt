<?php
if(!function_exists('dateFormat'))
{
    function dateFormat($format='d/m/Y', $givenDate = NULL)
    {
        return date($format, strtotime($givenDate));
    }
}