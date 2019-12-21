<?php

namespace App\Http\Controllers\Staff;

use App\Order;
use App\Traits\NotificationTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    private $order;

    /**
     * OrderController constructor.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->toDateString();
        $orders =  $this->order->where('date',$date)->get();
        return view('staff.orders',compact('orders'));
    }

   public function deliverStatus($id)
   {
       try {
           $id = (int)$id;
           $order = $this->order->find($id);
           if ($order->delivery == 'yes') {
               $order->delivery = 'no';
               $order->save();
               session()->flash('success', 'Order has been Delivered!');
               return back();
           } else {
               $order->delivery = 'yes';
               NotificationTrait::createNotification($order->employer_id);
               $order->save();
               session()->flash('success', 'Order has been Delivered!');
               return back();
           }

       } catch (\Exception $e) {
           $exception = $e->getMessage();
           session()->flash('error', 'EXCEPTION : Something Went Wrong!' );
       }
   }
}
