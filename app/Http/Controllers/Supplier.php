<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Supplier extends Controller
{

    public function supplierCreate(){
		$pagetitle = 'Supplier';
		$allSuppliers = DB::table('supplier')->get();
    	return view('supplier.supplier',compact('pagetitle','allSuppliers'));
    }
    public function supplierInsert(Request $request){

    	$validate = $this->validate($request,[
    	         'SupplierName'=>'required',
    	         'Address'=>'required',
    	         'Phone'=>'required',
    	         'Email'=>'required',         
    	         'Active'=>'required',
    	         'InvoiceDueDays' => 'required',
    	       ]);
    	
    	$supplierInsert = DB::table('supplier')->insert($validate);

        return redirect('supplierCreate')->with('success', 'Data has been submitted Successfully!');
    }
    public function supplierEdit($SupplierID){
    	$pagetitle = "Edit Supplier";

    	$supplierEdit = DB::table('supplier')->where('SupplierID',$SupplierID)->get();
    	return view('supplier.supplier_edit',compact('pagetitle','supplierEdit'));
    	# code...
    }
    public function supplierUpdate(Request $request){
    	$validate = $this->validate($request,[
    	         'SupplierName'=>'required',
    	       ]);
    	$data = array(

    		'SupplierName'=>$request->SupplierName,
    	    'Address'=>$request->Address,
    	    'Phone'=>$request->Phone,
    	    'Email'=>$request->Email,         
    	    'Active'=>$request->Active,
    	    'InvoiceDueDays' => $request->InvoiceDueDays,
    	         );
    	$supplierUpdate = DB::table('supplier')->where('SupplierID',$request->SupplierID)->update($data);

    	return redirect('supplierCreate')->with('success','Party/ Supplier Updated Successfully');
    }
    public function supplierDelete($SupplierID){

    	$supplierDelete = DB::table('supplier')->where('SupplierID',$SupplierID)->delete();

    	return redirect('supplierCreate')->with('success','Party/ Supplier deleted Successfully');


    	# code...
    }

}
