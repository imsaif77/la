<?php



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


?>