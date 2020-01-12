<?php

namespace App\Http\Controllers;

use App\Tree;
use App\Category;
use Carbon\Carbon;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    public function list()
    {
      // $trees = Tree::where('parent_id', NULL)->get();
      $trees = Category::all();
      return view('admin.tree.list', compact('trees'));
    }

    public function value(Request  $request)
    {
      // $trees = Tree::where('parent_id', NULL)->get();
      $trees = Category::all();
      return view('admin.tree.list', compact('trees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $trees = Tree::where('parent_id', NULL)->get();
      $trees = Tree::all();
      return view('admin.tree.create', compact('trees'));
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
          'name' => 'required',
        ]);

        Tree::insert([
          'name' => $request->name,
          'parent_id' => $request->parent_id,
          'created_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);

        return redirect('tree')->with('success','Insert Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function edit($tree_id)
    {
      // $trees = Category::where('parent_id', NULL)->get();
      $trees = Category::all();
      $tr = Category::findOrFail($tree_id);
      return view('admin.tree.edit', compact('trees','tr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tr_id)
    {
      Category::find($tr_id)->update($request->all());
      return redirect('category-tree-view')->with('statuss', 'Update Suceessfully Done !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tree $tree)
    {
        //
    }
}
