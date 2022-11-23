<!--<pre>
<?php

//print_r($_FILES['image']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_FILES['image'] && empty($_Files['desc']))){
        echo "Keine Datei hinzugefügt!";
        header("Location: FileUpload.php");

    } else {

        $uploadedFile = $_FILES['image']['tmp_name'];
        $ordner = "news/";
        $success = false;
        $allowed = strtolower(pathinfo($_FILES['image']['tmp_name'], PATHINFO_EXTENSION));

// Check if the file is of the accepted file type
        if (isset($_POST["Hochladen"]) && $allowed == "image") {

// Check if the file size is below the maximum limit
            if ($_FILES['image']['size'] <= 15000000) {
                $fileupload = true;
            } else {
                echo "Datei ist zu groß.";
                $fileupload = false;
            }

// Check if the file already exists
            if (is_file($ordner . $_FILES['image']['tmp_name'])) {
                echo "Diese Datei existiert.";
                $fileupload = false;
            }

// If everything is OK, upload the file
            if ($fileupload === true) {

                move_uploaded_file($uploadedFile, $ordner . $_FILES['image']['tmp_  name']);
                $success = true;
            }

            if ($success === true) {
                echo "The File $uploadedFile has been uploaded.";

            } else {
                echo "Sorry, only PDF-files can be accepted!";
            }

        }
    }





}
?>
