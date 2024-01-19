<?php

namespace App\Module\Customer;

use App\Models\Customer;

class CustomerRepository
{

    public function storeCustomers(array $customerList)
    {
        Customer::insert($customerList);
    }

    public function getCustomers()
    {
        return Customer::all();
    }

    public function removeCustomers()
    {
        Customer::truncate();
    }

}
