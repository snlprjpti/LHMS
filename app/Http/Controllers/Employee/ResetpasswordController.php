<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Password;

class ResetpasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/employee/home';

    protected function guard()
    {
        return Auth::guard('employee');
    }
    public function __construct()
    {
        $this->middleware('guest:employee');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('employee.password.employee-reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

    protected function broker() {
        return Password::broker('employees');
    }
}
