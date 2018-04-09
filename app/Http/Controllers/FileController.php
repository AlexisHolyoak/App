<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Voucher;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function archivo(){
      //para guardar un archivo en storage
      //Storage::putFile('vouchers',new File('img/avatar2.png'));
      //para ver todos los directorios
      //$directories=Storage::allDirectories('scrum');
      //para crear un directorio
      Storage::makeDirectory('itil');
      $files = Storage::files('scrum/imagenes');
      //conseguir un elemento lo consigue con la extension
      //$uniqueid=Storage::putFile('scrum/imagenes',new File('img/avatar2.png'));
      /*dd($uniqueid);
      $imag= Storage::get($uniqueid);

      //dd($imag);
      $get='data:image/jpeg;base64,'.base64_encode($imag);*/
      //dd($filetype);
      $url= Storage::url('app/scrum/imagenes/1.jpg');
      dd(storage_path());
      $dwnld=Storage::download('app/scrum/imagenes/1.jpg');
      return view('files.show',compact('get'));
    }
    public function comprobante($id){
      $comprobante = Voucher::where('id',$id)->first()->imagen;
      $path=explode($comprobante,storage_path($comprobante))[0];
      $urlfile=$path.'app/'.$comprobante;
      return response()->file($urlfile);
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
