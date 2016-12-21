<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\DocumentItem;
class DocumentItemController extends Controller
{
    //
    //
    public function documentitemlist(){
        $data['title'] = "Document Item";
        $data['header'] = "List of Document Items";
        $data['Model'] = DocumentItem::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.documentitemTable";
        $data['canAdd'] = Auth::user()->canAdd('documentitem');
        $data['create'] = "/documentitem/new";

        return view('listview', $data);
    }
    public function getdocumentitem($id){
    	 $documentitem = DocumentItem::where('code', $id)->where('company_id', Auth::user()->company_id)->first();
        if($documentitem == null){
            return redirect('/documentitem/list/');
        }
        $data['Model'] = $documentitem;
        $data['ModelURI'] = "documentitem";
        $data['ModelIDnew'] = "getdocumentitem_new";
        $data['ModelIDdelete'] = "getdocumentitem_delete";
        $data['title'] = "Document Item";
        $data['formViewPartial'] = "partials.documentitemForm";
        $data['ModelURIlistview'] = "documentitem/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetdocumentitem";
		$data['create'] = "/documentitem/new";

        $data['canadd'] = Auth::user()->canAdd('documentitem');
        $data['cansave'] = Auth::user()->cansave('documentitem');
        $data['candelete'] = Auth::user()->candelete('documentitem');
        if($documentitem->systemVariable){
        	$data['candelete'] = false;
        }


        return view('formView2', $data);
    }
     public function newdocumentitem(Request $request){
    	 $documentitem = new DocumentItem();
        
        $data['Model'] = $documentitem;
        $data['ModelURI'] = "documentitem";
        $data['ModelIDnew'] = "getdocumentitem_new";
        $data['ModelIDdelete'] = "getdocumentitem_delete";
        $data['title'] = "Document Item";
        $data['formViewPartial'] = "partials.documentitemForm";
        $data['ModelURIlistview'] = "documentitem/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formgetdocumentitem";
		$data['create'] = "/documentitem/new";

        $data['canadd'] = Auth::user()->canAdd('documentitem');
        $data['cansave'] = Auth::user()->cansave('documentitem');
        $data['candelete'] = Auth::user()->candelete('documentitem');


        if(Auth::user()->canAdd('documentitem') == false || Auth::user()->canAdd('documentitem') == 0){
            return $this->documentitemlist();
        }
        $data['Model'] = $documentitem;
	
		return view('formView2', $data);
    }
    public function postdocumentitem(Request $request = null, $id = null){
        
        $documentitem = new DocumentItem();
        $affirmationMessage = "Document Item created successfully!";
        if($request->has('code') && $request->code != null){
            $documentitem = DocumentItem::where('code', $request->code)->where('company_id', Auth::user()->company_id)->first();
            if($documentitem){
                
                $affirmationMessage = "Document Item updated successfully!";
            } else{
                //putting new user code results in "add" function
                $documentitem = new DocumentItem();
                $affirmationMessage = "Document Item created successfully!";
            }
        }
        $documentitem->code = $request->code;
        $documentitem->company_id = Auth::user()->company_id;
        $documentitem->desc = $request->desc;
        $documentitem->vataxable = ($request->vataxable) ? 1 : 0;
        $documentitem->wtaxable = ($request->wtaxable) ? 1 : 0;
        $documentitem->penalizable = ($request->penalizable) ? 1 : 0;
        $documentitem->systemVariable = false;

        $documentitem->save();
        
        return redirect('/documentitem/get/' . $documentitem->code)->with('affirm', $affirmationMessage);
    }
    public function deletedocumentitem(Request $request, $id){
        $documentitem = DocumentItem::where('code', $id)->where('company_id', Auth::user()->company_id)->first();
        $documentitem->delete();
        $affirmationMessage = "Document Item deleted successfully!";
        return redirect('/documentitem/list/')->with('affirm', $affirmationMessage);
    }
}
