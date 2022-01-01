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



#css_block_overlay {
  position: fixed; /* Sit on top of the page content */
  /*display: none;*/ /* Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 0; 
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.8); /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
  cursor: text; /* Add a pointer on hover */
}
#over_lay_text{
  position: absolute;
  top: 50%;
  left: 65%;
  width: 80%;
  font-size: 25px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
} 



</style>    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/basic.css" />
   
@endsection
    
@section('content')

<div class="row  justify-content-center">

    <div class="col-sm-12">
        <div class="card">
           <div class="card-body">

        @php
            $cur_status = current_kyc_status();
        @endphp
            @if($cur_status==0 || $cur_status==1)
        
            <div id="css_block_overlay">
            <div id="over_lay_text">You have submitted the form. Now its under the process. So, you can not edit at this moment.</div>
            </div>
            @endif


            <form action="{{ route('kyc-application.post') }}" method="post" enctype="multipart/form-data" id="submit_application" name="submit_application" onSubmit="if(!return confirm('After submission of this form, you would not be able to edit this form. Please confirm before submission')){return false;}">
             @csrf       
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
                    <label for="name" class="input-item-label">Name  <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control form-control" type="text" value="{{ Auth::user()->name }}" id="name" name="name" readonly>
                        @if ($errors->has('name'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('name') }}.</strong>
                                                    </span>
                                            @endif
                    </div>
                </div>
            </div>
                
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="email" class="input-item-label">Email <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control form-control" value="{{ Auth::user()->email }}" type="text" id="email" name="email" >
                        @if ($errors->has('email'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('email') }}.</strong>
                                                    </span>
                                            @endif
                    </div>
                </div>
            </div>
                        
            
                        <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="phone-number" class="input-item-label">Phone Number </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control form-control" type="number" value="{{ old('phone',  isset($kyc->phone) ? $kyc->phone : null) }}" id="phone-number" name="phone">
                        @if ($errors->has('phone'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('phone') }}.</strong>
                                                    </span>
                                            @endif
                    </div>
                </div>
            </div>
                                    <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="date-of-birth" class="input-item-label">Date of Birth </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control form-control date-picker-dob" type="date" value="{{ old('dob',  isset($kyc->dob) ? $kyc->dob : null) }}" id="datepicker" name="dob">
                        
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

                        @if ($errors->has('gender'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('gender') }}.</strong>
                                                    </span>
                                            @endif
                        
                    </div>
                </div>
            </div>
            
                <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="telegram" class="input-item-label">Telegram Username  </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control form-control" type="text" value="{{ Auth::user()->telegram_id }}" id="telegram" name="telegram_id">
                        @if ($errors->has('telegram_id'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('telegram_id') }}.</strong>
                                                    </span>
                                            @endif
                    </div>
                     </div>
                </div>

          </div>

                <h3 class="text-secondary mt-5">Your Address</h3>


                    <div class="row">


                        
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="address_1" class="input-item-label">Address Line 1 <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control" type="text" value="{{ old('address1',  isset($kyc->address1) ? $kyc->address1 : null) }}" id="address_1" name="address1" aria-required="true">
                        @if ($errors->has('address1'))
                        <span class="invalid feedback text-danger"role="alert">
                            <strong>{{ $errors->first('address1') }}.</strong>
                        </span>
                       @endif 
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="address_2" class="input-item-label">Address Line 2 </label>
                    <div class="input-wrap">
                        <input class="input-bordered form-control" type="text" value="{{ old('address2',  isset($kyc->address2) ? $kyc->address2 : null) }}" id="address_2" name="address2">
                        @if ($errors->has('address2'))
                        <span class="invalid feedback text-danger"role="alert">
                            <strong>{{ $errors->first('address2') }}.</strong>
                        </span>
                       @endif 
                    </div>
                </div>
            </div>

              
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="city" class="input-item-label">City <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control" type="text" value="{{ old('city',  isset($kyc->city) ? $kyc->city : null) }}" id="city" name="city" aria-required="true">
                       
                        @if ($errors->has('city'))
                        <span class="invalid feedback text-danger"role="alert">
                            <strong>{{ $errors->first('city') }}.</strong>
                        </span>
                       @endif 
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="state" class="input-item-label">State <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-borderd form-control" type="text" value="{{ old('state',  isset($kyc->state) ? $kyc->state : null) }}" id="state" name="state" aria-required="true">
                        
                        @if ($errors->has('state'))
                        <span class="invalid feedback text-danger"role="alert">
                            <strong>{{ $errors->first('state') }}.</strong>
                        </span>
                       @endif 

                    </div>
                </div>
            </div>
               

                        <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="country" class="input-item-label">Country <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        
                  <input required="" class="input-borderd form-control" type="text" value="{{ Auth::user()->country }}" id="country" name="country" aria-required="true">
                
                  @if ($errors->has('country'))
                  <span class="invalid feedback text-danger"role="alert">
                      <strong>{{ $errors->first('country') }}.</strong>
                  </span>
                 @endif                               
            
                    
                    </div>
                </div>
            </div>
            
            
              
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label for="zip" class="input-item-label">Zip / Postal Code <span class="text-require text-danger">*</span></label>
                    <div class="input-wrap">
                        <input required="" class="input-bordered form-control" type="text" value="{{ old('zipcode',  isset($kyc->zipcode) ? $kyc->zipcode : null) }}" id="zip" name="zipcode" aria-required="true">
                        
                        @if ($errors->has('zipcode'))
                        <span class="invalid feedback text-danger"role="alert">
                            <strong>{{ $errors->first('zipcode') }}.</strong>
                        </span>
                       @endif 

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
                       
                        @if ($errors->has('document_type'))
                        <span class="invalid feedback text-danger"role="alert">
                            <strong>{{ $errors->first('document_type') }}.</strong>
                        </span>
                       @endif 

                        {{-- @if($errors->has('document_type'))
                            <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_type')) }}</small></span>
                        @endif --}}
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
                                    @if($errors->has('document_passport'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_passport')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_passport'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_passport')); ?>');">{{ ('View') }}</button>
                                        
                                        
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='passport' && $kyc->document_passport > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_passport); ?>');">{{ ('View') }}</button>
                                        
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
                                    @if($errors->has('document_id_national_card_1'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_id_national_card_1')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_id_national_card_1'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_id_national_card_1')); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card' && $kyc->document_nidf > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_nidf); ?>');">{{ ('View') }}</button>
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
                                    @if($errors->has('document_id_national_card_2'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_id_national_card_2')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_id_national_card_2'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_id_national_card_2')); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card' && $kyc->document_nidb > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_nidb); ?>');">{{ ('View') }}</button>
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
                                    @if($errors->has('document_driving'))
                                        <span style="color:RED;" class="err_msg"><small>{{ ($errors->first('document_driving')) }}</small></span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <div class="kyc-upload-img">
                                        <?php 
                                        if(!empty(old('document_driving'))){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url(old('document_driving')); ?>');">{{ ('View') }}</button>
                                        <?php
                                        }else if(isset($kyc) && !empty($kyc) && $kyc->document_type=='driver-licence' && $kyc->document_driving > 0){
                                        ?>
                                        <button class="btn btn-primary" type="button" onclick="window.open('<?php echo get_recource_url($kyc->document_driving); ?>');">{{ ('View') }}</button>
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

                      @if ($errors->has('aggrement'))
                      <span class="invalid feedback text-danger"role="alert">
                          <strong>{{ $errors->first('aggrement') }}.</strong>
                      </span>
                     @endif

                      


                        <div class="gaps-1x"></div>
                        <input name="document_type" type="hidden" id="document_type" value="<?php if(isset($old_doc_type)){ if(!empty($old_doc_type)){  echo $old_doc_type; }else{ echo $active_tab; } }else{ if(isset($kyc) && !empty($kyc)){ echo $kyc->document_type; }else{ echo $active_tab; } } ?>">
                        
                        <input name="document_passport" type="hidden" id="document_passport" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='passport'){ echo $kyc->document_passport; }else{ if(!empty(old('document_passport'))){ echo old('document_passport'); }else{ echo 0; } } ?>">
                        <input name="document_id_national_card_1" type="hidden" id="document_id_national_card_1" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card'){ echo $kyc->document_nidf; }else{ if(!empty(old('document_id_national_card_1'))){ echo old('document_id_national_card_1'); }else{ echo 0; } } ?>">
                        <input name="document_id_national_card_2" type="hidden" id="document_id_national_card_2" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='national-card'){ echo $kyc->document_nidb; }else{ if(!empty(old('document_id_national_card_2'))){ echo old('document_id_national_card_2'); }else{ echo 0; } } ?>">
                        <input name="document_driving" type="hidden" id="document_driving" value="<?php if(isset($kyc) && !empty($kyc) && $kyc->document_type=='driver-licence'){ echo $kyc->document_driving; }else{ if(!empty(old('document_driving'))){ echo old('document_driving'); }else{ echo 0; } } ?>">
                        
                        
                        <input type="hidden" name="kyc_id" id="kyc_id" value="<?php if(isset($kyc) && !empty($kyc) && ($kyc->status==0)){ echo $kyc->id; }else{ echo 0; } ?>">
                        
                    <a class="btn btn-primary kyc_submit" href="javascript:void(0)"  data-toggle="modal" data-target="#kycConfirm">{{ ('Submit Details') }}</a>
                </div><!-- .from-step-content -->


                
    
    
<div class="modal fade" id="kycConfirm" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="kyc-popup">
                <h2 class="text-center">Confirm Information</h2>
                <?php /*
                <div class="input-item">
                    <!--input class="input-checkbox" id="term-condition" type="checkbox"-->
                    <label for="term-condition">I have read the <a href="<?php echo get_recource_url($terms_conditions); ?>" target="_blank">Terms of Condition</a> and <a href="<?php echo get_recource_url($privacy_policy); ?>" target="_blank">Privacy Policy.</a></label>
                </div>
                */ ?>
                <div class="input-item">
                    <!--input class="input-checkbox" id="info-currect" type="checkbox"-->
                   <div class="text-center"> <label for="info-currect">Recheck the information you have entered</label></div>
                </div>
                <div class="gaps-2x"></div>
                <div class="text-center">
                <a href="javascript:void(0)" onclick="jQuery('#submit_application').submit();" class="btn btn-primary">{{ ('Confirm') }}</a>
                <a href="javascript:void(0)" onclick="jQuery('#kycConfirm').modal('hide');" class="btn btn-primary">{{ ('Cancel') }}</a></div>
            </div><!-- .modal-content -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- Modal End -->



            </div>


        </form>

           </div>


        </div>

    </div>

</div>
    
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.js" ></script>



<script>
 
 var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    Dropzone.autoDiscover = false;
       (function($){
         
       var currentTabId = $('ul#document_tab li a.active').attr("data-id");	
       jQuery('#document_type').val(currentTabId);
       
       $(".nav-link").click(function(){
           currentTabId = $(this).attr("data-id");
           jQuery('#document_type').val(currentTabId);
       })
       
       
         // Dropzone
       var $upload_zone = $('.upload-zone');
       if ($upload_zone.length > 0 ) {
   
           $upload_zone.each(function(){
               var $self = $(this);
               $self.addClass('dropzone').dropzone({
                    url: "{{ route('add-kyc-document')}}",
                //    /*autoProcessQueue: false,*/
                   maxFiles: 1,
                   acceptedFiles:'image/*,application/pdf',
                   maxfilesexceeded: function(file) {
                       this.removeAllFiles();
                       this.addFile(file);
                   },
                   sending: function(file, xhr, formData) {
                       formData.append("_token", CSRF_TOKEN);
                       formData.append("document_type", currentTabId);
                       if(currentTabId=='national-card' && $self.attr('id')=='youNid'){
                           formData.append("document_order", "3");
                       }else if(currentTabId=='national-card' && $self.attr('id')=='backside'){
                           formData.append("document_order", "2");
                       }else{
                           formData.append("document_order", "1");
                       }
                        $('.kyc_submit').css("opacity", "0.5");
                        $('.kyc_submit').text('Uploading...');
                       $('.kyc_submit').prop('disabled', true);
                   },
                   success: function(file, response){
                       var obj = JSON.parse(response);
                       console.log(obj);
                       if(obj.status=='success'){
                           if(obj.document_type=='passport'){
                               jQuery("#document_passport").val(obj.upload_id);
                           }
                           if(obj.document_type=='driver-licence'){
                               jQuery("#document_driving").val(obj.upload_id);
                           }
                           if(obj.document_type=='national-card'){
                               if(obj.document_order=='1'){
                                   jQuery("#document_id_national_card_1").val(obj.upload_id);
                               }else if(obj.document_order=='2'){
                                   jQuery("#document_id_national_card_2").val(obj.upload_id);
                               }else{
                               jQuery("#document_id_national-card_3").val(obj.upload_id);
                               }
                           }
                           
                           
                           if(obj.document_type=='national-card' && jQuery("#document_id_national_card_2").val() =="" ){
                               $('.kyc_submit').css("opacity", "0.5");
                               $('.kyc_submit').text('Uploading...');
                               $('.kyc_submit').prop('disabled', true);
                           }else{
                               $('.kyc_submit').css("opacity", "1");
                               $('.kyc_submit').text('Submit Details');
                               $('.kyc_submit').prop('disabled', false);

                           }
                           
                       }
                   },
                   error: function(file, message, xhr) {
                      if (xhr == null) this.removeFile(file); // perhaps not remove on xhr errors
                      alert(message);
                   }
               });
           });
       }
       
       
       
       
       
       })(jQuery);
    
    </script>
    
@endsection