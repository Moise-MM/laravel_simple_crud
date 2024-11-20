<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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
            'email' => ['required', 'email'],
            'image' => ['nullable','image', 'mimes:jpeg,png,jpg,gif','max:2048']
        ]);

        // check for file
        if ($request->hasFile('image')) {
            // store the file and get path
            $path = $request->file('image')->store('customers', 'public');

            // add path to validated data
            $validatedData['image'] = $path;
        }


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
        

        // Check if a file was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($customer->image) {
                Storage::disk('public')->delete($customer->image);
            }
            // Store the file and get the path
            $path = $request->file('image')->store('customers', 'public');

            // Add the path to the validated data array
            $validatedData['image'] = $path;
        }



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

        // If there is a image, delete it from storage
        if ($customer->image) {
            Storage::disk('public')->delete($customer->image);
        }

        $customer->delete();

        return back()->with('success', 'Customer Deleted Successfully');
    }
}
