<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Student;
use App\Voucher;
use App\User;
class StudentController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
    }
    public function index(){
      if(Auth::user()->hasrole('administrador')){
        $students=Student::All();
        return view('student.index',compact('students'));
      }
      return view('adminlte::home');
    }
    public function create(){
      if(Auth::user()->hasrole('administrador')){
        return view('student.create');
      }
      return view('adminlte::home');
    }
    public function edit($id){
        if(Auth::user()->hasrole('alumno')){
          $student= Student::where('user_id',$id)->first();
          if(!empty($student)){
            return view('student.edit',compact('student'));
          }else{
            $student=new Student();
            $student-> name = '';
            $student-> dni = '';
            $student-> email = '';
            $student-> fechanacimiento = '';
            $student-> direccion = '';
            $student-> telefono ='';
            $student-> celular = '';
            $student-> especialidad = '';
            $student-> centrolaboral = '';
            $student-> discapacidad = '';
            $student-> conexion = '';
            $student-> comentarios = '';
            return view('student.edit',compact('student'));
          }
        }
        if(Auth::user()->hasrole('administrador')){
          $student= Student::where('id',$id)->get();
          return view('student.edit',compact('student'));
        }
    }
    public function update(Request $request, $id){
      $this->validate($request,[
        'name' => 'required',
        'dni'=>'numeric|digits_between:8,13',
        'fechanacimiento'=>'date|date_format:Y-m-d',
        'telefono'=>'numeric',
        'celular' => 'numeric|required',
        'comentario' => 'max:180'
      ]);
      if($request->user()->hasRole('alumno')){
        $updated=Student::updateOrCreate([
          'user_id' => Auth::user()->id,
        ],[
          'name'=>$request->get('name'),
           'dni' =>$request->get('dni'),
           'email' =>$request-> email,
           'fechanacimiento' =>$request-> fechanacimiento,
           'direccion' =>$request-> direccion,
           'telefono' =>$request-> telefono,
           'celular' =>$request-> celular,
           'especialidad' =>$request-> especialidad,
           'centrolaboral' =>$request-> centrolaboral,
           'discapacidad' =>$request-> discapacidad,
           'conexion' =>$request-> conexion,
           'comentarios' =>$request-> comentarios
          ]);
          $vouchers=Voucher::where('user_id',Auth::id())->where('estado',1)->where('student_id',null)->get();
          foreach ($vouchers as $voucher) {
            $voucher -> student_id = $updated->id;
            $voucher->save();
          }
      return Redirect::to('mycourses');
    }
    if($request->user()->hasRole('administrador')){
      $updatestudent=Student::find($id);
      $updatestudent-> name =$request-> name;
      $updatestudent-> dni = $request-> dni;
      $updatestudent-> email = $request-> email;
      $updatestudent-> fechanacimiento =$request-> fechanacimiento;
      $updatestudent-> direccion = $request-> direccion;
      $updatestudent-> telefono =$request-> telefono;
      $updatestudent-> celular = $request-> celular;
      $updatestudent-> especialidad = $request-> especialidad;
      $updatestudent-> centrolaboral = $request-> centrolaboral;
      $updatestudent-> discapacidad = $request-> discapacidad;
      $updatestudent-> conexion = $request-> conexion;
      $updatestudent-> comentarios = $request-> comentarios;
      $upupdatedrole->save();
      return Redirect::to('student');
    }
    return view('vendor.adminlte.auth.login');
    }
    public function store(Request $request){
      $newstudent=new Student();
      $newstudent-> user_id =$request->user()->id;
      $newstudent-> name =$request->get('name');
      $newstudent-> dni =$request->get('dni');
      $newstudent-> email=$request->get('email');
      $newstudent-> fechanacimiento=$request->get('fechanacimiento');
      $newstudent-> direccion=$request->get('direccion');
      $newstudent-> telefono=$request->get('telefono');
      $newstudent-> celular=$request->get('celular');
      $newstudent-> especialidad=$request->get('especialidad');
      $newstudent-> centrolaboral=$request->get('centrolaboral');
      $newstudent-> discapacidad =$request->get('discapacidad');
      $newstudent-> conexion =$request->get('conexion');
      $newstudent-> comentarios =$request->get('comentarios');
      $newstudent->save();
      return Redirect::to('student');
    }
    public function destroy($id){}
}
