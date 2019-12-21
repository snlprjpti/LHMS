<?php


namespace App\Repository;


use App\User;

class StaffRepo
{
    /**
     * @var User
     */
    private $user;


    /**
     * StaffRepo constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllStaff()
    {
        $data = $this->user->where('type','staff')->orderBy('id','DESC')->get();
        return $data;
    }

    public function findById($id)
    {
        $data = $this->user->find($id);
        return $data;
    }
}
