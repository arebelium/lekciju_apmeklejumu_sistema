<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    protected function guard(){
        return Auth::guard('admin');
    }

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only('name', 'remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
