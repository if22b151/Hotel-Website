<?php
/* if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '0';
    if(isset($_POST['submit'])){
        echo '1';
        $file = $_FILES['image'];
        
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];
        $fileError = $_FILES['image']['error'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['iamge']['size'];
        
        //Getting the end of the name ('jpeg', 'png',...)
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        
        print_r($fileExt);
        echo '2';
        

        // Check if the file is of the accepted file type
        if((in_array($fileActualExt, $allowed))){
            //Checking if there are errors
            if($fileError === 0) {
                
                
                // resizing image


                // If everything is OK, upload the file
                $fileDestination = '../news'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo 'wtf??';
                header("Location: upload.php?success");
                echo 'wtf??';
            } else {
                echo "There was an error! Try again.";
            }   
        } else {
            echo "You cannot upload this type of file.";  
        }
    }   
} */

// Prevent non-admins from accessing the page
if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']){
    header('Location: /index.php');
    exit();
}

require '../php/scripts/dbaccess.php';

$db = get_db();
$errors = array();

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
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
        
        $file_path = '/news/'.$filename;
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
