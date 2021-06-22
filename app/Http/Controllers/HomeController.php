<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $companies_count = User::where([
            ['role','Company']
        ])->count();

        return view('home',compact(
            'companies_count'
        ));

    }

    public function newsletters()
    {
        return view('layouts.newsletters.index');
    }

    public function settings()
    {

        $setting = Setting::find(1);

        return view('layouts.settings.index', compact(
            'setting'
        ));

    }

    public function saveSettings(Request $request)
    {
        $setting = Setting::find(1);
        $setting->email_recipient = $request->email_receiver;
        $setting->save();
        return redirect('settings');

    }



}
