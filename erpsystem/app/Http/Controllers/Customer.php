<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Customer extends Controller
{
    
    public function customerCreate(){
    	$pagetitle = "Customer";
    	$customerCreate = DB::table('party')->get();

    	return view('customer.customer',compact('customerCreate','pagetitle'));
    }

    public function customerInsert(Request $request){
    	
    	$validate = $this->validate($request,[

		    'PartyName' =>'required',
		    'Address' =>'required',
		    'Phone' =>'required',
		    'Email' =>'required',
		    'Active' =>'required',
		    'InvoiceDueDays' =>'required',
    	      ]);

    	$customerInsert = DB::table('party')->insert($validate);
    	return redirect('customerCreate')->with('success',"Party / Customer added successfully!");
    	
    }
    public function customerEdit($PartyID){

    	$customerEdit = DB::table('party')->where("PartyID", $PartyID)->get();

    	return view('customer.customer_edit',compact('customerEdit'));
    	
    }
    public function customerUpdate(Request $request){

    $data= array(

    		'PartyID' =>$request->PartyID,
			'PartyName' =>$request->PartyName,
		    'Address' =>$request->Address,
		    'Phone' =>$request->Phone,
		    'Email' =>$request->Email,
		    'Active' =>$request->Active,
		    'InvoiceDueDays' =>$request->InvoiceDueDays,
    	);
    	
    	$customerUpdate = DB::table('party')->where('PartyID', $request->PartyID)->update($data);

    	return redirect('customerCreate')->with('success','Party / Customer updated successfully!');
    }

    public function customerDelete($PartyID){
    	$customerDelete = DB::table('party')->where("PartyID",$PartyID)->delete();
    	return redirect('customerCreate')->with('success', "Party/ Customer deleted successfully!");
    }
}
