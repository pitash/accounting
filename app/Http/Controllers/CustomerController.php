<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Customer;
use App\Category;
use redirect;
use Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = Customer::all();
      return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
      $ledgers = Category::all();
      $currens = Currency::all();
      return view('admin.customer.create', compact('currens','ledgers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  print_r($request->all());
      $request->validate([
        'customer' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'cust_id' => 'required|unique:customers,cust_id',
        'eamil' => 'required',
        'under' => 'required',
        'comp_name' => 'required',
        'currency' => 'required',
        'image' => 'required',
      ]);

      if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save( public_path('Customer/' . $filename ) );
        
      };

      Customer::insert([
        'customer' => $request->customer,
        'address' => $request->address,
        'phone' => $request->phone,
        'cust_id' => $request->cust_id,
        'image' => $request->image,
        'under' => $request->under,
        'eamil' => $request->eamil,
        'comp_name' => $request->comp_name,
        'currency' => $request->currency,
        'website' => $request->website,
        'image' => $filename,
        'created_by' => Auth::id(),
        'created_at' => Carbon::now(),
      ]);

      return redirect('customer')->with('success', 'Customer Add Successfully !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($custo_id)
    {
    
      $ledgers = Category::all();
      $customers = Customer::findOrFail($custo_id);
      $currens = Currency::all(); 
      return view('admin.customer.edit', compact('currens','customers','ledgers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customers_id)
    {
      $request->validate([
        'customer' => 'required',
        'address' => 'required',
        'phone' => 'required',
        // 'cust_id' => 'required|unique:customers,cust_id',
        'eamil' => 'required',
        'comp_name' => 'required',
        'currency' => 'required',
        'under' => 'required',
      ]);

      $cust = Customer::find($customers_id);

      if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save( public_path('Customer/' . $filename ) );
        $cust->image = $filename;
        $cust->save();
      };

      $cust->customer = $request->customer;
      $cust->address = $request->address;
      $cust->phone = $request->phone;
      $cust->eamil = $request->eamil;
      $cust->comp_name = $request->comp_name;
      $cust->under = $request->under;
      $cust->currency = $request->currency;
      $cust->created_by = Auth::id();
      $cust->created_at = Carbon::now();
      $cust->save();

      // Customer::find($customers_id)->update($request->all());
      return redirect('customer')->with('success', 'Update Successfully !!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($custo_id)
    {
      Customer::where('id', '=', $custo_id)->delete();
      return redirect('customer')->with('success', 'Customer Delete Successfully !!');
    }
}
