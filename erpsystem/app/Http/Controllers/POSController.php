<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;
use Response;
class POSController extends Controller
{
    
    public function PosTerminal(){
        $Item = DB::table('item')->get();
        $Categories = DB::table('categories')->get();
        $LastInvoiceData = DB::table('v_item_detail')->where("Token",Session::get('qwick'))->get();
        $Flag = DB::table('v_item_detail')->get();


        return view("POS/PosTerminal",compact('Item','Categories','LastInvoiceData','Flag'));
    }

    public function CreateOrder($ItemID){

        $qty = 1;

        $CreateOrder = DB::table('item')->where("ItemID",$ItemID)->get();
        
        $Exists = DB::table('invoice_detail')->where("ItemID",$ItemID)
        ->where("Token",Session::get('qwick'))->get();

        if(count($Exists) > 0 )
        {
            DB::table('invoice_detail')->where('Token',Session::get('qwick'))->where('ItemID',$ItemID)->update(
                ['Quantity' => $qty + $Exists[0]->Quantity]);
        }else{


        $data = array(

            'ItemID' => $CreateOrder[0]->ItemID,
            'InvoiceMasterID'=>1,
            'SupplierID' => 1,
            'Quantity' => 1,
            'TaxPer' => $CreateOrder[0]->Percentage,
            'TaxAmount' => $CreateOrder[0]->Percentage * $CreateOrder[0]->SellingPrice,
            'TotalAmount' => ($CreateOrder[0]->Percentage * $CreateOrder[0]->SellingPrice) + $CreateOrder[0]->SellingPrice ,            
            'Discount' => 0,
            'Token' => Session::get('qwick'),
            'Flag' => 0,    
        );



        $StoreOrderData = DB::table('invoice_detail')->insert($data);
        
}
        $Flag = DB::table('v_item_detail')->where('Token',session::get('qwick'))->where('Flag',0)->get();

        return view('POS/CreateOrder',compact('CreateOrder','Flag'));    
    }
    public function DeleteOrderItem($ItemID){

        $DeleteOrderItem = DB::table('invoice_detail')->where('ItemID',$ItemID)->delete();
        return redirect('PosTerminal')->with('success','Item removed Successfully');

    }

    public function Checkout(Request $request){

        $vhno = DB::table('invoice_master')
        ->select( DB::raw('LPAD(IFNULL(MAX(right(InvoiceNo,5)),0)+1,5,0) as VHNO '))
        ->where(DB::raw('left(InvoiceNo,3)'),'POS')->get();

        $invoice_master_data = array(
            
            'InvoiceNo' => $vhno,
            'Date' =>date('Y-m-d'),
            'DueDate' => date('Y-m-d'),
            'PartyID' => $request->PartyID,
            'UserID' => Session::get('UserID'),
            'PaymentMode'=> 'Cash',
            'CustomerNotes'=> Session::get('qwick'),
            'SubTotal' => $request->subTotal,
            'DiscountPer' => $request->discount,
            'DiscountAmount' => $request->discountAmount,
            'Total' => $request->itemTotal,
            'Paid' => $request->Paid,
            'TaxPer' => $request->tax,
            'TaxAmount' => $request->taxAmount,
            'Balance' => $request->Balance
        );
    
        $invoice_master = DB::table('invoice_master')->insert($invoice_master_data);

        $invoice_deatil = DB::table('invoice_detail')->where('Token', Session::get('qwick'))->update(array('Flag'=> 1,));
        Session::flash('qwick');
        return redirect('PosTerminal')->with('success','Data Saved Successfully!');

    }

    public function ViewAllFiles()
    {
         $ViewAll = DB::table('report')->get();
         if(count($ViewAll) < 1){
        return view('POS/upload-file',compact('ViewAll'))->with('error','No File found');

         }
        return view('POS/upload-file',compact('ViewAll'));
    }

    public function uploadFile(Request $request){

        $mimeType = 0;  

        $this->validate($request,[
                'file' => 'required',
            ]);

        if(substr(request()->file->getMimeType(), 0, 5) == 'image') {
            $mimeType = 0;
        }else{
            $mimeType = 1;
        }

         $title = request()->file->getClientOriginalName();
        $request->file->move(public_path('uploaded-files'), $title);


        $ReportFileData =array(

            'ReportFile'=> $title,
            'Title' => $title,
            'MimeType'=> $mimeType,

        );

            $ReportFile = DB::table('report')->insert($ReportFileData);
           

        $ViewAll = DB::table('report')->get();

          return view('POS/upload-file',compact('ViewAll'))->with('success' ,'File Uploaded Successfully');

    }
    public function downloadfile($ReportID){
         $report = DB::table('report')->where('ReportID',$ReportID)->get();
         $filename = $report[0]->ReportFile;
        $file= public_path(). "/uploaded-files/".$filename;
        $headers = array(
                  'Content-Type: application/pdf',
                );
        return Response::download($file, $filename , $headers);
    }
    public function deleteFile($ReportID){
        $deleteReport = DB::table('report')->where('ReportID',$ReportID)->delete();
        $ViewAll = DB::table('report')->get();
        return view('POS/upload-file',compact('ViewAll'));
 
    }






}
