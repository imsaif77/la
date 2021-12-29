<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use Auth;
use Validator;

class PostController extends Controller
{
    public function post(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

     

        if ($validator->passes()) {

            $user_id = Auth::user()->id;

            $post = new Post;
    
            if($request->hasFile('image')){
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('/upload/'.$user_id.'/post/'), $imageName);
                $post->image = $imageName;
                }
    
           $post->user_id = $user_id;
    
           $post->content = $request->content;
            
           $post->save();
    
        //    return redirect()->back()->with('message','Profile Updated Successfully');
    
        
        //    return response()->json('Image uploaded successfully');

            return response()->json(['success'=>'Added new records.']);

        }

     

        return response()->json(['error'=>$validator->errors()->all()]);

    

        


        

     

        // dd($request->all());
        

    }
}
