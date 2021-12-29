<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;

use Auth;
use Brian2694\Toastr\Facades\Toastr;


class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $profile = Profile::where('user_id','=',$user_id)->first();
        $posts = Post::where('user_id','=',$user_id)->get();

        return view('backend.user.profile',['profile' => $profile,'posts' => $posts]);
    }

    public function storeupdate(Request $request)
    {
        $request->validate([

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $user_id = Auth::user()->id;
        
        

        $profile = Profile::firstOrNew(['user_id' =>  $user_id]);

        if($request->hasFile('image')){
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('/upload/'.$user_id.'/avatar/'), $imageName);
        $profile->avatar = $imageName;
        }


        $profile->skill = json_encode($request->skill);

       
        

        $profile->address1 = $request->address1;

        $profile->address2 = $request->address2;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->country = $request->country;
        $profile->zipcode = $request->zipcode;


     
        
        $profile->save();

      
         
        // $profile = Profile::firstOrNew(array('user_id' => $user_id));
        // $user->name = request('name');
        


        return redirect()->back()->with('message','Profile Updated Successfully');


    //    return redirect()->back()->Toastr::success('Post added successfully :)','Success');

        // dd($request->all());
    }
}
