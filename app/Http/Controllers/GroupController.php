<?php

namespace App\Http\Controllers;

use App\Group;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
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
        $groups=Group::all();
        $course=Course::all();
        return view('group.index',compact('groups','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $courses =Course::where('presencial',1)->get();
      return view('group.create',compact('courses'));
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
        $group=new Group();
        $group-> course_id = $request->get('course_id');
        $group-> fechainicio =$request->get('fechainicio');
        $group-> fechaconclusion =$request->get('fechaconclusion');
        $group-> orden = $request->get('orden');
        $group-> estado =1;
        $group-> observacion =$request->get('observacion');
        $group->save();
        return Redirect::to('group');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups=Group::where('id',$id)->first();
        $course=Course::where('id',$groups->course_id)->first();
        return view('group.edit',compact('groups','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Group::where('id',$id)->first();
        $group-> fechainicio = $request->get('fechainicio');
        $group-> orden = $request->get('orden');
        $group-> fechaconclusion = $request->get('fechaconclusion');
        $group-> observacion = $request->get('observacion');
        $group->save();
        return Redirect::to('group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
    public function conclude(Request $request, $id){
      $group = Group::where('id',$id)->first();
      $group-> fechaconclusion = $request->get('fechacierre');
      $group-> estado = 0;
      $group->save();
      return Redirect::to('group');
    }
    public function disponibility(Request $request, $id){
      $group = Group::where('id',$id)->first();
      $group-> disponibilidad = $request->get('disponibilidad');
      $group->save();
      return Redirect::to('group');
    }
}
