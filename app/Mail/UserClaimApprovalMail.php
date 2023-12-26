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

class UserClaimApprovalMail extends Mailable
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

    public function build(Request $req)
    {
        $dbs = DB::table('mail_sent_mdls')->latest('id')->first();
        $gen = DB::table('general_info_mdls')->select('email')->where('id',$dbs->user_id)->first();

        $from = $gen->email; 
        $email = $this->view('mail.front.userClaimAmount')->subject($this->data['subject'])->from($from)->with('data', $this->data['msg']);
        
        if (!empty($dbs->files)) 
        {
            $path = publicP().$dbs->directory;
            $files = explode(', ', $dbs->files);
            foreach ($files as $file) 
            {
                $email->attach($path.'/'.$file);
            }
        }
        return $email;
    }
}
