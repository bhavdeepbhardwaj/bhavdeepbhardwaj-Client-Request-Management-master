<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Help;
use App\Models\Ticket;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }

    // Help Ticket Informatiion For Admin | Client | Resource | Employee

    public function sendHelpInformation($user, Help $help)
    {
        $this->to = ['bhavdeepbhardwaj555@gmail.com'];
        $this->subject = "$help->title (Ticket ID: $help->case_id)";
        $this->view = 'emails.help';
        $this->data = compact('user', 'help');
        return $this->deliver();
    }

    // Admin Ticket Update information

    public function sendStatusInformation($user, $ticket)
    {
        $ticket = Ticket::first();

        $this->to = ['bhavdeepbhardwaj555@gmail.com'];
        $this->subject = "[SRN $ticket->job] $ticket->title";
        $this->view = 'emails.status_info';
        $this->data = compact('user', 'ticket');
        return $this->deliver();
    }

    // User Comment on Client Ticket

    public function sendCommetInformation($user, $comment, Ticket $ticket)
    {
        $this->to = ['bhavdeepbhardwaj555@gmail.com'];
        $this->subject = "[Comment SRN $comment->comment_ticket]";
        $this->view = 'emails.comment_info';
        $this->data = compact('user', 'comment', 'ticket');
        return $this->deliver();
    }

    // Client Create Ticket Information

    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = ['bhavdeepbhardwaj555@gmail.com'];
        $this->subject = "[SRN $ticket->job] $ticket->title";
        $this->view = 'emails.ticket_info';
        $this->data = compact('user', 'ticket');
        return $this->deliver();
    }


    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->fromAddress, $this->fromName)
                ->to($this->to)->subject($this->subject);
        });
    }

    // public function build()
    // {
    //     return $this->view('view.name');
    // }
}
