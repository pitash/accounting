<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $menu=Menu::all(); 
       $l=1;
      return view('admin.menu.index',compact('menu','l'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $item=Menu::all();
     return view('admin.menu.create',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     $data=array();

     $data['title'] =$request->title;
     $data['url'] =$request->url;
     $data['parent_id'] =$request->parent_id;
     $data['icon'] =$request->icon;
     $data['menu_order'] =$request->menu_order;
     $data['menu_type'] =$request->menu_type;
     $data['menu_order'] =$request->menu_order;
     $data['created_by'] =Auth::user()->id;

     DB::table('menus')->insert($data);
     return Redirect::to('menu')->with('success', 'Added Successfully!!');
     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {





     $item=Menu::where('id',$id)->first();
      $ite=Menu::all();
     return view('admin.menu.edit',compact('item','ite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

     $data=array();

   

     $data['title'] =$request->title;
     $data['url'] =$request->url;
     $data['parent_id'] =$request->parent_id;
     $data['icon'] =$request->icon;
     $data['menu_order'] =$request->menu_order;
     $data['menu_type'] =$request->menu_type;
     $data['menu_order'] =$request->menu_order;
     $data['created_by'] =Auth::user()->id;

     DB::table('menus')->where('id',$id)->update($data);
     return Redirect::to('menu')->with('success', 'Updated Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
