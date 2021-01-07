<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCategory;
use Toastr;
class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCat = UserCategory::all();
        return view('userCategory.index',compact('userCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = [      
        'cat_name' => $request['cat_name'],
         'details' => $request['details'],
        ];
        UserCategory::create($data);
       $notification =  Toastr::success('User Category Added', 'Success');
     return redirect()->route('usercategory.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userCat = UserCategory::find($id);
        return view('userCategory.show', compact('userCat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit_cat = UserCategory::find($id);
       return view('usercategory.edit', compact('edit_cat'));
       $notification =  Toastr::success('User Category Edited', 'Success');
       return redirect()->route('usercategory.index')->with( $notification);
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
        UserCategory::where('id', $id)->update($request->all());
         $notification =  Toastr::success('User Category Updated', 'Success');
       return redirect()->route('usercategory.index')->with( $notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $delete = UserCategory::find($id);
          $delete->delete();
          $notification =  Toastr::success('User Category Deleted', 'Success');
          return redirect()->back()->with($notification);
    }
}
