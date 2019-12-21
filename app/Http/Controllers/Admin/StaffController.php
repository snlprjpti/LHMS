<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaffRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Repository\StaffRepo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    //
    /**
     * @var StaffRepo
     */
    private $staffRepo;
    /**
     * @var User
     */
    private $user;

    /**
     * StaffController constructor.
     */
    public function __construct(StaffRepo $staffRepo, User $user)
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('isAdmin')){
                return $next($request);
            }
            abort(401);
        });
        $this->staffRepo = $staffRepo;
        $this->user = $user;
    }

    public function index()
    {
        $staffs = $this->staffRepo->getAllStaff();
        return view('admin.staff.index', compact('staffs'));
    }


    public function store(StaffRequest $request)
    {
        try {
            $data = $request->all();
            $password = str_random(6);
            $data['password'] = bcrypt($password);

            $data['type'] = 'staff';
            $user = $this->user->create($data);
            if ($user) {
                if ($user)
                    Mail::send('admin.staff.userCredential', ['name' => $request->name,'email' => $request->email, 'password' => $password], function ($m) use ($request) {
                        $m->to($request->email)->subject('User Access Information');
                    });
                session()->flash('success', 'Staff Successfully Created!');
                return back();

            } else {
                session()->flash('success', 'Staff could not be Create!');
                return back();
            }


        } catch (\Exception $e) {
            return $e->getMessage();
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {
            $id = (int)$id;
            $edits = $this->staffRepo->findById($id);
            if (count($edits) > 0) {
                $staffs = $this->staffRepo->getAllStaff();
                return view('admin.staff.index', compact('staffs','edits'));
            } else {
                session()->flash('error', 'Id could not be obtained!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }

    }

    public function update(StaffUpdateRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $user = $this->staffRepo->findById($id);

            if ($user) {
                $update = $user->fill($request->all())->save();
                if ($update) {
                    session()->flash('success', 'Staff Successfully updated!');
                    return redirect(route('staff.index'));
                } else {
                    session()->flash('error', 'Staff could not be update!');
                    return back();
                }
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }

    }

    public function destroy($id)
    {
        $id = (int)$id;
        try {
            $user = $this->staffRepo->findById($id);
            if ($user) {
                $user->delete();
                session()->flash('success', 'Staff successfully deleted!');
                return back();
            } else {
                session()->flash('error', 'Staff could not be delete!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

}
