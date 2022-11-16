<?php
function is_empty_any(...$vars){
    foreach($vars as $var){
        if(empty($var)){
            return TRUE;
        }
    }

    return FALSE;
}
?>