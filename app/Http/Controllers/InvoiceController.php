<?php

namespace App\Http\Controllers;

use App\Customer;
use Image;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        $sl = 1;
        return view('admin.invoice.index', compact('invoices','sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $custo = Customer::all();
      return view('admin.invoice.create', compact('custo'));
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
          'invoice_no' => 'required|unique:invoices,invoice_no',
          'client_name' => 'required',
          'due_date' => 'required',
          'item_name' => 'required',
          'quantity' => 'required',
          'price' => 'required',
          // 'total' => 'required',
          'date' => 'required',
          'pay_method' => 'required',
          'status' => 'required',
        ]);

        $filename = NULL;
        if($request->hasFile('att_file')){
          $file = $request->file('att_file');
          $filename = time() . '.' . $file->getClientOriginalExtension();
          Image::make($file)->save( public_path('InvoiceFile/' . $filename ) );
        }

        Invoice::insert([
          'invoice_no' => $request->invoice_no,
          'client_name' => $request->client_name,
          'due_date' => $request->due_date,
          'item_name' => $request->item_name,
          'quantity' => $request->quantity,
          'price' => $request->price,
          // 'total' => $request->total,
          'att_file' => $filename,
          'date' => $request->date,
          'pay_method' => $request->pay_method,
          'status' => $request->status,
          'desc' => $request->desc,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('invoice')->with('success', 'Invoice Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($invoic_id)
    {
      $custo = Customer::all();
      $invoices = Invoice::findOrFail($invoic_id);
      return view('admin.invoice.edit', compact('custo','invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $invoices_id)
    {
        $inv = Invoice::find($invoices_id);

        if($request->hasFile('att_file')){
          
          if ($inv->att_file){
            unlink(public_path('InvoiceFile/' . $inv->att_file) );
        }
          $file = $request->file('att_file');
          $filename = time() . '.' . $file->getClientOriginalExtension();
          Image::make($file)->save( public_path('InvoiceFile/' . $filename ) );
          $inv->att_file = $filename;
          $inv->save();
        }

        $inv->client_name = $request->client_name;
        $inv->due_date = $request->due_date;
        $inv->item_name = $request->item_name;
        $inv->quantity = $request->quantity;
        $inv->price = $request->price;
        $inv->date = $request->date;
        $inv->pay_method = $request->pay_method;
        $inv->status = $request->status;
        $inv->desc = $request->desc;
        $inv->created_by = Auth::id();
        $inv->created_at = Carbon::now();
        $inv->save();
        return redirect('invoice')->with('success', 'Invoice Update Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($invoic_id)
    {
        Invoice::where('id','=', $invoic_id)->delete();
        return redirect('invoice')->with('succes', 'Invoice Delete Successfully !!');
    }
}
