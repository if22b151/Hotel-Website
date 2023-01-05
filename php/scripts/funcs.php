<?php
function is_empty_any(...$vars){
    // Checks if any of the given variables is empty
    foreach($vars as $var){
        if(empty($var)){
            return True;
        }
    }

    return False;
}

function get_default(&$var, $default=NULL, $filter_htmlspecialchars=True){
    // If variable doesn't exist yet, creates the variable and sets it to NULL.
    // Prevents "unknown variable" errors when trying to set value=<?php echo $variable> in html forms
    if(isset($var)){
        if($filter_htmlspecialchars){$var = htmlspecialchars($var);}
        return $var;
    } else {
        return $default;
    }
}

function require_login(){
    // Redirects user to login page with error message if not logged in
    if(!isset($_SESSION['userid'])){
        $errors = array("Hierfür müssen Sie eingeloggt sein");
        header('Location: /login.php?access_denied='.$_SERVER['REQUEST_URI']);
        die();  // Required as client can choose to ignore the HTTP header that instructs redirection
    }
}

function is_duplicate($value, $value_type, $mysqli_gateway, $table, $column){
    // Checks whether entry already exists in a given column of a table
    $query = $mysqli_gateway->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = ?");
    $query->bind_param($value_type, $value);
    $query->execute();

    $result = $query->get_result();

    return (bool) $result->num_rows;
}

function clear_variables(...$vars){
    foreach($vars as $var){
        $var = '';
    }
}
?>