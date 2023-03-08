<?php
include_once 'uaHeader.php';


?>

<section class="signUp">
    <div class="container">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="toggleBtn1" onclick="signupDonor()">Donor</button>
                <button type="button" id="toggleBtn2" onclick="signupHs()">Help Seeker</button>
                <button type="button" id="toggleBtn3" onclick="signupCharity()">Charity</button>
            </div>

            <div class="text-center error-handlers">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p>Fill in the required fields!</p>";
                    } elseif ($_GET["error"] == "invalidusername") {
                        echo "<p>Choose a proper UserName!</p>";
                    } elseif ($_GET["error"] == "invalidemail") {
                        echo "<p>Choose a proper Email!</p>";
                    } elseif ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p>passwords don't match!</p>";
                    } elseif ($_GET["error"] == "usernametaken") {
                        echo "<p>UserName taken!</p>";
                    } elseif ($_GET["error"] == "emailtaken") {
                        echo "<p>Email taken!</p>";
                    } elseif ($_GET["error"] == "mustbeover18") {
                        echo "<p>You must be over 18 to sign up!</p>";
                    } elseif ($_GET["error"] == "usernamestmtfailed") {
                        echo "<p>Please try again! (UserName statement failed.)</p>";
                    } elseif ($_GET["error"] == "emailstmtfailed") {
                        echo "<p>Please try again! (Email statement failed.)</p>";
                    }
                }
                ?>
            </div>

            <form action="../Includes/hsSignUp.inc.php" method="post" id="signupHs" class="input-group card">
                <!-- <p class="text-center">Help Seeker</p> -->
                <div class="darkBorder">
                    <div class="input-div text-center">
                        <input type="text" class="input-field text-center" name="hsFirstName" placeholder="First Name" pattern="[A-Za-z]{3,}" title="Only letters are allowed" />
                        <input type="text" class="input-field text-center" name="hsLastName" placeholder="Last Name"
                            pattern="[A-Za-z]{3,}" title="Only letters are allowed" />
                        <input type="text" class="input-field text-center" name="hsUserName" placeholder="UserName"
                            pattern="[A-Za-z0-9]{5,}" title="Only letters and numbers are allowed"/>
                        <input type="email" class="input-field text-center" name="hsEmail"
                            placeholder="Email (Optional)" />
                        <div class="custom-select">
                            <select name="children" id="" class="select">
                                <option disabled selected>No. of Children</option>
                                <option value="none">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <select name="wives" id="" class="select">
                                <option disabled selected>No. of Partners</option>
                                <option value="none">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <!-- <input type="number" onkeypress='validate(event)' class="input-field text-center"
                            name="children" placeholder="No. of Children" /> -->
                        <input type="number" onkeypress='validate(event)' class="input-field text-center"
                            name="nationalID" placeholder="National ID" />
                        <input type="password" class="input-field text-center" name="hsPwd" placeholder="Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" />
                        <input type="password" class="input-field text-center" name="hsPwdRepeat" placeholder="Repeat Password"
                            minlength="5" maxlength="10" />
                        <!-- <input type="number" onkeypress='validate(event)' class="input-field text-center" name="hsAge"
                            placeholder="Age" /> -->
                        <label class="age-label" for="Age">DoB</label>
                        <input type="date" value="Age" class="input-field text-center age-input" name="hsAge"
                            placeholder="(DoB)" />
                        <input type="text" class="input-field text-center" name="hsJob" placeholder="Job" />
                        <input type="text" onkeypress='validate(event)' class="input-field text-center" name="hsPhone"
                            placeholder="Phone Number" maxlength="11" />
                        <div class="text-center input-div">
                            <p>Gender</p>
                            <input type="radio" id="gender-male" name="hsGender" value="M" />
                            <label for="gender-male">Male</label>
                            <input type="radio" id="gender-female" name="hsGender" value="F" />
                            <label for="gender-female">Female</label>
                        </div>
                        <div class="custom-select">
                            <select name="hsIncome" id="" class="select">
                                <option disabled selected>Income</option>
                                <option value="0-500">From 0 to 500</option>
                                <option value="500-1000">From 500 to 1000</option>
                                <option value="1000-1500">From 1000 to 1500</option>
                                <option value="1500-2000">From 1500 to 2000</option>
                                <option value="2000-2500">From 2000 to 2500</option>
                                <option value="2500-3000">From 2500 to 3000</option>
                                <option value="3000-3500">From 3000 to 3500</option>
                                <option value="3500-4000">From 3500 to 4000</option>
                                <option value="4000-4500">From 4000 to 4500</option>
                                <option value="4500-5000">From 4500 to 5000</option>
                            </select>
                        </div>
                        <!-- <input type="number" onkeypress='validate(event)' class="input-field text-center"
                            name="hsIncome" placeholder="Income" /> -->

                    </div>

                    <div class="input-div text-center">

                        <div class="custom-select">
                            <select class="select" id="hsCity" name="hsCity">
                                <option disabled selected>Select City</option>
                                <option value="Alexandria">Alexandria</option>
                                <option value="Aswan">Aswan</option>
                                <option value="Asyut ">Asyut </option>
                                <option value=" Beheira "> Beheira </option>
                                <option value="Beni Suef">Beni Suef</option>
                                <option value="Cairo ">Cairo</option>
                                <option value=" Dakahlia "> Dakahlia </option>
                                <option value=" Damietta"> Damietta</option>
                                <option value="Faiyum ">Faiyum </option>
                                <option value="Gharbia">Gharbia</option>
                                <option value="Giza ">Giza </option>
                                <option value=" Ismailia "> Ismailia </option>
                                <option value=" Kafr El Sheikh "> Kafr El Sheikh </option>
                                <option value="Luxor ">Luxor </option>
                                <option value=" Matruh "> Matruh </option>
                                <option value=" Minya "> Minya </option>
                                <option value="Monufia ">Monufia </option>
                                <option value="New Valley ">New Valley </option>
                                <option value=" North Sinai"> North Sinai</option>
                                <option value="Port Said">Port Said</option>
                                <option value="Qalyubia ">Qalyubia </option>
                                <option value=" Qena "> Qena </option>
                                <option value=" Red Sea"> Red Sea</option>
                                <option value="Sharqia ">Sharqia </option>
                                <option value="Sohag">Sohag</option>
                                <option value="South Sinai ">South Sinai </option>
                                <option value="Suez">Suez</option>
                            </select>
                        </div>
                        <input type="text" class="input-field text-center" name="hsDistrict" placeholder="District" />
                        <input type="text" class="input-field text-center" name="hsStreet" placeholder="Street" />
                    </div>
                    <div class="text-center">
                        <input type="text" class="input-field text-center" name="hsHealthStatus"
                            placeholder="Health Status (Optional)" />
                        <br>
                        <label for="hsHealthUpload">Upload any relative documents here.</label>
                        <input type="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x=eps"
                            class="file" name="hsHealthUpload" />
                    </div>
                    <div class="input-div">
                        <p class="text-center">Case Description</p>
                        <textarea name="caseDescription" id="" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" name="hsSignupSubmit" class="submit-btn md">Sign Up</button>
                </div>
            </form>



            <form action="../Includes/chSignUp.inc.php" method="post" id="signupCharity" class="input-group card">
                <!-- <p class="">Charity Info</p> -->
                <div class="darkBorder">
                    <div class="input-div text-center">
                        <input type="text" class="input-field text-center" name="chName" placeholder="Charity Name"
                            minlength="5" maxlength="15" pattern="[A-Za-z]{5,}" title="Only letters are allowed" />
                        <input type="text" class="input-field text-center" name="chUserName" placeholder="UserName"
                            minlength="5" maxlength="15" pattern="[A-Za-z0-9]{5,}" title="Only letters and numbers are allowed"/>
                        <input type="email" class="input-field text-center" name="chEmail"
                            placeholder="Email Address" />
                        <input type="password" class="input-field text-center" name="chPwd" placeholder="Password"
                            minlength="5" maxlength="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" />
                        <input type="password" class="input-field text-center" name="chPwdRepeat"
                            placeholder="Reapeat password" minlength="5" maxlength="10" />
                        <input type="text" onkeypress='validate(event)' class="input-field text-center" name="chPhone1"
                            placeholder="1st Phone Number" maxlength="11" />
                        <input type="text" onkeypress='validate(event)' class="input-field text-center" name="chPhone2"
                            placeholder="2nd Phone Number" maxlength="11" />

                    </div>

                    <div class="input-div">
                        <p class="">Address</p>
                        <div class="">
                            <!-- <input type="text" class="input-field text-center" name="chCountry" placeholder="Country" /> -->

                            <select class="select" id="city" name="chCity">
                                <option disabled selected>Select City</option>
                                <option value="Alexandria">Alexandria</option>
                                <option value="Aswan">Aswan</option>
                                <option value="Asyut ">Asyut </option>
                                <option value=" Beheira "> Beheira </option>
                                <option value="Beni Suef">Beni Suef</option>
                                <option value="Cairo ">Cairo</option>
                                <option value=" Dakahlia "> Dakahlia </option>
                                <option value=" Damietta"> Damietta</option>
                                <option value="Faiyum ">Faiyum </option>
                                <option value="Gharbia">Gharbia</option>
                                <option value="Giza ">Giza </option>
                                <option value=" Ismailia "> Ismailia </option>
                                <option value=" Kafr El Sheikh "> Kafr El Sheikh </option>
                                <option value="Luxor ">Luxor </option>
                                <option value=" Matruh "> Matruh </option>
                                <option value=" Minya "> Minya </option>
                                <option value="Monufia ">Monufia </option>
                                <option value="New Valley ">New Valley </option>
                                <option value=" North Sinai"> North Sinai</option>
                                <option value="Port Said">Port Said</option>
                                <option value="Qalyubia ">Qalyubia </option>
                                <option value=" Qena "> Qena </option>
                                <option value=" Red Sea"> Red Sea</option>
                                <option value="Sharqia ">Sharqia </option>
                                <option value="Sohag">Sohag</option>
                                <option value="South Sinai ">South Sinai </option>
                                <option value="Suez">Suez</option>
                            </select>
                            <!-- <input type="text" class="input-field text-center" name="chCity" placeholder="City" /> -->
                            <input type="text" class="input-field text-center" name="chDistrict"
                                placeholder="District" />
                            <input type="text" class="input-field text-center" name="chStreet" placeholder="Street" />
                            <input type="text" class="input-field text-center" name="chBankName"
                                placeholder="Bank Name" />
                        </div>
                        <div class="text-center">
                            <input type="text" onkeypress='validate(event)' class="input-field text-center"
                                style="width:100%" name="IBAN" placeholder="IBAN" minlength="29" maxlength="29" />
                        </div>
                    </div>


                    <button type="submit" name="chSignupSubmit" class="submit-btn">Sign Up</button>
                </div>
            </form>


            <form action="../Includes/dSignUp.inc.php" method="post" id="signupDonor" class="input-group card">
                <!-- <p class="text-center">Donor</p> -->
                <div class="darkBorder">
                    <div class="input-div">
                        <input type="text" class="input-field text-center" name="dFirstName" placeholder="Frist Name"
                            minlength="3" maxlength="10" pattern="[A-Za-z]{3,}" title="Only letters are allowed" />
                        <input type="text" class="input-field text-center" name="dLastName" placeholder="Last Name"
                            minlength="3" maxlength="10" pattern="[A-Za-z]{3,}" title="Only letters are allowed" />
                        <input type="text" class="input-field text-center" name="dUserName" placeholder="UserName"
                            minlength="5" maxlength="10" pattern="[A-Za-z0-9]{5,}" title="Only letters and numbers are allowed"/>
                        <input type="email" class="input-field text-center" name="dEmail" placeholder="Email Address" />

                        <input type="password" class="input-field text-center" name="dPwd" placeholder="Password"
                            minlength="5" maxlength="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" />
                        <input type="password" class="input-field text-center" name="dPwdRepeat"
                            placeholder="Reapeat password" minlength="5" maxlength="10" />

                        <input type="text" onkeypress='validate(event)' class="input-field text-center" name="dPhone"
                            placeholder="Phone Number" maxlength="15" />

                        <label class="age-label" for="Age">DoB</label>
                        <input type="date" value="Age" class="input-field text-center age-input" name="dAge"
                            placeholder="(DoB)" />
                    </div>
                    <div class="text-center input-div">
                        <p>Gender</p>
                        <input type="radio" id="gender-male" name="dGender" value="M" />
                        <label for="gender-male">Male</label>
                        <input type="radio" id="gender-female" name="dGender" value="F" />
                        <label for="gender-female">Female</label>
                    </div>
                    <div class="input-div">
                        <!-- <p class="">Address</p> -->
                        <div class="text-center">
                            <p class="">Country</p>
                            <div class="custom-select">
                                <select class="select" id="country" name="dCountry">
                                    <option disabled selected>Select Country</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <input type="text" class="input-field text-center" name="dCity" placeholder="City" />

                            <input type="text" class="input-field text-center" name="dDistrict"
                                placeholder="District" />

                            <input type="text" class="input-field text-center" name="dStreet" placeholder="Street" />
                        </div>
                    </div>
                    <button type="submit" name="dSignupSubmit" class="submit-btn">Sign Up</button>
                </div>
            </form>


        </div>



    </div>
</section>



<?php
include_once 'uaFooter.php'
?>