<?php
function is_empty_any(...$vars){
    foreach($vars as $var){
        if(empty($var)){
            return true;
        }
    }

    return false;
}

function get_default(&$var, $default=NULL){
    // If variable doesn't exist yet, creates the variable and sets it to NULL.
    // Prevents "unknown variable" errors when trying to set value=<?php echo $variable> in html forms
    if(isset($var)){
        return $var;
    } else {
        return $default;
    }
}

function require_login(){
    // Redirects user to login page with error message if not logged in
    if(!isset($_SESSION['userid'])){
        $errors = array("Hierfür müssen Sie eingeloggt sein");
        header('Location: /login.php?access_denied');
        die();  // Required as client can choose to ignore the HTTP header that instructs redirection
    }
}
?>