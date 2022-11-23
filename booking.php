<?php
  session_start();
  require 'php/scripts/booking_logic.php';
?>

<?php
  ini_set('error_reporting', E_ALL);
  ini_set( 'display_errors', 1 );
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/88b4eddc80.js" crossorigin="anonymous"></script>

    <title>Booking</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
  <div class="container-navbar-content d-flex flex-column justify-content-between">

    <?php include 'php/navbar.php' ?>
    
    <div class="flex-container black_background">
    <div class="container site_content py-2 pb-4">
      <h1>Booking</h1>

      <?php if(!isset($_SESSION['id'])): ?>


        <!-- Login Aufforderung -->
        <div class="alert alert-warning my-3" role="alert">
          Bitte <a href="signup.php">registrieren Sie sich</a> und <a href="login.php">loggen Sie sich ein</a>, bevor Sie eine Buchung tätigen. 
        </div>


        <!-- Zimmer Vorhschau -->
        <div id="carouselRoomPreview" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselRoomPreview" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselRoomPreview" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselRoomPreview" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">

              <!-- Suite -->
              <div class="row room">
                <div class="row">
                  <div class="col-md-4"></div>
                    <div class="col-md-8">
                      <p class="room_title">Suite</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                    <img src="img/black_square.png" class="img-fluid" alt="">
                  </div>
                </div>
                
                <div class="col-md-8 mt-3 mt-md-0 d-flex flex-column justify-content-between">
                  <div class="row">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi </p>
                  </div>

                  <div class="row">
                    <a href="#" class="btn_booking">
                      <div class="btn_booking">
                        <p>200€/Nacht</p>
                      </div>
                    </a>
                  </div>

                </div>
              </div>


            </div>
            <div class="carousel-item">

              <!-- Double Bedroom -->
              <div class="row room">
                <div class="row">
                  <div class="col-md-4"></div>
                    <div class="col-md-8">
                      <p class="room_title">Double Bedroom</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                    <img src="img/black_square.png" class="img-fluid" alt="">
                  </div>
                </div>
                
                <div class="col-md-8 mt-3 mt-md-0 d-flex flex-column justify-content-between">
                  <div class="row">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi </p>
                  </div>

                  <div class="row">
                    <a href="#" class="btn_booking">
                      <div class="btn_booking">
                        <p>120€/Nacht</p>
                      </div>
                    </a>
                  </div>

                </div>
              </div>


            </div>
            <div class="carousel-item">

              <!-- Single Bedroom -->
              <div class="row room">
                <div class="row">
                  <div class="col-md-4"></div>
                    <div class="col-md-8">
                      <p class="room_title">Single Bedroom</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                    <img src="img/black_square.png" class="img-fluid" alt="">
                  </div>
                </div>
                
                <div class="col-md-8 mt-3 mt-md-0 d-flex flex-column justify-content-between">
                  <div class="row">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi </p>
                  </div>

                  <div class="row">
                    <a href="#" class="btn_booking">
                      <div class="btn_booking">
                        <p>80€/Nacht</p>
                      </div>
                    </a>
                  </div>

                </div>
              </div>


            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoomPreview" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselRoomPreview" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        

      <?php else: ?>


        <!-- Current Bookings -->
        <div class="current-bookings">
          <h4 class="mt-3">Aktuelle Buchungen</h3>
          <?php include 'php/current_bookings.php'; ?>
        </div>


        <!-- New Booking -->
        <div class="form-new-booking">
          <h4 class="mt-5">Neue Buchung</h3>


          <!-- Error banner; shows up if anything in $errors array -->
          <div class="alert alert-warning mt-3 <?php echo (empty($errors)) ? 'd-none' : '' ?>" role="alert">
            <?php 
              foreach ($errors as $err){
                print($err . "<br>");
              } 
            ?>
          </div>


          <form action="" method="post">
            <!-- Room -->
            <div class="mb-2">
              <label for="form-label">Zimmer</label>
              <select class="form-select mt-2" name="room" id="room" required>
                <option value="">Bitte auswählen</option>
                <option value="suite" <?php echo ($room == 'suite') ? 'selected' : ''?>>Suite</option>
                <option value="double" <?php echo ($room == 'double') ? 'selected' : ''?>>Doppelzimmer</option>
                <option value="single" <?php echo ($room == 'single') ? 'selected' : ''?>>Einzelzimmer</option>
              </select>

              <div class="mt-2">
                <input class="form-check-input" type="checkbox" name="breakfast" id="breakfast" 
                  <?php echo ($breakfast) ? 'selected' : '' ?> >
                <label class="form-label ms-1" for="breakfast">Frühstück(+10€/Tag)</label>
              </div>
            </div>
            
            <!-- Booking Start Date-->
            <div class="mb-2">
              <label class="form-label col-2" for="begin">Erster Tag</label>
              <span class="text-muted">check-in ab 9 uhr</span>
              <div class="col-12">
                <input class="form-control" type="date" name="date_start" id="date_start"
                  min="<?php echo date('Y-m-d', time()); ?>" value="<?php echo $date_start?>" required>
              </div>
            </div>
            
            <!-- Booking End Date -->
            <div class="">
              <label class="form-label col-2" for="end">Letzter Tag</label>
              <span class="text-muted">check-out bis 12 uhr</span>
              <div class="col-12">
                <input class="form-control" type="date" name="date_end" id="date_end"
                  min="<?php echo date('Y-m-d', time()); ?>" value="<?php echo $date_end?>" required>
              </div>

              <div class="mt-2">
                <input class="form-check-input" type="checkbox" name="late_check_out" id="late_check_out" 
                  <?php echo ($late_check_out) ? 'selected' : '' ?> >
                <label class="form-label ms-1" for="late_check_out">Late check-out bis 15 Uhr</label>
              </div>
            </div>

            <!-- Address -->
            <div class="mb-2">
              <div class="row" role="labels">
                <span class="col-9">
                  <label class="form-label" for="street">Straße</label>
                </span>
                <span class="col-3">
                  <label class="form-label" for="street_nr">Nummer</label>
                </span>
              </div>

              <div class="row" role="input-fields">
                <span class="col-9">
                  <input type="text" class="form-control" name="street" id="street" placeholder="Mustergasse" 
                    value="<?php echo $street ?>" required>
                </span>
                <span class="col-3">
                  <input type="text" class="form-control" id="street_nr" name="street_nr" placeholder="43" 
                  value="<?php echo $street_nr ?>" required>
                </span>
              </div>
            </div>
            
            <!-- City -->
            <div class="mb-2">
              <label class="form-label" for="city">Stadt</label>
              <input class="form-control" type="text" name="city" id="city" placeholder="Musterstadt" 
              value="<?php echo $city ?>" required>
            </div>
            
            <!-- Post Code & Country -->
            <div class="mb-2">
              <div class="row" role="labels">
                <span class="col-4">
                  <label class="form-label" for="plz">PLZ</label>
                </span>
                <span class="col-8">
                  <label class="form-label" for="country">Land</label>
                </span>
              </div>
              <div class="row" role="input-fields">
                <span class="col-4">
                  <input class="form-control" type="number" name="plz" id="plz" placeholder="1090" 
                  value="<?php echo $plz ?>" required>
                </span>
                
                <span class="col-8">
                  <select class="form-select" id="country" name="country" value="Austria" 
                    value="<?php echo $country ?>" required>
                    <option>Bitte auswählen</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Aland Islands">Aland Islands</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curacao">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">French Southern Territories</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                    <option value="Korea, Republic of">Korea, Republic of</option>
                    <option value="Kosovo">Kosovo</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macao">Macao</option>
                    <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Barthelemy">Saint Barthelemy</option>
                    <option value="Saint Helena">Saint Helena</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Martin">Saint Martin</option>
                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Sint Maarten">Sint Maarten</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-Leste">Timor-Leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Viet Nam">Viet Nam</option>
                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                    <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                </span>
              </div>
            </div>
            
            <!-- Phone Number-->
            <div class="mb-2">
              <label class="form-label" for="phone_nr">Telefonnummer</label>
              <input class="form-control" type="tel" name="phone_nr" id="phone_nr" placeholder="+43 664 8081233" 
                value="<?php echo $phone_nr ?>" required>
            </div>
            
            <!-- Checkboxes: Animals, parking -->
            <label class="form-label" for="additional-options">Zusatzoptionen</label>
            <div class="mb-2" name="additional-options">

              <div>
                <input class="form-check-input" type="checkbox" name="parking" id="parking" 
                  <?php echo ($parking) ? 'selected' : '' ?> >
                <label class="form-label" for="parking">Parkplatz (+5€/Tag)</label>
              </div>

              <div>
                <input class="form-check-input" type="checkbox" name="animals" id="animals" 
                  <?php echo ($animals) ? 'selected' : '' ?> >
                <label class="form-label" for="animals">Tiere (bis zu 3 Haustiere)</label>
              </div>
            </div>

            <!-- Submit -->
            <div class="">
              <input class="btn btn-secondary" type="submit" value="Buchung tätigen">
            </div>
          </form>
        </div>


      <?php endif; ?>
    </div>
    </div>
    
  </div>

  <?php include 'php/footer.php' ?>
  
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>