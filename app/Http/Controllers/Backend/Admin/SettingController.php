<?php

namespace App\Http\Controllers\backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class SettingController extends Controller
{
    public function token()
    {
        $token = Config::all();

    //    print_r($token);exit;

        return view('backend.setting.token_setting',compact('token'));

    }

    public function tokenpost(Request $request)
    {


        // $requests = $request->set_bonus_percentage1;
        // $requests = $request->set_bonus_percentage2;
        // $requests = $request->set_bonus_percentage3;
        // $requests = $request->set_bonus_percentage4;

        foreach($request->all() as $key => $value){

        if ($key != '_token') {
           $key = str_replace('__', '.', $key);

        $config = Config::firstOrCreate(['key' => $key]);
        $config->value = $value;
        $config->save();

        }

        }

        // if ($request->get('set_bonus_percentage1') == null) {
        //     $requests['set_bonus_percentage1'] = $set_bonus_percentage1;
        // }

        //  dd($requests);

        
        // foreach ($requests as $key => $value) {
            
        //         $config = Config::firstOrCreate(['key' => $key]);
        //         $config->value = $value;
        //         $config->save();

            
        // }

        return redirect()->back()->with('message','Token Setting Updated Successfully');

        // dd($request->all());
        
    }
}
