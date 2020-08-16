<?php


namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }

    public function findCustomerById($id)
    {
        return $this->customerRepository->findCustomerById($id);
    }

    public function edit($request, $id)
    {
        $customer =  $this->customerRepository->getAll();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $this->customerRepository->save($customer);
    }
}
