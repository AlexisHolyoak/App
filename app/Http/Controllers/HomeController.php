<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Course;
use App\Group;
use App\User;
use App\Student;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
      if(Auth::user()->hasRole('administrador')){
        $usercount=User::count();
        $stdcount=Student::count();
        $grpcount=Group::count();
        $crscount=Course::count();
        $grpdisponible=Group::where('disponibilidad',1)->count();
        $today=Carbon::now();
        $grpestado=Group::where('estado',0)->count();
        $grpactual=Group::where('disponibilidad',0)->where('estado',1)->whereDate('fechainicio','<',$today)->count();
        $stdonline=DB::table('vouchers')
        ->join('courses','vouchers.course_id','=','courses.id')
        ->where('courses.online',1)->count();
        $stdpresencial=DB::table('vouchers')
        ->join('courses','vouchers.course_id','=','courses.id')
        ->where('courses.presencial',1)->count();
        return view('adminlte::home',compact('usercount','stdcount','grpcount','crscount','grpdisponible','grpestado','grpactual','stdonline','stdpresencial'));
      }else{
        return view('adminlte::home');
      }
    }
}
