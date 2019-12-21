<?php

namespace App\Http\Controllers\Staff;

use App\Category;
use App\Food;
use App\Http\Requests\FoodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    /**
     * @var Food
     */
    private $food;
    /**
     * @var Category
     */
    private $category;

    /**
     * FoodController constructor.
     */
    public function __construct(Food $food, Category $category)
    {
        $this->food = $food;
        $this->category = $category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();
        $foods = $this->food->all();
        return view('staff.food.index', compact('categories','foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        try{
            $create=$this->food->create($request->all());
            if($create){
                session()->flash('success','Item successfully created!');
                return back();
            }else{
                session()->flash('error','Item could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $id = (int)$id;
            $edits = $this->food->find($id);
            if(count($edits)>0)
            {
                $foods = $this->food->all();
                $categories = $this->category->all();
                return view('staff.food.index', compact('edits','categories','foods'));
            }
            else{
                session()->flash('error','Id could not be obtained!');
                return back();
            }

        }catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, $id)
    {
        $id = (int)$id;
        try{
            $result = $this->food->find($id);
            if($result){
                $result->fill($request->all())->save();
                session()->flash('success','Item updated successfully!');
                return redirect(route('food.index'));
            }else{
                session()->flash('error','No record with given id!');
                return back();
            }
        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION:'.$exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=(int)$id;
        try{
            $value = $this->food->find($id);

            if($value){
                $value->delete();
                session()->flash('success','Item successfully deleted!');
                return back();
            }else{
                session()->flash('error','item could not be deleted!');
                return back();
            }
        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function status($id)
    {
        try {
            $id = (int)$id;
            $food = $this->food->find($id);
            if ($food->allow_today == 'yes') {
                $food->allow_today = 'no';
                $food->save();
                session()->flash('success', 'Food Item has been Available!');
                return back();
            } else {
                $food->allow_today = 'yes';
                $food->save();
                session()->flash('success', 'Food Item has been Disabled!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION : Something Went Wrong!' );
        }
    }
}
