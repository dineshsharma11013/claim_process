<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Config;
use DB;

class userForgotPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $data;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $req)
    {
        $com = DB::table("general_info_mdls")->select('company_name')->where([['user_type','=',1],['sub_user','=',""]])->first();
        $from = Config::get('site.mail_from');

      

        return $this->view('mail.front.signUp')->subject($this->subject)->from($from);
    }
}
