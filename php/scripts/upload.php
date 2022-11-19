<pre>
<?php
print_r($_POST);
print_r($_FILES);

$file = $_FILES['upload'];

// Check if file already exists
if (file_exists($file)) {
    echo "Sorry, file already exists.";
}

//only pictures
// Allow certain file formats
if($file != "jpg" && $file != "png" && $file != "jpeg" && $file != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

}

//validierung

//move_uploaded_file($file['tmp_name'],'directory/'.$file['name']);
move_uploaded_file($file['tmp_name'],'news/');


?>