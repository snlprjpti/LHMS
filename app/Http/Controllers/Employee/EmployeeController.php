<?php

namespace App\Http\Controllers\Employee;

use App\Category;
use App\Employee;
use App\Food;
use App\Http\Requests\PasswordRequest;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * @var Employee
     */
    private $employee;

    /**
     * EmployeeController constructor.
     */
    public function __construct(Employee $employee)
    {
        $this->middleware('employee');
        $this->employee = $employee;
    }

    public function index()
    {
        return view('employee.home');
    }

    public function profile()
    {
        return view('employee.profile');
    }

    public function changePassword(PasswordRequest $request)
    {
        if (Hash::check($request->input('old'), Auth::guard('employee')->user()->password)) {
            $id = Auth::guard('employee')->user()->id;
            $data = $this->employee->find($id);
            if ($data) {
                $request['password'] = Hash::make($request->input('password'));
                $data->fill($request->all())->save();
                session()->flash('success', 'Password was changed successfully!');
                return redirect()->back();
            }
            session()->flash('error', 'Error Occoured!!!! Something is not right!');
            return redirect()->back()->withInput();
        }
        session()->flash('error', 'Error Occoured!!!! Old password incorrect!');
        return redirect()->back()->withInput();
    }

    public function todaysMenu()
    {
        $categories = Category::get();
        return view('employee.menu', compact('categories'));
    }

    public function orderItem(Request $request)
    {
        $userId = Auth::guard('employee')->user()->id;
        $items = $request->foodItem;
        foreach($items as $i){
            $data['employer_id'] = $userId;
            $data['food_id'] = $i;
            $data['date'] = Carbon::now();
            $value = Order::create($data);
        }
        session()->flash('success', 'Successfully Ordered!');
        return redirect()->back()->withInput();
    }

    public function orderHistory()
    {
        $userId = Auth::guard('employee')->user()->id;
        $history = Order::where('employer_id',$userId)->orderBy('id','DESC')->get();
        return view('employee.orderHistory',compact('history'));
    }
}
