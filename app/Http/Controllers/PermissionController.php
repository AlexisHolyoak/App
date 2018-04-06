<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Permission;
class PermissionController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
    }
    public function index(){
      $permissions=Permission::all();
      return view('permission.index',compact('permissions'));
    }
    public function edit($id){
      return view('permission.edit');
    }
    public function create(Request $request){
      return view('permission.create');
    }
    public function store(){
      $permission=new Permission();
      $permission-> name         = $request->get('name');
      $permission-> display_name = $request->get('display_name'); //optional
      $permission-> description  = $request->get('description');// optional
      $permission->save();
      return Redirect::to('permission.index');
    }
    public function update(){
      $updatepermission=Permission::find($id);
      $updatepermission-> name=$request-> name;
      $updatepermission-> display_name =$request-> display_name;
      $updatepermission-> description =$request-> description;
      $updatepermission->save();
    }
    public function destroy(){}
}
