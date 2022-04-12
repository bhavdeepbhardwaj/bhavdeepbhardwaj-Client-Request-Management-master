<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Help;
use App\Models\HelpCategory;
use App\Models\Priority;
use App\Models\Status;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    //
    function index()
    {
        return view('admin.index');
    }

    function profile()
    {
        return view('admin.profile');
    }

    function setting()
    {
        return view('admin.setting');
    }

    function reports()
    {
        return view('admin.reports');
    }

    function help()
    {
        // $helps = Help::first()->get();
        $helps = Help::orderBy('id', 'DESC')->get();
        return view('admin.help.help', ['helps' => $helps]);
    }

    function info_Help($id)
    {
        $helps = Help::where('id', $id)->get()->first();
        return view('admin.help.info-help', ['helps' => $helps]);
    }

    function ticket()
    {
        return view('admin.ticket.ticketList');
    }

    function details_ticket()
    {
        return view('admin.ticket.details_ticket');
    }

    function show_account()
    {
        $user =  User::get();
        // dd($account);
        return view('admin.account.show_account', ['user' => $user]);
    }

    function create_ADMIN_account()
    {
        $role = Role::where('name','User')->first();
        // dd($role->id);
        return view('admin.account.create_ADMIN_account', ['role' => $role]);
    }

    function createAdmin(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->back()->with("status", "User is created.");
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function create(array $data)
    {
        // dd($data);
        $newuser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'prefix' => $data['prefix'],
            'is_admin' => 0,
            'password' => Hash::make($data['password']),
        ]);

        $newuser->save();
        // dd($newuser);
        return redirect()->back()->with("status", "User is created.");
    }

    function create_CLIENT_account()
    {
        $role = Role::where('name','Client')->first();
        return view('admin.account.create_CLIENT_account', ['role' => $role]);
    }

    function createClient(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->back()->with("status", "User is created.");
    }

    function category()
    {
        $category = Category::get();
        $users = DB::table('users')->where('role', 3)->get();
        return view('admin.category.category', ['category' => $category], ['users' => $users]);
    }

    function categoryStore(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'user_id'   => 'required',
        ]);
        // dd($request->all());
        Category::create($request->all());

        return redirect()->back()->with("status", "New Category Created Successfully.");
    }

    function brand()
    {
        $brands = Brand::get();
        $users = DB::table('users')->where('role', 3)->get();
        return view('admin.brand.brand', ['brands' => $brands], ['users' => $users]);
    }

    function brandStore(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'user_id'   => 'required',
        ]);
        // dd($request->all());
        Brand::create($request->all());

        return redirect()->back()->with("status", "New Brand Created Successfully.");
    }

    function country()
    {
        $countrys = Country::get();
        $users = DB::table('users')->where('role', 3)->get();
        // dd($users);
        // return view('admin.country.country', ['countrys' => $countrys], ['role' => $role]);
        return view('admin.country.country', ['countrys' => $countrys], ['users' => $users]);
    }

    function countryStore(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'user_id'   => 'required',
        ]);
        // dd($request->all());
        Country::create($request->all());

        return redirect()->back()->with("status", "New Country Created Successfully.");
    }

    function helpCategory()
    {
        $users = User::get();
        $helpCategory = HelpCategory::get();
        return view('admin.help-category.helpCategory', ['helpCategory' =>  $helpCategory], ['users' => $users]);
    }

    function helpCategoryStore(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'user_id'   => 'required',
        ]);
        // dd($request->all());
        HelpCategory::create($request->all());

        return redirect()->back()->with("status", "New Help Category Created Successfully.");
    }

    function role()
    {
        $role = Role::get();
        return view('admin.role.role', ['role' =>  $role]);
    }

    function statuses()
    {
        $statuses = Status::get();
        // dd($statuses);
        return view('admin.statuses.statuses', ['statuses' =>  $statuses]);
    }

    function statusesStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Status::create($request->all());

        return redirect()->back()->with("status", "New Statuses Created Successfully.");
    }

    function priorities()
    {
        $priorities = Priority::get();
        return view('admin.priorities.priorities', ['priorities' =>  $priorities]);
    }

    function prioritiesStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Priority::create($request->all());

        return redirect()->back()->with("status", "New Priorities Created Successfully.");
    }
}
