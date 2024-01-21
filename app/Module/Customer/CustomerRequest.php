<?php

namespace App\Module\Customer;

use Illuminate\Http\Request;
class CustomerRequest
{
    private string $first_name;
    private int $limit = 10;
    private int $offset = 0;
    private string $last_name;
    private string $age;
    private mixed $gender;
    private mixed $mobile_number;
    private mixed $email;
    private mixed $city;
    private mixed $login;
    private mixed $car_model;
    private int $salary;

    public function __construct(Request $request)
    {
        if ($request->has('first_name')) {
            $this->first_name = $request->get('first_name');
        }

        if ($request->has('last_name')) {
            $this->last_name = $request->get('last_name');
        }

        if ($request->has('age')) {
            $this->age  =$request->get('age');
        }

        if ($request->has('gender')){
           $this->gender = $request->get('gender');
        }

        if ($request->has('mobile_number')) {
            $this->mobile_number = $request->get('mobile_number');
        }

        if ($request->has('email')) {
            $this->email = $request->get('email');
        }

        if ($request->has('city')) {
            $this->city = $request->get('city');
        }

        if ($request->has('login')) {
            $this->login = $request->get('login');
        }

        if ($request->has('car_model')) {
            $this->car_model = $request->get('car_model');
        }

        if ($request->has('salary')) {
            $this->salary = (int)$request->get('salary');
        }

        if ($request->has('limit')) {
            $this->limit = (int)$request->get('limit');
        }

        if ($request->has('offset')) {
            $this->offset = (int)$request->get('offset');
        }

    }

    public function getFirstName()
    {
        return $this->first_name ?? null;
    }

    public function getLastName()
    {
        return $this->last_name ?? null;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getAge()
    {
        return $this->age ?? null;
    }

    public function getEmail()
    {
        return $this->email ?? null;
    }

    public function getMobileNumber()
    {
        return $this->mobile_number ?? null;
    }

    public function getCity()
    {
        return $this->city ?? null;
    }

    public function getLogin()
    {
        return $this->login ?? null;
    }

    public function getCarModel()
    {
        return $this->car_model ?? null;
    }

    public function getSalary()
    {
        return $this->salary ?? null;
    }

}
