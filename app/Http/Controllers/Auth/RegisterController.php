<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Cookie;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {  

        return view('auth.register');

    }


    public function register(Request $request)

    {

      

        // $have_user = User::where('role', 'admin')->count();

        // if( $have_user >= 1 && ! $this->handler->check_body() ){

        //     return back()->withInput()->with([

        //         'warning' => $this->handler->accessMessage()

        //     ]);

        // }

        $this->validator($request->all())->validate();



        event(new Registered($user = $this->create($request->all())));



        $this->guard()->login($user);



        return $this->registered($request, $user) ? : redirect($this->redirectPath());

    }




    


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telegram_id' => ['required','string','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required'],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => $data['name'],
            'email' => $data['email'],
            'telegram_id' => $data['telegram_id'],
            'country' => $data['country'],
            'password' => Hash::make($data['password']),
            'referral_code' => strtoupper(uniqid('Fiti5',false)),
        ]);

        $user->assignRole('user');


        /////////////////// Referral /////////////////////
        
        if (isset($data['s_referral_code'])){
        $refer_by = $data['s_referral_code'];

        if(!empty($refer_by)){

            $user_referral = User::where('referral_code','=',$refer_by)->first();

            if(!empty($user_referral)){

                $refferal = new Referral;
                $refferal->refer_by = $user_referral->id;
                $refferal->user_id =$user->id;
                $refferal->save();
                


            }

        }
    
    }


        return $user;
    }


   
}
