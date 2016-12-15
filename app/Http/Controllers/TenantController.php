<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\TenantS;
use App\Property;
use App\Unit;
class TenantController extends Controller
{
    //
    public function Tenantlist(){
        $data['title'] = "Tenant Information";
        $data['header'] = "List of Tenants";
        $data['Model'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.TenantTable";
        $data['canAdd'] = Auth::user()->canAdd('Tenant');
        $data['create'] = "/tenant/new";

        return view('listview', $data);
    }
    public function getTenant($id){
         $Tenant = Tenants::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        if($Tenant == null){
            return redirect('/tenant/list/');
        }
        $data['Model'] = $Tenant;
        $data['ModelURI'] = "Tenant";
        $data['ModelIDnew'] = "getTenant_new";
        $data['ModelIDdelete'] = "getTenant_delete";
        $data['title'] = "Tenant";
        $data['formViewPartial'] = "partials.TenantForm";
        $data['ModelURIlistview'] = "tenant/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetTenant";
        $data['create'] = "/tenant/new";

        $data['canadd'] = Auth::user()->canAdd('Tenant');
        $data['cansave'] = Auth::user()->cansave('Tenant');
        $data['candelete'] = Auth::user()->candelete('Tenant');

        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();
        return view('formView2', $data);
    }
     public function newTenant(Request $request){
         $Tenant = new Tenants();
        
        $data['Model'] = $Tenant;
        $data['ModelURI'] = "Tenant";
        $data['ModelIDnew'] = "getTenant_new";
        $data['ModelIDdelete'] = "getTenant_delete";
        $data['title'] = "Tenant";
        $data['formViewPartial'] = "partials.TenantForm";
        $data['ModelURIlistview'] = "tenant/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formgetTenant";
        $data['create'] = "/tenant/new";

        $data['canadd'] = Auth::user()->canAdd('Tenant');
        $data['cansave'] = Auth::user()->cansave('Tenant');
        $data['candelete'] = Auth::user()->candelete('Tenant');


        if(Auth::user()->canAdd('Tenant') == false || Auth::user()->canAdd('Tenant') == 0){
            return $this->Tenantlist();
        }
        $data['Model'] = $Tenant;
        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        return view('formView2', $data);
    }
    public function postTenant(Request $request = null, $id = null){
        
        $Tenant = new Tenants();
        $affirmationMessage = "Tenant created successfully!";
        if($request->has('id') && $request->id != null){
            $Tenant = Tenants::where('id', $request->id)->where('company_id', Auth::user()->company_id)->first();
            if($Tenant){
                
                $affirmationMessage = "Tenant updated successfully!";
            } else{
                //putting new user code results in "add" function
                $Tenant = new Tenants();
                $affirmationMessage = "Tenant created successfully!";
            }
        }
        $Tenant->tenantname = $request->tenantname;
        $Tenant->address = $request->address;
        $Tenant->telno = $request->telno;
        $Tenant->mobileno = $request->mobileno;
        $Tenant->occupation = $request->occupation;
        $Tenant->civilstatus = $request->civilstatus;
        
        $Tenant->lastname = $request->lastname;
        $Tenant->middlename = $request->middlename;
        $Tenant->firstname = $request->firstname;
        
        

        $Tenant->company_id = Auth::user()->company_id;
        $Tenant->save();
        
        return redirect('/tenant/get/' . $Tenant->id)->with('affirm', $affirmationMessage);
    }
    public function deleteTenant(Request $request, $id){
        $Tenant = Tenants::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $Tenant->delete();
        $affirmationMessage = "Tenant deleted successfully!";
        return redirect('/tenant/list/')->with('affirm', $affirmationMessage);
    }
}
