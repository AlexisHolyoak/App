<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoucherSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $group;
    public $course;
    public $usuario;
    public $vouchers;
    public function __construct($data,$group,$course,$usuario,$vouchers)
    {
        //
        $this->data= $data;
        $this->group =$group;
        $this->course = $course;
        $this->usuario = $usuario;
        $this->vouchers = $vouchers;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.voucher')
        ->from('peraltaholyoak.aj@gmail.com','Gesap')
        ->subject('prueba')
        ->with(['data'=>$this->data])
        ->with(['group'=>$this->group])
        ->with(['course'=>$this->course])
        ->with(['usuario'=>$this->usuario])
        ->with(['vouchers'=>$this->vouchers]);
    }
}
