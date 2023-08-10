<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   
    {
          $items = Customer::get();
          return view('customers.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');

    }

    /**
     * Store a newly created resource in storage.
     */

     
     public function store(Request $request)
     {
        $Customers = new Customer();
        $Customers->username = $request->username;
        $Customers->email = $request->email;
        $Customers->password = $request->password;
        $Customers->created_at = $request->created_at;
        $Customers->updated_at = $request->updated_at;
        $Customers->save();
        return redirect()->route('users.index');
     }
     
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    return view('customers.edit');
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
