<?php
// Prevent non-admins from accessing the page
if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']){
    header('Location: /index.php');
    exit();
}

require '../php/scripts/dbaccess.php';

$errors = array();
$db = get_db();
if(!$db){
    array_push($errors, 'Konnte keine Verbindung zu DB herstellen');
}

if (isset($_POST['submit'])){
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $time = time();

    // File handling
    $image = $_FILES['image']['tmp_name'];
  
    // Check whether a file was uploaded
    if (!empty($image)){
        // Get the file extension
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
        // Create source image
        switch ($file_extension) {
            case 'jpg':
                case 'jpeg': $source = imagecreatefromjpeg($image); break;
                case 'png': $source = imagecreatefrompng($image); break;
                case 'gif': $source = imagecreatefromgif($image); break;
                default:
                    array_push($errors, 'Nur Bilder des Typs .jpg, .jpeg, .png und .gif erlaubt');
                    exit();
            }
            
        // Create thumbnail
        $ratio = imagesx($source) / imagesy($source);
        $height = (int)720 / $ratio;

        $thumbnail = imagecreatetruecolor(720, $height);
        imagecopyresized($thumbnail, $source, 0, 0, 0, 0, 720, $height, imagesx($source), imagesy($source));
    
        // Save the thumbnail to a file
        $filename = $time;
        switch ($file_extension){
        case 'jpg':
        case 'jpeg': 
            imagejpeg($source, $filename.'.'.$file_extension); 
            imagejpeg($thumbnail, $filename.'_thumb.'.$file_extension); 
            break;
        case 'png': 
            imagepng($source, $filename.'.'.$file_extension); 
            imagepng($thumbnail, $filename.'_thumb.'.$file_extension); 
            break;
        case 'gif': 
            imagegif($source, $filename); 
            imagegif($thumbnail, $filename.'_thumb.'.$file_extension); 
            break;
        }
    
        // Clean up
        imagedestroy($source);
        imagedestroy($thumbnail);
        
        $file_path = '/news/'.$filename.$file_extension;
    } else {
        $file_path = NULL;
    }
    
    // Add errythang to da database B)
    $statement = $db->prepare("INSERT INTO news(fk_userid, release_date, article_title, image_path, article_text) VALUES(?, ?, ?, ?, ?)");
    $statement->bind_param('iisss', $_SESSION['userid'], $time, $title, $file_path, $content);

    // Check whether upload successful; if not, delete image files
    if($statement->execute()){
        header('Location: /news.php');
    } else {
        array_push($errors, 'Upload to database failed');
        unlink($filename.'.'.$file_extension);
        unlink($filename.'_thumb.'.$file_extension);
    }
}
?>
