<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();
        $userModel     = new UserModel();

        return view('home/index', [
            'title'          => 'Overview',
            'activePage'     => 'overview',
            'customerCount'  => $customerModel->countAllResults(),
            'userCount'      => $userModel->countAllResults(),
            'latestCustomer' => $customerModel
                ->select('full_name, email, created_at')
                ->orderBy('created_at', 'DESC')
                ->first(),
        ]);
    }
}
