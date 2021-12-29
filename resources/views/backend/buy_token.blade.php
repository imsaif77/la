
{{-- Extends layout --}}
@extends('backend.layout.app')



{{-- Content --}}
@section('content')

<?php

//$price_table = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH,LTC,BTC");
$price_table_ETH = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");
$price_table_TRX = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=TRX&tsyms=USD&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");
$price_table_BTC = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");
$price_table_LTC = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=USD&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");
$price_table_USDT = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=USDT&tsyms=USD&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");
$price_table_XRP = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=XRP&tsyms=USD&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");



$price_table_json_ETH = json_decode($price_table_ETH, true);
$price_table_json_TRX = json_decode($price_table_TRX, true);
$price_table_json_BTC = json_decode($price_table_BTC, true);
$price_table_json_LTC = json_decode($price_table_LTC, true);
$price_table_json_USDT = json_decode($price_table_USDT, true);
$price_table_json_XRP = json_decode($price_table_XRP, true);




$eur_to_inr = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=EUR&tsyms=USD,EUR&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");

$euro_json_inr = json_decode($eur_to_inr,true);

$eur_to_eur = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=EUR&tsyms=EUR&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");
$euro_json_euro = json_decode($eur_to_eur,true);


/* echo "<pre>"; print_r($price_table_json_LTC); 
echo "<pre>"; print_r($price_table_json_BTC); exit;  */

?>

<link rel="stylesheet" href="{{asset('css/buy.css')}}">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> <!-- shivani -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="main-content col-lg-12">

               


                <form name="submit_contribution" id="submit_contribution" action="" method="post"
                    target="_blank">
                    {{ csrf_field() }}
                   
                    <div class="content-area card">
                        @if(Session::get('error') !== null)
                        <div class="alert-box alert-primary">
                            <div class="alert-txt"><em class="ti ti-alert"></em>{{ Session::get('error') }}</div>
                        </div><!-- .alert-box -->
                        @endif
                        @if(Session::get('message') !== null)
                        <div class="alert-box alert-primary">
                            <div class="alert-txt"><em class="ti ti-check"></em>{{ Session::get('message') }}</div>
                        </div><!-- .alert-box -->
                        @endif

                        <div class="card-innr">
                           




                            <input type="hidden" id="usd_eth" value="{{$price_table_json_ETH['USD']}}">
                            <input type="hidden" id="usd_trx" value="{{$price_table_json_TRX['USD']}}">
                            <input type="hidden" id="usd_btc" value="{{$price_table_json_BTC['USD']}}">
                            <input type="hidden" id="usd_ltc" value="{{$price_table_json_LTC['USD']}}">
							<input type="hidden" id="usd_usdt" value="{{$price_table_json_USDT['USD']}}">
                            <input type="hidden" id="usd_xrp" value="{{$price_table_json_XRP['USD']}}">



                            <div class="token-currency-choose">
                                <div class="row guttar-15px">
                                    <div class=" col-12">
                                        <div class="card-head text-center font-2xl">

                                            <h4 class="card-title card-title1">Choose currency and calculate FITI tokens
                                                price</h4>
                                        </div>
                                        <div class="row" id="mobile_view_buy">
                                            <div class="col-md-3  col-6">
                                                <div class="pay-option">
                                                    <div class=text-center>
                                                        <img src="/assets/images1/ethereum.png" class="crypto_logo">
                                                    </div>
                                                    <input class="pay-option-check" type="radio" id="payeth"
                                                        name="payOption" value="ETH"
                                                        
                                                        checked>
                                                    <label class="pay-option-label blank_bg p-0 text_ri8" for="payeth">
                                                        <div class="card height-auto token-statistics mb-0">
                                                            <div class="card-innr">
                                                                <div
                                                                    class="token-balance token-balance-with-icon d-block">
                                                                    <div class="token-balance-text">
                                                                        <span class="pay-title">
                                                                            <!-- <em class="pay-icon cf cf-ltc"></em> -->
                                                                            <h6
                                                                                class="pay-cur card-sub-title mb-0 mr-1">
                                                                                ETH </h6>
                                                                            <span class="pay-amount" id="eth">$
                                                                                {{$price_table_json_ETH['USD']}}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-3  col-6">
                                                <div class="pay-option">
                                                    <div class=text-center>
                                                        <img src="/assets/images1/cryptocurrency.png"
                                                            class="crypto_logo">
                                                    </div>
                                                    <input class="pay-option-check" type="radio" id="paytrx"
                                                        name="payOption" value="TRX"
                                                       >
                                                    <label class="pay-option-label blank_bg p-0 text_ri8" for="paytrx">
                                                        <div class="card height-auto token-statistics mb-0">
                                                            <div class="card-innr">
                                                                <div
                                                                    class="token-balance token-balance-with-icon d-block">
                                                                    <div class="token-balance-text">
                                                                        <span class="pay-title">
                                                                            <!-- <em class="pay-icon cf cf-ltc"></em> -->
                                                                            <h6
                                                                                class="pay-cur card-sub-title mb-0 mr-1">
                                                                                TRX </h6>
                                                                            <span class="pay-amount " id="trx">$
                                                                                {{$price_table_json_TRX['USD']}}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3  col-6">
                                                <div class="pay-option">
                                                    <div class=text-center>
                                                        <img src="/assets/images1/bitcoin.png" class="crypto_logo">
                                                    </div>
                                                    <input class="pay-option-check" type="radio" id="paybtc"
                                                        name="payOption" value="BTC"
                                                        >
                                                    <label class="pay-option-label blank_bg p-0 text_ri8" for="paybtc">
                                                        <div class="card height-auto token-statistics mb-0">
                                                            <div class="card-innr">
                                                                <div
                                                                    class="token-balance token-balance-with-icon d-block">
                                                                    <div class="token-balance-text">
                                                                        <span class="pay-title">
                                                                            <!-- <em class="pay-icon cf cf-ltc"></em> -->
                                                                            <h6
                                                                                class="pay-cur card-sub-title mb-0 mr-1">
                                                                                BTC </h6>
                                                                            <span class="pay-amount " id="btc">$
                                                                                {{$price_table_json_BTC['USD']}}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-3  col-6">
                                                <div class="pay-option">
                                                    <div class=text-center>
                                                        <img src="/assets/images1/litecoin.png" class="crypto_logo">
                                                    </div>
                                                    <input class="pay-option-check" type="radio" id="paylightcoin"
                                                        name="payOption" value="LTC"
                                                       >
                                                    <label class="pay-option-label blank_bg p-0 text_ri8"
                                                        for="paylightcoin">
                                                        <div class="card height-auto token-statistics mb-0">
                                                            <div class="card-innr">
                                                                <div
                                                                    class="token-balance token-balance-with-icon d-block">
                                                                    <div class="token-balance-text">
                                                                        <span class="pay-title">
                                                                            <!-- <em class="pay-icon cf cf-ltc"></em> -->
                                                                            <h6
                                                                                class="pay-cur card-sub-title mb-0 mr-1">
                                                                                LTC </h6>
                                                                            <span class="pay-amount " id="ltc">$
                                                                                {{$price_table_json_LTC['USD']}}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            @if($errors->has('payOption'))
                                            <span
                                                style="color:RED;"><small>{{ __($errors->first('payOption')) }}</small></span>
                                            @endif
                                            <!--<div class="col-6">
											<div class="pay-option">
												<input class="pay-option-check" type="radio" id="payusd" name="payOption">
												<label class="pay-option-label" for="payusd">
													<span class="pay-title"><em class="pay-icon fas fa-dollar-sign"></em><span class="pay-cur">USD</span></span>
													<span class="pay-amount">0.25</span>
												</label>
											</div>       
										</div>-->
                                        </div><!-- .row -->
                                    </div><!-- .row -->
                                    <div class="col-12">
                                        <div class="card-head font-2xl">
                                            <h4 class="card-title">Amount of contribute</h4>
                                        </div>
                                        <div class="payment-get mt-5 mt-md-4">
                                            <div class="token_wrapper pay-option-label">
                                                <input class="input-bordered restrict_token" name="eur_purchase"
                                                    type="text" id="paymentGet" min="200" max="1000000" value="1000"  required>
													
													 <span class="payment-get-cur payment-cal-cur unit_text">USD
													<!-- <select id="country_currency" name="country_currency">
													<option value="EUR" selected>EUR</option>
													<option value="USD" >USD</option>
													</select> -->
												</span>


                                                <span class="token-eq-sign">=</span>
                                                <input name="contribution_amount" id="paymentFrom"
                                                    class="input-bordered input-with-hint" type="text" value="10"
                                                    required>
                                                @if($errors->has('contribution_amount'))
                                                <span
                                                    style="color:RED;"><small>{{ __($errors->first('contribution_amount')) }}</small></span>
                                                @endif
                                                <span class="unit_text" id="cointype"></span>
                                                <input type="hidden" id="coin" name="coin">

                                                <div class="mt-3">



                                                    <div id="bloc1">

                                                        <button type="button" id="per1"
                                                            class="raise pre-color2 not_visible_in_mobile">{{set_bonus_percentage1('value')}}%</button>
                                                        <button type="button" id="per2"
                                                            class="raise pre-color2">{{set_bonus_percentage2('value')}}%</button>
                                                    </div>
                                                    <div id="bloc2">
                                                        <!-- <button type="button " class="btn pre-color mr-1 " disabled>80%</button>
                                                        <button type="button " class="btn pre-color mr-1 " disabled>90%</button> -->
                                                        <button type="button" id="per3"
                                                            class="raise pre-color2">{{set_bonus_percentage3('value')}}%</button>
                                                        <button type="button" id="per4"
                                                            class="raise pre-color2">{{set_bonus_percentage4('value')}}%</button>
                                                        <button type="button" id="per5"
                                                            class="raise pre-color2">{{set_bonus_percentage5('value')}}%</button>

                                                    </div>
                                                </div>




                                               

                                                <button type="button"
                                                    class="btn btn_theme_black new_buy_now_button btn-block"
                                                    data-toggle="modal" data-target="#ConfirmPayment">Buy Now</button>






                                                <div class="token-calc-note note note-plane ">
                                                    <span id="set_minimum_amount" class="note-text text-left text-theme"><em
                                                            class="fas fa-times-circle text-danger"></em>
															{{ set_minimum_token_amount('value') }} USD
                                                        minimum contribution require.</span>
                                                </div>
                                                <div class="blinker">
                                                    <div class="payment-bonus">
                                                        <h4
                                                            class="payment-bonus-title mb-0 buy-bounty-current new_current_bonus">
                                                            Current Bonus : <span class="payment-bonus-amount"></span>
                                                            <span class="for_btn"></span>
                                                            <span class="for_btn"></span>
                                                            <span class="for_btn"></span>
                                                            <span class="for_btn"></span>
                                                        </h4>
                                                        <input type="hidden" name="token_amount" id="token_amount">
                                                        <input type="hidden" name="bonus_percentage"
                                                            id="bonus_percentage">
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .row -->
                            </div>
                            <div class="modal fade" id="ConfirmPayment" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="token-overview-wrap">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-center">Current Fiti5 Price : <span
                                                                style="color:red;font-weight:bold;" id="current_price">$
                                                                0.01</span></p>
                                                        <table class="table table-hover table-bordered theme-border">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <h6 class="payment-summary-title">Pre Bonus
                                                                            Token
                                                                        </h6>
                                                                    </th>
                                                                    <td>
                                                                        <div class="payment-summary-info">
                                                                            <span class="payment-summary-amount"
                                                                                id="final_payment">1200.00</span>
                                                                            <span>Fiti5</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <h6 class="payment-summary-title ">Bonus FITI
                                                                            (<span class="payment-bonus-amount">
                                                                            </span>)
                                                                        </h6>
                                                                    </th>
                                                                    <td>
                                                                        <div class="payment-summary-info">
                                                                            <span>+</span> <span
                                                                                class="payment-summary-amount"
                                                                                id="received_bonus">480.00</span>
                                                                            <span>FITI</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <h6 class="payment-summary-title">Final
                                                                            FITI</h6>
                                                                    </th>
                                                                    <td>
                                                                        <div class="payment-summary-info">
                                                                            <span class="payment-summary-amount"
                                                                                id="total_received">1680.00</span>
                                                                            <span>FITI</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div><!-- .row -->
                                                    <div class="col-12">
                                                        <div class="input-item text-center">
                                                            <input type="checkbox" name="aggrement" id="aggrement"
                                                                class="input-checkbox" value="1">
                                                            <label for="aggrement"
                                                                style="color:#9CBE63; font-weight: 600;">I accept
                                                                <a href="https://edufex.com/privacy-policy"
                                                                    target="_blank"><strong><span
                                                                            >Privacy Policy |
                                                                        </span> <span >Term &
                                                                            Conditions</span></strong></a>
                                                            </label>
                                                        </div>
                                                        @if($errors->has('aggrement'))
                                                        <span
                                                            style="color:RED;"><small>{{ __($errors->first('aggrement')) }}</small></span>
                                                        <div style="clear:both;"></div>
                                                        @endif
														
														 <div id="noteeth"  class="pay-notes py-0">
                                <div class="note note-plane note-light note-md font-italic">
                                    <em style="color:red;" class="fas fa-info-circle"></em>
									
                                    <p style="color:red;">If you are using ETH payment, you have to select <b>ERC-20</b> Network Only. </p>
                                </div>
                            </div>

                                                    </div>
                                                </div><!-- .row -->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary btn-between "
                                                value="Make Online Payment">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" id="choosen_crypto" name="choosen_crypto">
                            <input type="hidden" id="token_value" name="token_value" value="">
                            <input type="hidden" id="payable_crypto_amount" name="payable_crypto_amount">

                            <div class="token-contribute d-none">
                                <div class="token-calc">
                                    <div class="token-received"></div>
                                    <div class="token-pay-amount"></div>
                                </div>
                            </div>


                            <div  class="pay-notes py-0">
                                <div class="note note-plane note-light note-md font-italic">
                                    <em class="fas fa-info-circle"></em>
                                    <p>Tokens will appear in your account after payment successfully made and approved
                                        by our team. <br class="d-none d-lg-block "> Please note that, FITI tokens will
                                        distributed end of IFO Token Sales. </p>
                                </div>
                            </div>
                        </div> <!-- .card-innr -->
                    </div> <!-- .content-area -->

                </form>

            </div><!-- .col -->

        </div><!-- .container -->
    </div><!-- .container -->
</div><!-- .page-content -->


<script>
	
	


	$(document).ready(function() {

		var decimals = 4;
							
		var eurval = 1000;

		$('#paymentGet').val(eurval);


		var per1;
		var per2;
		var per3;
		var per4;
				
		per1 = {{set_bonus_amount1('value') }};
		per2 = {{set_bonus_amount2('value') }};
		per3 = {{set_bonus_amount3('value') }};
		per4 = {{set_bonus_amount4('value') }};
		per5 = {{set_bonus_amount5('value') }};

				
	////////////////////// Bonus Button /////////////////////////////////////////////
			$('#per1').click(function(){

				
			var target = $(this).attr('data-target');

			var value = per1;

			$(target).val(value);
			

			// $('.slider').val(value).change();
			$('#paymentGet').val(value).change();
					calculate_exchange_eurtocoin();

			});	
			
			$('#per2').click(function(){

				
			var target = $(this).attr('data-target');

			var value = per2;

			$(target).val(value);
			
			// $('.slider').val(value).change();
			$('#paymentGet').val(value).change();
					calculate_exchange_eurtocoin();

			});	
			
			$('#per3').click(function(){

				
			var target = $(this).attr('data-target');

			var value = per3;

			$(target).val(value);
			
			// $('.slider').val(value).change();
			$('#paymentGet').val(value).change();
					calculate_exchange_eurtocoin();

			});	
			
			
			$('#per4').click(function(){

				
			var target = $(this).attr('data-target');

			var value = per4;

			$(target).val(value);
			
			// $('.slider').val(value).change();
			$('#paymentGet').val(value).change();
					calculate_exchange_eurtocoin();

			});	

			$('#per5').click(function(){

				
			var target = $(this).attr('data-target');

			var value = per5;

			$(target).val(value);

			// $('.slider').val(value).change();
			$('#paymentGet').val(value).change();
					calculate_exchange_eurtocoin();

			});	
			
		
  //////////////////////// End Bonus Button ////////////////////////////////////////			
				
				
				
				/* $('#price_slider_id').change(function() {
					//alert($('#price_slider_id').val());
					var slider_val = $('#price_slider_id').val();
					
					$('#paymentGet').val(slider_val).change();
					calculate_exchange_eurtocoin();
				}); */

			    /* var coinval = $("#paymentFrom").val();

				var coinvalFrom = parseFloat(remove_comma(coinval));

				//console.log(coinvalFrom);
				if (isNaN(coinvalFrom)) {
					coinvalFrom = 0;
				}  */
				
				
				//var eurvalFrom = parseFloat(remove_comma(eurval));

				//console.log(eurval);
				
				
				/* if (isNaN(eurvalFrom)) {
					eurvalFrom = 0;
				}  */

				var decimals = 4;
							
							var eurval = 1000;
					
							$('#paymentGet').val(eurval);

							
				if ($("input[type='radio'].pay-option-check").is(':checked')) {
					var payOptionValue =  $("input[type=radio][name='payOption']:checked").val();
					console.log(payOptionValue);
				

					if (payOptionValue == 'ETH') {
						var crypto_val = $('#usd_eth').val();
						$('#token_value').val(crypto_val);
						$("#cointype").html(payOptionValue);		
					}
					if (payOptionValue == 'BTC') {
						var crypto_val = $('#usd_btc').val();
						$('#token_value').val(crypto_val);
						$("#cointype").html(payOptionValue);
					}
					if (payOptionValue == 'LTC') {
						var crypto_val = $('#usd_ltc').val();
						$('#token_value').val(crypto_val);
						$("#cointype").html(payOptionValue);
					}
					if (payOptionValue == 'TRX') {
						var crypto_val = $('#usd_trx').val();
						$('#token_value').val(crypto_val);
						$("#cointype").html(payOptionValue);
					}
					if (payOptionValue == 'USDT') {
						var crypto_val = $('#usd_usdt').val();
						$('#token_value').val(crypto_val);
						$("#cointype").html(payOptionValue);
					}
					if (payOptionValue == 'XRP') {
						var crypto_val = $('#usd_xrp').val();
						$('#token_value').val(crypto_val);
						$("#cointype").html(payOptionValue);
					}
					
					
					
					var convertion_rate = parseFloat($('#token_value').val());

					var paymentFrom = parseFloat(eurval / convertion_rate);
					$("#paymentFrom").attr('value', ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					$("#paymentFrom").val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					$('#payable_crypto_amount').val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					$('#token_amount').val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					
					
					//Bonus calculate
						var crypto_value = parseFloat(paymentFrom * crypto_val / {{fiti_value('current_price')}} );
						
						console.log(crypto_value);
						
						//var bonus_percentage = get_bonus_percentage(crypto_value);
						var bonus_percentage = {{set_bonus_percentage1('value')}};
						//console.log(bonus_percentage);
						$('.payment-bonus-amount').html(bonus_percentage+'%');
						$("#bonus_percentage").val(bonus_percentage);
						
						
						var bonus_percentage = parseFloat(bonus_percentage);
						if(isNaN(bonus_percentage)){
							bonus_percentage = 0;
						}
						
						var bonus_amount = {{set_bonus_percentage1('value')}};
						if(bonus_percentage > 0){
							bonus_amount = crypto_value*(bonus_percentage/100);
						}

						var final_payment = crypto_value;
						var received_bonus = bonus_amount;
						var total_received = final_payment+bonus_amount;
						console.log(final_payment);
						$('#final_payment').html(ReplaceNumberWithCommas(final_payment.toFixed(decimals)));
						$('#received_bonus').html(ReplaceNumberWithCommas(received_bonus.toFixed(decimals)));
						$('#total_received').html(ReplaceNumberWithCommas(total_received.toFixed(decimals)));
				}

				//calculate_exchange_cointousd(coinvalFrom);


			/////////////////////// Edit //////////////////////////////////////

			function remove_comma(str) {
				var str = str.replace(/,/g, "");
				return str;
			}

			function restrict_zero(that) {
				var this_val = parseFloat(that.val());
				if (isNaN(this_val) || this_val <= 0) {}
			}

			
				$("input[name='payOption']").change(function() {
				
				var decimals = 4;
				
				var eurval = 1000;
				$("#choosen_crypto").val($(this).val());
				var choosen_current_currency = $(this).val();
				//alert(choosen_current_currency);
				$("#cointype").html(choosen_current_currency);
			 	// added
				$("#paymentGet").val(eurval);
				
				



				 var paymentFrom = parseFloat(remove_comma($("#paymentFrom").val()));

				//console.log(paymentFrom);
				if (isNaN(paymentFrom)) {
					paymentFrom = 0;
				} 

				//$('.tranx-payment-address').attr('id', 'wallet_address');
				if (choosen_current_currency == 'ETH') {
					crypto_val = $('#usd_eth').val();
					$('#token_value').val(crypto_val);		
					
				}
				if (choosen_current_currency == 'BTC') {
					crypto_val = $('#usd_btc').val();
					$('#token_value').val(crypto_val);
					
				}
				if (choosen_current_currency == 'LTC') {
					crypto_val = $('#usd_ltc').val();
					$('#token_value').val(crypto_val);
				}
				if (choosen_current_currency == 'TRX') {
					crypto_val = $('#usd_trx').val();
					$('#token_value').val(crypto_val);
				}
				if (choosen_current_currency == 'USDT') {
					crypto_val = $('#usd_usdt').val();
					$('#token_value').val(crypto_val);
				}
				if (choosen_current_currency == 'XRP') {
					crypto_val = $('#usd_xrp').val();
					$('#token_value').val(crypto_val);
				}
				

				//var crypto_value = parseFloat(paymentFrom * crypto_val * 100);
				//var crypto_value_in_usd = parseFloat(crypto_value/100);
				
				var convertion_rate = parseFloat($('#token_value').val());


				var paymentFrom = parseFloat(eurval / convertion_rate);

				/* $('#payable_crypto_amount').val(crypto_value);
				$('#tokenamountID').html(crypto_value_in_usd.toFixed(4));
				$('#paymentGet').val(crypto_value_in_usd.toFixed(4));
				$('#token_amount').val(crypto_value); */
				
				$("#paymentFrom").attr('value', ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
				$("#paymentFrom").val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
				$('#payable_crypto_amount').val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
				$('#token_amount').val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
				
				//Bonus calculate
					
					//var bonus_percentage = get_bonus_percentage(crypto_value);
					
					var bonus_percentage = {{set_bonus_percentage1('value')}};
			
					console.log(bonus_percentage);
					$('.payment-bonus-amount').html(bonus_percentage+'%');
					$("#bonus_percentage").val(bonus_percentage);
					
					
					var bonus_percentage = parseFloat(bonus_percentage);
					if(isNaN(bonus_percentage)){
						bonus_percentage = 0;
					}
					
					var bonus_amount = {{set_bonus_percentage1('value')}};
					if(bonus_percentage > 0){
						bonus_amount = crypto_value*(bonus_percentage/100);
					}

					var final_payment = crypto_value;
					var received_bonus = bonus_amount;
					var total_received = final_payment+bonus_amount;
					
					console.log(final_payment);
					$('#final_payment').html(ReplaceNumberWithCommas(final_payment.toFixed(decimals)));
					$('#received_bonus').html(ReplaceNumberWithCommas(received_bonus.toFixed(decimals)));
					$('#total_received').html(ReplaceNumberWithCommas(total_received.toFixed(decimals)));
					
					var current_cur = $("#current_currency").html();
					$('#contribution_amount').html("<?php echo 'Contribution amount'; ?>: <strong>"+ReplaceNumberWithCommas(paymentFrom)+" "+choosen_current_currency+"</strong>");
				
				

				var that = $(this);
				$("em#coin_logo").removeClass();

			});

			calculate_exchange($('#token_value').val());
			
			
			
			
			$("input#paymentGet").keyup(function(){
				restrict_zero($(this));
				calculate_exchange_eurtocoin();
				//calculate_final_payment();
				
				
			});

			$("input#paymentFrom").keyup(function() {
				restrict_zero($(this));
				change_get_value();
				//calculate_final_payment();
				var coinval = $(this).val();

				var coinvalFrom = parseFloat(remove_comma(coinval));

				//console.log(paymentFrom);
				if (isNaN(coinvalFrom)) {
					coinvalFrom = 0;
				}

				calculate_exchange_cointousd(coinvalFrom);

			});

			function calculate_exchange_cointousd(coinvalFrom) {
				var decimals = 4;

				if ($("input[type='radio'].pay-option-check").is(':checked')) {
					  
					var card_type = $("input[type='radio'].pay-option-check:checked").val();
					//alert(card_type);

					if (card_type == 'ETH') {
						crypto_val = $('#usd_eth').val();
					}
					if (card_type == 'BTC') {
						crypto_val = $('#usd_btc').val();
					}
					if (card_type == 'LTC') {
						crypto_val = $('#usd_ltc').val();
					}
					if (card_type == 'TRX') {
						crypto_val = $('#usd_trx').val();
					}
					if (card_type == 'USDT') {
						crypto_val = $('#usd_usdt').val();
					}
					if (card_type == 'XRP') {
						crypto_val = $('#usd_xrp').val();
					}
					
			
				  var crypto_value = parseFloat(coinvalFrom * crypto_val / {{fiti_value('value')}});

					var crypto_value_in_usd = parseFloat(crypto_value * {{fiti_value('value')}});
						
					$('#payable_crypto_amount').val(crypto_value);
					$('#tokenamountID').html(crypto_value_in_usd.toFixed(4));
					$('#paymentGet').val(crypto_value_in_usd.toFixed(4));
					$('#token_amount').val(crypto_value);
					
				var paymentGet = parseFloat(remove_comma($("#paymentGet").val()));
					//console.log(paymentGet);
					if (isNaN(paymentGet)) {
						paymentGet = 0;
					}
					
						if(paymentGet >= 0 && paymentGet <= per1){
							
							var bonus_percentage = {{set_bonus_percentage1('value')}};
						}
						else if(paymentGet > per1 && paymentGet <= per2){
							
							var bonus_percentage = {{set_bonus_percentage2('value')}};

						}else if(paymentGet > per2 && paymentGet <= per3){
							
							var bonus_percentage = {{set_bonus_percentage3('value')}};

						}else if(paymentGet > per3 && paymentGet <= per4){
							
							var bonus_percentage = {{set_bonus_percentage4('value')}};

						}
						else if(paymentGet >= per5 ){
							var bonus_percentage = {{set_bonus_percentage5('value')}};

							
						}
					//Bonus calculate
					
					//var bonus_percentage = get_bonus_percentage(crypto_value);
					//console.log(crypto_value);
					$('.payment-bonus-amount').html(bonus_percentage+'%');
					$("#bonus_percentage").val(bonus_percentage);
					
					
					var bonus_percentage = parseFloat(bonus_percentage);
					if(isNaN(bonus_percentage)){
						bonus_percentage = 0;
					}
					
					var bonus_amount = {{set_bonus_percentage1('value')}};
					if(bonus_percentage > 0){
						bonus_amount = crypto_value*(bonus_percentage/100);
					}

			
					var final_payment = crypto_value;

				
					var received_bonus = bonus_amount;
					var total_received = final_payment+bonus_amount;

					console.log(final_payment);
					
					$('#final_payment').html(ReplaceNumberWithCommas(final_payment.toFixed(decimals)));
					$('#received_bonus').html(ReplaceNumberWithCommas(received_bonus.toFixed(decimals)));
					$('#total_received').html(ReplaceNumberWithCommas(total_received.toFixed(decimals)));
					
					var current_cur = $("#current_currency").html();
					$('#contribution_amount').html("<?php echo 'Contribution amount'; ?>: <strong>"+ReplaceNumberWithCommas(coinvalFrom)+" "+card_type+"</strong>");
				
				} else {

					alert("Select Token Type First");
				}


			}


			function calculate_exchange() {
				var decimals = 2;

				var convertion_rate = parseFloat($('#token_value').val());
				var paymentFrom = parseFloat(remove_comma($("#paymentFrom").val()));
				if (isNaN(paymentFrom)) {
					paymentFrom = 0;
				}
				var paymentGet = parseFloat(paymentFrom / convertion_rate);
				$("#paymentGet").attr('value', ReplaceNumberWithCommas(paymentGet.toFixed(decimals)));
				$("#paymentGet").val(ReplaceNumberWithCommas(paymentGet.toFixed(decimals)));
				
			}

			function calculate_exchange_eurtocoin() {
				var decimals = 4;
				var current_currency = $("input[name='payOption']:checked");
				if ($("input[type='radio'].pay-option-check").is(':checked')) {
						var card_type = $("input[type='radio'].pay-option-check:checked").val();
						//alert(card_type);

						if (card_type == 'ETH') {
							crypto_val = $('#usd_eth').val();
						}
						if (card_type == 'BTC') {
							crypto_val = $('#usd_btc').val();
						}
						if (card_type == 'LTC') {
							crypto_val = $('#usd_ltc').val();
						}
						if (card_type == 'TRX') {
							crypto_val = $('#usd_trx').val();
						}
						if (card_type == 'USDT') {
							crypto_val = $('#usd_usdt').val();
						}
						if (card_type == 'XRP') {
							crypto_val = $('#usd_xrp').val();
						}
						
					var convertion_rate = parseFloat($('#token_value').val());
					/* if (isNaN(convertion_rate)) {
						convertion_rate = 1;
					} else {
						convertion_rate = parseFloat(1 / convertion_rate);
					} */

					var paymentGet = parseFloat(remove_comma($("#paymentGet").val()));
					console.log(paymentGet);
					if (isNaN(paymentGet)) {
						paymentGet = 0;
					}

					var paymentFrom = parseFloat(paymentGet / convertion_rate);
					$("#paymentFrom").attr('value', ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					$("#paymentFrom").val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					$('#payable_crypto_amount').val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					$('#token_amount').val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
					
					
					//Bonus calculate
						var crypto_value = parseFloat(paymentFrom * crypto_val / {{fiti_value('current_price')}});
						
						console.log(crypto_value);
						//var bonus_percentage = get_bonus_percentage(crypto_value);
					
						if(paymentGet >= 0 && paymentGet <= per1){
							
							var bonus_percentage = {{set_bonus_percentage1('value')}};
						}
						else if(paymentGet > per1 && paymentGet <= per2){
							
							var bonus_percentage = {{set_bonus_percentage2('value')}};

						}else if(paymentGet > per2 && paymentGet <= per3){
							
							var bonus_percentage = {{set_bonus_percentage3('value')}};

						}else if(paymentGet > per3 && paymentGet <= per4){
							
							var bonus_percentage = {{set_bonus_percentage4('value')}};

						}
						else if(paymentGet >= per5 ){
							var bonus_percentage = {{set_bonus_percentage5('value')}};

							
						}
						console.log(bonus_percentage);
						$('.payment-bonus-amount').html(bonus_percentage+'%');
						$("#bonus_percentage").val(bonus_percentage);
						
						
						var bonus_percentage = parseFloat(bonus_percentage);
						if(isNaN(bonus_percentage)){
							bonus_percentage = 0;
						}
						
						var bonus_amount = 0;
						if(bonus_percentage > 0){
							bonus_amount = crypto_value*(bonus_percentage/100);
						}

						var final_payment = crypto_value;
						var received_bonus = bonus_amount;
						var total_received = final_payment+bonus_amount;
						
						console.log(final_payment);
						

						$('#final_payment').html(ReplaceNumberWithCommas(final_payment.toFixed(decimals)));
						$('#received_bonus').html(ReplaceNumberWithCommas(received_bonus.toFixed(decimals)));
						$('#total_received').html(ReplaceNumberWithCommas(total_received.toFixed(decimals)));
				}else{
					alert("Select Token Type First");
				}

			}
			
			function calculate_reverse_exchange() {
				var decimals = 2;
				var current_currency = $("input[name='payOption']:checked");
				var convertion_rate = parseFloat($('#token_value').val());
				if (isNaN(convertion_rate)) {
					convertion_rate = 1;
				} else {
					convertion_rate = parseFloat(1 / convertion_rate);
				}

				var paymentGet = parseFloat(remove_comma($("#paymentGet").val()));
				
				if (isNaN(paymentGet)) {
					paymentGet = 0;
				}

				var paymentFrom = parseFloat(paymentGet / convertion_rate);
				$("#paymentFrom").attr('value', ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));
				$("#paymentFrom").val(ReplaceNumberWithCommas(paymentFrom.toFixed(decimals)));

			}

			function change_get_value() {
				//var current_currency = $("input[name='payOption']:checked");
				//calculate_exchange(current_currency);
				calculate_exchange();
			}

			function ReplaceNumberWithCommas(yourNumber) {
				//Seperates the components of the number
				var n = yourNumber.toString().split(".");
				//Comma-fies the first part
				n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				//Combines the two sections
				return n.join(".");
			}
			


			});

			
			
	

		</script>
<!-- Modal End -->


@endsection			