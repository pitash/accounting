<?php

namespace App\Http\Controllers;

use App\Customer;
use App\ReceiveVoucher;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiveVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sl = 1;
        $receives = ReceiveVoucher::all();
        return view('admin.receive.index', compact('receives','sl'));
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
      return view('admin.receive.create', compact('custo','supp'));
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
          'party_name' => 'required',
          'bill_date' => 'required',
          'order_number' => 'required',
          'quantity' => 'required',
          'rate' => 'required',
          'to_account' => 'required',
          'due_date' => 'required',
          'item_name' => 'required',
        ]);

        ReceiveVoucher::insert([
          'party_name' => $request->party_name,
          'bill_date' => $request->bill_date,
          'order_number' => $request->order_number,
          'quantity' => $request->quantity,
          'rate' => $request->rate,
          'to_account' => $request->to_account,
          'due_date' => $request->due_date,
          'item_name' => $request->item_name,
          'desc' => $request->desc,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('receive')->with('success','Receive Voucher Add Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceiveVoucher  $receiveVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveVoucher $receiveVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceiveVoucher  $receiveVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit($receive_id)
    {

      $custo = Customer::all();
      $supp = Supplier::all();
      $rec = ReceiveVoucher::findOrFail($receive_id);
      return view('admin.receive.edit', compact('rec','supp','custo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceiveVoucher  $receiveVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rec_id)
    {
      $request->validate([
        'party_name' => 'required',
        'bill_date' => 'required',
        'quantity' => 'required',
        'rate' => 'required',
        'to_account' => 'required',
        'due_date' => 'required',
        'item_name' => 'required',
      ]);

      ReceiveVoucher::find($rec_id)->update($request->all());
      return redirect('receive')->with('success', 'Receive Voucher Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceiveVoucher  $receiveVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($receive_id)
    {
      Purchase::where('id','=', $receive_id)->delete();
      return redirect('receive')->with('succes', 'Receive Voucher Delete Successfully !!');
    }
}
