<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\UsersModel;
use App\Http\Traits\GeneralServices;
use Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use GeneralServices;

    public function index(Request $request){
        $data['title'] = 'Admin';
        return view('admin.login',$data);
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
        $cek_member = UsersModel::select('*')->where('email','=',$request['email'])->with(['role'])->first();
        if (empty($cek_member)) {
            return redirect()->back()->withErrors(['Failed! Email Address Not Found!']);
        }
        $cek_member->makeVisible('password');
        if (Hash::check($request['password'], $cek_member->password)) {
            if ($cek_member->status=="active") {
                Session::put('Users',$cek_member->toArray());
                return redirect('/admin/profile');
            }else{
                return redirect()->back()->withErrors(['Failed! Member inactive!']);
            }
        }
        return redirect()->back()->withErrors(['Failed! invalid password!']);  
    }
    
    public function logout(){
        Session::flush();
        return redirect('/admin');
    }
}
