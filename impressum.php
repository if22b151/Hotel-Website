<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Impressum</title>

    <style>
    html{ background-color: white; }
    </style>

    <script src="https://kit.fontawesome.com/88b4eddc80.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>

    <div class="Header">
        <h1>Impressum</h1>
    </div>
    <div class="OverallContainer">
    <div class="ContainerImp">
        <div class="TableContainer">
        <table>
            <tr>
                <td>Name</td>
                <td>Hotel Mustermann</td>
            </tr>
            <tr>
                <td>Inhaber</td>
                <td>Andretsch Adrian <br> Paul Felgitsch</td>
            </tr>
            <tr>
                <td>Firmenart</td>
                <td>Hotellerie</td>
            </tr>
            <tr>
                <td>Anschrift</td>
                <td>Mustestraße 9, 1220 Wien</td>
            </tr>
            <tr>
                <td>Tel. Nr.</td>
                <td>0660 7048700</td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>admin@hotel-mustermann.at</td>
            </tr>
            <tr>
                <td>Privacy</td>
                <td><a href="/datenschutz.html">Siehe Datenschutzerklärung</a></td>
            </tr>
        </table>
    </div>
   
    
        <div class="Rowpictures">
            <div class="Fotos">
            <div class="mx-auto" style="width: 110px;">
                <img src="img/paul.jpeg" class="img-fluid" alt="Paul Felgitsch">
                Paul Felgitsch
            </div>
        </div>
            <div class="Fotos">
                <div class="mx-auto" style="width: 125px;">
                <img src="img/adrian.jpg" class="img-fluid" alt="Adrian Andretsch">
                Adrian Andretsch
                </div>
            </div>
        </div>
    </div>
</div>

   
    <!-- Footer -->
    <?php include 'php/footer.php' ?>

    
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
