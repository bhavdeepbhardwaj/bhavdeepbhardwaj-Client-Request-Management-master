<?php

namespace App\Http\Controllers;

use App\Mail\AppMailer;
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

    function help_store(Request $request, AppMailer $mailer)
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

        $mailer->sendHelpInformation(Auth::user(), $help);

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

    public function ticket_store(Request $request, AppMailer $mailer)
    {
        // dd($request->all());
        $picture = "";
        $imageNameArr = [];
        $this->validate($request, [
            'reference.*' => 'mimes:jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:307200',
        ]);

        if ($request->hasFile('reference')) {
            $picture = array();
            $imageNameArr = [];
            foreach ($request->reference as $file) {
                // you can also use the original name
                $image = $file->getClientOriginalName();
                $imageNameArr[] = $image;
                // Upload file to public path in images directory
                $fileName = $file->move(date('d-m-Y') . '-Ticket-Reference', $image);
                // Database operation
                $array[] = $fileName;
                $picture = implode(",", $array); //Image separated by comma
            }
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
        $ticket->reference      = $picture;
        $ticket->otherinfo      = $request->otherinfo;

        // 4 is key of Pending from Client status table

        $pending = Ticket::where('status', '4')->count();

        // 3 is key of High priority table
        // 3 is key of Processing status table

        $high = Ticket::where('priority', '3')
            ->where('status', '3')->count();

        // 2 is key of High priority table

        $medium = Ticket::where('priority', '2')
            ->where('status', '3')->count();

        // 1 is key of High priority table

        $low = Ticket::where('priority', '1')
            ->where('status', '3')->count();

        if ($pending < 5) {

            if ($request->input('priority') == '3' &&  $high > 5) {
                return redirect()->back()->with("alert", "You have exceeded the maximum High priority tickets i.e. 5");
            } elseif ($request->input('priority') == '2' && $medium > 8) {
                return redirect()->back()->with("alert", "You have exceeded the maximum Medium priority i.e. 8");
            } elseif ($request->input('priority') == '1' && $low > 10) {
                return redirect()->back()->with("alert", "You have exceeded the maximum Low priority i.e. 10");
            } else {

                $result = $ticket->save();

                $mailer->sendTicketInformation(Auth::user(), $ticket);

                $number = DB::table('tickets')
                    ->orderBy('created_at', 'desc')
                    ->first();
                $num = sprintf('%03d', intval($number->id));

                if ($result) {
                    return redirect()->back()->with("success", "A new SRN: $ticket->job has been generated.!");
                } else {
                    return ["result" => "failed "];
                }
            }
        } else {
            return redirect()->back()->with("warning", "Please clear all the remaining tickets i.e. Pending from client in order to generate new tickets.");
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
        $tickets = Ticket::latest()->orderBy('id', 'desc')->get();
        return view('client.ticket.show_ticket', compact('tickets'));
    }

    function comment_ticket(Request $request, $id, AppMailer $mailer)
    {
        $picture = "";
        $imageNameArr = [];
        $this->validate($request, [
            'comment'   => 'required',
            'reference.*' => 'mimes:jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:307200',
        ]);

        if ($request->hasFile('reference')) {
            $picture = array();
            $imageNameArr = [];
            foreach ($request->reference as $file) {
                // you can also use the original name
                $image = $file->getClientOriginalName();
                $imageNameArr[] = $image;
                // Upload file to public path in images directory
                $fileName = $file->move(date('d-m-Y') . '-Comment-Reference', $image);
                // Database operation
                $array[] = $fileName;
                $picture = implode(",", $array); //Image separated by comma
            }
        }

        $comment = new Comment;
        $comment->user_id            = $request->user_id;
        $comment->job                = $request->job;
        $comment->job_no             = $request->job_no;
        $comment->comment            = $request->comment;
        $comment->comment_ticket     = $request->comment_ticket;
        $comment->reference          = $picture;

        $ticket = Ticket::find($id);

        $getdata = \App\Models\Ticket::find($id);

        if ($getdata->status == "5") {
            return redirect()->back()->with("error", "Request $ticket->job has been Closed.");
        } else {
            Ticket::select('commentnos')->where('id', $id)->Increment('commentnos');
            $ticket->save();
            $result = $comment->save();
        }

        $mailer->sendCommetInformation(Auth::user(), $comment, $ticket);

        $number = DB::table('comments')
            ->orderBy('created_at', 'desc')
            ->first();

        $num = sprintf('%02d', intval($number->id));

        if ($result) {
            return redirect()->back()->with("status", "An Edit Request $ticket->job-E$num has been submitted.");
        } else {
            return ["result" => "failed "];
        }
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
