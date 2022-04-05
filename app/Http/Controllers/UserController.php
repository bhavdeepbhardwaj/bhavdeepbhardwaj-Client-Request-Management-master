<?php

namespace App\Http\Controllers;

use App\Models\Help;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Comment;
use App\Models\HelpCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\AppMailer;

class UserController extends Controller
{
    //
    function index()
    {
        return view('user.index');
    }

    function profile()
    {
        return view('user.profile');
    }

    function setting()
    {
        return view('user.setting');
    }

    function reports()
    {
        return view('user.reports');
    }

    function show_task()
    {
        return view('user.task.show_task');
    }

    function create_task()
    {
        return view('user.task.create_task');
    }

    function help()
    {
        $getdata = \App\Models\Help::latest()->first();

        if (isset($getdata) && $getdata) {
            $incid = $getdata->id + 1;
            $num_padded = sprintf("%03d", $incid);
            $prefixvalue = Auth::user()->prefix . $num_padded . '-HELP';
            // dd($prefixvalue);

        } else {
            $incid = 1;
            $num_padded = sprintf("%03d", $incid);
            $prefixvalue = Auth::user()->prefix . $num_padded;
        }

        $user_id = Auth::user()->id;
        $help_category = HelpCategory::where('user_id', $user_id)->get();
        return view('user.help', compact('help_category', 'prefixvalue'));
    }

    function help_store(Request $request, AppMailer $mailer, Ticket $ticket)
    {
        // dd($request->all());
        $fileName = "";
        $this->validate($request, [
            'summary' => 'required',
            'reference_file' => 'mimes:jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:307200',

        ]);

        if ($request->hasFile('reference_file')) {
            $image = $request->file('reference_file')->getClientOriginalName();
            $fileName = $request->reference_file->move(date('d-m-Y') . '-Help-Reference', $image);
        }

        $help = new Help;
        $help->user                 = $request->user;
        $help->helpCategory_id      = $request->helpCategory_id;
        $help->case_id              = $request->case_id;
        $help->title                = $request->title;
        $help->summary              = $request->summary;
        $help->reference_file       = $fileName;

        $help->save();

        $mailer->sendHelpInformation(Auth::user(), $help, $ticket);

        return redirect()->back()->with("success", "A new SRN: $help->case_id has been generated.!");
    }

    function calendar()
    {
        return view('user.calendar');
    }

    function create_ticket()
    {
        return view('user.ticket.create_ticket');
    }

    function show_ticket()
    {
        $tickets = Ticket::latest()->orderBy('id', 'desc')->get();
        return view('user.ticket.show_ticket', compact('tickets'));
    }

    function details_ticket($id)
    {

        $getdata = \App\Models\Comment::latest()->first();

        if (isset($getdata) && $getdata) {
            $incid = $getdata->id + 1;
            $num_padded = sprintf("%02d", $incid);
            $prefixvalue = $getdata->job . '-E' . $num_padded;
            // dd($prefixvalue);
        } else {
            $incid = 1;
            $num_padded = sprintf("%02d", $incid);
            $prefixvalue = Auth::user()->prefix . '-E' . $num_padded;
        }

        $ticket_detail = Ticket::where('id', $id)->get()->first();
        $status = Status::get();
        // dd($ticket_detail);

        return view('user.ticket.details_ticket', compact('ticket_detail', 'prefixvalue', 'status'));
    }

    function ticket_update(Request $request, $id, $mailer)
    {
        $ticket_update = Ticket::find($id);
        $request->validate([
            'deadline'  => 'required',
            'status' => 'required',
        ]);
        $ticket_update->deadline = request('deadline');
        $ticket_update->status = request('status');

        // dd($ticket_update);
        $result = $ticket_update->save();

        // $result = $ticket_update->update($request->all());

        if ($request->input('status') == "closed") {
            $mailer->sendStatusInformation(Auth::user());
        }

        if ($result) {
            return redirect()->back()->with("status", "Your SRN: $ticket_update->job has been updated.");
        } else {
            return ["result" => "failed "];
        }
    }

    function comment_ticket(Request $request, $id)
    {
        $fileName = "";
        $this->validate($request, [
            'reference' => 'mimes:jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:307200',
        ]);

        if ($request->hasFile('reference')) {
            $image = $request->file('reference')->getClientOriginalName();
            $fileName = $request->reference->move(date('d-m-Y') . '-Comment-Reference', $image);
        }

        $ticket = new Comment;
        $ticket->user_id            = $request->user_id;
        $ticket->job                = $request->job;
        $ticket->job_no             = $request->job_no;
        $ticket->comment            = $request->comment;
        $ticket->comment_ticket     = $request->comment_ticket;
        $ticket->reference          = $fileName;

        $result = $ticket->save();

        // dd($request->all());


        // $edit = new Comment([
        //     'user_id'           => $request->user_id,
        //     'job'               => $request->job,
        //     'job_no'            => $request->job_no,
        //     'comment'           => $request->comment,
        //     'reference'         => $fileName,
        //     'comment_ticket'    => $request->comment_ticket,
        // ]);

        $comment = Ticket::find($id);
        Ticket::select('commentnos')->where('id', $id)->Increment('commentnos');
        // $comment = $comment->commentnos + 1;
        $comment->save();

        // $result = $edit->save();

        $number = DB::table('comments')
            ->orderBy('created_at', 'desc')
            ->first();

        $num = sprintf('%02d', intval($number->id));
        $ids = sprintf('%03d', intval($id));



        if ($result) {
            return redirect()->back()->with("status", "An Edit Request ADNESEA$ids-E$num has been submitted.");
        } else {
            return ["result" => "failed "];
        }
        // return view('client.ticket.details_ticket')->with("status", "An Edit Request ADNESEA$id-E$num has been submitted.");

    }

    function show_comment($id)
    {
        $getdata = \App\Models\Comment::latest()->first();

        if (isset($getdata) && $getdata) {
            $incid = $getdata->id + 1;
            $num_padded = sprintf("%02d", $incid);
            $prefixvalue = $getdata->job . '-E' . $num_padded;
            // dd($prefixvalue);
        } else {
            $incid = 1;
            $num_padded = sprintf("%02d", $incid);
            $prefixvalue = Auth::user()->prefix . '-E' . $num_padded;
        }

        $ticket_detail = Ticket::where('id', $id)->get()->first();
        $comment_record = Ticket::where('id', $id)->first();
        $comment_detail = Comment::where('job_no', $id)->get();
        // dd($comment_detail);
        return view('user.comment.details_comment', compact('comment_detail', 'comment_record', 'ticket_detail', 'prefixvalue'));
    }

    function view_comment()
    {
        $view_comment = Comment::get();
        return view('user.comment.view_comment', compact('view_comment'));
    }

    function designation()
    {
        return view('user.designation');
    }

    function show_resource()
    {
        return view('user.resource.show_resource');
    }

    function create_resource()
    {
        return view('user.resource.create_resource');
    }
}
