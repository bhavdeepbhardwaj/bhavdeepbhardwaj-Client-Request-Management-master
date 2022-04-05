<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Help;
use App\Models\HelpCategory;
use App\Models\Priority;
use App\Models\role;
use App\Models\Status;

class ClientController extends Controller
{
    //
    //
    function index()
    {
        return view('client.index');
    }

    function profile()
    {
        return view('client.profile');
    }

    function setting()
    {
        return view('client.setting');
    }

    function reports()
    {
        return view('client.reports');
    }

    function show_task()
    {
        return view('client.task.show_task');
    }

    function create_task()
    {
        return view('client.task.create_task');
    }

    function calendar()
    {
        return view('client.calendar');
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
        return view('client.help', compact('help_category', 'prefixvalue'));
    }

    function help_store(Request $request)
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

        $result = $help->save();

        // $mailer->sendEditInformation(Auth::user(), $edit);

        if ($result) {
            return redirect()->back()->with("success", "A new SRN: $help->case_id has been generated.!");
        } else {
            dd($result);
            return ["result" => "failed "];
        }
    }

    function create_ticket()
    {
        $user_id = Auth::user()->id;
        // $job = Auth::user()->prefix;
        // $job_no = $user_id - 3;
        // dd($job);
        $categories = Category::where('user_id', $user_id)->get();
        $brands = Brand::where('user_id', $user_id)->get();
        $countries = Country::where('user_id', $user_id)->get();
        $prioritys = Priority::get();
        $status = Status::get();


        $getdata = \App\Models\Ticket::latest()->first();

        if (isset($getdata) && $getdata) {
            $incid = $getdata->id + 1;
            $num_padded = sprintf("%03d", $incid);
            $prefixvalue = Auth::user()->prefix . $num_padded;
        } else {
            $incid = 1;
            $num_padded = sprintf("%03d", $incid);
            $prefixvalue = Auth::user()->prefix . $num_padded;
        }
        // dd($prefixvalue);
        return view('client.ticket.create_ticket', compact('brands', 'countries', 'categories', 'prioritys', 'status', 'prefixvalue'));
    }

    public function ticket_store(Request $request)
    {
        // dd($request->all());
        // $getdata = Ticket::where('user_id', $request->user_id)->latest('job_no')->first();
        // $job_no = $getdata->job_no;
        // $job_no = $job_no + 1;

        $fileName = "";
        $this->validate($request, [
            'reference' => 'mimes:jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:307200',

        ]);

        if ($request->hasFile('reference')) {
            $image = $request->file('reference')->getClientOriginalName();
            $fileName = $request->reference->move(date('d-m-Y') . '-Ticket-Reference', $image);
        }


        $ticket = new Ticket;
        $ticket->user_id        = $request->user_id;
        $ticket->job            = $request->job;
        $ticket->job_no         = $request->job_no;
        $ticket->brand          = $request->brand;
        $ticket->country        = $request->country;
        $ticket->category       = $request->category;
        $ticket->priority       = $request->priority;
        $ticket->status         = $request->status;
        $ticket->title          = $request->title;
        $ticket->summary        = $request->summary;
        $ticket->objective      = $request->objective;
        $ticket->reference      = $fileName;
        $ticket->otherinfo      = $request->otherinfo;

        $result = $ticket->save();

        // $pending = Ticket::where('status', 'Pending from Client')->count();
        // dd($pending);

        // $mailer->sendEditInformation(Auth::user(), $edit);

        $number = DB::table('tickets')
            ->orderBy('created_at', 'desc')
            ->first();
        $num = sprintf('%03d', intval($number->id));

        if ($result) {
            // return redirect()->back()->with("success", "A new SRN: $ticket->job$num has been generated.!");
            return redirect()->back()->with("success", "A new SRN: $ticket->job has been generated.!");
        } else {
            return ["result" => "failed "];
        }
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
        return view('client.ticket.details_ticket', compact('ticket_detail', 'prefixvalue'));
    }

    function show_ticket()
    {
        // $comments = DB::table('comments')->join('tickets', 'tickets.id', '=', 'comments.job_no')
        //     ->select('comments.reference as comment_reference', 'comments.comment', 'comments.job')->get();
        // $nos = DB::table('comments')->distinct('id')->count('job_no');
        // $comments = DB::table('tickets')->join('comments', 'comments.job_no', '=', 'tickets.id')
        //     ->select('comments.reference as comment_reference', 'comments.comment', 'comments.job')->get();
        // dd($nos);
        // return view('client.ticket.show_ticket', compact('tickets'));

        $tickets = Ticket::latest()->orderBy('id', 'desc')->get();
        return view('client.ticket.show_ticket', compact('tickets'));
    }

    function comment_ticket(Request $request, $id)
    {
        // dd($request->all());

        $fileName = "";
        $this->validate($request, [
            'comment'   => 'required',
            'reference' => 'mimes:jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:307200',
        ]);

        if ($request->hasFile('reference')) {
            $image = $request->file('reference')->getClientOriginalName();
            $fileName = $request->reference->move(date('d-m-Y') . '-Comment-Reference', $image);
        }

        // $edit = new Comment([
        //     'user_id'           => $request->user_id,
        //     'job'               => $request->job,
        //     'job_no'            => $request->job_no,
        //     'comment'           => $request->comment,
        //     'reference'         => $fileName,
        //     'comment_ticket'    => $request->comment_ticket,
        // ]);

        $ticket = new Comment;
        $ticket->user_id            = $request->user_id;
        $ticket->job                = $request->job;
        $ticket->job_no             = $request->job_no;
        $ticket->comment            = $request->comment;
        $ticket->comment_ticket     = $request->comment_ticket;
        $ticket->reference          = $fileName;

        $result = $ticket->save();

        $comment = Ticket::find($id);
        Ticket::select('commentnos')->where('id', $id)->Increment('commentnos');
        // $comment = $comment->commentnos + 1;
        $comment->save();

        // dd($edit);

        // $mailer->sendEditInformation(Auth::user(), $edit);


        $number = DB::table('comments')
            ->orderBy('created_at', 'desc')
            ->first();

        $num = sprintf('%02d', intval($number->id));
        $ids = sprintf('%03d', intval($id));

        return redirect()->back()->with("status", "An Edit Request ADNESEA$ids-E$num has been submitted.");
    }

    function view_comment()
    {
        $view_comment = Comment::latest()->orderBy('id', 'desc')->get();
        return view('client.comment.view_comment', compact('view_comment'));
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
        return view('client.comment.details_comment', compact('comment_detail', 'comment_record', 'ticket_detail', 'prefixvalue'));
    }

    function designation()
    {
        return view('client.designation');
    }

    function show_employee()
    {
        return view('client.employee.show_employee');
    }

    function create_employee()
    {
        return view('client.employee.create_employee');
    }
}
