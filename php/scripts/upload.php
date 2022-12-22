<pre>
<?php

print_r($_FILES['image']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['submit'])){
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
        

    // Check if the file is of the accepted file type
        if((in_array($fileActualExt, $allowed))){
            //Checking if there are errors
            if($fileError === 0) {


                 // resizing image
                     /*...*/


                // If everything is OK, upload the file
                        $fileDestination = '../news'.$fileName;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        header("Location: upload.php?success");
            } else {
                echo "There was an error! Try again.";
            }   
        } else {
            echo "You cannot upload this type of file.";  
        }


    }  

}
?>
