<?php

namespace App\Http\Controllers;

use App\Company;
use App\Currency;
use Auth;
use Image;
use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compns = Company::all();
        return view('admin.company.index', compact('compns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $currens = Currency::all();
      return view('admin.company.create', compact('currens'));
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
          'company' => 'required',
          'start_date' => 'required',
          'address' => 'required',
          'eamil' => 'required',
          'website' => 'required',
          'phone' => 'required',
          'end_date' => 'required',
          'comp_id' => 'required|unique:companies,comp_id',
          'currency' => 'required',
          // 'comp_logo' => 'required',
        ]);

        if($request->hasFile('comp_logo')){
          $image = $request->file('comp_logo');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->save( public_path('CompLogo/' . $filename ) );
          
        };

        Company::insert([
          'company' => $request->company,
          'start_date' => $request->start_date,
          'address' => $request->address,
          'eamil' => $request->eamil,
          'website' => $request->website,
          'phone' => $request->phone,
          'end_date' => $request->end_date,
          'comp_id' => $request->comp_id,
          'currency' => $request->currency,
          'comp_logo' => $filename,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('company')->with('succes', 'Company Add Succesfully !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($comp_id)
    {
      $currens = Currency::all();
      $com = Company::findOrFail($comp_id);
      return view('admin.company.edit', compact('com','currens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $com_id)
    {
      $request->validate([
        'company' => 'required',
        'start_date' => 'required',
        'address' => 'required',
        'eamil' => 'required',
        'website' => 'required',
        'phone' => 'required',
        'end_date' => 'required',
        // 'comp_id' => 'required|unique:companies,comp_id',
        'currency' => 'required',
        // 'comp_logo' => 'required',
      ]);

      $comp = Company::find($com_id);

      if($request->hasFile('comp_logo')){
        $image = $request->file('comp_logo');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save( public_path('CompLogo/' . $filename ) );
        $comp->image = $filename;
        $comp->save();
      };
        
        $comp->company = $request->company;
        $comp->start_date = $request->start_date;
        $comp->address = $request->address;
        $comp->eamil = $request->eamil;
        $comp->website = $request->website;
        $comp->phone = $request->phone;
        $comp->end_date = $request->end_date;
        $comp->currency = $request->currency;
        $comp->created_by = Auth::id();
        $comp->created_at = Carbon::now();
        $comp->save();

      // Company::find($com_id)->update($request->all());
      return redirect('company')->with('succes', 'Company Update Succesfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($comp_id)
    {
      Company::where('id', '=', $comp_id)->delete();
      return redirect::to('company')->with('succes', ' Delete Succesfully !!');
    }
}
