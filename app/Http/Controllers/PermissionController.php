<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\Menu;
use App\Role;
use Illuminate\Support\Facades\Input;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menu=Menu::all();
      $role=Role::all();


/*
foreach ($role as $key => $role) {
   
$data=array();


foreach ($menu as $key => $menu) {



$data['role_id']= $role->id;
$data['menu_id']= $menu->id;

DB::table('permissions')->insert($data);

    
}




}

*/



return view('admin.permission.index',compact('menu','role'));
}



public function permission(){





 $role_id = Input::get('role_id');
 $menu=Menu::all();
 $role=Role::all();







 $mm=Menu::count();
          // dd($mm);


 foreach ($menu as $key => $value) {

  $vv=DB::table('permissions')->where('menu_id',$value->id)->where('role_id',$role_id)->count();
  if($vv ==0){

               // $data=array();

               // $data['role_id']= $role;
               // $data['menu_id']= $value->id;


    DB::table('permissions')->insert(['role_id' => $role_id,'menu_id'=>$value->id]);

  }



}



return view('admin.permission.ajax',compact('menu','role_id'));

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



      // var_dump($_POST['view']);
      // $as=count($_POST['view']);
      // dd($as);
//         $a=$_POST['view'];

// dd($a);

      $data=array();

      $row=$request->rowCount;


      $mm=Menu::count();


      for ($i=0; $i < $mm; $i++) { 
                // dd($request->id[$i]);
/*       if(!empty($request->view[$i] )) {
        if($request->view[$i] !=NUll) {
         $data['view'] =$request->view[$i];
       }else{
        $data['view'] =0;
      }
    }
*/

    
    $data['view'] =$request->view[$i];


    $data['add'] =$request->add[$i];
    $data['edit'] =$request->edit[$i];
    $data['delete'] =$request->delete[$i];
    $data['own'] =$request->own[$i];

               // dd($request->view[$i]);
               // dd($request->m_id[$i]);

    DB::table('permissions')->where('id',$request->iddd[$i])->update($data);



  }

       // dd($a);
  return Redirect::to('permission')->with('success', 'Updated Successfully!!');

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
    public function update(Request $request, $id)
    {
        //
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
