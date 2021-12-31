@extends('backend.layout.app')

@section('title') Kyc Application @endsection

@section('css')

<style>

.form-step-head {
    border-top: 1px solid #e9ebee;
    border-bottom: 1px solid #e9ebee;
}

.step-head {
    display: flex;
    align-items: center;
}

.card-innr {
    position: relative;
    padding: 15px 18px;
    border-color: #e6effb !important;
}

.step-number {
    flex-shrink: 0;
    height: 48px;
    width: 48px;
    font-size: 16px;
    color: #83898f;
    border: 2px solid #b1becc;
    text-align: center;
    line-height: 45px;
    border-radius: 50%;
    margin-right: 12px;
    margin-top: 4px;
    margin-bottom: 4px;
}

.form-step.form-step1 .form-step-fields {
    padding-bottom: 10px;
}

.form-step .note-plane {
    margin-bottom: 10px;
}

.pdb-1x {
    padding-bottom: 10px;
}

.note-plane {
    padding: 0 0 0 18px;
    background: transparent !important;
}

.note {
    padding: 15px 15px 15px 45px;
    border-radius: 4px;
    position: relative;
    line-height: 1.4;
}

.input-item {
    position: relative;
    padding-bottom: 20px;
}

.input-item-label {
    font-size: 14px;
    font-weight: 500;
    color: #505258;
    line-height: 1.1;
    margin-bottom: 12px;
    display: inline-block;
}

.input-bordered form-control {
    border-radius: 4px;
    border: 1px solid #d2dde9;
    width: 100%;
    padding: 10px 15px;
    line-height: 20px;
    font-size: .9em;
    color: rgba(80,82,88,0.7);
    transition: all .4s;
}

.input-wrap {
    position: relative;
}

.guttar-vr-10px {
    margin-top: -5px !important;
    margin-bottom: -5px !important;
}

.document-list {
    display: flex;
    flex-wrap: wrap;
    padding-bottom: 20px;
}


.document-item {
    padding-left: 10px;
    padding-right: 10px;
}
.document-type {
    position: absolute;
    opacity: 0;
    height: 1px;
    width: 1px;
}

.document-type ~ label {
    position: relative;
    display: block;
    border: 2px solid #e6effb;
    border-radius: 4px;
    color: #83898f;
    padding: 8px 42px 8px 14px;
    font-size: 11px;
    transition: all .4s;
    display: flex;
    align-items: center;
    cursor: pointer;
    margin-bottom: 0;
}

.document-type-icon {
    width: 40px;
}

.document-type-icon img {
    min-width: 100%;
    transition: all .4s;
}

.document-type-icon img:last-child:not(:first-child) {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.document-type ~ label span {
    padding-left: 15px;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 0.05em;
    transition: all .4s;
}

.document-type ~ label:after {
    position: absolute;
    right: 14px;
    top: 50%;
    height: 20px;
    width: 20px;
    line-height: 20px;
    font-size: 9px;
    border-radius: 50%;
    transform: translateY(-50%);
    font-family: 'Font Awesome';
    content: '\f00c';
    font-weight: 700;
    color: #fff;
    background: #ff812d;
    text-align: center;
    opacity: 0;
}

.kyc-upload-title {

    margin-top: 10px;
    margin-bottom: 10px;
    font-weight: bold; 
}

.kyc-upload-list li{

    color: #505258;
    position: relative;
    padding-left: 20px;
    line-height: 2;

}

.upload-zone {
    border: 1px dashed #b1becc;
    background: #e9ebee;
    border-radius: 4px;
    padding: 25px 0 20px;
    text-align: center;
}

.dz-message {
    padding-bottom: 15px;
}




</style>    
    
@endsection
    
@section('content')

<div class="row  justify-content-center">

    <div class="col-sm-12">
        <div class="card">
           <div class="card-body">

            <div class="form-step form-step1">
                <div class="form-step-head card-innr">
                    <div class="step-head">
                        <div class="step-number">01</div>
                        <div class="step-head-text">
                        <h4>Personal Details<h4>
                        <p>Your basic personal information is required for identification purposes.</p>
                        </div>
                        <hr>
                 </div>

                 <div class="form-step-fields card-innr">

                    <div class="note note-plane note-light-alt note-md pdb-1x">
                        
                        <p><em class="fa fa-info-circle"></em> Please type carefully and fill out the form with your personal details. You are not allowed to edit the details once you have submitted the application.</p>
                    </div>

             <div class="row">
                        <div class="col-md-6">
                         <div class="input-item input-with-label">
                    <label for="first-name" class="input-item-label">Name  <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control form-control" type="text" value="" id="first-name" name="first_name" aria-required="true">
                    </div>
                </div>
            </div>
                
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="email" class="input-item-label">Email <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control form-control" value="" type="text" id="email" name="email" aria-required="true">
                    </div>
                </div>
            </div>
                        
            
                        <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="phone-number" class="input-item-label">Phone Number </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control form-control" type="text" value="" id="phone-number" name="phone">
                    </div>
                </div>
            </div>
                                    <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="date-of-birth" class="input-item-label">Date of Birth </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control form-control date-picker-dob" type="text" value="" id="date-of-birth" name="dob">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="gender" class="input-item-label">Gender <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <select required="" class="select-bordered select-block select2-hidden-accessible form-control" name="gender" id="gender" tabindex="-1" aria-hidden="true" aria-required="true">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        
                    </div>
                </div>
            </div>
            
                <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="telegram" class="input-item-label">Telegram Username  </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control form-control" type="text" value="" id="telegram" name="telegram">
                    </div>
                     </div>
                </div>

          </div>

                    <h4 class="text-secondary mt-5">Your Address</h4>


                    <div class="row">
                        <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="country" class="input-item-label">Country <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <select required="" class="select-bordered select-block select2-hidden-accessible form-control" name="country" id="country" data-dd-class="search-on" tabindex="-1" aria-hidden="true" aria-required="true">
                            <option value="">Select Country</option>
                                                        <option value="Afghanistan">Afghanistan</option>
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
                                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
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
                                                        <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                                        <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                        <option value="Cuba">Cuba</option>
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
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="France Metropolitan">France Metropolitan</option>
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
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
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
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="St. Helena">St. Helena</option>
                                                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
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
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Yugoslavia">Yugoslavia</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                    
            
                    
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="state" class="input-item-label">State <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-borderd form-control" type="text" value="" id="state" name="state" aria-required="true">
                    </div>
                </div>
            </div>
                 
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="city" class="input-item-label">City <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control" type="text" value="" id="city" name="city" aria-required="true">
                    </div>
                </div>
            </div>
              
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="zip" class="input-item-label">Zip / Postal Code <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control" type="text" value="" id="zip" name="zip" aria-required="true">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="address_1" class="input-item-label">Address Line 1 <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control" type="text" value="" id="address_1" name="address1" aria-required="true">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="address_2" class="input-item-label">Address Line 2 </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control" type="text" value="" id="address_2" name="address2">
                    </div>
                </div>
            </div>
                    </div>


                 </div>

                </div>
            </div> 


            <!---------------- step2 ----------------------------------------------->





            <div class="form-step form-step2">
                <div class="form-step-head card-innr">
                    <div class="step-head">
                        <div class="step-number">02</div>
                        <div class="step-head-text">
                            <h4>Document Upload</h4>
                            <p>To verify your identity, we ask you to upload high-quality scans or photos of your official identification documents issued by the government.</p>
                        </div>
                    </div>
                </div>


                <?php 
                $old_doc_type = old('document_type');
                $active_tab = '';
                if(!isset($old_doc_type) && !isset($kyc)){
                    $active_tab = 'passport';
                }
                ?>
                <div class="from-step-content">
                    <div class="note note-md note-info note-plane">
                        
                        <p> <em class="fa fa-info-circle"></em> {{ ('Please upload any one of the following personal document (image or pdf file only).') }}</p>
                        @if($errors->has('document_type'))
                            <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_type')) }}</small></span>
                        @endif
                    </div>
                    <div class="gaps-2x"></div>
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist" id="document_tab">
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($old_doc_type)){ if($old_doc_type=='passport'){  echo 'show active'; }else{ echo ''; } }else{ if(isset($kyc) && !empty($kyc) && $kyc->document_type=='passport'){ echo 'active'; }else{ echo ''; } } if($active_tab=='passport'){ echo 'active'; }?>" data-toggle="tab" href="#passport" data-id="passport" >
                                <div class="nav-tabs-icon">
                                    <img src="{{ asset('images/icon-passport.png') }}" alt="icon">
                                    <img src="{{ asset('images/icon-passport-color.png') }}" alt="icon">
                                </div>
                                <span>{{ ('Passport') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($old_doc_type)){ if($old_doc_type=='national-card'){  echo 'show active'; }else{ echo ''; } }else{ if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card'){ echo 'active'; }else{ echo ''; } }?>" data-toggle="tab" href="#national-card" data-id="national-card">
                                <div class="nav-tabs-icon">
                                    <img src="{{  asset('images/icon-national-id.png') }}" alt="icon">
                                    <img src="{{  asset('images/icon-national-id-color.png') }}" alt="icon">
                                </div>
                                <span>{{ ('National Card') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($old_doc_type)){ if($old_doc_type=='driver-licence'){  echo 'show active'; }else{ echo ''; } }else{ if(isset($kyc) && !empty($kyc) && $kyc->document_type=='driver-licence'){ echo 'active'; }else{ echo ''; } }?>" data-toggle="tab" href="#driver-licence" data-id="driver-licence">
                                <div class="nav-tabs-icon">
                                    <img src="{{ asset('images/icon-license.png') }}" alt="icon">
                                    <img src="{{ asset('images/icon-license-color.png') }}" alt="icon">
                                </div>
                                <span>{{ ('Driver’s License') }}</span>
                            </a>
                        </li>
                    </ul><!-- .nav-tabs-line -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade <?php if(isset($old_doc_type)){ if($old_doc_type=='passport'){  echo 'show active'; }else{ echo ''; } }else{ if(isset($kyc) && !empty($kyc) && $kyc->document_type=='passport'){ echo 'show active'; }else{ echo ''; } } if($active_tab=='passport'){ echo 'show active'; }?>" id="passport">
                            <h5 class="kyc-upload-title">{{ ('To avoid delays when verifying account, please check below criteria') }}:</h5>
                            <ul class="kyc-upload-list">
                                <li>{{ ('Chosen credential must not be expired.') }}</li>
                                <li>{{ ('Document should be good condition and clearly visible.') }}</li>
                                <li>{{ ('Make sure that there is no light glare on the card.') }}</li>
                            </ul>
                            <div class="gaps-4x"></div>
                            <span class="upload-title" style="color:#F44336;">{{ ('Upload Here Your Passport Copy') }}</span>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="upload-box">
                                        <div class="upload-zone">
                                            <div class="dz-message" data-dz-message>
                                                <span class="dz-message-text">{{ ('Drag and drop file') }}</span>
                                                <span class="dz-message-or">{{ ('or') }}</span>
                                                <button class="btn btn-primary" type="button">{{ ('SELECT') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('document_id_passport'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_id_passport')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_id_passport'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_id_passport')); ?>');">{{ ('View') }}</button>
                                        
                                        
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='passport' && $kyc->document_upload_id > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_upload_id); ?>');">{{ ('View') }}</button>
                                        
                                        <!--<image src="{{ asset('kycdoc/$kyc->name') }}" width="200px" height="200px" alt="s">-->
                                        
                                        <?php
                                        }else{ 
                                        ?>
                                            <img src="{{ asset('images/passport.png') }}" alt="passport">
                                        <?php 
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="gaps-1x"></div>
                        </div>
                        <div class=" mb-5 tab-pane fade <?php if(isset($old_doc_type)){ if($old_doc_type=='national-card'){  echo 'show active'; }else{ echo ''; } }else{ if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card'){ echo 'show active'; }else{ echo ''; } }?>" id="national-card">
                            <p class="kyc-upload-title  ">{{ ('To avoid delays when verifying account, Please make sure below') }}:</p>
                            <ul class="kyc-upload-list">
                                <li>{{ ('Chosen credential must not be expired.') }}</li>
                                <li>{{ ('Document should be good condition and clearly visible.') }}</li>
                                <li>{{ ('Make sure that there is no light glare on the card.') }}</li>
                            </ul>
                            <div class="gaps-4x"></div>
                            <span class="upload-title" style="color:#F44336;">{{ ('Upload Here Your National ID Front Side') }}</span>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="upload-box">
                                        <div class="upload-zone" id="frontside">
                                            <div class="dz-message" data-dz-message>
                                                <span class="dz-message-text">{{ ('Drag and drop file') }}</span>
                                                <span class="dz-message-or">{{ ('or') }}</span>
                                                <button class="btn btn-primary" type="button">{{ ('SELECT') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('document_id_national-card_1'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_id_national-card_1')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_id_national-card_1'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_id_national-card_1')); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card' && $kyc->document_upload_id > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_upload_id); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else{ 
                                        ?>
                                            <img src="{{ asset('images/nationality_front.png') }}" alt="nationality">
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="gaps-3x"></div>
                            <span class="upload-title" style="color:#F44336;">{{ ('Upload Here Your National ID Back Side') }}</span>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="upload-box">
                                        <div class="upload-zone" id="backside">
                                            <div class="dz-message" data-dz-message>
                                                <span class="dz-message-text">{{ ('Drag and drop file') }}</span>
                                                <span class="dz-message-or">{{ ('or') }}</span>
                                                <button class="btn btn-primary" type="button">{{ ('SELECT') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('document_id_national-card_2'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_id_national-card_2')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_id_national-card_2'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_id_national-card_2')); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card' && $kyc->document_upload_id_2 > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_upload_id_2); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else{ 
                                        ?>
                                            <img src="{{ asset('images/nationality_front.png') }}" alt="nationality">
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="gaps-1x"></div>
                        </div>
                        <div class="tab-pane fade <?php if(isset($old_doc_type)){ if($old_doc_type=='driver-licence'){  echo 'show active'; }else{ echo ''; } }else{ if(isset($kyc) && !empty($kyc) && $kyc->document_type=='driver-licence'){ echo 'show active'; }else{ echo ''; } }?>" id="driver-licence">
                            <h5 class="kyc-upload-title">{{ ('To avoid delays when verifying account, Please make sure bellow') }}:</h5>
                            <ul class="kyc-upload-list">
                                <li>{{ ('Chosen credential must not be expired.') }}</li>
                                <li>{{ ('Document should be good condition and clearly visible.') }}</li>
                                <li>{{ ('Make sure that there is no light glare on the card.') }}</li>
                            </ul>
                            <div class="gaps-4x"></div>
                            <span class="upload-title" style="color: #F44336">Upload Here Your Driver's License Copy</span>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="upload-box">
                                        <div class="upload-zone">
                                            <div class="dz-message" data-dz-message>
                                                <span class="dz-message-text">{{ ('Drag and drop file') }}</span>
                                                <span class="dz-message-or">{{ ('or') }}</span>
                                                <button class="btn btn-primary" type="button">{{ ('SELECT') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('document_id_driver-licence'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_id_driver-licence')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_id_driver-licence'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_id_driver-licence')); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='driver-licence' && $kyc->document_upload_id > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_upload_id); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else{ 
                                        ?>
                                            <img src="{{ asset('images/driving_lic.png') }}" alt="driving lic">
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="gaps-1x"></div>
                        </div>
                    </div>
                    <div class="gaps-2x"></div>
                      <div class="input-item text-left">
                            
                            <input type="checkbox" name="aggrement" id="aggrement" class="input-checkbox" value="1">
                            <label for="aggrement" style="font-weight: 600; color:#2196F3">
                                {{ ('I confirm that I have read, understood and agreed to the') }} 
                                <a href="#" style="color: #F44336;" target="_blank">{{ ('Privacy Policy') }}</a> {{ ('and') }}
                                 <a href="#" target="_blank" style="color: #F44336;">{{ ('Terms & Conditions') }}</a>
                                </label>
                      </div>
                       @if($errors->has('aggrement'))
                      <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('aggrement')) }}</small></span>
                      <div style="clear:both;"></div>
                      @endif
                        <div class="gaps-1x"></div>
                        <input name="document_type" type="hidden" id="document_type" value="<?php if(isset($old_doc_type)){ if(!empty($old_doc_type)){  echo $old_doc_type; }else{ echo $active_tab; } }else{ if(isset($kyc) && !empty($kyc)){ echo $kyc->document_type; }else{ echo $active_tab; } } ?>">
                        
                        <input name="document_id_passport" type="hidden" id="document_id_passport" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='passport'){ echo $kyc->document_upload_id; }else{ if(!empty(old('document_id_passport'))){ echo old('document_id_passport'); }else{ echo 0; } } ?>">
                        <input name="document_id_national-card_1" type="hidden" id="document_id_national-card_1" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card'){ echo $kyc->document_upload_id; }else{ if(!empty(old('document_id_national-card_1'))){ echo old('document_id_national-card_1'); }else{ echo 0; } } ?>">
                        <input name="document_id_national-card_2" type="hidden" id="document_id_national-card_2" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card'){ echo $kyc->document_upload_id_2; }else{ if(!empty(old('document_id_national-card_2'))){ echo old('document_id_national-card_2'); }else{ echo 0; } } ?>">
                        <input name="document_id_driver-licence" type="hidden" id="document_id_driver-licence" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='driver-licence'){ echo $kyc->document_upload_id; }else{ if(!empty(old('document_id_driver-licence'))){ echo old('document_id_driver-licence'); }else{ echo 0; } } ?>">
                        
                        
                        <input type="hidden" name="kyc_id" id="kyc_id" value="<?php if(isset($kyc) && !empty($kyc) && ($kyc->status==0)){ echo $kyc->id; }else{ echo 0; } ?>">
                        
                    <a class="btn btn-primary kyc_submit" href="javascript:void(0)"  data-toggle="modal" data-target="#kycConfirm">{{ ('Submit Details') }}</a>
                </div><!-- .from-step-content -->



            </div>




           </div>


        </div>

    </div>

</div>
    
@endsection