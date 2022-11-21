<pre>
<?php
print_r($_POST);
print_r($_FILES);

$file = $_FILES['upload'];

// Check if file already exists
if (file_exists($file)) {
    echo "Sorry, file already exists.";
} else {
    move_uploaded_file($file['tmp_name'],'news/');
}

//only pictures
// Allow certain file formats
if($file != "jpg" && $file != "png" && $file != "jpeg" && $file != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

}

//validierung
$uploadDir = "../news";

if (!opendir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["upload"])) {
    $uploadFile = $uploadDir;
    $uploadFile = $_FILES["upload"]["name"];
    move_uploaded_file($_FILES["upload"]["tmp_name"], $uploadFile);
}


//move_uploaded_file($file['tmp_name'],'directory/'.$file['name']);
move_uploaded_file($file['tmp_name'],'news/');


?>