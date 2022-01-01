<?php

use App\Models\Kyc;



//////////////////////// Set Minimum Token ///////////////////////

if (!function_exists('set_minimum_token_amount')) {
	function set_minimum_token_amount(){
		
		
		$mini =  DB::table('configs')->where('key', '=', 'set_min_token_amount')->select('value')->first();
		if(!empty($mini)){
			$minimum_token_amount = $mini->value;
			return $minimum_token_amount;
		}else{
			return $minimum_token_amount;
			
		}

	}
	
}



////////////////////////////////////////////  condition Amount / Percentage //////////////////////////////////////////////////////////

// bonus percentage 1 
if (!function_exists('set_bonus_percentage1')) {
	function set_bonus_percentage1(){
		
		
		$condition =  DB::table('configs')->where('key', '=', 'set_bonus_percentage1')->select('value')->first();
		if(!empty($condition)){
			$bonus_percentage1 = $condition->value;
			return $bonus_percentage1;
		}else{
			return $bonus_percentage1;
			
		}

	}
	
}

//bonus amount 1
if(!function_exists('set_bonus_amount1')) {
	function set_bonus_amount1(){
		
		$condition = DB::table('configs')->where('key','=','set_bonus_amount1')->select('value')->first();
		if(!empty($condition)){
			$bonus_amount1 = $condition->value;
			return $bonus_amount1;
		}else{
			return $bonus_amount1;
		}
		
	}
}

//bonus percentage 2
if(!function_exists('set_bonus_percentage2')){
	function set_bonus_percentage2(){
		
		$condition = DB::table('configs')->where('key','=','set_bonus_percentage2')->select('value')->first();
		if(!empty($condition)){
			$bonus_percentage2 = $condition->value;
			return $bonus_percentage2;
		}else{
			return $bonus_percentage2;
		}
	}
}

//bonus amount 2
if(!function_exists('set_bonus_amount2')){
	function set_bonus_amount2(){
		$condition = DB::table('configs')->where('key','=','set_bonus_amount2')->select('value')->first();
		if(!empty($condition)){
			$bonus_amount2 = $condition->value;
			return $bonus_amount2;
		}else{
			return $bonus_amount2;
		}
	}
}

//bonus percentage 3
if(!function_exists('set_bonus_percentage3')){
	function set_bonus_percentage3(){
		
		$condition = DB::table('configs')->where('key','=','set_bonus_percentage3')->select('value')->first();
		if(!empty($condition)){
			$bonus_percentage3 = $condition->value;
			return $bonus_percentage3;
		}else{
			return $bonus_percentage3;
		}
	}
}

//bonus amount 3
if(!function_exists('set_bonus_amount3')){
	function set_bonus_amount3(){
		$condition = DB::table('configs')->where('key','=','set_bonus_amount3')->select('value')->first();
		if(!empty($condition)){
			$bonus_amount3 = $condition->value;
			return $bonus_amount3;
		}else{
			return $bonus_amount3;
		}
	}
}

//bonus percentage 4
if(!function_exists('set_bonus_percentage4')){
	function set_bonus_percentage4(){
		
		$condition = DB::table('configs')->where('key','=','set_bonus_percentage4')->select('value')->first();
		if(!empty($condition)){
			$bonus_percentage4 = $condition->value;
			return $bonus_percentage4;
		}else{
			return $bonus_percentage4;
		}
	}
}

//bonus amount 4
if(!function_exists('set_bonus_amount4')){
	function set_bonus_amount4(){
		$condition = DB::table('configs')->where('key','=','set_bonus_amount4')->select('value')->first();
		if(!empty($condition)){
			$bonus_amount4 = $condition->value;
			return $bonus_amount4;
		}else{
			return $bonus_amount4;
		}
	}
}

//bonus percentage 5
if(!function_exists('set_bonus_percentage5')){
	function set_bonus_percentage5(){
		
		$condition = DB::table('configs')->where('key','=','set_bonus_percentage5')->select('value')->first();
		if(!empty($condition)){
			$bonus_percentage5 = $condition->value;
			return $bonus_percentage5;
		}else{
			return $bonus_percentage5;
		}
	}
}

//bonus amount 5
if(!function_exists('set_bonus_amount5')){
	function set_bonus_amount5(){
		$condition = DB::table('configs')->where('key','=','set_bonus_amount5')->select('value')->first();
		if(!empty($condition)){
			$bonus_amount5 = $condition->value;
			return $bonus_amount5;
		}else{
			return $bonus_amount5;
		}
	}
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



/// minimum token

   
if (!function_exists('set_minimum_token_amount')) {
	function set_minimum_token_amount(){
		
		
		$mini =  DB::table('configs')->where('key', '=', 'set_min_token_amount')->select('value')->first();
		if(!empty($mini)){
			$minimum_token_amount = $mini->value;
			return $minimum_token_amount;
		}else{
			return $minimum_token_amount;
			
		}

	}
	
}





if (!function_exists('fiti_value')) {
	function fiti_value(){
		

        $current_price = 0.01;
        return $current_price;

	}
	
}



if (!function_exists('do_upload')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function do_upload($request_obj,$parent_table,$parent_id=0)
    {
		$allowed_mime_types = array(
		    'txt' => 'text/plain',
		    'pdf' => 'application/pdf',
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );
        $resource_id = 0;
        $file = $request_obj->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $fname = is_duplicate_file_name($filename.'.'.$request_obj->getClientOriginalExtension());
        $type = $request_obj->getMimeType();
		$ext  = strtolower($request_obj->getClientOriginalExtension());
		if(!in_array($ext,array_keys($allowed_mime_types))){
			return $resource_id;
		}
		if(!in_array($type,$allowed_mime_types)){
			return $resource_id;
		}
        $this_month = date('m');
        $this_year = date('Y');
        $destination_folder = 'uploads/'.$this_year.'/'.$this_month;
        //$destinationPath = public_path('kycdoc/'.$destination_folder);
        $destinationPath = Storage::put('kycdoc/'.$fname, fopen($request_obj, 'r+'));

		if($parent_table=='kyc'){
			$destination_folder = 'kycdoc';
			$destinationPath = public_path('/kycdoc');
		}
        $author_id = auth()->user()->id;
       // makedirs($destinationPath);
        //$request_obj->move($destinationPath, $fname);
        $insert_id = DB::table('upload_master')->insertGetId(
            ['name' => $fname,'url'=>$destination_folder,'type'=>$type,'status'=>'1','author_id'=>$author_id,'parent_id'=>$parent_id,'parent_table'=>$parent_table]
        );
        if($insert_id > 0){
            return $insert_id;
        }else{
            return $resource_id;
        }
    }
}

if (!function_exists('is_duplicate_file_name')) {
    function is_duplicate_file_name($file_name){
        $files = DB::table('upload_master')->where(array('name' => trim($file_name)))->first();
        if(isset($files)){
            $filename = pathinfo($file_name, PATHINFO_FILENAME);
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_file_name = $filename.'-1.'.$extension;
            return is_duplicate_file_name($new_file_name);
        }else{
            return $file_name;
        }
    }
}


if (!function_exists('get_recource_url')) {
    function get_recource_url($recource_id) {
        $upload_master = DB::table('upload_master')->where(array('id' => $recource_id))->first();
		if(!empty($upload_master)){
			if($upload_master->parent_table=='kyc'){
				return $image_url =  route('getimage',$recource_id);
			}else{
				if($upload_master->url !=""){
					return asset('public/'.$upload_master->url).'/'.$upload_master->name;

					
				}else{
					return asset('public/'.$upload_master->url).'/'.$upload_master->name;
					
				}
			}				
		}else{
			return false;
		}
    }
}



if (!function_exists('current_kyc_status')) {
	function current_kyc_status(){
		$user_id = Auth::user()->id;
		if($user_id > 0){

			$kyc = Kyc::where('user_id',$user_id)->where('latest_one',1)->first();


			if(isset($kyc) && !empty($kyc)){
				return $kyc->status;
			}
		}
		return -1;
	}
}


?>