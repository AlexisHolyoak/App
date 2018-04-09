<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 180);

use App\Voucher;
use Illuminate\Http\Request;
use App\Group;
use App\Course;
use App\User;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Response;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Illuminate\Http\File;
use App\Mail\VoucherSent;
use Validator;
use PDF;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
class VoucherController extends Controller
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
      if(Auth::user()->hasrole('administrador')){
        $vouchers=DB::table('vouchers')
        ->join('groups','vouchers.group_id','=','groups.id')
        ->join('courses','vouchers.course_id','=','courses.id')
        ->join('users','vouchers.user_id','=','users.id')
        ->select('vouchers.id as VID','courses.nombre AS CNOMBRE','courses.online as CONLINE','courses.presencial AS CPRESENCIAL',
        'groups.fechainicio AS GINICIO','groups.fechaconclusion AS GCONCLUSION','vouchers.onlineinicio AS VINICIO',
        'users.name AS UNAME','users.email AS UEMAIL','vouchers.estado AS VESTADO','vouchers.created_at AS VCREATEDAT','vouchers.imagen AS VIMAGEN')->get();
        return view('voucher.index',compact('vouchers'));
      }else{
        $id=Auth::id();
        $vouchers=DB::table('vouchers')
        ->join('groups','vouchers.group_id','=','groups.id')
        ->join('courses','vouchers.course_id','=','courses.id')
        ->join('users','vouchers.user_id','=','users.id')
        ->select('vouchers.id as VID','courses.nombre AS CNOMBRE','courses.online AS CONLINE','courses.presencial AS CPRESENCIAL',
        'groups.fechainicio AS GINICIO','groups.fechaconclusion AS GCONCLUSION','vouchers.onlineinicio AS VINICIO',
        'users.name AS UNAME','users.email AS UEMAIL','vouchers.estado AS VESTADO','vouchers.created_at AS VCREATEDAT','vouchers.imagen AS VIMAGEN')
        ->where('vouchers.user_id',$id)->get();
        return view('voucher.index',compact('vouchers'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Group  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $student = Student::where('user_id',Auth::id())->first();
      if(!empty($student)){
      return view('voucher.create');
      }else{
      return view('voucher.create');
      }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'courses' => 'required',
        'imagen' => 'max:25000|required|mimes:jpeg,png.pdf'
      ]);
      if(Student::where('user_id',Auth::id())->count()==1){
        $idstudent=Student::where('user_id',Auth::id())->first()->id;
        $fileurl=$request->file('imagen')->getRealPath();
        $comprobante=Storage::putFile('vouchers',new File($fileurl));
        $id = Voucher::insertGetId(
            [
              'imagen'=> $comprobante,
              'estado'=> 0,
              'course_id'=> $request->get('courses'),
              'group_id'=> $request->get('fechainicio'),
              'student_id'=> $idstudent,
              'user_id'=> Auth::id(),
              'onlineinicio'=> $request->get('onlineinicio'),
              'comentario'=> $request->get('comentario'),
              "created_at" =>  \Carbon\Carbon::now(),
              "updated_at" => \Carbon\Carbon::now()
            ]
          );
        //return redirect()->action('VoucherController@mail',[$id]);
      }else{
        $fileurl=$request->file('imagen')->getRealPath();
        $comprobante=Storage::putFile('vouchers',new File($fileurl));
        //INSERTAR Y RETORNAR EL ID
        $id = Voucher::insertGetId(
            [
              'imagen'=> $comprobante,
              'estado'=> 0,
              'course_id'=> $request->get('courses'),
              'group_id'=> $request->get('fechainicio'),
              'user_id'=> Auth::id(),
              'onlineinicio'=> $request->get('onlineinicio'),
              'comentario'=> $request->get('comentario'),
              "created_at" =>  \Carbon\Carbon::now(),
              "updated_at" => \Carbon\Carbon::now()
            ]
          );
        return redirect()->action('VoucherController@mail',[$id]);
      }
    }
    //function que comprueba si el alumno ha llenado su matricula antes de registrar otro pago
    public function firstfillmatricula($id){
      $student=Student::where('user_id',Auth::id())->first();
      if(!empty($student)){
        return view('voucher.create');
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
    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // aqviarrlekdcufst
        $voucher=Voucher::find($id);
        $voucher->delete();
        return Redirect::to('voucher');
    }
    public function mail($id){
      $vouchers = Voucher::where('id',$id)->first();
      $file=$vouchers->imagen;
      $usuario=User::where('id',$vouchers-> user_id)->first();
      $group=Group::where('id',$vouchers-> group_id)->first();
      $course=Course::where('id',$vouchers-> course_id)->first();
      Mail::to('broarshuacho@gmail.com')->send(new VoucherSent($file,$group,$course,$usuario,$vouchers));
      return Redirect::to('home');
    }
    public function certificadopresencialpdu($id){
      $voucher=Voucher::where('id',$id)->first();
      $course=Course::where('id',$voucher->course_id)->first();
      $student=Student::where('id',$voucher->student_id)->first();
      $group=Group::where('id',$voucher->group_id)->first();
      $fechainicio=\Carbon\Carbon::parse($group->fechainicio)->format('d-m-Y');
      $fechaconclusion=\Carbon\Carbon::parse($group->fechaconclusion)->format('d-m-Y');
      $html= View::make('certificates.pdu', compact('course', 'student','fechainicio','fechaconclusion'))->render();
      $pdf = PDF::loadHtml($html)->setPaper('a4', 'landscape');
      return $pdf->stream();
    }
    public function certificadoonlinepdu($id){
      $voucher=Voucher::where('id',$id)->first();
      $course=Course::where('id',$voucher->course_id)->first();
      $student=Student::where('id',$voucher->student_id)->first();
      $anothercourse=Course::where('nombre','like','%'.$course->nombre.'%')->where('presencial',1)->first()->id;
      $group=Group::where('course_id',$anothercourse)->first();
      $fechainicio=\Carbon\Carbon::parse($group->fechainicio)->format('d-m-Y');
      $fechaconclusion=\Carbon\Carbon::parse($group->fechaconclusion)->format('d-m-Y');
      $html= View::make('certificates.pdu', compact('course', 'student','fechainicio','fechaconclusion'))->render();
      $pdf = PDF::loadHtml($html)->setPaper('a4', 'landscape');
      return $pdf->stream();
    }
    public function test($id){
      $voucher=Voucher::where('id',$id)->first();
      $course=Course::where('id',$voucher->course_id)->first();
      $student=Student::where('id',$voucher->student_id)->first();
      $group=Group::where('id',$voucher->group_id)->first();
      $fechainicio=\Carbon\Carbon::parse($group->fechainicio)->format('d-m-Y');
      $fechaconclusion=\Carbon\Carbon::parse($group->fechaconclusion)->format('d-m-Y');
      return view('certificates.pdu',compact('voucher','course','student','group','fechainicio','fechaconclusion'));
    }

}
