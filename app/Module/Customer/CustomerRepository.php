<?php

namespace App\Module\Customer;

use App\Models\Customer;

class CustomerRepository
{

    public function storeCustomers(array $customerList): void
    {
        Customer::insert($customerList);
    }

    public function getCustomers(CustomerRequest $request) : array
    {
        $qb = Customer::query();
        // todo extract column names to ...
        if (!empty($request->getFirstName())) {
            $qb->where('first_name', 'like', '%' . $request->getFirstName() . '%');
        }

        if (!empty($request->getLastName())) {
            $qb->where('last_name', 'like', '%' . $request->getLastName() . '%');
        }

        if (!empty($request->getAge())) {
            $qb->where('age', $request->getAge());
        }

        if (!empty($request->getEmail())) {
            $qb->where('email', $request->getEmail());
        }

        if (!empty($request->getMobileNumber())) {
            $qb->where('mobile_number', $request->getMobileNumber());
        }

        if (!empty($request->getCity())) {
            $qb->where('city', $request->getCity());
        }

        if (!empty($request->getLogin())) {
            $qb->where('login', $request->getLogin());
        }

        if (!empty($request->getCarModel())) {
            $qb->where('car_model', $request->getCarModel());
        }

        if (!empty($request->getSalary())) {
            $qb->where('salary', $request->getSalary());
        }

        $qb->offset($request->getOffset())->limit($request->getLimit());
        $data = $qb->get()->toArray();
        return $data;
    }

}
