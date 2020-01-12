<?php

namespace App\Http\Controllers;

use App\Currency;
use Auth;
use Redirect;
use Carbon\Carbon;
use Braintree\Error\Validation;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curs = Currency::all();
      return view('admin.currency.index', compact('curs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());

        $request->validate([
          'name'=> 'required',
          'code'=> 'required',
          'symbol'=> 'required',
          'rate'=> 'required',
          'note'=> 'required',
        ]);

        Currency::insert([
          'name' => $request->name,
          'code' => $request->code,
          'symbol' => $request->symbol,
          'rate' => $request->rate,
          'note' => $request->note,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('currency')->with('succes','Currency Add Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($cur_id)
    {
      $cur = Currency::findOrFail($cur_id);
      return view('admin.currency.edit', compact('cur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cur_id)
    {
       Currency::find($cur_id)->update($request->all());
       return redirect::to('currency')->with('success','Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($cur_id)
    {
      Currency::where('id', '=', $cur_id)->delete();
      return redirect::to('currency')->with('success','Deleted Successfully !!');
    }
}
