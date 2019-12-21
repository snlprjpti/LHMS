<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Order
     */
    private $order;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Order $order)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('employee.profile');
    }

    public function changePassword(PasswordRequest $request)
    {
        if (Hash::check($request->input('old'), Auth::user()->password)) {
            $id = Auth::user()->id;
            $data = $this->user->find($id);
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

    public function orderHistory()
    {
        $orders =  $this->order->orderBy('id','DESC')->get();
        return view('admin.ordersHistory',compact('orders'));
    }
}
