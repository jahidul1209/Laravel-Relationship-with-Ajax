<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        return view('groups.index',compact('groups'));
    }



    public function editdata($id)
    {
        $data = Group::findOrfail($id);
        return response()->json($data);
    }


    public function updatedata(Request $request, $id)
    {
        $request ->validate([
         'grp_name' =>'required',
         'status' =>'required',
         'details' =>'required' ,
        ]);


        $data = Group::findOrfail($id)->update([      
        'grp_name' => $request ['grp_name'],
         'status' => $request ['status'],
         'details' => $request ['details'],
            ]);
   
     return response()->json($data);
    }


    public function deletedata($id)
    {
           $delete = Group::findOrfail($id);
           $delete->delete();
           return response()->json($delete);
         
    }

    public  function alldata(){
            $data = Group::orderBy('id','DESC')->get();
            return response()->json($data);
  }

  public function adddata(Request $request)
    {
        $request ->validate([
         'grp_name' =>'required',
         'status' =>'required',
         'details' =>'required' ,
        ]);


        $data = Group::insert([      
        'grp_name' => $request ['grp_name'],
         'status' => $request ['status'],
         'details' => $request ['details'],
            ]);
   
     return response()->json($data);
    }
}
