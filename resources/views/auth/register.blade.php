{{-- Extends layout --}}

@extends('layouts.app')




{{-- Content --}}

@section('content')

	<div class="col-md-6">

                    <div class="authincation-content">

                        <div class="row no-gutters">

                            <div class="col-xl-12">

                                <div class="auth-form">

                                    <h4 class="text-center mb-4">Sign up your account</h4>

                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf

                                           <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Name') }}</strong></label>

                                            <input type="text" name="name" class="form-control " value="{{old('name')}}" placeholder="Enter your Full Name">
                                            @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                                        
                                        </div>
                                        

                                        <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Email') }}</strong></label>

                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                        
                                        </div>

                                        <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Telegram Id') }}</strong></label>

                                            <input type="text" name="telegram_id" class="form-control" placeholder="Telegram User Id" value="{{old('telegram_id')}}">
                                            @if ($errors->has('telegram_id'))
                                                <span class="text-danger">{{ $errors->first('telegram_id') }}</span>
                                             @endif
                                        
                                        </div>

                                        <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Password') }}</strong></label>

                                            <input type="password" name="password" class="form-control" placeholder="password" >
                                              @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                            

                                        </div>

                                         <div class="form-group">

                                            <label class="mb-1"><strong> {{ __('Confirmed Password') }}</strong></label>

                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmed Password">
                                            
                                             @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif

                                        </div>

                                        <div class="form-group">

                                        <label class="mb-1"><strong> {{ __('Country') }}</strong></label>

                                       
									        <select id="country" class="form-control " name="country" >
														<option value="">Select Country</option>
														<option value="AF">AFGHANISTAN</option>
														<option value="AL">ALBANIA</option>
														<option value="DZ">ALGERIA</option>
														<option value="AD">ANDORRA</option>
														<option value="AO">ANGOLA</option>
														<option value="AI">ANGUILLA</option>
														<option value="AQ">ANTARCTICA</option>
														<option value="AG">ANTIGUA AND BARBUDA</option>
														<option value="AR">ARGENTINA</option>
														<option value="AM">ARMENIA</option>
														<option value="AW">ARUBA</option>
														<option value="AU">AUSTRALIA</option>
														<option value="AT">AUSTRIA</option>
														<option value="AZ">AZERBAIJAN</option>
														<option value="BS">BAHAMAS</option>
														<option value="BH">BAHRAIN</option>
															<option value="BD">BANGLADESH</option>
														<option value="BB">BARBADOS</option>
														<option value="BY">BELARUS</option>
														<option value="BE">BELGIUM</option>
														<option value="BZ">BELIZE</option>
														<option value="BJ">BENIN</option>
														<option value="BM">BERMUDA</option>
														<option value="BT">BHUTAN</option>
														<option value="BA">BOSNIA AND HERZEGOVINA</option>
														<option value="BW">BOTSWANA</option>
														<option value="BV">BOUVET ISLAND</option>
														<option value="BR">BRAZIL</option>
														<option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
														<option value="BN">BRUNEI DARUSSALAM</option>
														<option value="BG">BULGARIA</option>
														<option value="BF">BURKINA FASO</option>
														<option value="BI">BURUNDI</option>
														<option value="KH">CAMBODIA</option>
														<option value="CM">CAMEROON</option>
														<option value="CA">CANADA</option>
														<option value="CV">CAPE VERDE</option>
														<option value="KY">CAYMAN ISLANDS</option>
														<option value="CF">CENTRAL AFRICAN REPUBLIC</option>
														<option value="TD">CHAD</option>
														<option value="CL">CHILE</option>
														<option value="CN">CHINA</option>
														<option value="CX">CHRISTMAS ISLAND</option>
														<option value="CC">COCOS (KEELING) ISLANDS</option>
														<option value="CO">COLOMBIA</option>
														<option value="KM">COMOROS</option>
														<option value="CG">CONGO</option>
														<option value="CK">COOK ISLANDS</option>
														<option value="CR">COSTA RICA</option>
														<option value="CI">COTE D IVOIRE</option>
														<option value="HR">CROATIA</option>
														<option value="CU">CUBA</option>
														<option value="CY">CYPRUS</option>
														<option value="CZ">CZECH REPUBLIC</option>
														<option value="DK">DENMARK</option>
														<option value="DJ">DJIBOUTI</option>
														<option value="DM">DOMINICA</option>
														<option value="DO">DOMINICAN REPUBLIC</option>
														<option value="TP">EAST TIMOR</option>
														<option value="SV">EL SALVADOR</option>
														<option value="GQ">EQUATORIAL GUINEA</option>
														<option value="ER">ERITREA</option>
														<option value="EE">ESTONIA</option>
														<option value="FK">FALKLAND ISLANDS (MALVINAS)</option>
														<option value="FO">FAROE ISLANDS</option>
														<option value="FJ">FIJI</option>
														<option value="FI">FINLAND</option>
														<option value="FR">FRANCE</option>
														<option value="GF">FRENCH GUIANA</option>
														<option value="PF">FRENCH POLYNESIA</option>
														<option value="TF">FRENCH SOUTHERN TERRITORIES</option>
														<option value="GA">GABON</option>
														<option value="GM">GAMBIA</option>
														<option value="GE">GEORGIA</option>
														<option value="DE">GERMANY</option>
														<option value="GH">GHANA</option>
														<option value="GI">GIBRALTAR</option>
														<option value="GR">GREECE</option>
														<option value="GL">GREENLAND</option>
														<option value="GD">GRENADA</option>
														<option value="GP">GUADELOUPE</option>
														<option value="GU">GUAM</option>
														<option value="GT">GUATEMALA</option>
														<option value="GN">GUINEA</option>
														<option value="GW">GUINEA-BISSAU</option>
														<option value="GY">GUYANA</option>
														<option value="HT">HAITI</option>
														<option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
														<option value="VA">HOLY SEE (VATICAN CITY STATE)</option>
														<option value="HN">HONDURAS</option>
														<option value="HK">HONG KONG</option>
														<option value="HU">HUNGARY</option>
														<option value="IS">ICELAND</option>
                                      					<option value="IN">INDIA</option>
														<option value="ID">INDONESIA</option>
														<option value="IE">IRELAND</option>
														<option value="IL">ISRAEL</option>
														<option value="IT">ITALY</option>
														<option value="JM">JAMAICA</option>
														<option value="JP">JAPAN</option>
														<option value="JO">JORDAN</option>
														<option value="KZ">KAZAKSTAN</option>
														<option value="KE">KENYA</option>
														<option value="KI">KIRIBATI</option>
														<option value="KR">KOREA</option>
														<option value="KW">KUWAIT</option>
														<option value="LA">LAO PEOPLES DEMOCRATIC REPUBLIC</option>
														<option value="LV">LATVIA</option>
														<option value="LB">LEBANON</option>
														<option value="LS">LESOTHO</option>
														<option value="LR">LIBERIA</option>
														<option value="LY">LIBYAN ARAB JAMAHIRIYA</option>
														<option value="LI">LIECHTENSTEIN</option>
														<option value="LT">LITHUANIA</option>
														<option value="LU">LUXEMBOURG</option>
														<option value="MO">MACAU</option>
														<option value="MG">MADAGASCAR</option>
														<option value="MW">MALAWI</option>
														<option value="MY">MALAYSIA</option>
														<option value="MV">MALDIVES</option>
														<option value="ML">MALI</option>
														<option value="MT">MALTA</option>
														<option value="MH">MARSHALL ISLANDS</option>
														<option value="MQ">MARTINIQUE</option>
														<option value="MR">MAURITANIA</option>
														<option value="MU">MAURITIUS</option>
														<option value="YT">MAYOTTE</option>
														<option value="MX">MEXICO</option>
														<option value="FM">MICRONESIA, FEDERATED STATES OF</option>
														<option value="MD">MOLDOVA, REPUBLIC OF</option>
														<option value="MC">MONACO</option>
														<option value="MN">MONGOLIA</option>
														<option value="MS">MONTSERRAT</option>
														<option value="MZ">MOZAMBIQUE</option>
														<option value="MA">MOROCCO</option>
														<option value="MM">MYANMAR</option>
														<option value="NA">NAMIBIA</option>
														<option value="NR">NAURU</option>
														<option value="NL">NETHERLANDS</option>
														<option value="AN">NETHERLANDS ANTILLES</option>
														<option value="NC">NEW CALEDONIA</option>
														<option value="NZ">NEW ZEALAND</option>
														<option value="NI">NICARAGUA</option>
														<option value="NE">NIGER</option>
														<option value="NG">NIGERIA</option>
														<option value="NU">NIUE</option>
														<option value="NF">NORFOLK ISLAND</option>
														<option value="MP">NORTHERN MARIANA ISLANDS</option>
														<option value="NO">NORWAY</option>
														<option value="OM">OMAN</option>
														<option value="PW">PALAU</option>
                                      					<option value="PK">PAKISTAN</option>
														<option value="PA">PANAMA</option>
														<option value="PG">PAPUA NEW GUINEA</option>
														<option value="PY">PARAGUAY</option>
														<option value="PE">PERU</option>
														<option value="PH">PHILIPPINES</option>
														<option value="PN">PITCAIRN</option>
														<option value="PL">POLAND</option>
														<option value="PT">PORTUGAL</option>
														<option value="RE">REUNION</option>
														<option value="RO">ROMANIA</option>
														<option value="RU">RUSSIAN FEDERATION</option>
														<option value="RW">RWANDA</option>
														<option value="SH">SAINT HELENA</option>
														<option value="KN">SAINT KITTS AND NEVIS</option>
														<option value="LC">SAINT LUCIA</option>
														<option value="PM">SAINT PIERRE AND MIQUELON</option>
														<option value="VC">SAINT VINCENT AND THE GRENADINES</option>
														<option value="WS">SAMOA</option>
														<option value="SM">SAN MARINO</option>
														<option value="ST">SAO TOME AND PRINCIPE</option>
														<option value="SN">SENEGAL</option>
														<option value="SC">SEYCHELLES</option>
														<option value="SL">SIERRA LEONE</option>
														<option value="SG">SINGAPORE</option>
														<option value="SK">SLOVAKIA</option>
														<option value="SI">SLOVENIA</option>
														<option value="SB">SOLOMON ISLANDS</option>
														<option value="SO">SOMALIA</option>
														<option value="ZA">SOUTH AFRICA</option>
														<option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
														<option value="ES">SPAIN</option>
														<option value="LK">SRI LANKA</option>
														<option value="SD">SUDAN</option>
														<option value="SU">SAUDI ARABIA</option>
														<option value="SR">SURINAME</option>
														<option value="SJ">SVALBARD AND JAN MAYEN</option>
														<option value="SZ">SWAZILAND</option>
														<option value="SE">SWEDEN</option>
														<option value="CH">SWITZERLAND</option>
														<option value="TJ">TAJIKISTAN</option>
														<option value="TZ">TANZANIA, UNITED REPUBLIC OF</option>
														<option value="TH">THAILAND</option>
														<option value="TG">TOGO</option>
														<option value="TK">TOKELAU</option>
														<option value="TO">TONGA</option>
														<option value="TT">TRINIDAD AND TOBAGO</option>n
														<option value="TN">TUNISIA</option>
														<option value="TR">TURKEY</option>
														<option value="TM">TURKMENISTAN</option>
														<option value="TC">TURKS AND CAICOS ISLANDS</option>
														<option value="TV">TUVALU</option>
														<option value="UG">UGANDA</option>
														<option value="UA">UKRAINE</option>
														<option value="AE">UNITED ARAB EMIRATES</option>
														<option value="GB">UNITED KINGDOM</option>
														<option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
														<option value="US">UNITED STATES OF AMERICA</option>
														<option value="UY">URUGUAY</option>
														<option value="UZ">UZBEKISTAN</option>
														<option value="VE">VENEZUELA</option>
														<option value="VI">VIRGIN ISLANDS, U.S.</option>
													    <option value="VT">VIETNAM</option>
														<option value="WF">WALLIS AND FUTUNA</option>
														<option value="EH">WESTERN SAHARA</option>
														<option value="YE">YEMEN</option>
														<option value="YU">YUGOSLAVIA</option>
														<option value="ZW">ZIMBABWE</option>
													</select>

                                                    @if ($errors->has('country'))
                                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                                    @endif


                                        </div>

                                        @if( request()->get('ref') )
                                            <div class="form-group">

                                            <label class="mb-1"><strong> {{ __('Refer By') }}</strong></label>

                                                <input type="text" class="form-control" name="s_referral_code"  value="{{  request()->get('ref') }}" readonly>
                                                

                                            </div>
                                                @endif
                                        
                                            <!-- @if( request()->get('ref') ) -->
                            
                                            <!-- <input type="hidden" class="form-control" name="s_referral_code" value="{{  request()->get('ref') }}" readonly> -->
                                            <!-- @else
                                            
                                            <input type="hidden" class="form-control" name="s_referral_code" value="EDX4BJE66" readonly>
                                            -->
                                            <!-- @endif -->
					
					


                                        <div class="text-center mt-4">

                                            <button type="submit" class="btn btn-primary btn-block">  {{ __('Register') }}</button>

                                        </div>

                                    </form>

                                    <div class="new-account mt-3">

                                        <p>Already have an account? <a class="text-primary" href="{!! url('/login'); !!}">Sign in</a></p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

@endsection

