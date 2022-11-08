<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>FAQ</title>

    <style>
    html{ background-color: white; }
    </style>
</head>
<body>
  <!-- Navbar -->
  <?php include 'php/navbar.php' ?>

  <div class="Header">
    <h1>FAQ</h1>
  </div>
    <!--Accordion-->
    <div class="accordion" id="accordionExample">
      <!--Erstes Accordion-->
      <div class="col-md-7">
        <div class="accordion-item">
          <h2 class="accordion-header" id="RegistrierungFAQ">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Wie registriere ich mich?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p>Auf der Startseite, klicken Sie oben Links auf den Knopf "Profil".<br>
                    Geben Sie nun Ihre E-Mail-Addresse in das Feld "E-MAIL-HIER-ANGEBEN" ein und klicken sie auf den rot blinkenden Knopf "EINLOGGEN ODER REGISTRIEREN" darunter. Nun folgen Sie den weiteren Anweisungen auf dem Formular.<br>
                    Ihnen wird eine Bestätigungs E-Mail zugesandt um zu verischern, dass alles geklappt hat! 
                </p>
            </div>
          </div>
        </div>
    <!--Erstes Accordion Ende -->

    <!--Zweites Accordion-->
    <div class="accordion-item">
        <h2 class="accordion-header" id="ZahlungsmethodeFAQ">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Welche Zahlungsmethoden werden angenommen?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Aus technischen Gründen unterstützen wir momentan leider lediglich Bargeldzahlungen an der Rezeption beim Check-In. Wir empfehlen am Weg zum Hotel einen aufmerksamen Blick auf ihre Umgebung zu bewahren - unsere Bargeldlastigkeit ist in der Gegend leider bekannt.</p>
          </div>
        </div>
      </div>
    <!--Zweites Accordion Ende-->

    <!--Drittes Accordion-->
    <div class="accordion-item">
        <h2 class="accordion-header" id="Passwort_vergessenFAQ">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Ich habe mein Passwort vergessen.
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Versuchen Sie sich anzumelden und klicken, nach Aufforderung nach dem Passwort, auf den Knopf "Passwort vergessen".<br>
                Überprüfen Sie nun Ihr Postfach (auch den Spam-Ordner!) und klicken Sie auf "Passwort zurücksetzen".<br>
            Folgen Sie nun den weiteren Anweisungen.</p>
          </div>
       </div>
      </div>
    <!--Drittes Accordion Ende-->

    <!--Viertes Accordion-->
    <div class="accordion-item">
      <h2 class="accordion-header" id="RegistrierungbearbeitenFAQ">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Wie kann ich meine Reservierung bearbeiten?
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p>Klicken Sie hierfür auf der Startseite oben Links auf den Knopf "Profil". Wählen Sie anschließend das Untermenü "Reservierungen" an.<br>
            Hier sehen Sie all Ihre Reverierungen und können diese über das Menü "bearbeiten" bearbeiten!</p>
        </div>
     </div>
    </div>
    <!--Viertes Accordion Ende-->

  </div> 
</div>
    <!--Accordion Ende-->

  <!-- Footer -->
  <?php include 'php/footer.php' ?>

  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
