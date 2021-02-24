<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\MemberModel;
use App\Http\Traits\GeneralServices;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    use GeneralServices;
    public function index(Request $request){
        $data['title'] = 'Articles Login';

        return view('sites.login',$data);
    }
    public function register(Request $request){
        $data['title'] = 'Articles Register';

        return view('sites.register',$data);
    }
    public function login(Request $request)
    {
        $PostRequest = $request->only(
                'email',
                'password'
        );

        $role = [
            'email' => 'Required',
            'password' => 'Required',
        ];

        $validateData = $this->ValidateRequest($PostRequest, $role);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
        // Find the member by email
        $cek_member = MemberModel::select('*')->where('email','=',$request['email'])->first();
        if (empty($cek_member)) {
            return redirect()->back()->withErrors(['Failed! Email Address Not Found!']);
        }
        $cek_member->makeVisible('password');
        if (Hash::check($request['password'], $cek_member->password)) {
            if ($cek_member->status=="active") {
                Session::put('member',$cek_member->toArray());
                return redirect('/');
            }else{
                return redirect()->back()->withErrors(['Failed! Member inactive!']);
            }
        }
        return redirect()->back()->withErrors(['Failed! invalid password!']);  
    }
    public function doRegister(Request $request)
    {
        $rules = [
            'fullname' => 'required|string',
            'email' => 'required|email|unique:members,email',
            'password' => [
                                'required',
                                'string',
                                'confirmed',
                                'min:8',             // must be at least 10 characters in length
                                'regex:/[a-z]/',      // must contain at least one lowercase letter
                                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                'regex:/[0-9]/',      // must contain at least one digit
                                'regex:/[@$!%*#?&]/', // must contain a special character
                            ],
            'password_confirmation ' => 'string',
            'gender' => 'nullable'
        ];
        $validateData = $this->ValidateRequest($request->all(), $rules);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
        $request['password'] = hash::make($request['password']);
        $request['status'] = "active";
        $save = MemberModel::create($request->except(['_method','_token','password_confirmation']));
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        } 
        return redirect('sites/register')->with('success', "Member succesfully created");

    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
}

