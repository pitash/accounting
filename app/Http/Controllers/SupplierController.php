<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Supplier;
use App\Category;
use Auth;
use Image;
use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sups = Supplier::all();  
      return view('admin.supplier.index', compact('sups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ledgers = Category::all();
      $curr = Currency::all();
      return view('admin.supplier.create', compact('curr','ledgers'));
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
          'supplier' => 'required',
          'address' => 'required',
          'eamil' => 'required',
          'sup_id' => 'required|unique:suppliers,sup_id',
          'currency' => 'required',
          'image' => 'required',
          'under' => 'required',
          'phone' => 'required',
        ]);

        if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->save( public_path('Supplier/' . $filename ) );
        };

        Supplier::insert([
          'supplier' => $request->supplier,
          'address' => $request->address,
          'eamil' => $request->eamil,
          'sup_id' => $request->sup_id,
          'currency' => $request->currency,
          'image' => $filename,
          'phone' => $request->phone,
          'under' => $request->under,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

          return redirect('supplier')->with('success', 'Supplier Add Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($sup_id)
    {
      $ledgers = Category::all();
      $supp = Supplier::findOrFail($sup_id);
      $curr = Currency::all(); 
      return view('admin.supplier.edit' , compact('supp','curr','ledgers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $supp_id)
    {

      $request->validate([
        'supplier' => 'required',
        'address' => 'required',
        'eamil' => 'required',
        // 'sup_id' => 'required|unique:suppliers,sup_id',
        'currency' => 'required',
        'phone' => 'required',
      ]);


      $sup = Supplier::find($supp_id);

      if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save( public_path('Supplier/' . $filename ) );
        $sup->image = $filename;
        $sup->save();
      };

      $sup->supplier = $request->supplier;
      $sup->address = $request->address;
      $sup->phone = $request->phone;
      $sup->eamil = $request->eamil;
      $sup->currency = $request->currency;
      $sup->under = $request->under;
      $sup->created_by = Auth::id();
      $sup->created_at = Carbon::now();
      $sup->save();

        // Supplier::find($supp_id)->update($request->all());
        return redirect('supplier')->with('succes', 'Supplier Update Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($sup_id)
    {
        Supplier::where('id','=',$sup_id)->delete();
        return redirect('supplier')->with('succes', 'Supplier Delete Successfully !!');
    }
}
