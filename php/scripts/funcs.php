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
    // Prevents "unknown variable" errors when trying to set value=<?=$variable> in html forms
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

function require_admin(){
    // Redirects user to login page with error message if not logged in
    if(!get_default($_SESSION['is_admin'])){
        $errors = array("Sie haben auf diese Seite keinen Zugriff");
        header('Location: /login.php');
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

function switch_page_button($int_up_or_down){
    // Ugly-ass function to generate switch page buttons
    // $int_up_down = -1 shifts a page down, +1 shifts one page up
    //
    // Buttons that would land in pages whose number exeeds $max- or $min_page
    // are made invisible via text-white class
    // All other GET variables except for ?p= are retained in the URL

    GLOBAL $page, $max_page, $min_page;

    // Ensure necessary global variables actually exist
    if(!isset($min_page)){
        $min_page = 1;
    }
    if(!isset($page) || !isset($max_page)){
        echo "<b>ERROR:</b> switch_page_button() requires a $page and $max_page variable to be present";
    }
    
    $current_uri = $_SERVER['REQUEST_URI'];
    $current_uri = preg_replace('/\?p=\d+/', '', $current_uri);  // Remove any ?p=... in the url
    
    $disabled = '';
    if($int_up_or_down == 1){
        // Next page button
        $direction = 'right';        
        
        if($page >= $max_page){
            $href = ''; 
            $disabled = 'text-white';
        } else {
            $href = 'href="?p=' . ($page+1) . '"';
        }
    } elseif($int_up_or_down == -1){
        // Previous page button
        $direction = 'left';
        
        if($page <= $min_page){
            $href = ''; 
            $disabled = 'text-white';
        } else {
            $href = 'href="?p=' . ($page-1) . '"';
        }
    } else {
        print('<b>ERROR:</b> switch_page_button() only accepts +1 or -1 as first argument');
    }
    
    return '
    <a class="switch-page-button" '.$href.'>
        <i class="fa-solid fa-arrow-'.$direction.' '.$disabled.'"></i>
    </a>
    ';
}
?>