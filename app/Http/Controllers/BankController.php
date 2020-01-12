<?php

namespace App\Http\Controllers;

use App\Bank;
use Auth;
use Redirect;
use App\Currency;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $banks = Bank::all();
      return view('admin.bank.index', compact('banks'));
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
      return view('admin.bank.create', compact('currens','ledgers'));
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
        'bank_name' => 'required',
        'initial_amount' => 'required',
        'address' => 'required',
        'eamil' => 'required',
        'bank_id' => 'required|unique:banks,bank_id',
        'acc_no' => 'required|unique:banks,acc_no',
        'under' => 'required',
        'currency' => 'required',
        'phone' => 'required',
      ]);

      Bank::insert([
        'bank_name' => $request->bank_name,
        'initial_amount' => $request->initial_amount,
        'address' => $request->address,
        'eamil' => $request->eamil,
        'website' => $request->website,
        'bank_id' => $request->bank_id,
        'acc_no' => $request->acc_no,
        'under' => $request->under,
        'currency' => $request->currency,
        'phone' => $request->phone,
        'created_by' => Auth::id(),
        'created_at' => Carbon::now(),
      ]);

      return redirect('bank')->with('success','Bank Account Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($bank_id)
    {
      $ledgers = Category::all();
      $bank = Bank::findOrFail($bank_id);
      $currens = Currency::all();  
      return view('admin.bank.edit', compact('currens','bank','ledgers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bank_id)
    {
      $request->validate([
        'bank_name' => 'required',
        'initial_amount' => 'required',
        'address' => 'required',
        'eamil' => 'required',
        'currency' => 'required',
        'phone' => 'required',
      ]);
      
      Bank::find($bank_id)->update($request->all());
      return redirect('bank')->with('success','Update Account Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
