<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    
    /**
     * display all customers
     *
     * @return View
     */
    public function index(): View
    {
        $customer = Customer::orderBy('created_at', 'desc')->get();

        return view('customer.index', [
            'customers' => $customer
        ]);
    }

        
    /**
     * display create form
     *
     * @return View
     */
    public function create(): View
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'min:8', 'max:18'],
            'email' => ['required', 'email']
        ]);

        Customer::create($validatedData);

        return back()->with('success', 'Customer added successfully');
    }
}
