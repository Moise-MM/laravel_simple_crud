<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
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


    
    /**
     * Store new customer into database
     *
     * @param Request $request 
     * 
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'min:8', 'max:18'],
            'email' => ['required', 'email']
        ]);

        Customer::create($validatedData);

        return back()->with('success', 'Customer added Successfully');
    }



        
    /**
     * display edit form
     *
     * @param Customer $customer 
     *
     * @return View
     */
    public function edit(Customer $customer): View
    {
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }


   
    /**
     * Update customer in database
     *
     * @param Request $request 
     * @param Customer $customer 
     *
     * @return void
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'min:8', 'max:18'],
            'email' => ['required', 'email']
        ]);

        $customer->update($validatedData);

        return back()->with('success', 'Customer Edited Successfully');
    }



        
    /**
     * remove customer from database
     *
     * @param Customer $customer [explicite description]
     *
     * @return void
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back()->with('success', 'Customer Deleted Successfully');
    }
}
