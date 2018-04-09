<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
class VoucherSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $group;
    public $course;
    public $usuario;
    public $vouchers;
    public $file;
    public function __construct($file,$group,$course,$usuario,$vouchers)
    {
        //
        $this->group =$group;
        $this->course = $course;
        $this->usuario = $usuario;
        $this->vouchers = $vouchers;
        $this->file=$file;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$file=Storage::get($vouchers->imagen);
        $path=explode($this->file,storage_path($this->file))[0];
        $urlfile=$path.'app/'.$this->file;
        //dd($urlfile);
        return $this->view('mails.voucher')
        ->from('peraltaholyoak.aj@gmail.com','Gesap')
        ->subject('prueba')
        ->with(['group'=>$this->group])
        ->with(['course'=>$this->course])
        ->with(['usuario'=>$this->usuario])
        ->with(['vouchers'=>$this->vouchers])
        ->attach($urlfile);
    }
}
