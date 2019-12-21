<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ELoginController extends Controller
{
    protected $redirectTo = '/employee/home';

    protected $guard = 'employee';

    protected function guard()
    {
        return Auth::guard('employee');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showEmployerLoginForm()
    {
        return view('employee.login');
    }

    public function employerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password, 'verified' => 'yes'], $request->get('remember'))) {

            return redirect(url('employee/home'));
        }
        if (count(Employee::where('email', $request->email)->where('verified', 'no')->first()) > 0) {
            session()->flash('warning', 'Your credentials are not verified.!');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showEmployeeRegistration()
    {
        return view('employee.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/(.*)@gmail\.com/i', 'unique:employees'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function createEmployer(Request $request)
    {
        $this->validator($request->all())->validate();
        $employer = Employee::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'designation' => $request['designation'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect(url('employee/login'));
    }

    public function employerLogout(Request $request)
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();

        return redirect('/employee/login');
    }
}
