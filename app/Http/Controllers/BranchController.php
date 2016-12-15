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
use App\Branch;
use App\Employee;
class BranchController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');

    }
    public function apibranch($id){
        $branch = Branch::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        return $branch;
    }
    public function branches(){
        $data['title'] = "Projects";
        $data['header'] = "List of Projects";
        $data['Model'] = Branch::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.branchTable";
        $data['canAdd'] = true;
        $data['create'] = "/project/";
        return view('listview', $data);
    }
     public function getbranch($id){
        $branch = Branch::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        if($branch == null){
            return redirect('/project/');
        }
        $data['Model'] = $branch;
        $data['ModelURI'] = "project";
        $data['ModelIDnew'] = "getbranch_new";
        $data['ModelIDdelete'] = "getbranch_delete";
        $data['title'] = "Project";
        $data['formViewPartial'] = "partials.branchForm";
        $data['ModelURIlistview'] = "projects";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetbranch";

        $data['create'] = "/project/";
        return view('formView2', $data);
    }
     public function newbranch(){
        $data['Model'] = new branch();
        $data['ModelURI'] = "project";
        $data['ModelIDnew'] = "getbranch_new";
        $data['ModelIDdelete'] = "getbranch_delete";

        $data['title'] = "branch";
        $data['formViewPartial'] = "partials.branchForm";
        $data['ModelURIlistview'] = "projects";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetbranch";

        $data['create'] = "/project/";
        $data['companies'] = Company::where('id' , $company_id)->orWhere('parent', $company_id)->get();
        return view('formView2', $data);
    }
    public function postbranch(Request $request = null, $id = null){
    	 $this->validate($request, [
            'name' => 'required'
            ,'desc' => 'required'
            
        ]);
    	$branch = new Branch();
    	$affirmationMessage = "project created successfully!";
		if($request->has('id')){
	    	$branch = Branch::where('id', $request->id)->where('company_id', Auth::user()->company_id)->first();
	    	if($branch){
                $branch->id = $request->id;
				$affirmationMessage = "project information updated successfully!";
			} else{
                //putting new branch code results in "add" function
		    	$branch = new branch();
		    
			}
    	}
    	if($id == null){
            $branch = new branch();
            $affirmationMessage = "project created successfully!";
           
            $affirmationMessage = "project created successfully!";
        }
        $branch->name = $request->name;
        $branch->desc = $request->desc;
        $branch->company_id = Auth::user()->company_id;
        
        $branch->save();
        return redirect('/project/' . $branch->id)->with('affirm', $affirmationMessage);
    }
    public function deletebranch($id){
        $branch = Branch::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $branch->delete();
        $affirmationMessage = "project deleted successfully!";
        return redirect('/project/')->with('affirm', $affirmationMessage);
    } 
    public function deletebranchBybranchname($branchname){
        $branch = Branch::where('branchname', $branchname)->where('company_id', Auth::user()->company_id)->first();
        $branch->delete();
        $affirmationMessage = "project deleted successfully!";
        return redirect('/project/')->with('affirm', $affirmationMessage);
    }
}
