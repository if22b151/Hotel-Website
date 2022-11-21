<?php
function is_empty_any(...$vars){
    foreach($vars as $var){
        if(empty($var)){
            return TRUE;
        }
    }

    return FALSE;
}

function get_default(&$var, $default=NULL){
    if(isset($var)){
        return $var;
    } else {
        return $default;
    }
}
?>