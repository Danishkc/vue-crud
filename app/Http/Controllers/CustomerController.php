<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index(){
        return Inertia::render('index', [
            'customers'=>Customer::all()->map(function($customer){
                return [
                    'id'=>$customer->id,
                    'name'=>$customer->name,
                    'email'=>$customer->email,
                    'phone'=>$customer->phone
                ];
            } )
        ]);
    }

    public function create(){
        return Inertia::render('create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|min:10|max:14|unique:customers'
        ]);

        Customer::create($validated);
        return Redirect::route('customers.index')->with('message', 'Customer created successfully');
    }

    public function edit(Customer $customer){
        return Inertia::render('edit', [
            'customer'=> $customer
        ]);
    }

    public function update(Request $request, Customer $customer){
        $validated = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required|min:10|max:14|'
        ]);

        $customer->update($validated);
        return Redirect::route('customers.index')->with('message', 'Customer edited successfully');
    }

    public function destroy(Customer $customer){
        
        $customer->delete();
        return Redirect::route('customers.index')->with('message', 'Customer deleted successfully');
    }
}