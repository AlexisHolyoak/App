<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Role;
use App\User;
use App\RoleUser;
use App\Voucher;
class RoleController extends Controller
{
  public function __construct(){
     $this->middleware('auth');
  }
  public function index(){
    $allroles=Role::all();
    return view('role.index',compact('allroles'));
  }
  public function store(Request $request){
    $newrole=new Role();
    $newrole-> name         = $request->get('name');
    $newrole-> display_name = $request->get('display_name'); //optional
    $newrole-> description  = $request->get('description');// optional
    $newrole->save();
    return Redirect::to('role');
  }
  public function create(){
    return view('role.create');
  }
  public function show($id){
    $onerole=Role::find($id);
    return view('role.show',compact('onerole'));
  }
  public function edit($id){
    $onerole=Role::find($id);
    return view('role.edit',compact('onerole'));
  }
  public function update(Request $request,$id){
    $updatedrole=Role::find($id);
    $updatedrole-> name=$request-> name;
    $updatedrole-> display_name =$request-> display_name;
    $updatedrole-> description =$request-> description;
    $upupdatedrole->save();
    return Redirect::to('role');
  }
  public function destroy($id){
    $droprole=Role::find($id);
    $droprole->delete();
    return Redirect::to('role');
  }
  public function rolgiven($id){
    $voucher = Voucher::where('id',$id)->first();
    return view('role.rolegiven',compact('voucher'));
  }
  public function studentrol(Request $request){
    //solicito el id del voucher que marcare como aprobado, esta escondido en un input hidden por problema con rutas....
    $voucher=Voucher::where('id',$request->get('idvoucher'))->first();
    $voucher->estado=1;
    $voucher->save();
    //this method occurs when a voucher is aproved by gesap
    $roles = RoleUser::where('user_id',$voucher-> user_id)->get();
    $nombrerol='alumno';
    //si el usuario ya tiene rol, los borro todos y luego le asigno el correspondiente
    if(!empty($roles)){
      $usuario=User::find($voucher-> user_id);
      foreach (Role::all() as $r) {
        $usuario->detachRole($r);
      }
      $usuario->attachRole($nombrerol);
    }
    return Redirect::to('user');
  }
  public function acceptvoucher(Request $request,$id){
    $voucher=Voucher::where('id',$id)->first();
    $voucher->estado=1;
    $voucher->save();
    $roles = RoleUser::where('user_id',$voucher-> user_id)->get();
    $nombrerol='alumno';
    //si el usuario ya tiene rol, los borro todos y luego le asigno el correspondiente
    if(!empty($roles)){
      $usuario=User::find($voucher-> user_id);
      foreach (Role::all() as $r) {
        $usuario->detachRole($r);
      }
      $usuario->attachRole($nombrerol);
    }
    return Redirect::to('voucher');

  }
}
