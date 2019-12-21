<?php

namespace App\Http\Controllers\Admin;

use App\Repository\EmployeeRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepo
     */
    private $employeeRepo;

    /**
     * EmployeeController constructor.
     */
    public function __construct(EmployeeRepo $employeeRepo)
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('isAdmin')){
                return $next($request);
            }
            abort(401);
        });
        $this->employeeRepo = $employeeRepo;
    }

    public function index()
    {
        $employees = $this->employeeRepo->getAllEmployees();
        return view('admin.employee.index', compact('employees'));
    }

    public function status($id)
    {
        try {
            $id = (int)$id;
            $employee = $this->employeeRepo->findById($id);
            if ($employee->verified == 'yes') {
                $employee->verified = 'no';
                $employee->save();
                session()->flash('success', 'Employer has been Activated!');
                return back();
            } else {
                $employee->verified = 'yes';
                $employee->save();
                session()->flash('success', 'Employer has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION : Something Went Wrong!' );
        }
    }
}
