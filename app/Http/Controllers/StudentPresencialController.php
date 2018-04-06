<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use DB;
use Illuminate\Support\Facades\Redirect;
class StudentPresencialController extends Controller
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
      ->join('groups','vouchers.group_id','=','groups.id')
      ->join('students','vouchers.student_id','=','students.id')
      ->select('vouchers.id AS ID','courses.nombre AS CNOMBRE','students.name AS SNOMBRE',
      'students.dni AS SDNI','students.fechanacimiento AS SNACIMIENTO','students.direccion AS SDIRECCION',
      'students.email AS SEMAIL','students.celular AS SCEL','students.telefono AS STEL','students.especialidad AS SESPECIALIDAD',
      'students.centrolaboral AS SLABORAL','students.discapacidad AS SDISCAPACIDAD','courses.nombre AS CNOMBRE',
      'courses.lunes AS CLUNES','courses.martes AS CMARTES','courses.presencial AS CPRESENCIAL',
      'courses.miercoles AS CMIERCOLES','courses.jueves AS CJUEVES','courses.viernes AS CVIERNES',
      'courses.sabado AS CSABADO','courses.domingo AS CDOMINGO','groups.fechainicio AS GINICIO',
      'groups.fechaconclusion AS GCONCLUSION','students.conexion AS SCONEXION',
      'groups.estado AS GESTADO','vouchers.certificado AS VCERTIFICADO')
      ->whereNotNull('vouchers.course_id')
      ->whereNotNull('vouchers.group_id')
      ->whereNotNull('vouchers.student_id')
      ->where('courses.presencial',1)->get();
      return view('presencial.index',compact('vouchers'));
    }
    public function certificado(Request $request,$id){
      $voucher=Voucher::where('id',$id)->first();
      $voucher->certificado=$request->get('disponibilidad');
      $voucher->save();
      return Redirect::to('presencial');
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
