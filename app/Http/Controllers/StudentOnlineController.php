<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentOnlineController extends Controller
{
  public function __construct(){
     $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vouchers= DB::table('vouchers')
      ->join('courses','vouchers.course_id','=','courses.id')
      ->join('students','vouchers.student_id','=','students.id')
      ->select('vouchers.id AS ID','courses.nombre AS CNOMBRE','students.name AS SNOMBRE',
      'students.dni AS SDNI','students.fechanacimiento AS SNACIMIENTO','students.direccion AS SDIRECCION',
      'students.email AS SEMAIL','students.celular AS SCEL','students.telefono AS STEL','students.especialidad AS SESPECIALIDAD',
      'students.centrolaboral AS SLABORAL','students.discapacidad AS SDISCAPACIDAD','courses.nombre AS CNOMBRE',
      'students.conexion AS SCONEXION','vouchers.onlineinicio AS VINICIO',
      'vouchers.certificado AS VCERTIFICADO')
      ->whereNotNull('vouchers.course_id')
      ->whereNotNull('vouchers.student_id')
      ->where('courses.online',1)->get();
      return view('online.index',compact('vouchers','fechacierre'));
    }
    public function certificado(Request $request,$id){
      $voucher=Voucher::where('id',$id)->first();
      $voucher->certificado=$request->get('disponibilidad');
      $voucher->save();
      return Redirect::to('online');
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
