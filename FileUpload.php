<?php
//echo'<pre>';
$directoryHandler = opendir("news/");
$uploadDifi = [];
while($file=readdir($directoryHandler)){
    $uploadDifi[]=$file;
}

/* $uploadDifiglob = glob('uploads/*.*')*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>FileUpload</title>
    <style>
        .black_background{
            background-image: url('img/background.jpg');
        }
    </style>
</head>

<body>

    <?php include 'php/navbar.php' ?>

        <div class="flex-container black_background">
        <div class="container pt-3 pb-4 px-3 site_content">

     <h1>File Upload</h1>
        <form enctype="multipart/form-data" method="post" action="php/scripts/upload.php">
            <div>
                <label for="desc">Beschreibung</label>
                <input class="form-control" type="text" id="desc" name="desc">
            </div>
            <div>
                <label for="upload">Upload</label>
                <input class="form-control" type="file" id="upload" name="upload">
            </div>

            <div>
                <input class="btn btn-success" type="submit" value="Hochladen">
            </div>
        </form>
    </div>
    </div>

    <?php include 'php/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
