<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Help;
use App\Models\Ticket;
use Illuminate\Contracts\Mail\Mailer;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class AppMailer
{

    public $mailer;
    public $fromAddress = 'bhavdeep.bharadwaj@ashplan.media';
    public $fromName = 'Service Request | ASHPlan Media';
    public $to;
    public $subject;
    public $view;
    public $data = [];


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }


    public function sendHelpInformation($user, Help $help, Ticket $ticket)
    {
        $this->to = ['bhavdeepbhardwaj555@gmail.com'];
        $this->subject = "$help->title (Ticket ID: $help->case_id)";
        $this->view = 'emails.help';
        $this->data = compact('user', 'help','ticket');
        return $this->deliver();
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }

    // public function build()
    // {
    //     return $this->view('view.name');
    // }
}
