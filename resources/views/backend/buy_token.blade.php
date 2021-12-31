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
<!-- <link rel="stylesheet" href="{{asset('css/buy.css')}}"> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .box-minmax {
    margin-top: 30px;
    width: 608px;
    display: flex;
    justify-content: space-between;
    font-size: 20px;
    color: #000;
    }
    .box-minmax span:first-child {
    margin-left: 10px;
    }
    .rs-range {
    margin-top: 29px;
    width: 600px;
    -webkit-appearance: none;
    }
    .rs-range:focus {
    outline: none;
    }
    .rs-range::-webkit-slider-runnable-track {
    width: 100%;
    height: 1px;
    cursor: pointer;
    box-shadow: none;
    background: #000;
    border-radius: 0px;
    border: 0px solid #010101;
    }
    .rs-range::-moz-range-track {
    width: 100%;
    height: 1px;
    cursor: pointer;
    box-shadow: none;
    background: #000;
    border-radius: 0px;
    border: 0px solid #010101;
    }
    .rs-range::-webkit-slider-thumb {
    box-shadow: none;
    border: 0px solid #000;
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
    height: 42px;
    width: 22px;
    border-radius: 22px;
    background: linear-gradient( 45deg, #f80 100%, #f80 0%);
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -20px;
    }
    .rs-range::-moz-range-thumb {
    box-shadow: none;
    border: 0px solid #000;
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
    height: 42px;
    width: 22px;
    border-radius: 22px;
    background: linear-gradient( 45deg, #f80 100%, #f80 0%);
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -20px;
    }
    .rs-range::-moz-focus-outer {
    border: 0;
    }
    .rs-label {
    position: relative;
    transform-origin: center center;
    display: block;
    width: 70px;
    height: 70px;
    background: linear-gradient( 45deg, #5061ff 0%, #31ceff 100%);
    border-radius: 50%;
    line-height: 30px;
    text-align: center;
    font-weight: bold;
    padding-top: 22px;
    box-sizing: border-box;
    border: 2px solid #fff;
    margin-top: 20px;
    margin-left: -26px;
    left: attr(value);
    color: #fff;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 1rem;
    }
    .rs-label::after {
    content: "";
    display: block;
    font-size: 20px;
    letter-spacing: 0.07em;
    margin-top: -2px;
    }
    .container2 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
	padding: 10px;
    }
    .coin_sale{
    text-align: center;
    }
    .coin_sale svg {
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
    text-align: center;
    }
    button.foo {
    padding: 20px;
    margin: 10px;
    background: none;
    border: none;
    position: relative;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 3px;
    cursor: pointer;
    }
    button.foo:after, button.foo:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    border: 2px solid #f80;
    transition: transform 0.2s;
    }
    button.foo:after {
    transform: translate(3px, 3px);
    }
    button.foo:before {
    transform: translate(-3px, -3px);
    }
    button.foo:hover:after, button.foo:hover:before {
    transform: translate(0);
    }
    .new_current_bonus{
    animation: text-shadow 1.5s ease-in-out infinite;
    }
    @keyframes text-shadow {
    0% {  
    transform: translateY(0);
    text-shadow: 
    0 0 0 #0c2ffb, 
    0 0 0 #2cfcfd, 
    0 0 0 #fb203b, 
    0 0 0 #fefc4b;
    }
    20% {  
    transform: translateY(-1em);
    text-shadow: 
    0 0.125em 0 #0c2ffb, 
    0 0.25em 0 #2cfcfd, 
    0 -0.125em 0 #fb203b, 
    0 -0.25em 0 #fefc4b;
    }
    40% {  
    transform: translateY(0.5em);
    text-shadow: 
    0 -0.0625em 0 #0c2ffb, 
    0 -0.125em 0 #2cfcfd, 
    0 0.0625em 0 #fb203b, 
    0 0.125em 0 #fefc4b;
    }
    60% {
    transform: translateY(-0.25em);
    text-shadow: 
    0 0.03125em 0 #0c2ffb, 
    0 0.0625em 0 #2cfcfd, 
    0 -0.03125em 0 #fb203b, 
    0 -0.0625em 0 #fefc4b;
    }
    80% {  
    transform: translateY(0);
    text-shadow: 
    0 0 0 #0c2ffb, 
    0 0 0 #2cfcfd, 
    0 0 0 #fb203b, 
    0 0 0 #fefc4b;
    }
    }
    @media (prefers-reduced-motion: reduce) {
    * {
    animation: none !important;
    transition: none !important;
    }
    }
    .pay-option-check:checked~label:after {
    background: linear-gradient(
    360deg, #0e8eae 0%, #0e8eae 50%, #00556f 100%);
    }
    .pay-option-check:checked .pay-option-label .coinsale{
    }
    .uppercase {
    text-transform: uppercase;
    }
    .btnnn {
    display: inline-block;
    background: transparent;
    color: inherit;
    font: inherit;
    border: 0;
    outline: 0;
    padding: 0;
    transition: all 200ms ease-in;
    cursor: pointer;
    }
    .btn--primary {
    background: #7f8ff4;
    color: #fff;
    box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1);
    border-radius: 2px;
    padding: 12px 36px;
    }
    .btn--primary:hover {
    background: #6c7ff2;
    }
    .btn--primary:active {
    background: #7f8ff4;
    box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, 0.2);
    }
    .btn--inside {
    margin-left: -96px;
    }
    .form__field {
    width: 250px;
    background: #fff;
    color: #a3a3a3;
    font: inherit;
    box-shadow: 0px 0px 18px 6px rgb(0 0 0 / 10%);
    border: 0;
    outline: 0;
    padding: 22px 18px;
    margin-bottom: 20px;
    }
</style>
<!-- row -->
<div class="row">
    <div class="col-xl col-md-4">
        <input class="pay-option-check" type="radio" id="paybtc" name="payOption" value="BTC">
        <label class="pay-option-label w-100" for="paybtc">
            <div class="card">
                <div class="card-body coin_sale p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                        viewBox="0 0 4091.27 4091.73"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                        <g id="Layer_x0020_1">
                            <metadata id="CorelCorpID_0Corel-Layer"/>
                            <g id="_1421344023328">
                                <path fill="#F7931A" fill-rule="nonzero" d="M4030.06 2540.77c-273.24,1096.01 -1383.32,1763.02 -2479.46,1489.71 -1095.68,-273.24 -1762.69,-1383.39 -1489.33,-2479.31 273.12,-1096.13 1383.2,-1763.19 2479,-1489.95 1096.06,273.24 1763.03,1383.51 1489.76,2479.57l0.02 -0.02z"/>
                                <path fill="white" fill-rule="nonzero" d="M2947.77 1754.38c40.72,-272.26 -166.56,-418.61 -450,-516.24l91.95 -368.8 -224.5 -55.94 -89.51 359.09c-59.02,-14.72 -119.63,-28.59 -179.87,-42.34l90.16 -361.46 -224.36 -55.94 -92 368.68c-48.84,-11.12 -96.81,-22.11 -143.35,-33.69l0.26 -1.16 -309.59 -77.31 -59.72 239.78c0,0 166.56,38.18 163.05,40.53 90.91,22.69 107.35,82.87 104.62,130.57l-104.74 420.15c6.26,1.59 14.38,3.89 23.34,7.49 -7.49,-1.86 -15.46,-3.89 -23.73,-5.87l-146.81 588.57c-11.11,27.62 -39.31,69.07 -102.87,53.33 2.25,3.26 -163.17,-40.72 -163.17,-40.72l-111.46 256.98 292.15 72.83c54.35,13.63 107.61,27.89 160.06,41.3l-92.9 373.03 224.24 55.94 92 -369.07c61.26,16.63 120.71,31.97 178.91,46.43l-91.69 367.33 224.51 55.94 92.89 -372.33c382.82,72.45 670.67,43.24 791.83,-303.02 97.63,-278.78 -4.86,-439.58 -206.26,-544.44 146.69,-33.83 257.18,-130.31 286.64,-329.61l-0.07 -0.05zm-512.93 719.26c-69.38,278.78 -538.76,128.08 -690.94,90.29l123.28 -494.2c152.17,37.99 640.17,113.17 567.67,403.91zm69.43 -723.3c-63.29,253.58 -453.96,124.75 -580.69,93.16l111.77 -448.21c126.73,31.59 534.85,90.55 468.94,355.05l-0.02 0z"/>
                            </g>
                        </g>
                    </svg>
                    <h2 class="fs-24 text-black font-w600 mb-0" id="btc">${{$price_table_json_BTC['USD']}}</h2>
                    <span class="fs-14">Bitcoin</span>
                </div>
            </div>
        </label>
    </div>
    <div class="col-xl col-md-4">
        <input class="pay-option-check" type="radio" id="payeth" name="payOption" value="ETH">
        <label class="pay-option-label w-100" for="payeth">
            <div class="card">
                <div class="card-body coin_sale p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                        viewBox="0 0 784.37 1277.39"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                        <g id="Layer_x0020_1">
                            <metadata id="CorelCorpID_0Corel-Layer"/>
                            <g id="_1421394342400">
                                <g>
                                    <polygon fill="#343434" fill-rule="nonzero" points="392.07,0 383.5,29.11 383.5,873.74 392.07,882.29 784.13,650.54 "/>
                                    <polygon fill="#8C8C8C" fill-rule="nonzero" points="392.07,0 -0,650.54 392.07,882.29 392.07,472.33 "/>
                                    <polygon fill="#3C3C3B" fill-rule="nonzero" points="392.07,956.52 387.24,962.41 387.24,1263.28 392.07,1277.38 784.37,724.89 "/>
                                    <polygon fill="#8C8C8C" fill-rule="nonzero" points="392.07,1277.38 392.07,956.52 -0,724.89 "/>
                                    <polygon fill="#141414" fill-rule="nonzero" points="392.07,882.29 784.13,650.54 392.07,472.33 "/>
                                    <polygon fill="#393939" fill-rule="nonzero" points="0,650.54 392.07,882.29 392.07,472.33 "/>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <h2 class="fs-24 text-black font-w600 mb-0" id="eth">${{$price_table_json_ETH['USD']}}</h2>
                    <span class="fs-14">Etherium</span>
                </div>
            </div>
        </label>
    </div>
    <div class="col-xl col-md-4 col-sm-6">
        <input class="pay-option-check" type="radio" id="paylightcoin" name="payOption" value="LTC">
        <label class="pay-option-label w-100" for="paylightcoin">
            <div class="card">
                <div class="card-body coin_sale p-4">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82.6 82.6">
                        <title>litecoin-ltc-logo</title>
                        <circle cx="41.3" cy="41.3" r="36.83" style="fill:#fff"/>
                        <path d="M41.3,0A41.3,41.3,0,1,0,82.6,41.3h0A41.18,41.18,0,0,0,41.54,0ZM42,42.7,37.7,57.2h23a1.16,1.16,0,0,1,1.2,1.12v.38l-2,6.9a1.49,1.49,0,0,1-1.5,1.1H23.2l5.9-20.1-6.6,2L24,44l6.6-2,8.3-28.2a1.51,1.51,0,0,1,1.5-1.1h8.9a1.16,1.16,0,0,1,1.2,1.12v.38L43.5,38l6.6-2-1.4,4.8Z" style="fill:#345d9d"/>
                    </svg>
                    <h2 class="fs-24 text-black font-w600 mb-0" id="ltc">${{$price_table_json_LTC['USD']}}</h2>
                    <span class="fs-14">LiteCoin</span>
                </div>
            </div>
        </label>
    </div>
    <div class="col-xl col-md-4 col-sm-6">
        <input class="pay-option-check" type="radio" id="paytrx" name="payOption" value="TRX">
        <label class="pay-option-label w-100" for="paytrx">
            <div class="card">
                <div class="card-body coin_sale p-4">
                    <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                        <defs>
                            <style>.cls-1{fill:#ff060a;}</style>
                        </defs>
                        <title>tron</title>
                        <g id="tron">
                            <path class="cls-1" d="M61.55,19.28c-3-2.77-7.15-7-10.53-10l-.2-.14a3.82,3.82,0,0,0-1.11-.62l0,0C41.56,7,3.63-.09,2.89,0a1.4,1.4,0,0,0-.58.22L2.12.37a2.23,2.23,0,0,0-.52.84l-.05.13v.71l0,.11C5.82,14.05,22.68,53,26,62.14c.2.62.58,1.8,1.29,1.86h.16c.38,0,2-2.14,2-2.14S58.41,26.74,61.34,23a9.46,9.46,0,0,0,1-1.48A2.41,2.41,0,0,0,61.55,19.28ZM36.88,23.37,49.24,13.12l7.25,6.68Zm-4.8-.67L10.8,5.26l34.43,6.35ZM34,27.27l21.78-3.51-24.9,30ZM7.91,7,30.3,26,27.06,53.78Z"/>
                        </g>
                    </svg>
                    <h2 class="fs-24 text-black font-w600 mb-0" id="trx">${{$price_table_json_TRX['USD']}}</h2>
                    <span class="fs-14">Tron</span>
                </div>
            </div>
        </label>
    </div>
    <div class="col-xl-9 col-xxl-8">
        <div class="card">
            <div class="card-body d-sm-flex d-block border-0">
                <div class="d-flex justify-content-between w-100">
                    <h4 class="text-black fs-20">Amount Of Contribute</h4>
                    <div class="payment-bonus">
                        <h4
                            class="new_current_bonus">
                            Current Bonusss : <span class="payment-bonus-amount"></span>
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
            <div class="container2">
                <div class="position-relative">
                    <button type="button" id="per1" class="raise pre-color2 foo">{{set_bonus_percentage1('value')}}%</button>
                    <button type="button" id="per2" class="raise pre-color2 foo">{{set_bonus_percentage2('value')}}%</button>
                    <button type="button" id="per3" class="raise pre-color2 foo">{{set_bonus_percentage3('value')}}%</button>
                    <button type="button" id="per4" class="raise pre-color2 foo">{{set_bonus_percentage4('value')}}%</button>
                    <button type="button" id="per5" class="raise pre-color2 foo">{{set_bonus_percentage5('value')}}%</button>
                </div>
                <div class="token_wrapper pay-option-label">
                    <input class="input-bordered restrict_token form__field" name="eur_purchase"
                        type="text" id="paymentGet" min="200" max="1000000" value="1000"  required>
                    <span class="payment-get-cur btn--primary btn--inside uppercase payment-cal-cur unit_text">
                        USD
                        <!-- <select id="country_currency" name="country_currency">
                            <option value="EUR" selected>EUR</option>
                            <option value="USD" >USD</option>
                            </select> -->
                    </span>
                    <span class="token-eq-sign"> = </span>
                    <input name="contribution_amount " id="paymentFrom"
                        class="input-bordered input-with-hint form__field" type="text" value="10"
                        required>
                    @if($errors->has('contribution_amount'))
                    <span
                        style="color:RED;"><small>{{ __($errors->first('contribution_amount')) }}</small></span>
                    @endif
                    <span class="unit_text" id="cointype"></span>
                    <input type="hidden" id="coin" name="coin">
                </div>
                <div class="token-calc-note note note-plane ">
                    <span id="set_minimum_amount" class="note-text text-left text-theme"><em
                        class="fas fa-times-circle text-danger"></em>
                    {{ set_minimum_token_amount('value') }} USD
                    minimum contribution require.</span>
                </div>
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
                                    FITI
                                </h6>
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
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-4 col-md-6">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="text-black fs-20 mb-0">Workout Progress</h4>
            </div>
            <div class="card-body text-center">
                <div class="token-overview-wrap">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center">Current Fiti5 Price : <span
                                style="color:red;font-weight:bold;" id="current_price">$
                                0.01</span>
                            </p>
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
                                                FITI
                                            </h6>
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
                        </div>
                        <div class="col-12">
                            <div class="input-item">
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
                            <a href="workout-statistic.html" class="btn btn-outline-primary rounded">Buy Now</a>
                        </div>
                        <!-- .row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-xl col-md-4 col-sm-6">
        <div class="card">
        	<div class="card-body p-4">
        		<div class="d-inline-block mb-4 ml--12 position-relative donut-chart-sale">
        			<span class="donut1" data-peity='{ "fill": ["rgb(238, 252, 255)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>8/8</span>
        			<small class="text-primary">
        			<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        				<g clip-path="url(#clip3)">
        				<path d="M20 32.9688C17.4153 32.9688 15.3125 30.8659 15.3125 28.2812C15.3125 25.6966 17.4153 23.5938 20 23.5938C22.5847 23.5938 24.6875 25.6966 24.6875 28.2812C24.6875 30.8659 22.5847 32.9688 20 32.9688ZM20 26.7188C19.1384 26.7188 18.4375 27.4197 18.4375 28.2812C18.4375 29.1428 19.1384 29.8438 20 29.8438C20.8616 29.8438 21.5625 29.1428 21.5625 28.2812C21.5625 27.4197 20.8616 26.7188 20 26.7188ZM12.6373 20.7029C14.4202 20.687 16.1845 19.9548 17.8812 18.5266L15.8687 16.1359C13.593 18.0516 11.5632 18.0515 9.28742 16.1359L7.275 18.5267C8.99117 19.9711 10.775 20.7031 12.5782 20.7031C12.5979 20.7031 12.6177 20.703 12.6373 20.7029ZM32.5941 18.5994L30.6873 16.1236C28.3111 17.9535 26.259 17.9616 24.0334 16.1498L22.0605 18.5732C23.7464 19.9458 25.5029 20.632 27.2809 20.632C29.0471 20.6319 30.8346 19.9544 32.5941 18.5994ZM40 9.375H33.6466L40 2.92391V0H29.0625V3.125H35.4159L29.0625 9.57609V12.5H40V9.375ZM36.2987 15.625C36.6737 17.0209 36.875 18.4873 36.875 20C36.875 29.3049 29.3049 36.875 20 36.875C10.6951 36.875 3.125 29.3049 3.125 20C3.125 10.6951 10.6951 3.125 20 3.125C22.1183 3.125 24.146 3.51844 26.0156 4.23422V0.917344C24.0943 0.314141 22.0714 0 20 0C14.6578 0 9.63539 2.08039 5.85781 5.85781C2.08039 9.63539 0 14.6578 0 20C0 25.3422 2.08039 30.3646 5.85781 34.1422C9.63539 37.9196 14.6578 40 20 40C25.3422 40 30.3646 37.9196 34.1422 34.1422C37.9196 30.3646 40 25.3422 40 20C40 18.5101 39.8377 17.0452 39.5224 15.625H36.2987Z" fill="white"/>
        				</g>
        				<defs>
        				<clipPath id="clip3">
        				<rect width="40" height="40" fill="white"/>
        				</clipPath>
        				</defs>
        			</svg>
        			</small>
        			<span class="circle bg-info"></span>
        		</div>
        		<h2 class="fs-24 text-black font-w600 mb-0">8 Hours</h2>
        		<span class="fs-14">Sleeping Potency</span>
        	</div>
        </div>
        </div>
        <div class="col-xl col-md-4 col-sm-6">
        <div class="card">
        	<div class="card-body p-4">
        		<div class="d-inline-block mb-4 ml--12 position-relative donut-chart-sale">
        			<span class="donut1" data-peity='{ "fill": ["rgb(242, 255, 253)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>8/8</span>
        			<small class="text-primary">
        			<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        				<path d="M26.1666 19.5283C27.8064 18.2461 29.0052 16.484 29.5958 14.4879C30.1863 12.4919 30.1393 10.3612 29.4611 8.39317C28.783 6.4251 27.5076 4.71772 25.8128 3.5091C24.118 2.30048 22.0883 1.65088 20.0066 1.65088C17.925 1.65088 15.8953 2.30048 14.2005 3.5091C12.5057 4.71772 11.2303 6.4251 10.5522 8.39317C9.87403 10.3612 9.82697 12.4919 10.4175 14.4879C11.0081 16.484 12.2069 18.2461 13.8466 19.5283C10.7486 20.761 8.09109 22.8939 6.21709 25.6517C4.34309 28.4096 3.33862 31.6657 3.33331 35V36.6667C3.33331 37.1087 3.50891 37.5326 3.82147 37.8452C4.13403 38.1577 4.55795 38.3333 4.99998 38.3333H35C35.442 38.3333 35.8659 38.1577 36.1785 37.8452C36.4911 37.5326 36.6666 37.1087 36.6666 36.6667V35C36.6624 31.6673 35.6599 28.4122 33.7884 25.6546C31.9169 22.8969 29.2622 20.7631 26.1666 19.5283ZM13.3333 11.6667C13.3333 10.3481 13.7243 9.0592 14.4569 7.96287C15.1894 6.86654 16.2306 6.01206 17.4488 5.50748C18.6669 5.00289 20.0074 4.87087 21.3006 5.12811C22.5938 5.38534 23.7817 6.02028 24.714 6.95263C25.6464 7.88498 26.2813 9.07286 26.5385 10.3661C26.7958 11.6593 26.6638 12.9997 26.1592 14.2179C25.6546 15.4361 24.8001 16.4773 23.7038 17.2098C22.6075 17.9423 21.3185 18.3333 20 18.3333C18.2319 18.3333 16.5362 17.631 15.2859 16.3807C14.0357 15.1305 13.3333 13.4348 13.3333 11.6667ZM6.66665 35C6.66665 31.4638 8.0714 28.0724 10.5719 25.5719C13.0724 23.0714 16.4638 21.6667 20 21.6667C23.5362 21.6667 26.9276 23.0714 29.4281 25.5719C31.9286 28.0724 33.3333 31.4638 33.3333 35H6.66665Z" fill="white"/>
        			</svg>
        			</small>
        			<span class="circle bg-success"></span>
        		</div>
        		<h2 class="fs-24 text-black font-w600 mb-0">974 Person</h2>
        		<span class="fs-14">Total Members</span>
        	</div>
        </div>
        </div> -->
    <div class="col-xl-9 col-xxl-8">
        <div class="card">
            <div class="card-header flex-wrap pb-0 border-0">
                <div class="mr-auto pr-3 mb-2">
                    <h4 class="text-black fs-20">Workout Statistic</h4>
                    <p class="fs-13 mb-2 mb-sm-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
                <div class="d-flex mr-3 mr-sm-5 mb-2">
                    <svg class="mr-2 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip4)">
                            <path d="M0.988941 17.074C0.32826 17.2006 -0.1046 17.8385 0.021967 18.4992C0.133346 19.0814 0.644678 19.4864 1.21676 19.4864C1.2927 19.4864 1.37117 19.4788 1.44712 19.4636L6.45918 18.5017C6.74522 18.446 7.00089 18.2916 7.18315 18.0638L9.33479 15.3502L8.61591 14.9832C8.08433 14.7148 7.71473 14.2288 7.58816 13.639L5.55802 16.1982L0.988941 17.074Z" fill="#FF9432"/>
                            <path d="M18.84 6.493C20.3135 6.493 21.508 5.29848 21.508 3.82496C21.508 2.35144 20.3135 1.15692 18.84 1.15692C17.3664 1.15692 16.1719 2.35144 16.1719 3.82496C16.1719 5.29848 17.3664 6.493 18.84 6.493Z" fill="#FF9432"/>
                            <path d="M13.0179 3.15671C12.7369 2.86813 12.4762 2.75422 12.1902 2.75422C12.0864 2.75422 11.9826 2.76941 11.8712 2.79472L7.29202 3.88067C6.65918 4.03002 6.26936 4.66539 6.4187 5.29569C6.5478 5.8374 7.02876 6.20192 7.56287 6.20192C7.65403 6.20192 7.74513 6.19179 7.83628 6.16901L11.7371 5.24507C11.9902 5.52605 13.2584 6.90057 13.4888 7.14358C11.8763 8.86996 10.2638 10.5938 8.65135 12.3202C8.62604 12.3481 8.60328 12.3759 8.58047 12.4037C8.10964 13.0036 8.25395 13.9453 8.96273 14.3022L13.9064 16.826L11.3396 20.985C10.9878 21.5571 11.165 22.3063 11.7371 22.6607C11.937 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2658L16.6732 16.9829C16.8529 16.6918 16.901 16.34 16.8073 16.0134C16.7137 15.6843 16.4884 15.411 16.1821 15.2565L12.8331 13.5529L16.3543 9.7863L19.0122 12.0392C19.2324 12.2265 19.5032 12.3176 19.7716 12.3176C20.0601 12.3176 20.3487 12.2113 20.574 12.0038L23.6243 9.16106C24.1002 8.71808 24.128 7.97386 23.685 7.49797C23.4521 7.24989 23.1382 7.12333 22.8243 7.12333C22.5383 7.12333 22.2497 7.22711 22.0244 7.43721L19.7412 9.56101C19.7386 9.56354 14.0178 4.1819 13.0179 3.15671Z" fill="#FF9432"/>
                        </g>
                        <defs>
                            <clipPath id="clip4">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <div>
                        <h4 class="fs-18 text-black font-w600 mb-0">45%</h4>
                        <span class="fs-12 text-black">Running</span>
                    </div>
                </div>
                <div class="d-flex mr-3 mr-sm-5 mb-2">
                    <svg class="mr-2 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.8586 5.22599L5.87121 10.5543C5.50758 11.0846 5.64394 11.8068 6.17172 12.1679L11.1945 15.6098V18.9558C11.1945 19.5921 11.6995 20.125 12.3359 20.1376C12.9874 20.1477 13.5177 19.625 13.5177 18.976V15.0013C13.5177 14.6174 13.3283 14.2588 13.0126 14.0442L9.79041 11.8346L12.5025 8.95836L13.8914 12.1225C14.0758 12.5442 14.4949 12.817 14.9546 12.817H19.1844C19.8207 12.817 20.3536 12.3119 20.3662 11.6755C20.3763 11.024 19.8536 10.4937 19.2046 10.4937H15.7172C15.2576 9.44824 14.7677 8.41288 14.3409 7.35228C14.1237 6.81693 14.0025 6.5846 13.6036 6.21592C13.5227 6.14016 12.9596 5.62501 12.4571 5.16541C11.995 4.74619 11.2828 4.77397 10.8586 5.22599Z" fill="#1EA7C5"/>
                        <path d="M15.6162 5.80681C17.0861 5.80681 18.2778 4.61517 18.2778 3.1452C18.2778 1.67523 17.0861 0.483582 15.6162 0.483582C14.1462 0.483582 12.9545 1.67523 12.9545 3.1452C12.9545 4.61517 14.1462 5.80681 15.6162 5.80681Z" fill="#1EA7C5"/>
                        <path d="M4.89899 23.5164C7.60463 23.5164 9.79798 21.3231 9.79798 18.6174C9.79798 15.9118 7.60463 13.7184 4.89899 13.7184C2.19335 13.7184 0 15.9118 0 18.6174C0 21.3231 2.19335 23.5164 4.89899 23.5164Z" fill="#1EA7C5"/>
                        <path d="M19.101 23.5164C21.8066 23.5164 24 21.3231 24 18.6174C24 15.9118 21.8066 13.7184 19.101 13.7184C16.3954 13.7184 14.202 15.9118 14.202 18.6174C14.202 21.3231 16.3954 23.5164 19.101 23.5164Z" fill="#1EA7C5"/>
                    </svg>
                    <div>
                        <h4 class="fs-18 text-black font-w600 mb-0">27%</h4>
                        <span class="fs-12 text-black">Cycling</span>
                    </div>
                </div>
                <div class="d-flex mr-3 mr-sm-5 mb-2">
                    <!-- <svg class="mr-2 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> -->
                    <g clip-path="url(#clip5)">
                        <path d="M11.9997 5.9999C13.6566 5.9999 14.9997 4.65677 14.9997 2.99995C14.9997 1.34312 13.6566 0 11.9997 0C10.3429 0 8.9998 1.34312 8.9998 2.99995C8.9998 4.65677 10.3429 5.9999 11.9997 5.9999Z" fill="#C046D3"/>
                        <path d="M17.8305 21.8297L14.1361 23.2153L15.9733 23.9042C16.764 24.1978 17.6171 23.791 17.9046 23.0261C18.0577 22.618 18.0124 22.1905 17.8305 21.8297Z" fill="#C046D3"/>
                        <path d="M5.02677 16.5949C4.25263 16.3078 3.3869 16.6974 3.09543 17.473C2.80467 18.2486 3.19799 19.1128 3.97354 19.4043L5.5918 20.0111L9.86412 18.4088L5.02677 16.5949Z" fill="#C046D3"/>
                        <path d="M20.9045 17.473C20.613 16.6974 19.7473 16.3078 18.9732 16.5949L6.97345 21.0948C6.19781 21.3863 5.80453 22.2505 6.0953 23.0262C6.38278 23.7908 7.23572 24.198 8.02664 23.9043L20.0264 19.4044C20.8021 19.1129 21.1953 18.2487 20.9045 17.473Z" fill="#C046D3"/>
                        <path d="M22.4998 11.9998H18.9271L16.3417 6.82899C16.073 6.29213 15.5265 5.98627 14.9632 5.99991L11.9997 5.9999L9.03663 5.99991C8.47343 5.98627 7.92757 6.29217 7.65828 6.82899L5.07289 11.9998H1.50022C0.671898 11.9998 0.000274658 12.6714 0.000274658 13.4997C0.000274658 14.328 0.671898 14.9997 1.50022 14.9997H6.00012C6.56848 14.9997 7.08776 14.6789 7.34187 14.1706L9.00002 10.8543V16.483L11.9999 17.6079L14.9999 16.4827V10.8543L16.6581 14.1706C16.9122 14.6789 17.4315 14.9997 17.9998 14.9997H22.4997C23.328 14.9997 23.9997 14.328 23.9997 13.4997C23.9997 12.6714 23.3281 11.9998 22.4998 11.9998Z" fill="#C046D3"/>
                    </g>
                    <defs>
                        <clipPath id="clip5">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                    </svg>
                    <div>
                        <!-- <h4 class="fs-18 text-black font-w600 mb-0">86%</h4>
                            <span class="fs-12 text-black">Yoga</span> -->
                    </div>
                </div>
                <div class="dropdown mt-sm-0 mt-3 mb-0">
                    <button type="button" class="btn rounded border border-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Weekly
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0);">Link 1</a>
                        <a class="dropdown-item" href="javascript:void(0);">Link 2</a>
                        <a class="dropdown-item" href="javascript:void(0);">Link 3</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-3">
                <div id="chartBar"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-4 col-md-6">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="text-black fs-20 mb-0">Workout Progress</h4>
            </div>
            <div class="card-body text-center">
                <div id="radialBar"></div>
                <p class="fs-14">Today's Progress: 8100 Steps out of 10000 </p>
                <a href="workout-statistic.html" class="btn btn-outline-primary rounded">Set Target</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-4 col-md-6">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="text-black fs-20 mb-0">Duration Worked</h4>
            </div>
            <div class="card-body">
                <div class="media align-items-center border border-warning rounded p-3 mb-md-4 mb-3">
                    <div class="d-inline-block mr-3 position-relative donut-chart-sale2">
                        <span class="donut2" data-peity='{ "fill": ["rgb(255, 148, 50)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                        <small class="text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip6)">
                                    <path d="M0.988926 17.074C0.328245 17.2006 -0.104616 17.8385 0.0219518 18.4992C0.133331 19.0814 0.644663 19.4864 1.21675 19.4864C1.29269 19.4864 1.37116 19.4788 1.4471 19.4636L6.45917 18.5017C6.74521 18.446 7.00087 18.2916 7.18313 18.0638L9.33478 15.3502L8.6159 14.9832C8.08432 14.7148 7.71471 14.2288 7.58815 13.639L5.55801 16.1982L0.988926 17.074Z" fill="#FF9432"/>
                                    <path d="M18.84 6.493C20.3135 6.493 21.508 5.29848 21.508 3.82496C21.508 2.35144 20.3135 1.15692 18.84 1.15692C17.3664 1.15692 16.1719 2.35144 16.1719 3.82496C16.1719 5.29848 17.3664 6.493 18.84 6.493Z" fill="#FF9432"/>
                                    <path d="M13.0179 3.15671C12.7369 2.86813 12.4762 2.75422 12.1902 2.75422C12.0863 2.75422 11.9826 2.76941 11.8712 2.79472L7.292 3.88067C6.65917 4.03002 6.26934 4.66539 6.41869 5.29569C6.54779 5.8374 7.02874 6.20192 7.56286 6.20192C7.65401 6.20192 7.74511 6.19179 7.83627 6.16901L11.7371 5.24507C11.9902 5.52605 13.2584 6.90057 13.4888 7.14358C11.8763 8.86996 10.2638 10.5938 8.65134 12.3202C8.62602 12.3481 8.60326 12.3759 8.58046 12.4037C8.10963 13.0036 8.25394 13.9453 8.96272 14.3022L13.9064 16.826L11.3396 20.985C10.9878 21.5571 11.165 22.3063 11.737 22.6607C11.937 22.7848 12.1572 22.843 12.3749 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2658L16.6732 16.9829C16.8529 16.6918 16.901 16.34 16.8073 16.0134C16.7137 15.6843 16.4884 15.411 16.1821 15.2565L12.8331 13.5529L16.3542 9.7863L19.0122 12.0392C19.2324 12.2265 19.5032 12.3176 19.7716 12.3176C20.0601 12.3176 20.3487 12.2113 20.574 12.0038L23.6242 9.16106C24.1002 8.71808 24.128 7.97386 23.685 7.49797C23.4521 7.24989 23.1382 7.12333 22.8243 7.12333C22.5383 7.12333 22.2497 7.22711 22.0244 7.43721L19.7412 9.56101C19.7386 9.56354 14.0178 4.1819 13.0179 3.15671Z" fill="#FF9432"/>
                                </g>
                                <defs>
                                    <clipPath id="clip6">
                                        <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </small>
                    </div>
                    <div>
                        <h4 class="fs-18 text-black mb-0">Running</h4>
                        <span class="fs-14 text-warning">52 hours, 2min</span>
                    </div>
                </div>
                <div class="media align-items-center border border-info rounded p-3 mb-md-4 mb-3">
                    <div class="d-inline-block mr-3 position-relative donut-chart-sale2">
                        <span class="donut2" data-peity='{ "fill": ["rgb(30, 167, 197)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                        <small class="text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip7)">
                                    <path d="M10.8586 5.22596L5.87121 10.5542C5.50758 11.0845 5.64394 11.8068 6.17172 12.1679L11.1945 15.6098V18.9558C11.1945 19.5921 11.6995 20.125 12.3359 20.1376C12.9874 20.1477 13.5177 19.6249 13.5177 18.976V15.0012C13.5177 14.6174 13.3283 14.2588 13.0126 14.0442L9.79041 11.8346L12.5025 8.95833L13.8914 12.1225C14.0758 12.5442 14.4949 12.8169 14.9546 12.8169H19.1844C19.8207 12.8169 20.3536 12.3119 20.3662 11.6755C20.3763 11.024 19.8536 10.4937 19.2046 10.4937H15.7172C15.2576 9.44821 14.7677 8.41285 14.3409 7.35225C14.1237 6.81689 14.0025 6.58457 13.6036 6.21588C13.5227 6.14013 12.9596 5.62498 12.4571 5.16538C11.995 4.74616 11.2828 4.77394 10.8586 5.22596Z" fill="#1EA7C5"/>
                                    <path d="M15.6162 5.80678C17.0861 5.80678 18.2778 4.61514 18.2778 3.14517C18.2778 1.6752 17.0861 0.483551 15.6162 0.483551C14.1462 0.483551 12.9545 1.6752 12.9545 3.14517C12.9545 4.61514 14.1462 5.80678 15.6162 5.80678Z" fill="#1EA7C5"/>
                                    <path d="M4.89899 23.5164C7.60463 23.5164 9.79798 21.323 9.79798 18.6174C9.79798 15.9117 7.60463 13.7184 4.89899 13.7184C2.19335 13.7184 0 15.9117 0 18.6174C0 21.323 2.19335 23.5164 4.89899 23.5164Z" fill="#1EA7C5"/>
                                    <path d="M19.101 23.5164C21.8066 23.5164 24 21.323 24 18.6174C24 15.9117 21.8066 13.7184 19.101 13.7184C16.3954 13.7184 14.202 15.9117 14.202 18.6174C14.202 21.323 16.3954 23.5164 19.101 23.5164Z" fill="#1EA7C5"/>
                                </g>
                                <defs>
                                    <clipPath id="clip7">
                                        <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </small>
                    </div>
                    <div>
                        <h4 class="fs-18 text-black mb-0">Cycling</h4>
                        <span class="fs-14 text-info">23 hours, 45min</span>
                    </div>
                </div>
                <!-- <div class="media align-items-center border border-secondary rounded p-3">
                    <div class="d-inline-block mr-3 position-relative donut-chart-sale2">
                    	<span class="donut2" data-peity='{ "fill": ["rgb(192, 70, 211)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>2/9</span>
                    	<small class="text-primary">
                    		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    			<g clip-path="url(#clip8)">
                    			<path d="M11.9997 5.9999C13.6566 5.9999 14.9997 4.65677 14.9997 2.99995C14.9997 1.34312 13.6566 0 11.9997 0C10.3429 0 8.9998 1.34312 8.9998 2.99995C8.9998 4.65677 10.3429 5.9999 11.9997 5.9999Z" fill="#C046D3"/>
                    			<path d="M17.8305 21.8297L14.1361 23.2153L15.9733 23.9042C16.764 24.1978 17.6171 23.791 17.9046 23.0261C18.0577 22.618 18.0124 22.1905 17.8305 21.8297Z" fill="#C046D3"/>
                    			<path d="M5.02677 16.5949C4.25263 16.3078 3.3869 16.6974 3.09543 17.473C2.80467 18.2486 3.19799 19.1128 3.97354 19.4043L5.5918 20.0111L9.86412 18.4088L5.02677 16.5949Z" fill="#C046D3"/>
                    			<path d="M20.9045 17.473C20.613 16.6974 19.7473 16.3078 18.9732 16.5949L6.97345 21.0948C6.19781 21.3863 5.80453 22.2505 6.0953 23.0262C6.38278 23.7908 7.23572 24.198 8.02664 23.9043L20.0264 19.4044C20.8021 19.1129 21.1953 18.2487 20.9045 17.473Z" fill="#C046D3"/>
                    			<path d="M22.4998 11.9998H18.9271L16.3417 6.82899C16.073 6.29213 15.5265 5.98627 14.9632 5.99991L11.9997 5.9999L9.03663 5.99991C8.47343 5.98627 7.92757 6.29217 7.65828 6.82899L5.07289 11.9998H1.50022C0.671898 11.9998 0.000274658 12.6714 0.000274658 13.4997C0.000274658 14.328 0.671898 14.9997 1.50022 14.9997H6.00012C6.56848 14.9997 7.08776 14.6789 7.34187 14.1706L9.00002 10.8543V16.483L11.9999 17.6079L14.9999 16.4827V10.8543L16.6581 14.1706C16.9122 14.6789 17.4315 14.9997 17.9998 14.9997H22.4997C23.328 14.9997 23.9997 14.328 23.9997 13.4997C23.9997 12.6714 23.3281 11.9998 22.4998 11.9998Z" fill="#C046D3"/>
                    			</g>
                    			<defs>
                    			<clipPath id="clip8">
                    			<rect width="24" height="24" fill="white"/>
                    			</clipPath>
                    			</defs>
                    		</svg>
                    	</small>
                    </div>
                    <div>
                    	<h4 class="fs-18 text-black mb-0">Yoga</h4>
                    	<span class="fs-14 text-secondary">16 hours, 2min</span>
                    </div>
                    </div> -->
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-xxl-8">
        <div class="card">
            <div class="card-header d-sm-flex d-block pb-0 border-0">
                <div class="mr-auto pr-3">
                    <h4 class="text-black fs-20">Calories Chart</h4>
                    <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
                <div class="dropdown mt-sm-0 mt-3">
                    <button type="button" class="btn rounded border border-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Weekly
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0);">Link 1</a>
                        <a class="dropdown-item" href="javascript:void(0);">Link 2</a>
                        <a class="dropdown-item" href="javascript:void(0);">Link 3</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chartTimeline"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-sm-flex d-block pb-0 border-0">
                <div class="mr-auto pr-3">
                    <h4 class="text-black fs-20">Featured Diet Menus</h4>
                    <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
                <div class="card-action card-tabs mt-3 mt-sm-0 mt-3 mb-sm-0 mb-3 mt-sm-0 mr-0 mr-md-5">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#Breakfast" role="tab">
                            Breakfast
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Lunch" role="tab">
                            Lunch
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Dinner" role="tab">
                            Dinner
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="food-menu.html" class="btn btn-primary rounded d-none d-md-block">View More</a>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Breakfast" role="tabpanel">
                        <div class="featured-menus owl-carousel">
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/3.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/3.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Ilham</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Sweet Orange Fruits with Lemon</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/1.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/1.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Andrew</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Fresh or Frozen (No Sugar Added) Fruits</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">568 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/1.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/1.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Andrew</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Fresh or Frozen (No Sugar Added) Fruits</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">568 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/2.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/2.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Chintya</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Chicken Egg with fresh tomatos</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">223 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Lunch" role="tabpanel">
                        <div class="featured-menus owl-carousel">
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/1.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/1.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Andrew</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Fresh or Frozen (No Sugar Added) Fruits</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">568 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/3.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/3.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Ilham</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Sweet Orange Fruits with Lemon</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/2.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/2.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Chintya</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Chicken Egg with fresh tomatos</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">223 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/1.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/1.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Andrew</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Fresh or Frozen (No Sugar Added) Fruits</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">568 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Dinner" role="tabpanel">
                        <div class="featured-menus owl-carousel">
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/1.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/1.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Andrew</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Fresh or Frozen (No Sugar Added) Fruits</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">568 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/2.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/2.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Chintya</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Chicken Egg with fresh tomatos</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">223 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/3.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/3.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Ilham</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Sweet Orange Fruits with Lemon</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-sm-flex p-3 border border-light rounded">
                                    <a href="ecom-product-detail.html"><img class="mr-4 food-image rounded" src="images/menus/1.png" alt="" width="160"></a>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="rounded-circle mr-2 profile-image" src="images/testimonial/1.jpg" alt="" width="30">
                                            <span class="fs-14 text-primary">Andrew</span>
                                        </div>
                                        <h6 class="fs-16 mb-4"><a href="ecom-product-detail.html" class="text-black">Fresh or Frozen (No Sugar Added) Fruits</a></h6>
                                        <ul>
                                            <li class="mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                                            <li><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">568 Reviews</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    </div>
                    <!-- .alert-box -->
                    @endif
                    @if(Session::get('message') !== null)
                    <div class="alert-box alert-primary">
                        <div class="alert-txt"><em class="ti ti-check"></em>{{ Session::get('message') }}</div>
                    </div>
                    <!-- .alert-box -->
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
                                            price
                                        </h4>
                                    </div>
                                </div>
                                <!-- .row -->
                                <div class="col-12">
                                    <div class="card-head font-2xl">
                                        <h4 class="card-title">Amount of contribute</h4>
                                    </div>
                                    <div class="payment-get mt-5 mt-md-4">
                                        <div class="token_wrapper pay-option-label">
                                            <input class="input-bordered restrict_token" name="eur_purchase"
                                                type="text" id="paymentGet" min="200" max="1000000" value="1000"  required>
                                            <span class="payment-get-cur payment-cal-cur unit_text">
                                                USD
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
                                                        Current Bonusss : <span class="payment-bonus-amount"></span>
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
                            </div>
                            <!-- .row -->
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
                                                        0.01</span>
                                                    </p>
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
                                                                        FITI
                                                                    </h6>
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
                                                </div>
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
                                                <!-- .row -->
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
                                        distributed end of IFO Token Sales. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- .card-innr -->
                    </div>
                    <!-- .content-area -->
            </form>
            </div><!-- .col -->
        </div>
        <!-- .container -->
    </div>
    <!-- .container -->
</div>
<!-- .page-content -->
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