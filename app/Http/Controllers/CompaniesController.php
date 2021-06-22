<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Auth;
use Mail;
use DB;
use Validator;

class CompaniesController extends Controller
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
        return view('layouts.companies.index');
    }

    public function getDataTablesCompanies()
    {
        $data = User::where([
            ['role','Company']
        ])
        ->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
    public function getCompany(Request $request, $id)
    {
        $company = User::find($id);

        return view('layouts.companies.edit', compact(
            'company'
        ));
    }


    public function saveEditCompany(Request $request)
    {
        $rules = [
            'company_name'=>'required',
            'email'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $company = User::find($request->id);
            $company->company_name = $request->company_name;
            $company->company_website = $request->company_name;
            $company->username = $request->username;
            $company->email = $request->email;

            if ($company->password) {
                $company->password = bcrypt($request->password);
            }

            if ($request->uploadLogo) {
                $imageName = time() . '.' . $request->uploadLogo->extension();

                $request->uploadLogo->move('companylogos', $imageName);
                $company->company_logo = 'companylogos/' . $imageName;
            }
            $company->role = 'company';

            $company->save();

            $request->session()->flash('success', 'You have successfully edited a company.');

            return redirect('companies');
        }
    }

    public function deleteCompany(Request $request,$id)
    {
            $company = User::find($id);
            $company->delete();
            $request->session()->flash('success', 'You have successfully deleted a company.');
            return redirect('companies');
    }

}
