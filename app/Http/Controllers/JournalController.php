<?php

namespace App\Http\Controllers;

use App\Category;
use App\Journal;
use Carbon\Carbon;
use Auth;
use redirect;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Journal::all();
        $sl = 1;
        return view('admin.journal.index', compact('journals','sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ledgers = Category::all();
      return view('admin.journal.create', compact('ledgers'));
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
        'journal_no' => 'required',
        'item_name' => 'required',
        'depre_name' => 'required',
        'amount' => 'required',
        'date' => 'required',
        'under' => 'required',
        'desc' => 'required',
      ]);

      Journal::insert([
        'journal_no' =>  $request->journal_no,
        'item_name' =>  $request->item_name,
        'depre_name' =>  $request->depre_name,
        'amount' =>  $request->amount,
        'date' =>  $request->date,
        'under' =>  $request->under,
        'desc' =>  $request->desc,
        'created_by' =>  Auth::id(),
        'created_at' => Carbon::now(),
      ]);
      return redirect('journal')->with('success','Journal Add Successfully !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit($journal_id)
    {
      $ledgers = Category::all();
      $jour = Journal::findOrFail($journal_id);
      return view('admin.journal.edit', compact('ledgers','jour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jour_id)
    {
      Journal::find($jour_id)->update($request->all());
      return redirect('journal')->with('success','Journal Update Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}
