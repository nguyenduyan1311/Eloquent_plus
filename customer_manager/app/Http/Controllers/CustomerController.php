<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
   function index(){
       $customers = Customer::all();
       return view('list',compact('customers'));
   }
   function search(Request $request){
       $keyword = $request->input('keyword');
       $customers = Customer::where('customer_name', '$keyword');
       return view('list',compact('customers'));
   }
   function create(){
       return view('create');
   }
   function edit($id){
       $customer = Customer::findOrFail($id);
       return view('edit',compact('customer'));
   }
    function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $customer = Customer::findOrFail($id);
        $customer->customer_name = $request->input('customer_name');
        $customer->contact_last_name = $request->input('contact_last_name');
        $customer->contact_first_name = $request->input('contact_first_name');
        $customer->phone = $request->input('phone');
        $customer->address_line_1 = $request->input('address_line_1');
        $customer->address_line_2 = $request->input('address_line_2');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->postal_code = $request->input('postal_code');
        $customer->country = $request->input('country');
        $customer->sales_rep_employee_number = $request->input('sales_rep_employee_number');
        $customer->credit_limit = $request->input('credit_limit');

        $customer->save();
        return redirect()->route('list');
    }
   function delete($id): \Illuminate\Http\RedirectResponse
   {
       $customer = Customer::findOrFail($id);
       $customer->delete();
       return redirect()->route('list');
   }
   function store(Request $request): \Illuminate\Http\RedirectResponse
   {
       $customer = new Customer();
       $customer->customer_name = $request->input('customer_name');

       $customer->contact_last_name = $request->input('contact_last_name');

       $customer->contact_first_name = $request->input('contact_first_name');

       $customer->phone = $request->input('phone');

       $customer->address_line_1 = $request->input('address_line_1');

       $customer->address_line_2 = $request->input('address_line_2');

       $customer->city = $request->input('city');

       $customer->state = $request->input('state');

       $customer->postal_code = $request->input('postal_code');

       $customer->country = $request->input('country');

       $customer->sales_rep_employee_number = $request->input('sales_rep_employee_number');

       $customer->credit_limit = $request->input('credit_limit');
       $customer->save();
       return redirect()->route('list');
   }



}
