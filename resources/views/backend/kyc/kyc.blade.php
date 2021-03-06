@extends('backend.layout.app')

@section('title') KYC @endsection

@section('css')

<style>
    .status {
    border-radius: 15px;
    text-align: center;
    padding: 24px 10px;
    width: 100%;
}

.status-icon {
    position: relative;
    height: 90px;
    width: 90px;
    background: #fff;
    border-radius: 50%;
    text-align: center;
    margin: 0 auto 20px;
    border: 2px solid #b1becc;
}

.status-empty .status-icon {
    border-color: #b1becc;
}

</style>

@endsection

@section('content')

<div class="row justify-content-center">

    <div class="col-sm-10">

        <div class="card ">
            <div class="card-body ">
                <h2 class="text-center">Identity Verification - KYC </h2>

                

                <p class="text-justify mt-5" >
                     After you have submitted your KYC form,
                     Fiti5 would like to stay in touch with you. Fiti5 shall not disclose, rent, sell or otherwise transfer your personal data unless required by the law. 
                      We shall process your personal data within the territories of the EU. Your personal data shall be stored for a period of 10 years unless the law requires it differently . 
                      You can always invoke the right to be forgotten and ask us to delete your personal data, however some data (about you and your contribution) must stay stored and can not be deleted for the period required by law. 
                      You can also ask us to provide a full list of your personal data that we collect and maintain about you.
                       You can also unsubscribe from the newsletter (the second tick box) at any time.
                </p>   
                
                <div class="status status-empty text-center">

                    @if(isset($kyc) > 0 && !empty($kyc) && $kyc->status!=0)

                    @if($kyc->status== 1)
                        {{-- $current_status = "Processing"; --}}

                        <div class="status-icon">
                            <i class="fa fa-file" style="font-size:50px;margin-top:13px;color:#b1becc;"></i>
                            <div class="status-icon-sm">
                                <i class="fa fa-close" style="color:#ffc7c7"></i>
                            </div>
                        </div>
                        <span class="status-text"></span>
                        <p>Your Application under Process for Verification.<p>
                        <p>We are still working on your identity verification. Once our team verified your identity, you will be whitelisted and notified by email.</p>
                

                    @elseif($kyc->status== 2)
                        {{-- $current_status = "Rejected"; --}}

                        <div class="status-icon">
                            <i class="fa fa-file" style="font-size:50px;margin-top:13px;color:#b1becc;"></i>
                            <div class="status-icon-sm">
                                <i class="fa fa-close" style="color:#ffc7c7"></i>
                            </div>
                        </div>
                        <span class="status-text"></span>
                        <p>Your Application is Rejected for some reason.<p>
                            <a href="{{ route('kyc-application') }}" class="btn btn-primary">KYC RESUBMIT</a>
       
                        

                    @elseif($kyc->status== 3)
                        {{-- $current_status = "Information Missing"; --}}

                        <div class="status-icon">
                            <i class="fa fa-file" style="font-size:50px;margin-top:13px;color:#b1becc;"></i>
                            <div class="status-icon-sm">
                                <i class="fa fa-close" style="color:#ffc7c7"></i>
                            </div>
                        </div>
                        <span class="status-text"></span>
                        <p>Your Application has Information Missing .<p>

                        <a href="{{ route('kyc-application') }}" class="btn btn-primary">KYC SUBMIT AGAIN</a>



                    @elseif($kyc->status== 4)
                        {{-- $current_status = "Verified"; --}}

                        <div class="status-icon">
                            <i class="fa fa-file" style="font-size:50px;margin-top:13px;color:#b1becc;"></i>
                            <div class="status-icon-sm">
                                <i class="fa fa-close" style="color:#ffc7c7"></i>
                            </div>
                        </div>
                        <span class="status-text"></span>
                        <p>Your Application has Verified .<p>



                    @else

                    


                    $current_status = "Unknown";
                    @endif






							
                      

                    
                     @else
                     <br>
                    <div class="status-icon">
                        <i class="fa fa-file" style="font-size:50px;margin-top:13px;color:#b1becc;"></i>
                        
                    </div>
                    
                    
					@if(isset($kyc) > 0 && !empty($kyc) && $kyc->status==0)
                        <span class="status-text"></span>
                        <a href="{{ route('kyc-application') }}" class="btn btn-primary">Update</a>
                    @else
                            <span class="status-text"></span>
                        <a href="{{ route('kyc-application') }}" class="btn btn-primary">Click here to complete your KYC</a>
                    @endif
                    
                    {{-- <a href="{{ route('kyc-application') }}" class="btn btn-primary">Click here to complete your KYC</a> --}}

                    <div class="note note-md note-info note-plane">
                        {{-- <i class="fas fa-info-circle"></i>  --}}
                        <p>Some countries and regions will not able to pass KYC process and therefore are restricted from token sale.</p>
                    
                    </div>


                
                    @endif

                    
                </div>


            
            </div>

        </div>

    </div>



</div>





@endsection

@section('js')


@endsection