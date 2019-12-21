<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class ForgotpasswordController extends Controller
{
    use SendsPasswordResetEmails;
    public function __construct()
    {
        $this->middleware('guest:employee');
    }

    public function showLinkRequestForm() {
        return view('employee.password.employee-email');
    }

    protected function broker() {
        return Password::broker('employees');
    }
}
