<?php

namespace App\Module\Customer;

class CustomerService
{
    public function __construct(private readonly CustomerRepository $customerRepository)
    {
    }

    public function storeCustomers(string $filename): void
    {
        $file = fopen($filename, 'r');
        $data = [];
        $i = 0;
        $header = [];
        $customerList = [];
        while ($row = fgetcsv($file)) {
            if ($i++ === 0) {
                foreach ($row as $value) {
                    $header[] = trim($value);
                }
                continue;
            }

            foreach ($header as $key => $value) {
                $data [$value] = !empty($row[$key]) ? trim($row[$key]) : "";
            }

            if ($i % 20000 === 0) {
                $this->customerRepository->storeCustomers($customerList);
                $customerList = [];
            }else{
                $customerList[] = $data;
            }
        }

        if (!empty($customerList)) {
            $this->customerRepository->storeCustomers($customerList);
        }

        fclose($file);
    }

    public function getCustomers(CustomerRequest $request)
    {
        return $this->customerRepository->getCustomers($request);
    }
}
