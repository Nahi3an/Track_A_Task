<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Tester;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\ValidateRole;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:8', 'unique:users'],
            'company_name' => ['required', 'string', 'max:255'],
            'role' => ['required', new ValidateRole()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'personal_email' => ['required', 'string', 'email', 'max:255', 'unique:employees', 'unique:managers'],
            'contact_number' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:18', 'confirmed'],
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
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user = User::where('email', '=', $data['email'])->first();

        if ($data['role'] == 'manager') {
            Manager::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'user_id' => $user->id,
                'personal_email' => $data['personal_email']
            ]);
        }
        if ($data['role'] == 'developer') {

            Developer::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'user_id' => $user->id,
                'personal_email' => $data['personal_email']
            ]);
        } else {
            Tester::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'user_id' => $user->id,
                'personal_email' => $data['personal_email']
            ]);
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect()->route('login')->with('success', 'Registration Sucess! Log in to your account!');
    }
}