<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\Group;
use App\Course;
use Illuminate\Support\Facades\Auth;
use App\Student;
use Illuminate\Support\Facades\Redirect;
class MyCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $student = Student::where('user_id',$user->id)->first();
        if(!empty($student)){
          $vouchers=Voucher::where([
            'user_id'=>$user->id,
            'estado'=>1
            ])->groupBy('group_id')->get();
            $group=Group::all();
            $course=Course::all();
          return view('mycourses.index',compact('vouchers','group','course','student'));
        }else{
          return redirect()->route('student.edit',['id'=>$user->id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $voucher=Voucher::where('id',$id)->first();
      $studentid=Student::where('user_id',$voucher->user_id)->first()->id;
      $voucher-> student_id = $studentid;
      $voucher->save();
      return Redirect::to('mycourses');
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
