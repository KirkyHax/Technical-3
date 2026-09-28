<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class CustomerAccounts extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        // Model methods are backed by CodeIgniter's Query Builder.
        $customers = $customerModel
            ->select('id, full_name, email, phone, created_at')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('customers/index', [
            'title'      => 'Customer Accounts',
            'activePage' => 'customers',
            'customers'  => $customers,
        ]);
    }

    public function new(): string
    {
        helper('form');

        return view('customers/new', [
            'title'      => 'New Customer',
            'activePage' => 'customers',
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        (new CustomerModel())->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')) ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customer-accounts'))
            ->with('success', 'Customer account created successfully.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer account not found.');
        }

        helper('form');

        return view('customers/edit', [
            'title'      => 'Edit Customer',
            'activePage' => 'customers',
            'customer'   => $customer,
        ]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();

        if ($model->find($id) === null) {
            throw PageNotFoundException::forPageNotFound('Customer account not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')) ?: null,
        ]);

        return redirect()->to(site_url('customer-accounts'))
            ->with('success', 'Customer account updated successfully.');
    }
}
