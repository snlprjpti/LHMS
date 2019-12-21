<?php


namespace App\Repository;


use App\Category;
use App\Employee;
use App\Food;

class EmployeeRepo
{
    /**
     * @var Employee
     */
    private $employee;
    /**
     * @var Food
     */
    private $food;
    /**
     * @var Category
     */
    private $category;


    /**
     * EmployeeRepo constructor.
     */
    public function __construct(Employee $employee, Food $food, Category $category)
    {
        $this->employee = $employee;
        $this->food = $food;
        $this->category = $category;
    }

    public function getAllEmployees()
    {
        $data = $this->employee->orderBy('id','DESC')->get();
        return $data;
    }

    public function findById($id)
    {
        $data = $this->employee->find($id);
        return $data;
    }

    public static function getFoodByCategoryId($catId)
    {
        $data = Food::where('category_id',$catId)->where('allow_today','yes')->get();
        return $data;
    }

    public static function getName($id)
    {
        $data = Employee::find($id);
        return $data;
    }
}
