<?php
function escape_quote($string)
{
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    return mysql_real_escape_string($string);
}

function escape_array($array)
{
    foreach ($array as &$v) {
        if (is_array($v)) {
            $v = escape_array($v);
        } else {
            $v = escape_quote($v);
        }    
    }
    return $array;
}