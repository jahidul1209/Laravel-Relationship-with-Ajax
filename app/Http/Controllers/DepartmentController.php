<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{

    public function index()
    {
        $department = Department::all();
        return view('department.index');
    }

     public  function allData(){
        $data = Department::orderBy('id','DESC')->get();
        return response()->json($data);
  }

    public function addData(Request $request)
    {
        $request ->validate([
         'name' =>'required',
        ]);


        $data = Department::insert([      
        'name' => $request ['name'],
            ]);
   
     return response()->json($data);
    }

    public function editData($id)
    	{
        $data = Department::findOrfail($id);
        return response()->json($data);
    	}


    public function updateData(Request $request, $id)
    {
        $request ->validate([
         'name' =>'required',
        ]);


        $data = Department::findOrfail($id)->update([      
          'name' => $request ['name'],
 
            ]);
   
     return response()->json($data);
    }

        public function deleteData($id)
    {
           $delete = Department::findOrfail($id);
           $delete->delete();
           return response()->json($delete);
         
    }

 }

