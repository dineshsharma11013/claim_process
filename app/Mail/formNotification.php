<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Config;
use DB;

class formNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      
        $this->data = $data;
    }

    public function build()
    {
        $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();
        //$from = Config::get('site.mail_from');
        
        return $this->view('mail.front.notification')->subject($this->data['subject'])->from($this->data['email_from']);
    }
}
