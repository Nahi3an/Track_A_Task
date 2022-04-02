<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Roles;
use App\Models\Tester;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\CompanyExistsInCountry;
use App\Rules\ValidateSelectField;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

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
        $country_id = $data['country'];
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:8', 'unique:users'],
            'country' => ['required', new ValidateSelectField()],
            'company_id' => ['required', new ValidateSelectField(), new CompanyExistsInCountry($country_id)],
            'role' => ['required', new ValidateSelectField()],
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
            'role' => ''
        ]);

        $user = User::where('email', '=', $data['email'])->first();
        $role = Roles::where('id', '=', $data['role'])->first();

        if ($role->name == 'manager') {

            DB::table('users')
                ->where('id', $user->id)
                ->update(['role' => $data['role']]);
            Manager::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'user_id' => $user->id,
                'personal_email' => $data['personal_email'],
                'company_id' => $data['company_id']
            ]);
        } else if ($role->name == 'developer') {

            DB::table('users')
                ->where('id', $user->id)
                ->update(['role' => $data['role']]);

            Developer::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'user_id' => $user->id,
                'personal_email' => $data['personal_email'],
                'company_id' => $data['company_id']
            ]);
        } else {

            DB::table('users')
                ->where('id', $user->id)
                ->update(['role' => $data['role']]);

            Tester::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'user_id' => $user->id,
                'personal_email' => $data['personal_email'],
                'company_id' => $data['company_id']

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