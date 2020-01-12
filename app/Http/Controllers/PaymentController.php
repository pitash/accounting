<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Payment;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Payment::all();
        $sl =1;
        return view('admin.payment.index', compact('pays','sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $custo = Customer::all();
      $supp = Supplier::all();
      return view('admin.payment.create', compact('supp','custo'));
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

        $random_token = str_random(6);

        $request->validate([
          'voucher_no' => 'required|unique:payments,voucher_no',
          'from_account' => 'required',
          'pay_method' => 'required',
          'reference' => 'required',
          'date' => 'required',
          'to_account' => 'required',
          'amount' => 'required',
          'desc' => 'required',
        ]);

        Payment::insert([
          'voucher_no' => $request->voucher_no,
          'tken' => $random_token,
          'from_account' => $request->from_account,
          'pay_method' => $request->pay_method,
          'reference' => $request->reference,
          'date' => $request->date,
          'to_account' => $request->to_account,
          'amount' => $request->amount,
          'desc' => $request->desc,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('payment')->with('success','Payment Voucher Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($pay_id)
    {
        $custo = Customer::all();
        $supp = Supplier::all();
        $payEdit = Payment::findOrFail($pay_id);
        return view('admin.payment.edit', compact('payEdit','custo','supp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $payEdit_id)
    {
      Payment::find($payEdit_id)->update($request->all());
      return redirect('payment')->with('success','Payment Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($pay_id)
    {
      Payment::where('id', '=', $pay_id)->delete();
      return redirect('payment')->with('success','Payment Successfully Delete');
    }
}
