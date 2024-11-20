<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{

    public function index(): View
    {
        $customer = Customer::orderBy('created_at', 'desc')->get();

        return view('customer.index', [
            'customers' => $customer
        ]);
    }
}
