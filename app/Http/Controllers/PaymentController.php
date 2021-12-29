<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Storage;
use App\Transaction;
use DB;
use Mail;

class PaymentController extends Controller
{
    public function apiCall($cmd, $req = array()){

		$debug_email = 'info@edufex.com';
		//$user_detail = get_user_detail_by_id(get_current_front_user_id());
        //$debug_email = $user_detail->email;
		
        $public_key = 'e04539deabcef1eab0320c6d9f5ff763034462ff40cb26963c66dfb44976db59';
        $private_key = 'b48fE24edf8C8C5d68f879D57Ba5e4cb7183b7e619C4a83dA075448bC90ff038';
		        
        $req['version'] = 1; 
        $req['cmd'] = $cmd; 
        $req['key'] = $public_key; 
        $req['format'] = 'json'; //supported values are json and xml  
        $req['buyer_email'] = $debug_email;
        $post_data = http_build_query($req, '', '&'); 
        $hmac = hash_hmac('sha512', $post_data, $private_key); 
        static $ch = NULL; 
        if ($ch === NULL) { 
            $ch = curl_init('https://www.coinpayments.net/api.php'); 
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        } 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac)); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
        
        $data = curl_exec($ch);
		
        if ($data !== FALSE) { 
            if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
                $dec = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING); 
            } else { 
                $dec = json_decode($data, TRUE); 
            } 
            if ($dec !== NULL && count($dec)) { 
                return $dec; 
            } else {
                return array('error' => 'Unable to parse JSON result ('.json_last_error().')'); 
            } 
        } else { 
            return array('error' => 'cURL error: '.curl_error($ch)); 
        }    
    }
	
	
    public function pay(Request $request){
		
		$eur_to_inr = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=EUR&tsyms=USD,EUR&api_key=1441933b04b3be0a07c3007578213370dabed7c1f55e8ba29c027cbb67415a57");

		$euro_json_inr = json_decode($eur_to_inr,true);

		$country_currency = $request->country_currency;

		if($country_currency == 'EUR'){
		$set_minimum_euro = set_minimum_token_amount('value');
		}else if($country_currency == 'USD'){
			$set_minimum_euro = set_minimum_token_amount('value') * $euro_json_inr['USD'];

			
		}

		
        $this->validate($request,[
			'eur_purchase' => 'required|numeric|min:'.$set_minimum_euro,
            'contribution_amount' => 'required|min:0.00001',
            'aggrement' => 'required'
        ],[
            'contribution_amount.required' => 'Please enter amount !',
            'contribution_amount.numeric' => 'Please enter numeric value !',
            'aggrement.required' => 'Please check aggrement !',
        ]);
		
        $params = $request->all();
        $currency = $params['payOption'];
        $country_currency = $params['country_currency'];
        $amount = $params['contribution_amount'];
        $eur_purchase = $params['eur_purchase'];
        $base_amount = round($params['payable_crypto_amount']);
        $bonus_percentage = $params['bonus_percentage'];
        $coins = ['BTC','LTC','ETH','LTCT','TRX','USDT','XRP'];
		$user_id = auth()->user()->id;
		$udetail = get_user_detail_by_id($user_id);
		$uemail = $udetail->email;
		
		
		
		$bonus_amount = 0;
		
		$edx_amount = $eur_purchase / edx_value('current_price');
		
		
		if($bonus_percentage > 0){
			
			$bonus_amount = (float)($edx_amount*($bonus_percentage/100));
		}
		
		$total_amount = (float)$edx_amount+(float)$bonus_amount;
		
		if($user_id > 0){
		
            if(isset($amount) && $amount>0 && in_array($currency,$coins)){
                $response = $this->apiCall('create_transaction',['amount'=>$amount, 'currency1'=>$currency , 'currency2'=>$currency , 'custom'=>$total_amount , 'buyer_name' => $user_id,'ipn_url'=>'https://edufex.com/done','succes_url'=>'https://edufex.com/user/dashboard','cancel_url'=>'https://edufex.com/user/dashboard']);
                //dd($response); exit;
				//print_r($response); die;
                if(strcmp($response['error'],"ok")==0){
					
					$curr_date_time = date('Y-m-d H:i:s');
					
                     DB::table("contribution")->insert(['base_currency'=>'EDUX','base_amount'=>$edx_amount,'amount'=>$eur_purchase,'currency'=>$country_currency,'email'=>$uemail,'payment_currency'=>$currency,'payment_amount'=>$amount,'submitted_by'=> $user_id,'bonus_percentage'=>$bonus_percentage,'bonus_amount'=>$bonus_amount,'status'=>0,'approved_by'=>0,'transfer_proof'=>$response['result']['txn_id'],'status_url'=>$response['result']['status_url'],'checkout_url'=>$response['result']['checkout_url'],'created_at'=>$curr_date_time,'updated_at'=>$curr_date_time]);
					
					$txn_id = $response['result']['txn_id'];
					
					$contribution_id = DB::table("contribution")->where('transfer_proof','=',$txn_id)->first()->id;
					
					
					DB::table("transaction")->insert(['type'=>1,'parent_type'=>'contribution','parent_id'=>$contribution_id,'amount'=>$total_amount,'exchange_rate'=>$amount,'exchange_currency'=>$currency,'transaction_for'=>$user_id,'created_at'=>$curr_date_time,'updated_at'=>$curr_date_time]);
					
					
                    return Redirect::to($response['result']['checkout_url']);
                }else{
					$err_msg = $response['error'];
					return back()->with('error', $err_msg); 
                }
            }else{
				echo $user_id.'hiu'; die;
			}
        }else{
			return back()->with('error', 'Amount Parameters Invalid'); 
        }
        
    }
	
    public function save(Request $request){
        
		Storage::put('postData.txt',json_encode($request->all()));
		
        $params = $request->all();
        
        $cp_merchant_id = '9da07a4c09a5c924e88186b3b91681b6'; 
        $cp_ipn_secret = 'Mumbai2020$';
		$cp_debug_email = 'info@edufex.com';
        
        $txn_id = $params['txn_id']; 
        $amount1 = floatval($params['amount1']); 
        $amount2 = floatval($params['amount2']); 
        $currency1 = $params['currency1']; 
        $currency2 = $params['currency2']; 
        $status = intval($params['status']); 
        $status_text = $params['status_text']; 
        $user_id = $params['buyer_name'];
        $edx_amount = $params['custom'];


		
		$user_preio_wallet_balance = 0;
		
		$user_preio_wallet = DB::table('users')->where('id','=',$user_id)->first();
		
		if(!empty($user_preio_wallet)){

			$user_preio_wallet_balance = $user_preio_wallet-> preio_wallet_balance;	
			$total_wallet_balance = $user_preio_wallet->wallet_balance;	
		}

			
        $contribution_data = DB::table("contribution")->where('transfer_proof','=',$txn_id)->first();
		
		$contribution_id = $contribution_data->id;
		$base_amount = $contribution_data->base_amount;
		$order_currency = $contribution_data->currency;
		$payment_currency = $contribution_data->payment_currency;
		
		$curr_date_time = date('Y-m-d H:i:s');
		
        if ($status >= 100 || $status == 2) {
            
			DB::table('contribution')->where('transfer_proof','=',$txn_id)->update(['status_msg'=>$status_text,'status'=>3,'updated_at'=>$curr_date_time]);
			
			DB::table('transaction')->where('parent_id', '=', $contribution_id)->where('parent_type', '=', 'contribution')->update(['status'=>1,'updated_at'=>$curr_date_time]);
			
			$user_preio_wallet_balance = $user_preio_wallet_balance + $edx_amount;
			$total_wallet_balance = $total_wallet_balance + $edx_amount;
			
			DB::table('users')->where('id', '=', $user_id)->update(['preio_wallet_balance'=>$user_preio_wallet_balance,'updated_at'=>$curr_date_time]);
			
			DB::table('users')->where('id', '=', $user_id)->update(['wallet_balance'=>$total_wallet_balance,'updated_at'=>$curr_date_time]);
			
			
			// preio reference 
			
			$referParent = DB::table('referral')->where('child_user_id','=',$user_id)->first();
			
			if(!empty($referParent)){
					
					$referParentID = $referParent->parent_user_id;
					$referprcentage = 10;
						
					$referParent_EDX = ($referprcentage / 100) * $edx_amount;
					
					$preio_ref_wallet_balance = 0;
					
					$user_preio_ref_wallet = DB::table('users')->where('id','=',$referParentID)->first();
					
					if(!empty($user_preio_ref_wallet)){
							$preio_ref_wallet_balance = $user_preio_ref_wallet->preio_ref_wallet_balance;
							$total_ref_wallet_balance = $user_preio_ref_wallet->wallet_balance;
						}
						
						$preio_ref_wallet_balance = $preio_ref_wallet_balance + $referParent_EDX;
						$total_ref_wallet_balance = $total_ref_wallet_balance + $referParent_EDX;
						
						DB::table('users')->where('id', '=', $referParentID)->update(['preio_ref_wallet_balance'=>$preio_ref_wallet_balance,'updated_at'=>$curr_date_time]);
						DB::table('users')->where('id', '=', $referParentID)->update(['wallet_balance'=>$total_ref_wallet_balance,'updated_at'=>$curr_date_time]);
						
						
						
						DB::table("transaction")->insert(['type'=>1,'parent_type'=>'contribution_ref','status'=>1,'amount'=>$referParent_EDX,'exchange_rate'=>$payment_currency,'exchange_currency'=>$currency1,'transaction_for'=>$referParentID,'created_at'=>$curr_date_time,'updated_at'=>$curr_date_time]);
						
				
					
			}
			
			// Mail Sent to Admin
					
				$contribution_id2 = DB::table("contribution")->where('transfer_proof','=',$txn_id)->first();

					$amount = $contribution_id2->amount;
					$payment_amount = $contribution_id2->payment_amount;
					$payment_currency = $contribution_id2->payment_currency;
					$transaction = $contribution_id2->transfer_proof;
					$base_amount = $contribution_id2->base_amount;
					$bonus_amount = $contribution_id2->bonus_amount;
					$bonus_percentage = $contribution_id2->bonus_percentage;
					$total_token = $contribution_id2->base_amount + $contribution_id2->bonus_amount;
					$submitted_by = $contribution_id2->email;
					
					 $mail_content = get_email_template_body('CoinPayment Transaction');
                    $data = array('email'=>'extraincometutor@gmail.com','amount' => $amount,'payment_amount' => $payment_amount,'payment_currency'=> $payment_currency,'submitted_by'=>$submitted_by,'transaction'=>$transaction,'base_amount'=>$base_amount,'bonus_amount'=>$bonus_amount,'bonus_percentage'=>$bonus_percentage,'total_token'=> $total_token,'mail_subject'=> 'Payment Accepted','mail_content'=>$mail_content);
                    $res = Mail::send(['emails.acceptedtransaction','emails.acceptedtransaction'], $data, function ($message) use ($data) {
                        //$message->from('noreply@neosinotoken.ch', 'Encores');
                        $message->to($data['email'])->subject($data['mail_subject']);
                    });		
					
					
					//end mail
					
			
			
					

			

        }
    
    }

	function errorAndDie($error_msg) {
		global $cp_debug_email; 
		global $params;
		if (!empty($cp_debug_email)) { 
			$report = 'Error: '.$error_msg."\n\n"; 
			$report .= "POST Data\n\n"; 
			foreach ($params as $k => $v) { 
				$report .= "|$k| = |$v|\n"; 
			} 
			mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
		} 
		Storage::put('ipn.txt' , 'IPN Error: '.$error_msg ); 
		die();
	}
	
}
