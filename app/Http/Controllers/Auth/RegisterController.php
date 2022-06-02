<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\admin\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\traits\HandleImage;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    use HandleImage;
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
        return Validator::make($data,[
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'bail|required|unique:users|regex:/(0)[0-9]{9}/|max:10',
            'email' => 'bail|required|unique:users|email:rfc,dns',
            'dob' => 'bail|before:today|nullable',
            'password' => [
                'bail',
                'required',
                'min:8',
            ],
            [
                'name.required' => 'Vui lòng nhập tên người dùng',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'phone.regex' => 'vui lòng nhập đúng số điện thoại',
                'phone.max' => 'Số điện thoại tối đa 10 số',
                'email.required' => 'Vui lòng email',
                'email.email' => 'Vui lòng nhập đúng email',
                'email.unique' => 'Email đã tồn tại',
                'dob.before' => 'Ngày sinh không được là ngày trong tương lai',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            ]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (isset($data['image'])) {
            $nameImage = $this->uploadSingleImage($data['image']);
        }
        else {
            $nameImage = $this->getAvatarDefault($data['gender']);
        }
        
        $user = User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'image' => $nameImage,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('user');
        return $user;
    }

    
}
