<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use App\Setting;
use App\Permission;
use App\Menu;
use Auth;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()

    {

       $menu=Menu::where('url','setting.index')->first();
       $permission=Permission::where('menu_id',$menu->id)->where('role_id',Auth::user()->id)->first();
       // dd($permission);
       if($permission->view =='on' ){
               $item=Setting::where('id',1)->first(); 
       return view('admin.setting.index',compact('item'));
       }else{

        return back()->with('error', ' You are not permitted to access here!!');
       }

    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
         $data = array();
         $data['company_name'] = $request->company_name;
         $data['header_title'] = $request->header_title;
         $data['company_address'] = $request->company_address;
         $data['company_phone'] = $request->company_phone;
         $data['company_email'] = $request->company_email;
         $data['copyright'] = $request->copyright;
         
         $img=Setting::where('id',1)->first();

         $image = $request->file('company_logo');
         if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'logo/';
            $image_url = $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['company_logo'] = $image_url;
                if($img->company_logo){
                $old_image_path = ("logo/{$img->company_logo}");
// dd($old_image_path);

                unlink($old_image_path);            
                }

            DB::table('settings')->where('id',1)->update($data);
            return Redirect::to('setting')->with('success', 'Updated Successfully!!');
            }
        } else {
            DB::table('settings')->where('id',1)->update($data);
            return Redirect::to('setting')->with('success', 'Updated Successfully!!');
        }
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
