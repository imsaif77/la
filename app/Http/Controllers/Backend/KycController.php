<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kyc;
use Auth;
use Validator;
use DB;

class KycController extends Controller
{
    public function index()
    {
		$kyc = Kyc::where('user_id', Auth::user()->id)->where('latest_one','=', '1')->first();

        return view('backend.kyc.kyc',compact('kyc'));
    }

    public function kyc_application(Request $request)
    {
       
         $title = KYC::documents();

         $kyc = Kyc::where('user_id', Auth::user()->id)->where('latest_one','=', '1')->first();

    
        return view('backend.kyc.kyc_application',compact('title','kyc'));
    }

    

	// function save_kyc(Request $request){
	// 	$document_passport = trim($request->input('document_passport'));
	// 	$document_id_national_card_2 = trim($request->input('document_id_national-card_2'));
	// 	$document_id_national_card_1 = trim($request->input('document_id_national-card_1'));
	// 	$document_driving = trim($request->input('document_id_driver-licence'));
	// 	$document_type = trim($request->input('document_type'));

    //     Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'telegram_id' => ['required','string','unique:users'],
    //         'country' => ['required'],


    //     ]);
	// 	$validate_rule = array(
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'phone_number' => 'required|digits_between:8,13',
    //         'date_of_birth' => 'required',
    //         'Nationality' => 'required',
    //         'address_line_1' => 'required',
    //         'city' => 'required',
    //         'zip' => 'required',
    //         'document_type' => 'required',
    //         'email_address' => 'required|email',
	// 		'aggrement' => 'required'
    //         );
	// 	$validate_msg = array(
    //         'first_name.required' => 'Please enter first name !',
    //         'last_name.required' => 'Please enter last name !',
    //         'phone_number.required' => 'Please enter phone number !',
	// 		'phone_number.digits_between' => 'Phone number should be 8-13 digits!',
    //         'date_of_birth.required' => 'Please enter date of birth !',
    //         'Nationality.required' => 'Please choose nationality !',
    //         'address_line_1.required' => 'Please enter address !',
    //         'city.required' => 'Please enter city of residence !',
    //         'zip.required' => 'Please enter zip code !',
    //         'document_type.required' => 'Please choose document type !',
    //         'email_address.required' => 'Please enter email !',
    //         'email_address.email' => 'Please enter valid email !',
    //         'aggrement.required' => 'Please check aggrement !',
    //     );
	// 	if($document_type=='passport'){
	// 		$validate_rule['document_passport'] = 'required|integer|min:1';
	// 		$validate_msg['document_passport.required'] = 'Please upload passport copy !';
	// 		$validate_msg['document_passport.integer'] = 'Please upload passport copy !';
	// 		$validate_msg['document_passport.min'] = 'Please upload passport copy !';
	// 	}
	// 	if($document_type=='driver-licence'){
	// 		$validate_rule['document_id_driver-licence'] = 'required|integer|min:1';
	// 		$validate_msg['document_id_driver-licence.required'] = 'Please upload driving licence copy !';
	// 		$validate_msg['document_id_driver-licence.integer'] = 'Please upload driving licence copy !';
	// 		$validate_msg['document_id_driver-licence.min'] = 'Please upload driving licence copy !';
	// 	}
	// 	if($document_type=='national-card'){
	// 		$validate_rule['document_id_national-card_1'] = 'required|integer|min:1';
	// 		$validate_rule['document_id_national-card_2'] = 'required|integer|min:1';
			
	// 		$validate_msg['document_id_national-card_1.required'] = 'Please upload national id front side copy !';
	// 		$validate_msg['document_id_national-card_1.integer'] = 'Please upload national id front side copy !';
	// 		$validate_msg['document_id_national-card_1.min'] = 'Please upload national id front side copy !';
			
	// 		$validate_msg['document_id_national-card_2.required'] = 'Please upload national id back side copy !';
	// 		$validate_msg['document_id_national-card_2.integer'] = 'Please upload national id back side copy !';
	// 		$validate_msg['document_id_national-card_2.min'] = 'Please upload national id back side copy !';
	// 	}
	// 	$this->validate($request,$validate_rule,$validate_msg);
		
	// 	$front_user_id = get_current_front_user_id();
		
	// 	$first_name = trim($request->input('first_name'));
	// 	$last_name = trim($request->input('last_name'));
	// 	$email_address = trim($request->input('email_address'));
	// 	$phone_number = trim($request->input('phone_number'));
	// 	$countrycode = trim($request->input('countrycode'));
	// 	$date_of_birth = trim($request->input('date_of_birth'));
	// 	$nationality = trim($request->input('Nationality'));
	// 	$address_line_1 = trim($request->input('address_line_1'));
	// 	$address_line_2 = trim($request->input('address_line_2'));
	// 	$city = trim($request->input('city'));
	// 	$zip = trim($request->input('zip'));
	// 	//$telegram_uname = trim($request->input('telegram_uname'));
	// 	$kyc_id = trim($request->input('kyc_id'));
	// 	$document_type = trim($request->input('document_type'));
		
	// 	$document_passport = trim($request->input('document_passport'));
	// 	$document_driving = trim($request->input('document_id_driver-licence'));
	// 	$document_id_national_card_1 = trim($request->input('document_id_national-card_1'));
	// 	$document_id_national_card_2 = trim($request->input('document_id_national-card_2'));
		
	// 	$data['first_name'] = $first_name;
	// 	$data['last_name'] = $last_name;
	// 	$data['email'] = $email_address;
	// 	$data['phone_number'] = $phone_number;
	// 	//$data['ph_code'] = $countrycode;
	// 	$data['date_of_birth'] = $date_of_birth;
	// 	$data['nationality'] = $nationality;
	// 	$data['address1'] = $address_line_1;
	// 	$data['address2'] = $address_line_2;
	// 	$data['city'] = $city;
	// 	$data['zipcode'] = $zip;
	// 	 $data['created_at'] = date('Y-m-d H:i:s');

	// 	$date['updated_at'] = date('Y-m-d H:i:s');
	// 	//$data['telegram_username'] = $telegram_uname;
	// 	$data['document_type'] = $document_type;
	// 	if($document_type=='passport'){
	// 		if($document_passport > 0){
	// 			$data['document_passport_upload_id'] = $document_passport;
	// 		}
	// 	}
	// 	if($document_type=='driver-licence'){
	// 		if($document_driving > 0){
	// 			$data['document_driver_upload_id'] = $document_driving;
	// 		}
	// 	}
	// 	if($document_type=='national-card'){
	// 		if($document_id_national_card_1 > 0){
	// 			$data['document_upload_id'] = $document_id_national_card_1;
	// 		}
	// 		if($document_id_national_card_2 > 0){
	// 			$data['document_upload_id_2'] = $document_id_national_card_2;
	// 		}
	// 	}
		
	// 	if($kyc_id > 0){
	// 		// update
	// 		$update = DB::table('kyc')->where('ID','=',$kyc_id)->update($data);
	// 		return back()->with('message','AML/KYC resubmitted successfully !');
	// 	}else{
	// 		// insert
	// 		DB::table('kyc')->where('user_id', $front_user_id)->update(['latest_one' => '0']);
	// 		$data['user_id'] = $front_user_id;
	// 		$data['latest_one'] = '1';
	// 		$kyc_id = DB::table('kyc')->insertGetId($data);
	// 		return back()->with('message','AML/KYC submitted successfully !');
	// 	}
		
		
	// }


    public function kycPost(Request $request)
    {
        $user_id = Auth()->user()->id;


        $document_type= $request->document_type;

    	$document_passport = $request->document_passport;
	 	$document_driving = $request->document_driving;

     	$document_id_national_card_1 = $request->document_id_national_card_1;
	 	$document_id_national_card_2 = $request->document_id_national_card_2;
        $kyc_id = $request->kyc_id;



        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'digits_between:8,13'],
            'gender' => ['required'],
            'telegram_id' => ['required','string'],
            'address1' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zipcode' => ['required'],
            'country' => ['required'],
            'document_type' => ['required'],
            'document_passport' => ['required_if:document_type,==,passport'],
            'document_driving' => ['required_if:document_type,==,driver-licence'],
			'document_id_national_card_1' => ['required_if:document_type,==,national-card'],
			'document_id_national_card_2' => ['required_if:document_type,==,national-card'],
			'aggrement' => ['required'],

			

        ]);


        $kyc = Kyc::firstOrNew(['id' =>  $kyc_id]);

        $kyc->user_id = $user_id;
        $kyc->name = $request->name;
        $kyc->email = $request->email;
        $kyc->phone = $request->phone;
        $kyc->dob = $request->dob;
        $kyc->gender = $request->gender;
        $kyc->telegram_id = $request->telegram_id;

        $kyc->address1 = $request->address1;
        $kyc->address2 = $request->address2;
        $kyc->city = $request->city;
        $kyc->state = $request->state;
        $kyc->zipcode = $request->zipcode;
        $kyc->country = $request->country;


        $kyc->document_type = $document_type;

        $kyc->latest_one = 1;


        if($document_type =='passport'){
            if($document_passport > 0){
            	$kyc->document_passport = $document_passport;
            }
        }

        if($document_type =='driver-licence'){
            if($document_driving > 0){
            	$kyc->document_driving = $document_driving;
            }
        }

        if($document_type=='national-card'){
            		if($document_id_national_card_1 > 0){
            			$kyc->document_nidf = $document_id_national_card_1;
             		}
             		if($document_id_national_card_2 > 0){
             			$kyc->document_nidb = $document_id_national_card_2;
             		}
             	}

       

            $kyc->save();

        
        

			return redirect()->route('kyc')->with('message','Kyc Updated Successfully');
		}


   public function add_kyc_document(Request $request){
		$return_upload_id = 0;
		$author_id = Auth::user()->id;
		$return_array['status'] = 'error';
		if($request->hasFile('file'))
        {
			
            $image = $request->file('file');
            $upload_id = do_upload($image,'kyc',$author_id);
            if($upload_id > 0)
            {
                $return_upload_id = $upload_id;   
				$return_array['status'] = 'success';
            }
            
        }
		
		$return_array['upload_id'] = $return_upload_id;
		$return_array['document_type'] = $request->input('document_type');
		$return_array['document_order'] = $request->input('document_order');
		echo json_encode($return_array);
	}


    public function getimage($ID=null){		
		if($ID > 0){
			$upload_master = DB::table('upload_master')->where(array('id' => $ID))->first();
			if($upload_master->parent_table=='kyc'){
				if(Auth::check()){			
								
					$type = $upload_master->type;			
					$filename = $upload_master->name;			
					$path = public_path($upload_master->url).'/';			
					header('Content-type: '.$type); 			
					header('Content-Length: ' . filesize($path . $filename));			
					header('Content-Disposition: attachment; filename='.$filename);		
					readfile($path . $filename);			
					exit();			
					}else{				
					return redirect()->route('dashboard');				
					exit();			
				}		
			}
		}
	}


	


   
}
