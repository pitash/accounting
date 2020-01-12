<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Category;
use App\Purchase;
use App\Supplier;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $purches = Purchase::all();  
      return view('admin.purchase.index', compact('purches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ledgers = Category::all();
      $supp = Supplier::all();
      $bank = Bank::all();
      return view('admin.purchase.create', compact('supp','bank','ledgers'));
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
          'purchase_no' => 'required|unique:purchases,purchase_no',
          'party_name' => 'required',
          'bank_acc' => 'required',
          'note' => 'required',
          'date' => 'required',
          'under' => 'required',
          'item_name' => 'required',
          'quantity' => 'required',
          'rate' => 'required',
          'reference_no' => 'required',
        ]);

        $filename = NULL;
        if($request->hasFile('att_file')){
          $file = $request->file('att_file'); 
          $filename = time() . '.' . $file->getClientOriginalExtension();
          Image::make($file)->save( public_path('Purchase/' . $filename ) );
        }

        Purchase::insert([
          'purchase_no' => $request->purchase_no,
          'party_name' => $request->party_name,
          'bank_acc' => $request->bank_acc,
          'note' => $request->note,
          'date' => $request->date,
          'under' => $request->under,
          'item_name' => $request->item_name,
          'quantity' => $request->quantity,
          'rate' => $request->rate,
          'reference_no' => $request->reference_no,
          'file' => $filename,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('purchase')->with('success','Purchase Voucher Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($purch_id)
    {
        $imga = Purchase::findOrfail($purch_id);
        return view('admin.purchase.view', compact('imga') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($purch_id)
    {
      $ledgers = Category::all();
      $supp = Supplier::all();
      $bank = Bank::all();
      $purch = Purchase::findOrFail($purch_id);  
      return view('admin.purchase.edit', compact('supp','bank','purch','ledgers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $purch_id)
    {
      // Purchase::find($purch_id)->update($request->all());

      $purc = Purchase::find($purch_id);

      $request->validate([
        'party_name' => 'required',
        'bank_acc' => 'required',
        'note' => 'required',
        'date' => 'required',
        'under' => 'required',
        'item_name' => 'required',
        'quantity' => 'required',
        'rate' => 'required',
        'reference_no' => 'required',
      ]);

      
      // if($request->hasFile('att_file')){
      //   $file = $request->file('att_file'); 
      //   $filename = time() . '.' . $file->getClientOriginalExtension();
      //   Image::make($file)->save( public_path('Purchase/' . $filename ) );
      //   $purc->file = $filename;
      //   $purc->save();
      // }

      if($request->hasFile('att_file')){
          
        if ($purc->file){
          unlink(public_path('Purchase/' . $purc->file) );
      }
        $file = $request->file('att_file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save( public_path('Purchase/' . $filename ) );
        $purc->file = $filename;
        $purc->save();
      }

        $purc->party_name = $request->party_name;
        $purc->bank_acc = $request->bank_acc;
        $purc->note = $request->note;
        $purc->date = $request->date;
        $purc->under = $request->under;
        $purc->item_name = $request->item_name;
        $purc->quantity = $request->quantity;
        $purc->rate = $request->rate;
        $purc->reference_no = $request->reference_no;
        $purc->created_by = Auth::id();
        $purc->created_at = Carbon::now();
        $purc->save();

        return redirect('purchase')->with('success', 'purchase Update Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($purch_id)
    {
      Purchase::where('id','=',$purch_id)->delete();
      return redirect('purchase')->with('succes', 'Purchase Delete Successfully !!');
    }
}
