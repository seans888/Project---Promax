<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Notifications;
use Auth;
use App\Strings;
use App\Company;
use Illuminate\Http\Response;
use Hash;
use App\User;
use App\Employee;
class CompanyController extends Controller
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
    public function apiCompany($id){
        $Company = Company::find($id);
        return $Company;
    }
    public function postCompany(Request $request, $id){
         $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'desc' => 'required'
        ]);
        $Company = Company::find($id);
        $Company->name = $request->name;
        $Company->desc = $request->desc;
        $Company->save();
        return redirect('/company/' . $Company->id)->with('affirm', 'Company updated successfully!');
    }
    public function company(){ 
        $company_id = Auth::user()->company_id;
        $data['title'] = "Company";
        $data['header'] = "List of Companies";
        $data['Model'] =  Company::where('id' , $company_id)->orWhere('parent', $company_id)->get();
        $data['tablePartialView'] = "partials.CompanyTable";
        $data['canAdd'] = false;
        return view('listview', $data);
    }
    public function getCompany($id){
        $data['Company'] = Company::find($id);
        $data['Companies'] = Company::where('id', Auth::user()->company_id)->orWhere('parent', Auth::user()->company_id)->get();
        $data['canadd'] = Auth::user()->canAdd('company');
        $data['cansave'] = Auth::user()->cansave('company');
        $data['candelete'] = Auth::user()->candelete('company');

        return view('getCompany', $data);
    }


}