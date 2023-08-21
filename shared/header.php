 <!--NavBar
TODO: NAV LINKS & Background
navbar bg-body-tertiary fixed-top-->
 <nav id="nav-bar" class="navbar bg-body-tertiary fixed-top bg-light px-lg-3 py-lg-2 shadow-none sticky-top rounded">
   <div class="container-fluid bg-white">
     <a class="navbar-brand"><img src="images/logo/main.jpeg" width="250" height="100" /></a>
     <div class="d-flex">
       <!-- <button class="btn btn-outline-success shadow me-4 btn-md">Reserve</button> -->
       <!-- <button class="btn btn-outline-dark shadow-none me-0 btn-md" data-bs-toggle="modal" data-bs-target="#loginModal">
         Login
       </button>
       <button class="btn btn-outline-secondary shadown-none me-0 btn-md" data-bs-toggle="modal" data-bs-target="#signupModal">
         Signup
       </button> -->
       <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
          echo <<<data
            <div class="btn-group">
            <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              $_SESSION[uName]
              </button>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </div>
            data;
        } else {
          echo <<<data
            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
              Login
            </button>
            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#signupModal">
              Register
            </button>
            data;
        }
        ?>
       <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
     </div>
     <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
       <div class="offcanvas-header">
         <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
       </div>
       <div class="offcanvas-body">
         <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
           <li class="nav-item">
             <a class="nav-link" aria-current="page" href="index.php">Home</a>
           </li>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
               Rooms & Suites
             </a>
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="room_details.php?id=1">King Room</a></li>
               <li><a class="dropdown-item" href="room_details.php?id=9">Deluxe Double Room + Balcony</a></li>
               <li><a class="dropdown-item" href="room_details.php?id=10">Deluxe Double Room</a></li>
               <li><a class="dropdown-item" href="room_details.php?id=8">Family Double Room</a></li>
               <li><a class="dropdown-item" href="room_details.php?id=7">Budget Double Room</a></li>
               <li><a class="dropdown-item" href="rooms.php">View All</a></li>
           </li>
         </ul>
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="activity.php">Activities</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="facilities.php">Facilities</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="client_reviews.php">Client Reviews</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
         </li>

       </div>
     </div>
   </div>
 </nav>

 <!--LoginModal
TODO: still needs work-->
 <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form id="login-form">
         <div class="modal-header">
           <h5 class="modal-title d-flex align-items-center">
             <iconify-icon icon="line-md:account-small" width="40" height="40"></iconify-icon> Login
           </h5>
           <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <div id="alert-container"></div>
           <div class="mb-3">
             <label class="form-label">Email address</label>
             <input type="text" name="email_mob" class="form-control shadow-none">
           </div>
           <div class="mb-3">
             <label class="form-label">Password</label>
             <input type="password" name="password" class="form-control shadow-none">
           </div>
           <div class="d-flex align-items-center justify-content-between mb-2">
             <button type="submit" class="btn btn-success shadow-none">LOGIN
               <iconify-icon icon="ion:create-outline" width="20" height="20"></iconify-icon>
             </button>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>

 <!--SignupModal
TODO: still needs work-->
 <div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <form id="signup-form">
         <div class="modal-header">
           <h5 class="modal-title d-flex align-items-center">
             <iconify-icon icon="line-md:account-add" width="40" height="40"></iconify-icon> CREATE A NEW ACCOUNT
           </h5>
           <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <div id="alert-container-new"></div>
           <div class="container-fluid">
             <div class="row">
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Full Name
                 </label>
                 <input type="text" name="name" class="form-control shadow" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Username
                 </label>
                 <input type="text" name="username" class="form-control shadow" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Email
                 </label>
                 <input type="email" name="email" class="form-control shadow" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Password
                 </label>
                 <input type="password" name="password" class="form-control shadow" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Confirm Password
                 </label>
                 <input type="password" name="cpassword" class="form-control shadow" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Date of Birth
                 </label>
                 <input type="date" name="dob" class="form-control shadow" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">
                   Country
                 </label>
                 <!-- Country names and Country Name -->
                 <select class="form-select" name="country" id="country">
                   <option value="">country</option>
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
               </div>
               <div class="col-md-6 p-0 mb-3">
                 <label class="form-label">
                   Phone Number
                 </label>
                 <input type="text" name="phone" class="form-control shadow" required>
               </div>

               <div class="col-md-12 p-0 mb-3">
                 <label class="form-label"></label>
                 <div class="terms-container">
                 <h2><strong>Terms and Conditions</strong></h2>
                  <p>Welcome to MamboCabana!</p>
                  <p>These terms and conditions outline the rules and regulations for the use of Mambo Cabana's Website, located at MamboCabana.</p>
                  <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use MamboCabana if you do not agree to take all of the terms and conditions stated on this page.</p>
                  <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company's terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client's needs in respect of provision of the Company's stated services, in accordance with and subject to, prevailing law of af. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
                  <h3><strong>Cookies</strong></h3>

                  <p>We employ the use of cookies. By accessing MamboCabana, you agreed to use cookies in agreement with the Mambo Cabana's Privacy Policy. </p>

                  <p>Most interactive websites use cookies to let us retrieve the user's details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>

                  <h3><strong>License</strong></h3>

                  <p>Unless otherwise stated, Mambo Cabana and/or its licensors own the intellectual property rights for all material on MamboCabana. All intellectual property rights are reserved. You may access this from MamboCabana for your own personal use subjected to restrictions set in these terms and conditions.</p>

                  <p>You must not:</p>
                  <ul>
                      <li>Republish material from MamboCabana</li>
                      <li>Sell, rent or sub-license material from MamboCabana</li>
                      <li>Reproduce, duplicate or copy material from MamboCabana</li>
                      <li>Redistribute content from MamboCabana</li>
                  </ul>

                  <p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href="https://www.termsandconditionsgenerator.com/">Free Terms and Conditions Generator</a>.</p>

                  <p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Mambo Cabana does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Mambo Cabana,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Mambo Cabana shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>

                  <p>Mambo Cabana reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

                  <p>You warrant and represent that:</p>

                  <ul>
                      <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
                      <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
                      <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
                      <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
                  </ul>

                  <p>You hereby grant Mambo Cabana a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>

                  <h3><strong>Hyperlinking to our Content</strong></h3>

                  <p>The following organizations may link to our Website without prior written approval:</p>

                  <ul>
                      <li>Government agencies;</li>
                      <li>Search engines;</li>
                      <li>News organizations;</li>
                      <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
                      <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
                  </ul>

                  <p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party's site.</p>

                  <p>We may consider and approve other link requests from the following types of organizations:</p>

                  <ul>
                      <li>commonly-known consumer and/or business information sources;</li>
                      <li>dot.com community sites;</li>
                      <li>associations or other groups representing charities;</li>
                      <li>online directory distributors;</li>
                      <li>internet portals;</li>
                      <li>accounting, law and consulting firms; and</li>
                      <li>educational institutions and trade associations.</li>
                  </ul>

                  <p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Mambo Cabana; and (d) the link is in the context of general resource information.</p>

                  <p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party's site.</p>

                  <p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Mambo Cabana. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

                  <p>Approved organizations may hyperlink to our Website as follows:</p>

                  <ul>
                      <li>By use of our corporate name; or</li>
                      <li>By use of the uniform resource locator being linked to; or</li>
                      <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party's site.</li>
                  </ul>

                  <p>No use of Mambo Cabana's logo or other artwork will be allowed for linking absent a trademark license agreement.</p>

                  <h3><strong>iFrames</strong></h3>

                  <p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>

                  <h3><strong>Content Liability</strong></h3>

                  <p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>

                  <h3><strong>Reservation of Rights</strong></h3>

                  <p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it's linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>

                  <h3><strong>Removal of links from our website</strong></h3>

                  <p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

                  <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>

                  <h3><strong>Disclaimer</strong></h3>

                  <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
                  <ul>
                      <li>limit or exclude our or your liability for death or personal injury;</li>
                      <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                      <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                      <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
                  </ul>
                  <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
                  <p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
                 </div>
                 <br>
                 <label class="form-label">
                   <input type="checkbox" id="termsCheckbox" required>
                   I agree to the Terms & Conditions
                 </label>
               </div>

             </div>
           </div>
           <div class="text-center mb-3">
             <button type="submit" class="btn btn-success shadow-none">REGISTER
               <iconify-icon icon="ion:create-outline" width="20" height="20"></iconify-icon>
             </button>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>